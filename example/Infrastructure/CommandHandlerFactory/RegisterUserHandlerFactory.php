<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 9:38 PM
 */
namespace ProophExample\NoMvc\Infrastructure\CommandHandlerFactory;


use ProophExample\NoMvc\Infrastructure\Repository\FileStorageUserCollection;
use ProophExample\NoMvc\Model\User\RegisterUserHandler;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

final class RegisterUserHandlerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RegisterUserHandler(new FileStorageUserCollection());
    }
}