<?php

if (isset($_SESSION['login'])) {
    echo "Vous êtes connecté";
    echo '<a href="index.php" class="href"> Accueil</a>';
    echo '<a href="infosprofil.php" class="href"> Infos Profil</a>';
    echo '<a href="profil.php" class="href"> Modifier Son Profil</a>';
    echo '<a href="deconnexion.php" class="href"> Deconnexion</a>';
} else {
    echo '<a href="index.php" class="href"> Accueil</a>';
    echo '<a href="formulaire.php" class="href"> Inscription</a>';
    echo '<a href="connexion.php" class="href"> Connexion</a>';
}
