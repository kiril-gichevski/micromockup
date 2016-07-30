<?php
namespace Micromockup\db;

class Connection {
    private static $instance;

    /**
     * Retuns instance of  \PDO
     * @param string $host
     * @param string $db
     * @param string $username
     * @param string $password
     * @return mixed
     */
    public static function getConnection($host, $db, $username, $password)
    {
        if (null === static::$instance) {
            static::$instance = new \PDO("mysql:host=$host;dbname=$db;charset=utf8", "$username", "$password");
        }
        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

}