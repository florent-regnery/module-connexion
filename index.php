<?php
session_start();
if (isset($_SESSION['login'])) {
    echo "Vous êtes connecté";
} else {
    echo "Vous êtes déconnecter";
}

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
        <div>
        
        </div>
    </header>
    <div align="center">
        <div class="main-box">
            <h2><br>Veuillez vous inscrire ! Cliquez sur <span><a href="formulaire.php" class="inscription">Inscription</a></span></h2>
            <p>Déja inscirt ? <a href="connexion.php" div class="connexion">Connectez-vous</a></p>
        </div>
        <br />
        <div class="lien">
            <a href="https://github.com/florent-regnery/module-connexion" class="git">Lien github</a>
        </div>
    </div>
    <footer>
        <div class="contact">© Copyright 2021 </div>
    </footer>
</body>

</html>