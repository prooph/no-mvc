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


final class Email
{
    /**
     * @var string
     */
    private $email;

    public static function fromString($email)
    {
        if (! is_string($email)) {
            throw Exception\Email::isMissing();
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw Exception\Email::isNotValid();
        }

        return new self($email);
    }

    private function  __construct($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->email;
    }
} 