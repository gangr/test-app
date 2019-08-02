<?php

namespace Services;

use \mysqli;
use \mysqli_result;

/**
 * Class DbService
 * @package Services
 */
class DbService
{
    /**
     * @var null | mysqli
     */
    public $db = null;

    /**
     * @return mysqli
     */
    public function checkDb()
    {
        global $config;

        // Connect to DB host
        $this->db = new mysqli($config['dbhost'], $config['dbuser'], $config['dbpassword']);
        if ($this->db->connect_error) {
            die("DB connection failed: " . $this->db->connect_error);
        }

        // If database is not exist create one
        if (!mysqli_select_db($this->db, $config['dbname'])){
            $sql = "CREATE DATABASE " . $config['dbname'] . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
            $this->db->query($sql);
        }

        $this->db->set_charset("utf8");

        return $this->db;
    }

    /**
     * @param String $sql
     * @return bool | mysqli_result
     */
    public function runSql(String $sql)
    {
        $result = $this->db->query($sql);

        return $result;
    }
}