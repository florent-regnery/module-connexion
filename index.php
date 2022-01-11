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
    <link rel="stylesheet" href="/module-connexion/CSS/style.css" />
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
            <h2><br>Veuillez vous inscrire ! Cliquez sur <span><a href="formulaire.php" class="inscription">Inscription</a></span></h2>
            <br />
            <p>Déja inscirt ? <a href="connexion.php" class="connexion">Connectez-vous</a></p>
        </div>
        <br />
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