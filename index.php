<?php session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="app.css">
    </head>
<body>

<h1>Kirjautuminen</h1>

<form method="POST" action="kirjaudu.php">
    <p><input type="email" name="email" placeholder="Sähköposti" required></p>



<?php

if(isset($_SESSION["email_error"]))


?>

<p><input type="password" name="password" placeholder="Salasana" required></p>
    <p><button type="submit">Kirjaudu</button></p>
</form>

</body>
</html>