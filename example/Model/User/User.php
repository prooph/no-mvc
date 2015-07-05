<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 9:14 PM
 */
namespace ProophExample\NoMvc\Model\User;

use ProophExample\NoMvc\Model\User\Exception\UserName;

final class User
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Email
     */
    private $email;

    /**
     * @param string $name
     * @param Email $email
     * @return User
     */
    public static function registerWithData($name, Email $email)
    {
        return new self($name, $email);
    }

    private function __construct($name, Email $email)
    {
        $this->setName($name);
        $this->setEmail($email);
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function email()
    {
        return $this->email;
    }

    private function setEmail(Email $email)
    {
        $this->email = $email;
    }

    private function setName($name)
    {
        if (! is_string($name) || empty($name)) {
            throw UserName::isNotValid();
        }

        $this->name = $name;
    }
} 