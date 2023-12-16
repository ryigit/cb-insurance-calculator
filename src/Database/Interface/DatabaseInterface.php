<?php

namespace Insurance\Calculator\Database\Interface;

use PDOStatement;

interface DatabaseInterface
{
    /*
     * To-Do: If another adapter returns something other than bool|array this that might need to be updated.
     * */
    public function select(string $table, string $columns, array $conditions = []): ?array;
    public function executeStatement(string $query = "" , array $params = []): ? PDOStatement;
}