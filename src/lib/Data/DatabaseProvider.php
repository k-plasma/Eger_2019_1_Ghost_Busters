<?php namespace Data;
use \Redis;

/**
 * A collector class with all the available databases.
 */
class DatabaseProvider
{
    /** @var Redis $redis Redis instance */
    static private $redis = null;
    /**
     * Returns the Redis database connection instance.
     * @param int $dbNumber Tells the Redis connection which database to use.
     * @return Redis The redis connection instance.
     */
    static public function GetRedis(int $dbNumber = 0) : Redis
    {
        global $config;
        if (is_null(self::$redis)) {
            self::$redis = new Redis();
            self::$redis->connect($config->database->redis->host, $config->database->redis->port);
            if (!is_null($config->database->redis->password)) self::$redis->auth($config->database->redis->password);
            self::$redis->select($dbNumber);
        }
        return self::$redis;
    }
}
