<?php

namespace Models;

use Interfaces\ModelInterface;

abstract class Model implements ModelInterface
{
    /**
     * @var String
     */
    public $table;

    /**
     * @return String
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param String $table
     */
    public function setTable(String $table): void
    {
        $this->table = $table;
    }

    public function validateModel()
    {}
}