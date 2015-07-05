<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 9:55 PM
 */
namespace ProophExample\NoMvc\Model\User\Exception;


use Prooph\NoMvc\Model\Definition;

final class UserName extends \InvalidArgumentException
{
    /**
     * @return UserName
     */
    public static function isMissing()
    {
        return new self('User name is missing', ErrorCode::INVALID_ARGUMENT);
    }

    /**
     * @return UserName
     */
    public static function isNotValid()
    {
        return new self('User name is not valid', ErrorCode::INVALID_ARGUMENT);
    }
} 