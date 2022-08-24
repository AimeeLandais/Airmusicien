<?php session_start();
if(!isset($_SESSION['email'])){
	header('location: index.php');
	exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css"/>
    <title> Profil</title>

</head>


<form action="page_contact.php">
    <button style="margin: 10px; color: aliceblue;" class="btn" id="displayform">contact</button>
</form>

<form action="page_a_propos.html">
    <button style="margin: 10px;" class="btn" id="displayform">à propos</button>
</form>

<body style="background-color:black; ">

<h1 style="color: #94f7e6; margin: 100px;"> Mon profil</h1>


<div class="container">
<?php
				include('includes/db.php');

				$q = 'SELECT email, image, id FROM users WHERE email = :email';
				$req = $bdd->prepare($q);
				$req->execute([
								'email' => $_SESSION['email']
							]);

				$result = $req->fetch(PDO::FETCH_ASSOC); // Récuperer la premiere ligne de résultat

				//var_dump($result);

				?>

				
<h3>E-mail</h3>
				<p><?= $result['email'] ?></p>

				<h3>Contact image</h3>
				<img src="uploads/<?= $result['image'] ?>" alt="contact_image">
					</div>
					
			</div>




</body>
</html>

