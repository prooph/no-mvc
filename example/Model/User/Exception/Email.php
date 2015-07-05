<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 10:02 PM
 */
namespace ProophExample\NoMvc\Model\User\Exception;


final class Email extends \InvalidArgumentException
{
    /**
     * @return UserName
     */
    public static function isMissing()
    {
        return new self('Email is missing', ErrorCode::INVALID_ARGUMENT);
    }

    /**
     * @return Email
     */
    public static function isNotValid()
    {
        return new self('Email is not valid', ErrorCode::INVALID_ARGUMENT);
    }
} 