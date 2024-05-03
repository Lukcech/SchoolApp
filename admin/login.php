<?php

require "../assets/database.php";
require "../assets/url.php";
require "../assets/user.php";


session_start();

if ($_SERVER["REQUEST_METHOD"]==="POST") {

    $conn = connectionDB();
    


    $log_email = $_POST["login-email"];
    $log_password = $_POST["login-password"];

   if(authentication($conn, $log_email, $log_password)){
    //získání id uživatele
    $id = getUserId($conn, $log_email);
    // zabránění fixation attack, více zde https://owasp.org/www-community/attacks/Session_fixation
    session_regenerate_id(true);

    // nastavení, zda je uživatel přihlášený
    $_SESSION["is_logged_in"] = true;
    //nastavení ID uživatele
    $_SESSION["logged_in_user_id"] = $id;

    redirectUrl("/www2_databaze/admin/zaci.php");

   } else {
    $error = "Chyba při přihlášení";
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php if (!empty($error)): ?>
   <p><?= $error ?></p>
   <a href="../signin.php">Zpět na přihlášení</a>
   <?php endif; ?>
    
</body>
</html>