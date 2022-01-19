<?php
// avataan yhteys tietokantaan
session_start();

// käytetään database-tiedostoa
require("database.php");

if(isset($_SESSION))
?>


<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app.css">
</head>
<body>

<h1>
<?php
    // Haetaan aiheet tietokannasta
    try {
        $conn = luoTietokantaYhteys();
        $lause = muodostaAiheHaku($_SESSION["subject_name"]);
        
        
        $stmt = $conn->prepare($lause);
        
        $stmt->execute();
        $data = $stmt->fetchAll(); 

        echo "Aiheet: " . $data[0]["name"] . "!";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
</h1>