<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./CSS/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php
        include 'header.php'
        ?>
    </header>
    <div align="center">
        <div class="main-box">
            <h2><br>Cliquez sur le lien qu'il vous faut !</h2>
            <p>Veuillez trouver ci-dessous le lien vers mon réposite Github : </p>
        </div>
        <div class="lien">
            <br /><a href="https://github.com/florent-regnery/module-connexion" class="git">Lien github</a>
            <br />
        </div>
    </div>
    <footer>
        <div class="contact">© Copyright 2021 </div>
    </footer>

</body>

</html>