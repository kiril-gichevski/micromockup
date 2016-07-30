<?php
namespace Micromockup\db\models;

class Page
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPages() {
        return [
            "First page"
        ];
        //Example of making a query
        //return $this->db->query('SELECT * FROM test');
    }
}
