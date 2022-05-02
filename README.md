# module-connexion

Descriptif du projet :

Vous créez un module de connexion permettant aux utilisateurs
de créer leur compte, de se connecter et de modifier leurs informations.

Vous allez avoir besoin de créer différentes pages :

- Une page d’accueil qui présente votre site (index.php).

- Une page contenant un formulaire d’inscription (inscription.php) :
Le formulaire doit contenir l’ensemble des champs présents dans la table
“utilisateurs” (sauf “id”) + une confirmation de mot de passe.

- Une page contenant un formulaire de connexion (connexion.php) :
Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
informations, alors l’utilisateur est considéré comme connecté

- Une page permettant de modifier son profil (profil.php) :
Cette page possède un formulaire permettant à l’utilisateur de modifier ses
informations. Ce formulaire est par défaut pré-rempli avec les informations
qui sont actuellement stockées en base de données

- Une page d’administration (admin.php) : 
Elle permet de lister l’ensemble des informations des utilisateurs présents dans
la base de données
