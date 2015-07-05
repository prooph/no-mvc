<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Date: 7/5/15 - 7:24 PM
 */
return [
    'invokables' => [
        'prooph.psb.handle_command_invoke_strategy' => \Prooph\ServiceBus\InvokeStrategy\HandleCommandStrategy::class,
    ],
    'factories' => [
        \Prooph\NoMvc\Middleware\CommandMiddleware::class => \Prooph\NoMvc\Middleware\CommandMiddlewareFactory::class,
        \ProophExample\NoMvc\Model\User\RegisterUserHandler::class => \ProophExample\NoMvc\Infrastructure\CommandHandlerFactory\RegisterUserHandlerFactory::class,
        'proophessor.command_bus' => \Prooph\Proophessor\ServiceBus\CommandBusFactory::class,
        'prooph.psb.command_router' => \Prooph\Proophessor\ServiceBus\CommandRouterFactory::class,
        'prooph.psb.service_locator_proxy' => \Prooph\Proophessor\ServiceBus\ServiceLocatorProxyFactory::class,
    ]
];