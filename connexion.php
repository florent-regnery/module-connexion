<?php
session_start();
// connexion à la base de donnée
$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');

if (isset($_POST['connexion'])) {
	$login = htmlspecialchars($_POST['login']);
	$password = sha1($_POST['password']);
	// Si login et password n'est pas vide
	if (!empty($login) && !empty($password)) {
		// preparation de la requete et execute
		$requser = $bdd->prepare("SELECT id, login FROM utilisateurs WHERE login = :login AND password = :password");
		$requser->execute([
			'password' => $password,
			'login' => $login,
		]);
		// Retourne le nombre de lignes affectées par le dernier appel à la fonction 
		$userexist = $requser->rowCount();

		if ($userexist == 1) {
			// recupere le resultat et les infos
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['login'] = $userinfo['login'];

			// si la session est l'admin le rediriger vers admin
			if ($_POST['login'] == "admin") {
				header("Location: admin.php");
			} else {
				header("Location: infosprofil.php");
			}
		} else {
			$erreur = "Mauvais identifiant ou mot de passe !";
		}
	} else {
		$erreur = "Tous les champs doivent être complétés !";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link rel="stylesheet" href="/module-connexion/CSS/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap">
</head>

<body>
	<header>
		<a href="index.php" div class="inscription">Accueil</a>
	</header>
	<div align="center">
		<h1>Connexion</h1>
		<br />
		<form method="POST" action="" class="form">
			<fieldset class="field">
				<input type="login" name="login" placeholder="Identifiant.." />
				<br /><br />
				<input type="password" name="password" placeholder="Mot de passe.." />
				<br /><br />
				<input class=" bouton " type="submit" name="connexion" value="Se connecter" />

			</fieldset>
		</form>
		<?php

		if (isset($erreur)) {
			echo '<br/><font color="red">' . $erreur . "</font><br/>";
		}
		?>
		</br>
		<a href="formulaire.php" class="connexion">S'inscrire</a><br />
		<a href="deconnexion" class="connexion">Se deconnecter</a>
	</div>
	<footer>
		<div class="contact">© Copyright 2021 </div>
	</footer>
</body>
</html>