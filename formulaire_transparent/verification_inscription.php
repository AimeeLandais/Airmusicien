<?php

// Si l'email n'est pas vide, enregistrer cet email dans un cookie avec la fonction setcookie()
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600); // Expire dans 24h
}

// Si email ou password vide > redirection vers le formulaire avec un paramètre get "message" : "Vous devez remplir les 2 champs."
if(
      !isset($_POST['email'])
	|| empty($_POST['email'])
	|| !isset($_POST['mdp'])
	|| empty($_POST['mdp'])
	||!isset($_POST['pseudo'])
	|| empty($_POST['pseudo'])
){
	header('location: index.php?message=tous les champs sont requis.&type=danger');
	exit;
}
//ici changer la tailler de du message de signalement

// Si email invalide > redirection vers le formulaire avec un paramètre get "message" : "Email invalide."
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: index.php?message=Erreur avec email.&type=danger');
	exit;
}

if($_POST['mdp'] != $_POST['conf_mdp']){
	header('location: index.php?message=*Erreur mot de passe.&type=danger');
	exit;
}



$test = $_POST['mdp'];
$pattern = "/^[^0-9][A-Z][a-z]|[0-9][]/";

$res = preg_match($pattern, $test);

if(strlen($_POST['mdp']) < 8 || $res == 0){
   header('location: index.php?message=Le mot de passe doit comporter entre 8 caracteres, 1 Maj, 1 Min et 1 Chiffre.&type=danger');
   exit;
}


include('includes/db.php');



$q = 'SELECT id FROM users WHERE email = :email';
$req = $bdd->prepare($q);
$req->execute(['email' => $_POST['email']]);


$results = $req->fetchAll();

if(!empty($results)){

	header('location: index.php?message= Dommage, cet email est déja utilisé');
	exit;
}




$q = 'INSERT INTO users (email, pseudo, instrument_role, genre_musical, mdp) VALUES (:email, :pseudo, :instrument_role, :genre_musical, :mdp)';
$req = $bdd->prepare($q);
$succes = $req->execute([
						'mdp' => hash('sha512', $_POST['mdp']), 
						'email' => $_POST['email'],
						'pseudo'=>$_POST['pseudo'],
						
						
						
						'instrument_role' => $_POST['instrument_role'],
						'genre_musical' => $_POST['genre_musical']
				        ]);

if(!$succes){
header('location: index.php?message=Erreur lors de l\'enregistrement.&type=danger');
exit;
}


header('location: profil.php?message=Félicitation! vottre compte a été créé avec succès!&type=success');
exit;
?>