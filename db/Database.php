<?php
namespace App\Db;

class Database {
    protected $connection;

    public function __construct() {
        require __DIR__ . '/config.php';

        try {
            $this->connection = new \PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
