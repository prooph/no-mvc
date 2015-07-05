<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 5:58 PM
 */
namespace ProophExample\NoMvc\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class Home
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $response->getBody()->write('Prooph NoMVC Example');

        return $response;
    }
} 