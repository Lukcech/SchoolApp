<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/registration-site.css">

    <script src="https://kit.fontawesome.com/bf6730ead2.js" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<body>

<?php require "assets/header.php"; ?>

<main>
    <section class = "registration-form">
        <h1>Registration</h1>
       <form action="admin/after-registration.php" method="POST">
        <input class = "reg-input" type="text" name="first-name" placeholder="Křestní jméno"><br>
        <input class = "reg-input" type="text" name="second-name" placeholder= "Příjmení"><br>
        <input class = "reg-input" type="email" name="email" placeholder= "Email"><br>
        <input class = "reg-input password-first" type="password" name="password" placeholder= "Heslo"><br>
        <input class = "reg-input password-second"  type="password" name="Heslo znovu" placeholder= "Password again"><br>
        <p class = "result-text invalid valid"></p>
        <input class = "btn" type="submit" value="Registrovat">
       </form> 
    </section>
</main>

<?php require "assets/footer.php"; ?>  
    <script src="./js/header.js"></script>
    <script src="./js/passwordchecker.js"></script>

    
</body>
</html>