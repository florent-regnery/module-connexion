<?php
	
	$bdd = new PDO('mysql:host=localhost;dbname=florent-regnery_moduleconnexion', 'root' ,'');
	 
	
    $membres = $bdd->query('SELECT * FROM utilisateurs ORDER BY id DESC')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
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
	    <h1>Infos des membres</h1>
		
            <form class="formadmin">
                <fieldset class="fieldadmin">
                    <ul class ="ul">
                <?php while($users = $membres->fetch()) { ?>
                    <li class="li"><p>Id = <?= $users['id'] ?></p><p>Identifiant = <?= $users['login']?></p><p> Prenom = <?= $users['prenom']?></p><p> Nom = <?= $users['nom']?></p><p> Password = <?= $users['password']?></p></li>
                <?php } ?>
                    </ul>
                    <br/>
                </fieldset>
            </form>
         
    </div>
    <footer>
        <div class="contact">© Copyright 2021 </div>
    </footer>
</body>
</html>