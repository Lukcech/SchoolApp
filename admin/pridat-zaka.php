<?php 

// XXS - ochrana proti Cross site scripting  htmlspecialchars(), aby nikdo nemohl vložením script kódů naurušit databázi
require "../assets/database.php";
require "../assets/zak.php";
require "../assets/auth.php";
// require "../assets/url.php";


    session_start();

    if (!isLoggedIn()) {
        die ("Nepovolený přístup");
    }



        $first_name = null;
        $second_name= null;
        $age = null;
        $life = null;
        $college = null;


// aby se kód prováděl až po spuštění metody POST, nikoliv už po spuštění stránky
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        
        $first_name = $_POST["first_name"];
        $second_name= $_POST["second_name"];
        $age = $_POST ["age"];
        $life = $_POST["life"];
        $college =  $_POST["college"];

        $connection = connectionDB();
        

        $id = createStudent($connection, $first_name, $second_name, $age, $life, $college);

        // if($id){
        //     redirectUrl("/www2_databaze/admin/jeden-zak.php?id=$id");
        // } else {
        //     echo "žák nebyl vytvořen";
        // }
    }
        
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    
    <script src="https://kit.fontawesome.com/bf6730ead2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<?php require "../assets/admin-header.php"; ?>
<?php require "../assets/formular-zak.php"; ?>

<main>
    <section class= "add_form">
        
    </section>
</main>
<script src="../js/header.js"></script>
<?php require "../assets/footer.php"; ?>
    
</body>
</html>