<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');

if (isset($_SESSION['id'])) {
	$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
	$requser->execute([$_SESSION['id']]);
	$user = $requser->fetch();

	if (isset($_POST['newlogin']) and !empty($_POST['newlogin']) and $_POST['newlogin'] != $user['login']) {
		$newlogin = htmlspecialchars($_POST['newlogin']);
		$insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
		$insertlogin->execute(array($newlogin, $_SESSION['id']));
		header('Location: infosprofil.php?id=' . $_SESSION['id']);
	}

	if (isset($_POST['newprenom']) and !empty($_POST['newprenom']) and $_POST['newprenom'] != $user['prenom']) {
		$newprenom = htmlspecialchars($_POST['newprenom']);
		$insertprenom = $bdd->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");
		$insertprenom->execute(array($newprenom, $_SESSION['id']));
		header('Location: infosprofil.php?id=' . $_SESSION['id']);
	}

	if (isset($_POST['newnom']) and !empty($_POST['newnom']) and $_POST['newnom'] != $user['nom']) {
		$newnom = htmlspecialchars($_POST['newnom']);
		$insertnom = $bdd->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");
		$insertnom->execute(array($newnom, $_SESSION['id']));
		header('Location: infosprofil.php?id=' . $_SESSION['id']);
	}

	if (isset($_POST['newpassword1']) and !empty($_POST['newpassword1']) and isset($_POST['newpassword2']) and !empty($_POST['newpassword2'])) {
		$password1 = sha1($_POST['newpassword1']);
		$password2 = sha1($_POST['newpassword2']);
		if ($password1 == $password2) {
			$insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
			$insertpassword->execute(array($password1, $_SESSION['id']));
			header('Location: infosprofil.php?id=' . $_SESSION['id']);
		} else {
			$msg = "Vos mots de passes ne correspondent pas !";
		}
	}


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edition Profil</title>
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

		<body>
			<div align="center">
				<br />
				<h1>Modifier votre profil</h1>
				<br /><br />
				<form method="POST" action="" class="form">
					<input type="text" name="newlogin" placeholder="login" value="<?php echo @$user['login'] ?>" /><br /><br />
					<input type="text" name="newprenom" placeholder="prenom" value="<?php echo @$user['prenom'];  ?>" /><br /><br />
					<input type="text" name="newnom" placeholder="nom" value="<?php echo @$user['nom'] ?>" /><br /><br />
					<input type="password" name="newpassword1" placeholder="password" /><br /><br />
					<input type="password" name="newpassword2" placeholder="confirm password" />
					<br /><br />
					<input type="submit" class="bouton" name="modification" value="Modifier" />
				</form>

				<?php
				if (isset($erreur)) {
					echo '<font color="red">' . $erreur . "</font>";
				}
				?>
			</div>

			<footer>
				<div class="contact">© Copyright 2021 </div>
			</footer>
		</body>

	</html>
<?php
} else {
	header("Location: connexion.php");
}
?>