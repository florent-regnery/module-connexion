<?php

if (isset($_SESSION['login'])) {
    echo "Vous êtes connecté";
    echo '<a href="index.php" class="connexion"> Accueil</a>';
    echo '<a href="infosprofil.php" class="connexion"> Infos Profil</a>';
    echo '<a href="profil.php" class="connexion"> Modifier Son Profil</a>';
    echo '<a href="deconnexion.php" class="connexion"> Deconnexion</a>';
} else {
    echo '<a href="index.php" class="connexion"> Accueil</a>';
    echo '<a href="formulaire.php" class="connexion"> Inscription</a>';
    echo '<a href="connexion.php" class="connexion"> Connexion</a>';
}
