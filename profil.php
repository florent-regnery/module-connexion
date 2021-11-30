<?php
	session_start();
	 
    $bdd = new PDO('mysql:host=localhost;dbname=florent-regnery_moduleconnexion', 'root' ,'');
	 
	if(isset($_SESSION['id'])) 
    {
	   $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
	   $requser->execute(array($_SESSION['id']));
	   $user = $requser->fetch();

	   if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $user['login']) 
       	{
            $newlogin = htmlspecialchars($_POST['newlogin']);
            $insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
            $insertlogin->execute(array($newlogin, $_SESSION['id']));
            header('Location: infosprofil.php?id='.$_SESSION['id']);
		}

        	if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) 
            {
                $newprenom = htmlspecialchars($_POST['newprenom']);
                $insertprenom = $bdd->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");
                $insertprenom->execute(array($newprenom, $_SESSION['id']));
                header('Location: infosprofil.php?id='.$_SESSION['id']);
            }

                if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) 
                {
                    $newnom = htmlspecialchars($_POST['newnom']);
                    $insertnom = $bdd->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");
                    $insertnom->execute(array($newnom, $_SESSION['id']));
                    header('Location: infosprofil.php?id='.$_SESSION['id']);
                }

                    if(isset($_POST['newpassword']) AND !empty($_POST['newpassword'])) 
                    {
                        $password = htmlspecialchars($_POST['newpassword']);
                        $insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
                        $insertpassword->execute(array($password, $_SESSION['id']));
                        header('Location: infosprofil.php?id='.$_SESSION['id']);
                        
                    }
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edition Profil</title>
		<link rel="stylesheet" href="../module-connexion/CSS/style.css"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
	</head>
		<body>
			<header>
			
			</header>
	    	<div align="center">
				<h1>Edition de mon profil</h1>
			
				<form method="POST" action="" enctype="multipart/form-data" class="form">
					<fieldset>
						<table class="table">
						<tr>
							<td align="right">
								<label for = "login"><p><strong> Votre Identifiant : </strong></p></label>
							</td>
							<td>    
								<input type="text" name="login" id = "login" value="<?php echo $user['login']; ?>" autocomplete="off"/>
							</td>
						</tr>
						<tr>  
							<td align="right">
								<label for = "prenom"><p><strong> Votre Prénom : </strong></p></label>
							</td>
							<td>  
								<input type="text" name="prenom" id = "prenom" value="<?php echo $user['prenom']; ?>" autocomplete="off"/>
							</td>
						</tr>
						<tr>  
							<td align="right">
								<label for = "nom"><p><strong> Votre Nom : </strong></p></label>
							</td>
							<td>
								<input type="text" name="nom" id = "nom" value="<?php echo $user['nom']; ?>" autocomplete="off"/>
							</td>
						</tr>   
						<tr>   
							<td align="right">
								<label for = "password"><p><strong> Votre Mdp : </strong></p></label>
							</td>
							<td>
								<input type="text" name="password" id = "password" value="<?php echo $user['password']; ?>" autocomplete="off"/>
							</td>
						</tr>
						</table>  
							<p>
							<br/>
							<p>
								<input class="bouton" type="submit" name="submit" value="Mettre à jour mon profil !"/>
							</p>      
					</fieldset>
					<a href="deconnexion.php" class="connexion"><br/>Se déconnecter</a>
            	</form>

					<?php 
						if(isset($msg)) { echo $msg; } 
					?>
	      	</div>
			<footer>
						
				<div class="contact">© Copyright 2021 </div>

			</footer> 
	   </body>
	</html>
<?php   
	}
	else 
	{
	   header("Location: connexion.php");
	}
?>