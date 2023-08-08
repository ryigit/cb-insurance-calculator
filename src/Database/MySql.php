<?php

namespace Coolblue\Interview\Database;

use Exception;
use PDO;
use PDOStatement;

use Coolblue\Interview\Database\Interface\DatabaseInterface;

const DB_HOST = 'interview_mysql';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_DATABASE_NAME = 'coolblue';

class MySql implements DatabaseInterface
{
    private ?PDO $connection = null;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function select($table, $columns , $conditions = []): ?array
    {
        try {
            $query = "SELECT {$columns} FROM {$table}";

            $count = 0;

            foreach ($conditions as $key => $condition) {
                $query .= $count == 0 ? ' WHERE ' : 'AND';
                $query .= $key . ' = ?';
                $count++;
            }

            $params = array_values($conditions);

            $stmt = $this->executeStatement($query, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    /**
     * @throws Exception
     */
    public function executeStatement(string $query = "" , array $params = []): PDOStatement
    {
        try {
            $stmt = $this->connection->prepare($query);

            foreach ($params as $key => $param) {
                $stmt->bindParam($key+1, $param);
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }
}