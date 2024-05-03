<?php

/**
 * 
 * Ověřuje, zda je uživatel přihlášený, jinak platí false
 * 
 * @return boolean True pokud je uživatel přihlášen
 */

function isLoggedIn() {
    return isset($_SESSION["is_logged_in"]) and $_SESSION ["is_logged_in"];
}