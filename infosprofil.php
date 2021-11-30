<?php
	session_start();
	 
	$bdd = new PDO('mysql:host=localhost;dbname=florent-regnery_moduleconnexion', 'root' ,'');
	 
	if(isset($_GET['id']) AND $_GET['id'] > 0) 
    {
	   $getid = intval($_GET['id']);
	   $requser = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
	   $requser->execute(array($getid));
	   $userinfo = $requser->fetch();
?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>InfosProfil</title>
		<link rel="stylesheet" href="../module-connexion/CSS/style.css"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>

		</header>
		
	    <div align="center">
		<h2>Profil de <?php echo $userinfo['login']; ?></h2>
			<form class="form">
			<fieldset class="field">

				<br/>
				<p class="text">Votre Pseudo est : <?php echo $userinfo['login']; ?></p>
				<br/>
				<p class="text">Votre Prenom est : <?php echo $userinfo['prenom']; ?></p>
				<br/>
				<p class="text">Votre Nom est : <?php echo $userinfo['nom']; ?></p>
				<br/>
				<p class="text">Votre Mot de passe est : <?php echo $userinfo['password']; ?></p>
				<br/>

			</fieldset>
			</form>	

			<?php
				if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) 
				{
			?>
	        <br />
	        <a href="profil.php" class="modif">Modifier mon profil<br/></a>
	        <a href="deconnexion.php" class="connexion"><br/>Se déconnecter</a>
			<?php
				}
			?>
	    </div>

		<footer>
			<div class="contact">© Copyright 2021 </div>
		</footer>
	</body>
	</html>
<?php   
	}
?>