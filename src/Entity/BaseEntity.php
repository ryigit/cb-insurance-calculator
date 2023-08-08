<?php

namespace Coolblue\Interview\Entity;

use Coolblue\Interview\Database\Interface\DatabaseInterface;

abstract class BaseEntity
{
    protected string $table;
    protected DatabaseInterface $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function findAll(): ?array
    {
        return $this->db->select($this->table, '*');
    }

    //This method assumes that table will have a unique id column.
    public function findById($id): ?array
    {
        return $this->db->select($this->table, '*', ['id' => $id]);
    }
}