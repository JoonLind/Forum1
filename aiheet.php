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

<div>
<a href="index.php">Kirjaudu ulos</a>
</div>



<h2>Aiheet</h2>

<div>
    <table>
        <tr>
            <th>Aihe</th>
            <th>Kirjoittaja</th>
        </tr>

        <?php
    try {
        $conn = new PDO("mysql:host=mysql.cc.puv.fi;dbname=e2000667_2022_Forum",
        "e2000667", "QpHJ8BNhSuXX");
    
        // $lause = "SELECT * FROM pets WHERE owner_id=" . $_GET['id'] . " AND status='alive'";
        $lause = muodostaAiheHaku($subject_name);
        $stmt = $conn->prepare($lause);
        
        $stmt->execute();
        $data = $stmt->fetchAll(); 


        //JATKA TÄSTÄ
    
        foreach($data as $row) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><a href='lemmikki.php?id=" . $row["id"] . "'>";
            echo "<img class='nayta' src='eye-solid.svg'>";
            echo "</a></td></tr>";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
    </table>
