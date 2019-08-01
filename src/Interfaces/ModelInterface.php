<?php

namespace Interfaces;

interface ModelInterface
{
    public function getTable();

    public function setTable(String $table);

    public function validateModel();
}