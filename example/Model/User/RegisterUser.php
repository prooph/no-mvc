<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 9:54 PM
 */
namespace ProophExample\NoMvc\Model\User;


use Prooph\Common\Messaging\Command;
use ProophExample\NoMvc\Model\User\Exception\UserName;

final class RegisterUser extends Command
{
    /**
     * @param array $payload
     * @return RegisterUser
     * @throws Exception\UserName
     */
    public static function fromPayload(array $payload)
    {
        if (! isset($payload['name'])) {
            throw UserName::isMissing();
        }

        if (! isset($payload['email'])) {
            throw Exception\Email::isMissing();
        }

        return new self(__CLASS__, $payload);
    }

    /**
     * @return string
     */
    public function userName()
    {
        return (string)$this->payload['name'];
    }

    /**
     * @return string
     */
    public function email()
    {
        return (string)$this->payload['email'];
    }
} 