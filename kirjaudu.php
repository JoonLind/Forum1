<?php

// Haetaan sposti + passu

$email = $_POST["email"];
$pw = $_POST["password"];

// Tarkistetaan sposti + fiksataan
$emailValid = filter_var($email, FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($emailSanitized, FILTER_VALIDATE_EMAIL);
If($emailValid === false)
{
    // mahdollinen virheviesti
    $_SESSION["email_error"] = "Sähköpostiosoite on väärässä muodossa.";
    header('Location: index.php', true, 301);
    exit; 
}



try {
    // avataan yhteys tietokantaan
    $conn = luoTietokantaYhteys();

    // haetaan  taulukosta käyttäjä 
    $lause = "SELECT * FROM users WHERE email='" . $email . "'";
    $stmt = $conn->prepare($lause);
 

    $stmt->execute();
    $data = $stmt->fetchAll(); 


    // katsotaan, löytyykö yksi täsmäävä käyttäjä
    if(count($data) === 1) {
        //  verrataan salasana
        $pwTietokannasta = $data[0]["password"]; 
        $name = $data[0]["name"]; 
        $id = $data[0]["id"]; 

        if(strcmp($pwTietokannasta, $pw) === 0) {
            // ohjataan aihesivulle
            header('Location: aiheet.php?name='.$name."&id=".$id, true, 301);
            exit;
        }
        else {
            echo "virhe";
            //header('Location: index.php', true, 301);
            exit;    
        }
    }
    else {
        header('Location: index.php', true, 301);
        exit; 
        //  jos kirjautumistiedot eivät täsmää, palataan kirjautumissivulle
    }
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>