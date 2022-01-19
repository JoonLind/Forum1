<?php

require_once("env.php");


//avataan yhteys foorumin tietokantaan
function luoTietokantaYhteys() {
    global $DB_USERNAME;
    try{
        $conn = new PDO("mysql:host=mysql.cc.puv.fi;dbname=e2000667_2022_Forum",
        "e2000667", "QpHJ8BNhSuXX");

        return $conn;
    }

    catch(PDOException $exc) {
        var_dump($exc);
    }

}


function muodostaAiheHaku($owner_id)

{
    return "SELECT * FROM subjects";

}