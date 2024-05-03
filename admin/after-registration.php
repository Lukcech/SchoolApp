<?php

require "../assets/url.php";
require "../assets/database.php";
require "../assets/user.php";



session_start();

if($_SERVER["REQUEST_METHOD"]=== "POST") {

    $connection = connectionDB();
    

    $first_name = $_POST["first-name"];
    $second_name = $_POST["second-name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // poslat údaje do db

    $id =createUser($connection, $first_name, $second_name, $email, $password);

    if (!empty($id)) {
        // zabránění fixation attack, více zde https://owasp.org/www-community/attacks/Session_fixation
        session_regenerate_id(true);
        // nastavení, že je uživatel úspěšně přihlášený
        $_SESSION["is_logged_in"] = true;
        //nastavení ID uživatele
        $_SESSION["logged_in_user_id"] = $id;

        redirectUrl("/www2_databaze/admin/zaci.php");
        
    } else {
        echo "Uživatele se nepodařilo přidat"; 
    } 

}