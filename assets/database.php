<?php
/**
 * 
 * Připojení se k databázi
 * 
 * @return object - pro přiojení do db
 */
function connectionDB() {

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "skola";

    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit();
    }

    return $connection;

}

