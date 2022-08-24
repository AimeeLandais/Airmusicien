<?php
try { //fonction qui essaye le contenu et permet de savoir si la page se connecte bien avec la bdd
	$bdd = new PDO(
		'mysql:host=localhost:3307;dbname=Airmusicien',
		'aimee',
		'Yelloworld1',
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
	); // Permet d'afficher l'erreur d'incrémentation dans des tables, par ex : on essaye de faire rentrer dans une table un string alors qu'il demande un int
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
?>