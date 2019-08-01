<?php

namespace Interfaces;

/**
 * Interface RepositoryInterface
 * @package Interfaces
 */
interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param array $record
     * @return mixed
     */
    public function addRecord(Array $record);

    /**
     * @param Int $id
     * @return mixed
     */
    public function deleteOneById(Int $id);
}