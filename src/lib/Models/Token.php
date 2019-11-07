<?php namespace Models;
use \Methods;

/**
 * Token model.
 */
class Token extends AModel
{
    static public function init()
    {
        self::$dbConnection = \Data\DatabaseProvider::GetRedis();
    }

    /**
     * Generates a new token, saves it to the database, then returns it.
     * @return Token The generated token.
     */
    static public function Generate() : Token
    {
        $temp = new self();
        $temp->id = Methods::GenerateRandomString(8);
        if (self::$dbConnection->set($temp->id, 'noval')) return $temp;
        return null;
    }
}