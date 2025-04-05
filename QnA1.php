<?php

class QnA1 {
    private $pdo;

    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "formular") {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    public function loadQnA() {
        $stmt = $this->pdo->query("SELECT otazka, odpoved FROM gna");

        $otazky = [];
        $odpovede = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $otazky[] = $row['otazka'];
            $odpovede[] = $row['odpoved'];
        }

        return [$otazky, $odpovede];
    }
}

