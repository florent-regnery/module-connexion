<?php
	session_start();
	
	$bdd = new PDO('mysql:host=localhost;dbname=florent-regnery_moduleconnexion', 'root' ,'');
	 
	if(isset($_POST['connexion']))
    {
	   $loginconnect = htmlspecialchars($_POST['loginconnect']);
	   $passwordconnect = htmlspecialchars($_POST['passwordconnect']);

	   if(!empty($loginconnect) AND !empty($passwordconnect)) 
       	{
	      $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
	      $requser->execute(array($loginconnect, $passwordconnect));
	      $userexist = $requser->rowCount();

				if($userexist == 1)
				{
					
					$userinfo = $requser->fetch();

					if($_SESSION['login'] == "admin" &&  $_SESSION['password'] == "admin"){
						header("Location: admin.php");
						var_dump($_SESSION['login']);
					}
					$_SESSION['login'] = 'admin' ;
					$_SESSION['password'] = 'admin';
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['login'] = $userinfo['login'];
					$_SESSION['password'] = $userinfo['password'];
					header("Location: infosprofil.php?id=".$_SESSION['id']);
				} 
					else 
					{
						$erreur = "Mauvais identifiant ou mot de passe !";
					}
		} 
       else 
       {
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
	<link rel="stylesheet" href="../module-connexion/CSS/style.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
</head>
	<body>
		<header>
			<a href="index.php"div class="inscription">Accueil</a>

		</header>
	    <div align="center">
	        <h1>Connexion</h1>
	        <br />
	        <form method="POST" action="" class="form">
				<fieldset class="field">
					<p>
					<input type="login" name="loginconnect" placeholder="Identifiant.."/>
					</p>
					<p>
					<input type="password" name="passwordconnect" placeholder="Mot de passe.." />
					</p>
					<p>
					<input class =" bouton " type="submit" name="connexion" value="Se connecter" />
					</p>
				</fieldset>
	        </form>
	        <?php

                if(isset($erreur)) 
                {
                    echo '<br/><font color="red">'.$erreur."</font><br/>";
                }
	        ?>
			</br>
			<a href="formulaire.php"class="connexion">S'inscrire</a>
	    </div>
		<footer>
                    
            <div class="contact">© Copyright 2021 </div>

        </footer> 
	</body>
</html>