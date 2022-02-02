<?php
session_start();
require("database.php");
require("aihe.php");



?>

<html>
<head>
    <meta charset="ISO-8859-1">
    <link rel="stylesheet" href="app.css">
</head>
<body>



<table>
<?php 

try {
    $conn = luoTietokantaYhteys();

    // $lause = "SELECT * FROM pets WHERE owner_id=" . $_GET['id'] . " AND status='alive'";
    // $lause = "SELECT * FROM messages WHERE owner_id=" . $_GET['id'];
    $lause = "SELECT * FROM messages WHERE owner_id=" . $_GET['id'];
    $stmt = $conn->prepare($lause);
    
    $stmt->execute();
    $data = $stmt->fetchAll(); 

    // Näytä aiheen viestit
    $aihe = new Aihe(
        $data[0]["subject_name"], 
        $data[0]["contents"], 
        $data[0]["time"],
        $data[0]["writer_name"]
    );

    
        echo "<h1>" . $aihe->aiheennimi . "</h1>";
    foreach($data as $row) {
        
        echo "<tr>";
        echo "<td>" . $row["contents"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td><i>" . "  " . $row["writer_name"] . "</i> </td>";
        echo "</td></tr>";
    }





    //echo "<h1>" . $aihe->aiheennimi . "</h1>";
    //echo "<p><i>"  . "</i>       " . $aihe->viesti . " " . $aihe->aika . "<i>     Kirjoittanut: " . $aihe->kirjoittaja . "</i></p>"; 
    


/*try {
    $conn = new PDO("mysql:host=mysql.cc.puv.fi;dbname=e2000667_2022_Forum", 
    "e2000667", "QpHJ8BNhSuXX");


    $lause = "SELECT * FROM messages";
    $stmt = $conn->prepare($lause);
    
    $stmt->execute();
    $data = $stmt->fetchAll(); 

    echo "<h1> " . $data[0]["subject"] . "</h1>";

    echo "<p>Kirjoittaja: " . $data[0]["name"];
    echo "   Aika: " . $data[0]["time"] . "<br>";
    echo "Viesti: " . $data[0]["contents"] . "</p>";
    */

//   (id) 	owner_id 	subject_name 	contents 	time 

}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>

</table>
<?php // uusi viesti erilliselle sivulle
    // echo '<p><a href="lisaa_viesti.php?Id=' . $_SESSION["_id"] . '">Kirjoita viesti</a></p>';
    ?>





<br>
<h2>Uusi viesti</h2>

    <form method="POST" action="<?php echo "luo_viesti.php?ownerId=" . $_SESSION["owner_id"]?>">
        
        <!--<p><input type="text" name="subject_name" required><?php // echo $name;?></p>-->
        <p><input type="text" name="subject_name" hidden value=<?php echo $aihe->aiheennimi;?>></p>
        <p>Viesti:<input type="text" name="contents" required></p>
        <p><input type="text" name="time" hidden value=<?php echo date("Y-m-d_") . date("h:i:sa");?> ></p>
        <p><input type="text" name="owner_id" hidden value=<?php echo $_GET['id']; ?> ></p>
        <p><input type="text" name="writer_name" hidden value=<?php echo $_SESSION["owner_name"]; ?> ></p>
        <p><button type="submit">Lähetä</button></p>
    </form>

    

    



 



<div>
<br> <br>
<a href="aiheet.php">Etusivulle</a>
</div>

</body>
</html>
