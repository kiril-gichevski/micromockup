<?php
namespace Micromockup\config;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Micromockup\db\Connection;

class Init {
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var Connection
     */
    protected $connection;

    /**
     * Init constructor.
     */
    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem('src');
        $this->twig = new Twig_Environment($loader);
        $this->connection = Connection::getConnection(
            Config::DB_HOST,
            Config::DB_NAME,
            Config::DB_USERNAME,
            Config::DB_PASSWORD
        );
    }
}
