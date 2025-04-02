<?php
function loadQnA() {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "formular";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Chyba pri pripojení k databáze: " . $conn->connect_error);
    }

    $sql = "SELECT otazka, odpoved FROM gna"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $otazky = [];
        $odpovede = [];
        while ($row = $result->fetch_assoc()) {
            $otazky[] = $row['otazka'];
            $odpovede[] = $row['odpoved'];
        }

        return array($otazky, $odpovede);
    } else {
        return array([], []);
    }

    $conn->close();
}
?>
