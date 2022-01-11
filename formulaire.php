<?php
//id sql
session_start();
//Connexion à la base de donnée
$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');

if (isset($_POST['submit'])) {
    // on insère des fonctions pour sécuriser les données écrites et envoyés
    $login = htmlspecialchars($_POST['login']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);

    if (!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

        $loginlength = strlen($login);
        // si la longueur de la chaine de caractère ne dépasse pas.
        if ($loginlength <= 255) {


            // vérifier si l'identifiant existe déjà.
            $reqlogin = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? ");
            $reqlogin->execute(array($login));
            $loginexist = $reqlogin->rowCount();

            if ($loginexist == 0) {

                if ($password == $password2) {

                    // inserrer les infos dans la base de données et redirection de la page.
                    $insertuser = $bdd->prepare("INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(?,?,?,?)");
                    $insertuser->execute(array($login, $prenom, $nom, $password));
                    header('Location: connexion.php ');
                } else {
                    $erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
                $erreur = "Identifiant déjà utilisé";
            }
        } else {
            $erreur = "Votre identifiant est trop long";
        }
    } else {
        $erreur = "Tous les champs ne sont pas renseignés";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
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
        <br />
        <h1>Inscription</h1><br />
        <form class="form" name="inscription" method="POST" action="" align="center">
            <fieldset>
                Login<br>
                <input type="text" name="login" value="" autocomplete="off" required><br>
                Prenom<br>
                <input type="text" name="prenom" value="" autocomplete="off" required><br>
                Nom<br>
                <input type="text" name="nom" value="" autocomplete="off" required><br>
                Mot de passe<br>
                <input type="password" name="password" value="" autocomplete="off" required><br>
                Confirmation de mot de passe<br>
                <input type="password" name="password2" value="" autocomplete="off" required><br>
                <br /><br />
                <input class="bouton" type="submit" name="submit" value="S'inscrire">
            </fieldset>
        </form>
        <?php
        if (isset($erreur)) {
            echo '<br/><font color="red">' . $erreur . "</font>";
        }
        ?>
    </div>

    <footer>

        <div class="contact">© Copyright 2021 </div>

    </footer>
</body>

</html>