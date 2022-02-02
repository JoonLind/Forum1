<?php

require("database.php");

try {
    $conn = luoTietokantaYhteys();

    $lause = "INSERT INTO messages (`owner_id`, `subject_name`, `contents`, `time`, `writer_name`) VALUES ('" . $_POST["owner_id"] . "', '".$_POST["subject_name"]."', '".$_POST["contents"]."', '".$_POST["time"]."', '".$_POST["writer_name"]."')";
    //echo $lause;
    $stmt = $conn->prepare($lause);
    
    $stmt->execute();

    //header('Location: kuittaus.php?', true, 301);
    header('Location: kuittaus.php?id=' . $_POST["owner_id"], true, 301);
    exit;
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>