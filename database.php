<?php

require_once("env.php");

function luoTietokantaYhteys() {
    // viittaus env.php:ssa mainittuihin muuttujiin
    global $DB_USERNAME, $DB_PASSWORD;
    try {
        $conn = new PDO("mysql:host=mysql.cc.puv.fi;dbname=e2000667_2022_Forum",
            $DB_USERNAME, $DB_PASSWORD);

        return $conn;
    }
    catch(PDOException $exc) {
        var_dump($exc);
    }
}

//Haetaan aiheet
function muodostaAiheHaku($owner_id) {
    return "SELECT * FROM subjects";
}

/*function muodostaEiAktiviisetLemmikitHaku($owner_id) {
    return "SELECT * FROM pets WHERE owner_id=" . $owner_id . " AND NOT status='alive'";
} */


?>