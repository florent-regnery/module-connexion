<?php

    $bdd = new PDO('mysql:host=localhost;dbname=florent-regnery_moduleconnexion', 'root' ,'');
        
        if(isset($_POST['submit'])){

            $login = htmlspecialchars($_POST['login']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);

            if(!empty($_POST['login']) AND !empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){
                
                $loginlength = strlen($login);

                if($loginlength <= 255){   

                    
                    // vérifier si l'identifiant existe déjà.
                    $reqlogin = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? ");
                    $reqlogin-> execute(array($login));
                    $loginexist = $reqlogin->rowCount();

                    if($loginexist == 0){

                        if($password == $password2){

                            // inserrer les infos dans la base de données et redirection de la page.
                            $insertuser = $bdd->prepare("INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(?,?,?,?)");
                            $insertuser->execute(array($login, $prenom, $nom, $password));
                            header('Location: connexion.php');
                        }
                        else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                    }
                    else{
                        $erreur = "Identifiant déjà utilisé";
                    }
                }    
                else{
                    $erreur = "Votre identifiant est trop long";
                }
            } 
            else{
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
    <link rel="stylesheet" href="../module-connexion/CSS/style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet"> 
</head>
    <body>
        <header>
            <a href="index.php" class="inscription">Accueil</a>
        </header>
        <div align="center">
            <h1>Inscription</h1>
            <form method="POST" action="" class="form">
                <fieldset>
                    <table class="table">
                     <tr>
                        <td align="right">
                            <label for = "login"><p><strong> Entrez votre Identifiant : </strong></p></label>
                        </td>
                        <td>    
                            <input type="text" name="login" id = "login" placeholder="Identifiant.." autocomplete="off"/>
                        </td>
                     </tr>
                     <tr>  
                        <td align="right">
                            <label for = "prenom"><p><strong> Entrez votre Prénom : </strong></p></label>
                        </td>
                        <td>  
                            <input type="text" name="prenom" id = "prenom" placeholder="Prenom.." autocomplete="off"/>
                        </td>
                     </tr>
                     <tr>  
                        <td align="right">
                            <label for = "nom"><p><strong> Entrez votre Nom : </strong></p></label>
                        </td>
                        <td>
                            <input type="text" name="nom" id = "nom" placeholder="Nom.." autocomplete="off"/>
                        </td>
                     </tr>   
                     <tr>   
                        <td align="right">
                            <label for = "password"><p><strong> Entrez votre Mdp : </strong></p></label>
                        </td>
                        <td>
                            <input type="password" name="password" id = "password" placeholder=" Mot de passe.." autocomplete="off"/>
                        </td>
                     </tr>
                     <tr>
                        <td align="right">
                            <label for="password2"><p><strong> Confirmez votre Mdp :</strong></p></label>
                        </td>
                        <td>
                            <input type="password" placeholder="Confirmez Mdp.." id="password2" name="password2" />
                        </td>
	               </tr>
                      
                    </table>  
                        <p>
                        <br/>
                            <input class="bouton" type="submit" name="submit" value="S'inscrire"/>
                        </p>      
                </fieldset>
            </form>
            <?php
                if(isset($erreur))
                {
                    echo '<br/><font color="red">'.$erreur."</font>";
                }
            ?>
        </div>
                
        <footer>
                    
            <div class="contact">© Copyright 2021 </div>

        </footer> 
    </body>
</html>