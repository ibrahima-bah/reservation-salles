<?php 
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', 'root', 'root');

if (isset($_POST['submit'])) 

{

	if (!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['date_debut']) AND !empty($_POST['date_fin']))
	{
		$titre = htmlspecialchars($_POST['titre']);
		$description = htmlspecialchars($_POST['description']);
		$id_utilisateur = $_SESSION['id'];
		
		var_dump($id_utilisateur);

		$titrelenght = strlen($titre);
	
		if ($titrelenght <= 50) 

		{
			$d = date($_POST['debut']);
        	$f = date($_POST['fin']);
        	$date = date ($_POST['date_debut']);
        	$date1 = date ($_POST['date_fin']);
			$debut = $date." ".$d;
			$fin = $date1." ".$f;

			$insert = $bdd->prepare("INSERT INTO reservations(titre, description, debut, fin,id_utilisateur) VALUES (?,?,?,?,?)");
			$insert->execute(array($titre, $description, $debut, $fin, $id_utilisateur));

			var_dump($insert);

			$erreur = "votre reservation a été prise en compte!";
		}
		else
		{
			$erreur = "votre titre depasse 50 caractéres";
		}
	}	
	else
	{
		$erreur = "tous les champs doivent etre remplis !";
	}

}


?>





<!DOCTYPE html>
<html lang="fr">
	<head>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<title>profil</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, user-scalable=yes" />
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<header>
			<?php include ("header.php"); ?>
		</header>

		<?php if(isset($_SESSION['login'])): ?>

		<section id="resa">
			<h2 id="hello"> Bienvenue @ <?php echo $_SESSION['login'] ?></h2>
		
				<form id="formulaire" action="reservation-form.php" method="post">
					<h1 id="form-title"> Reserver un espace</h1>
					<label>Titre:</label>
					<input id="input-line" type="text" placeholder="votre titre" name="titre" required=""/>
					<div id="time">
						<label>date de debut:</label>
						<input id="dateinput" type="date" name="date_debut" required=""/>
						<label>heure-debut:</label>
						<input class="resahour" type="time" name="debut"  min="08" max="18" />
						<label>date de fin:</label>
						<input id="dateinput" type="date" name="date_fin" required=""/>
						<label>heure-fin:</label>
						<input class="resahour" type="time" name="fin"  min="09" max="19" />
						
					</div>
					<label>Description:</label>
					<textarea name="description" id="description" class="description"  required=""></textarea>

					<div id="box-button">
						<input type="submit" class="btn-txt" name="submit" value="Reserver"></div>
					</div>

				</form>
		</section>		
			
				<?php if (isset($erreur)) { echo $erreur;}?>
		<?php else: ?>

		<div id="presentation-resa">
			<p id="resa-text">Pour accéder à notre formulaire de réservation , merci de <a href="connexion.php">vous connectez</a> ou Merci de créer <a href="inscription.php">un nouveau compte en quelques clics</a>

			</p>
		</div>	
		<?php endif; ?>	
		<main>
			<?php include("footer.php");?>
		</main>	
	</body>
</html>