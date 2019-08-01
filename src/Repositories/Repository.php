<?php

namespace Repositories;

/**
 * Class Repository
 * @package Repositories
 */
abstract class Repository
{
    /**
     * @var \Services\DbService
     */
    public $db;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        global $db;

        $this->db = $db;
    }
}