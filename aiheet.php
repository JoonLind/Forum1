<?php
// avataan yhteys tietokantaan
session_start();

require("database.php");

/*if(isset($_SESSION["owner_id"]) === false)
{
    header('Location: index.php', true, 301);
    exit;

}
*/
?>


<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app.css">
</head>
<body>
<h1>Foorumi</h1>
<br><br><br>
<h2>
<?php
  
    // Haetaan käyttäjän nimi
    try {
        echo "Tervetuloa, " . $_SESSION["owner_name"] . "!";
        }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

?>
</h2>




<h2>Aiheet</h2>

<div>
    <table>
        <tr>
            <th>Aihe</th>
            <th> </th>
            
        </tr>

        <?php
    try {
        $conn = luoTietokantaYhteys();
    
        // $lause = "SELECT * FROM pets WHERE owner_id=" . $_GET['id'] . " AND status='alive'";
        $lause = "SELECT * FROM subject";
        $stmt = $conn->prepare($lause);
        
        $stmt->execute();
        $data = $stmt->fetchAll(); 


        
    
        foreach($data as $row) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><a href='näytä_aihe.php?id=" . $row["id"] . "'>";
            echo "<img class='nayta' src='eye-solid.svg'>";
            echo "</a></td></tr>";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
        ?>
    </table>


<?php 
/* Tähän kohti aiheen lisäys
     echo '<p><a href="lisaa_aihe.php?ownerId=' . $_SESSION["owner_id"] . '">Lisää aihe</a></p>';
    */
?>

<div>
<br><br><br>
<a href="logout.php">Kirjaudu ulos</a>
</div>



</div>

</body>
</html>