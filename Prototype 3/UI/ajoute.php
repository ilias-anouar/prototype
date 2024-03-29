<?php




// define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . '/managers/GestionClient.php');
include "../managers/GestionClient.php";


// Trouver tous les employés depuis la base de données 
$gestionClient = new GestionClient();
$Clients = $gestionClient->AllClientData();

if (!empty($_POST)) {
	$client = new client ();
	$client->setId($_POST['Id_client']);
	$client->setNom($_POST['nom']);
	$client->Setemail($_POST['email']);
	$gestionClient->Add($client);

	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./style/file.css">
	<title>Gestion des CLients</title>
</head>

<body>
	<h1 class="text-center">Ajouter un CLients</h1>

	<form method="post" action="">
		<div class="input-group mb-3">
			<label for="Nom">Nom</label>
			<input type="text" required="required" class="form-control" id="name" name="nom" placeholder="Nom">
		</div>
		<div class="input-group mb-3">
			<label for="email">email</label>
			<input type="email" required="required" class="form-control" id="email" name="email" placeholder="email">
		</div>

		<div>
			<button class="btn btn-primary" type="submit" >Add</button>
			<a class="btn btn-info" href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>