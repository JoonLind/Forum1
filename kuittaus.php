<?php
session_start();
require("database.php");


?>

<html>
<head>
    <meta charset="ISO-8859-1">
    <link rel="stylesheet" href="app.css">
</head>
<body>
<p>Viesti lähetetty onnistuneesti.</p>


<!-- Linkitä evästeen avulla aiheeseen-->
<!--a href="aiheet.php">Palaa</a-->

<?php
    try {
        $conn = luoTietokantaYhteys();
    
        
        $lause = "SELECT * FROM subject WHERE id=" . $_GET['id'];
        //$lause = "SELECT * FROM subject";
        //echo $lause;
        $stmt = $conn->prepare($lause);
        
        $stmt->execute();
        $data = $stmt->fetchAll(); 


        
    
        foreach($data as $row) {
            
            echo "<a href='näytä_aihe.php?id=" . $row["id"] . "'><p>Takaisin</p>";
            
            //echo "<tr>";
            //echo "<td>" . $row["name"] . "</td>";
            //echo "<td><a href='näytä_aihe.php?id=" . $row["id"] . "'>";
            //echo "<img class='nayta' src='eye-solid.svg'>";
            //echo "</a></td></tr>";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
        ?>



</body>
</html>