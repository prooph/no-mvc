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
    'routes' => [
        'home' => [
            'url' => '/',
            'action' => 'ProophExample\NoMvc\Action\HomeFactory::factory',
        ],
        'commands' => [
            'url' => '/api/commands/RegisterUser',
            'action' => \Prooph\NoMvc\Middleware\CommandMiddleware::class,
        ]
    ]
];