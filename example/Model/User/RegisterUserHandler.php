<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 9:07 PM
 */
namespace ProophExample\NoMvc\Model\User;


final class RegisterUserHandler
{
    /**
     * @var UserCollection
     */
    private $userCollection;

    public function __construct(UserCollection $userCollection)
    {
        $this->userCollection = $userCollection;
    }

    public function handle(RegisterUser $command)
    {
        $user = User::registerWithData($command->userName(), Email::fromString($command->email()));

        $this->userCollection->add($user);
    }
} 