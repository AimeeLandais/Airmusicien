<?php 
function writeLogLine($success, $email){
	$stream = fopen("log.txt", "a+");
	$line = date ('Y/m/d - H:i:s') . '- Tentative de connexion '. ($success ? 'réussie': 'échouée') . ' de ' . $_POST['email'] . "\r";
	fputs($stream,$line);
	fclose( $stream);
}


// Si l'email n'est pas vide, enregistrer cet email dans un cookie avec la fonction setcookie()
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600); // Expire dans 24h
}


// Si email ou password vide > redirection vers le formulaire avec un paramètre get "message" : "Vous devez remplir les 2 champs."
if(
	!isset($_POST['email'])
	|| empty($_POST['email'])
	|| !isset($_POST['password'])
	|| empty($_POST['password'])
){
	header('location: index.php?message=Vous devez remplir les 2 champs.&type=danger');
	exit;
}

// Si email invalide > redirection vers le formulaire avec un paramètre get "message" : "Email invalide."
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: index.php?message=Email invalid.&type=danger');
	exit;
}


include('includes/db.php');


// On recherche l'utilisateur en base de données

$q = 'SELECT id_utilisateur FROM utilisateur WHERE email = :email AND mdp = :mdp';
$req = $bdd->prepare($q);
$req->execute([
			'email' => $_POST['email'],
			'password' => hash('sha512', $_POST['mdp'])
			]);

$results = $req->fetchAll();
if(empty($results)){
	writeLogLine(false, $_POST['email']);
	

	header('location: index.php?message=Identifiants incorrects.&type=danger');
	exit;
}


// Si email ou password différents de "admin@site.com" et "php123" > redirection vers le formulaire avec un paramètre get "message" :  "identifiants incorrects"

// if($_POST['email'] != 'admin@site.com' || $_POST['mdp'] != 'php123'){
// 	header('location: connexion.php?message=Identifiants incorrects.');
// 	exit;
// }


// Toutes les verifs ont fonctionné

// Ouvrir une session
session_start();

// Mettre le parametre email dans la session
$_SESSION['email'] = $_POST['email']; 
writeLogLine(true, $_POST['email']);

// Redirection vers l'accueil
header('location: profil.php');
exit;






?>