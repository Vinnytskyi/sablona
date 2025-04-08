<?php
namespace App;

use App\Db\Database;

require_once __DIR__ . '/db/Database.php';


class QnA1 extends Database {

    public function loadQnA() {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->query("SELECT otazka, odpoved FROM gna");

            $otazky = [];
            $odpovede = [];

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $otazky[] = $row['otazka'];
                $odpovede[] = $row['odpoved'];
            }

            return [$otazky, $odpovede];
        } catch (\PDOException $e) {
            echo "Chyba pri načítaní otázok a odpovedí: " . $e->getMessage();
            return [[], []];
        }
    }
}

