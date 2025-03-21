<?php
function loadQnA() {
    $json = file_get_contents("data/data.json");
        $data = json_decode($json, true);
    if (isset($data["otazky"]) && isset($data["odpovede"])) {
        $otazky = $data["otazky"];
        $odpovede = $data["odpovede"];
        return array($otazky, $odpovede);
    }
    
    return null; 
}
