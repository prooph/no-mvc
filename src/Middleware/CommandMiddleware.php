<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 7:31 PM
 */
namespace Prooph\NoMvc\Middleware;

use Prooph\ServiceBus\CommandBus;
use Prooph\ServiceBus\Exception\CommandDispatchException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CommandMiddleware
{
    /**
     * @var \Prooph\ServiceBus\CommandBus
     */
    private $commandBus;

    /**
     * @var []
     */
    private $commands;

    public function __construct(CommandBus $commandBus, array $commands)
    {
        $this->commandBus = $commandBus;
        $this->commands = $commands;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        $path = $request->getUri()->getPath();

        if (! isset($this->commands[$path])) {
            return $next($request, $response);
        }

        if ($request->getMethod() !== 'POST') {
            return $response->withStatus(405);
        }

        try {

            $payload = json_decode($request->getBody(), true);

            if ($payload === null) {
                $payload = [];
            }

            $command = $this->commands[$path];

            if (! is_callable($command)) {
                throw new \RuntimeException("Command associated with the path $path is not callable");
            }

            $command = call_user_func_array($command, [$payload]);

            $this->commandBus->dispatch($command);

            return $response->withStatus(202);
        } catch (CommandDispatchException $dispatchException) {
            $e = $dispatchException->getFailedCommandDispatch()->getException();

            return $this->populateError($response, $e);
        } catch (\Exception $e) {
            return $this->populateError($response, $e);
        }
    }

    /**
     * @param \Exception $e
     * @return int
     */
    private function getStatusErrorCodeFromException(\Exception $e)
    {
        switch ($e->getCode()) {
            //@TODO: complete list of supported status error codes
            case 400:
            case 405:
            case 404:
            case 422:
                return $e->getCode();
            default:
                return 500;
        }
    }

    /**
     * @param ResponseInterface $response
     * @param \Exception $e
     * @return ResponseInterface
     */
    private function populateError(ResponseInterface $response, \Exception $e)
    {
        $response = $response->withStatus($this->getStatusErrorCodeFromException($e));
        $response->getBody()->write(json_encode(['message' => $e->getMessage()]));
        return $response;
    }
} 