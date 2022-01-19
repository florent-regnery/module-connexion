<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');


$membres = $bdd->query('SELECT * FROM utilisateurs ORDER BY id DESC')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="/module-connexion/CSS/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php
        if ($_SESSION['login'] == "admin"){
            echo '<a href="index.php" class="href">Accueil</a>';
            echo '<a href="deconnexion.php" class="href">Deconnexion</a>';
        }
        ?>
    </header>
    <div align="center">
        <br />
        <h1>Infos des membres</h1><br />
        <form class="formadmin">
            <fieldset class="fieldadmin">
                <ul class="ul">
                    <?php while ($users = $membres->fetch()) { ?>
                        <li class="li">
                            <p>Id = <?= $users['id'] ?></p><br/>
                            <p>Identifiant = <?= $users['login'] ?></p><br/>
                            <p> Prenom = <?= $users['prenom'] ?></p><br/>
                            <p> Nom = <?= $users['nom'] ?></p></br>
                            <br />
                        </li>
                    <?php } ?>
                </ul>
                <br />
            </fieldset>
        </form>
    </div>
    <footer>
        <div class="contact">© Copyright 2021 </div>
    </footer>
</body>

</html>