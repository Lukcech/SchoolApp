<?php

require "../assets/zak.php";
require "../assets/database.php";
require "../assets/auth.php";
require "../assets/url.php";


    session_start();

    if (!isLoggedIn()) {
        die ("Nepovolený přístup");
    }
    
$connection = connectionDB();


if($_SERVER ["REQUEST_METHOD"] === "POST"){
    if(deleteStudent($connection, $_GET ["id"])) {
        redirectUrl("/www2_databaze/admin/zaci.php");
    }
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    
    <script src="https://kit.fontawesome.com/bf6730ead2.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>

    

    <title>Document</title>

    <main>
    <section class="delete-form">

    <form method="POST">
        <p>Opravdu chcete tohoto žáka smazat?</p>
        <button>Smazat</button>
        <a href="jeden-zak.php?id=<?= $_GET['id'] ?>">Zrušit</a>
   </form> 

    </section>
    </main>

    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>