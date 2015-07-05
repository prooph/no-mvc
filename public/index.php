<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 5/28/15 - 11:26 PM
 */

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Setup autoloading
require 'vendor/autoload.php';


$smConfig = new \Zend\ServiceManager\Config(require 'config/services.php');
$serviceManager = new \ProophExample\NoMvc\Infrastructure\Container\Zf2InteropContainer($smConfig);

$serviceManager->setService('config', require('config/application.config.php'));

$app = new \Zend\Stratigility\MiddlewarePipe();

$dispatcher =  \Zend\Stratigility\Dispatch\MiddlewareDispatch::factory(require 'config/routes.php');

$dispatcher->setContainer($serviceManager);

$app->pipe('/', $dispatcher);

// Run the server!
$server = \Zend\Diactoros\Server::createServer(
    $app,
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$server->listen();
