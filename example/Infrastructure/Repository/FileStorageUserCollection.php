<?php
/*
 * This file is part of the prooph/no-mvc.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 7/5/15 - 9:30 PM
 */
namespace ProophExample\NoMvc\Infrastructure\Repository;

use ProophExample\NoMvc\Model\User\User;
use ProophExample\NoMvc\Model\User\UserCollection;

final class FileStorageUserCollection implements UserCollection
{
    private $folder = 'data';

    private $fileName = 'users.json';

    private $file;

    /**
     * @var []
     */
    private $users;

    public function __construct()
    {
        if (! is_writable($this->folder)) {
            throw new \Exception("Folder {$this->folder} is not writable");
        }

        $this->file = $this->folder . DIRECTORY_SEPARATOR . $this->fileName;

        if (! file_exists($this->file)) {
            $this->users = [];
            return;
        }

        if (! is_readable($this->file)) {
            throw new \Exception("File {$this->file} is not readable");
        }

        $this->users = json_decode(file_get_contents($this->file), true);
    }

    public function add(User $user)
    {
        $this->users[] = [
            'name' => $user->name(),
            'email' => $user->email()->toString()
        ];

        file_put_contents($this->file, json_encode($this->users));
    }
}