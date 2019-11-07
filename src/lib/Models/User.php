<?php namespace Models;

/**
 * User model.
 */
class User extends AModel
{
    static public function init()
    {
        //self::$dbConnection = \Data\DatabaseProvider::GetRedis();
    }

    public $username = null;

    public $password = null;

    static public function Create(string $username, string $password) : User
    {
        $temp = new self();
        $temp->username = $username;
        $temp->password = $password;
        return $temp;
    }

    static public function Read(string $username) : User
    {
        return new self();
    }

    static public function Update(User $user) : bool
    {
        return true;
    }

    static public function Delete(User $user) : bool
    {
        return true;
    }
}