<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 8:26 PM
 */
return [
    'proophessor' => [
        'command_bus' => [
            'prooph.psb.command_router',
            'prooph.psb.service_locator_proxy',
            'prooph.psb.handle_command_invoke_strategy',
        ],
        'command_router_map' => [
            \ProophExample\NoMvc\Model\User\RegisterUser::class => \ProophExample\NoMvc\Model\User\RegisterUserHandler::class,
        ],
    ]
];