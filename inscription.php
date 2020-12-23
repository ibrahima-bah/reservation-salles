<?php 

$bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', '', 'root');	

if (isset($_POST['forminscription'])) 
{
	if (!empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['password1'])) 
	{
		$login = htmlspecialchars($_POST['login']);
		$password = sha1($_POST['password']);
		$password1 = sha1($_POST['password1']);

		
		$loginlenght = strlen($login);
		if ($loginlenght <= 255) 
		{
				if ($password == $password1) 
				{
					$insertnbr = $bdd->prepare("INSERT INTO utilisateurs (login, password) VALUES (?,?)");
					$insertnbr->execute(array($login, $password));
					$erreur = "votre compte a bien été crée!";
					header('location:connexion.php');
				}
				else
				{
					$erreur = "les mots de passes ne correspondents pas !";
				}	
		}
		else
		{
			$erreur = "Votre login depasse 255 caractéres!";
		}	
	}
	else
	{
		$erreur = "tous les champs doivents etre remplis!";
	}	




}
?>




<!DOCTYPE html>
<html>
	<head>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<meta charset="utf-8">
		<meta name="viewport" content="with=device-with , initial-scale=1.0">
		<link rel="stylesheet"  href="http://fonts.googleapis.com/css?family=Crete+Round">
		<link rel="stylesheet" type="text/css" href="css/reservation.css">
		<title>Inscription</title>
	</head>
	<body>
		<header>
			<?php include ("header.php") ;?>
		</header>
		<main>	
			<div id="container-inscription">
				<form id="form-inscription" action="inscription.php" method="POST">
					<h1 id="form-title">Inscription</h1>
					<label class="champs">login:</label>
					<input class="cadre" type="texte" id="login" name="login" placeholder="Créez votre login"> <br /> <br />
				
					<label class="champs">password:</label>
				
					<input class="cadre" id="mdp" type="password" name="password" placeholder="password"> <br /> <br />
					<label class="champs">Confirmer mot de passe:</label>
				
					<input class="cadre" id="mdp" type="password" name="password1" placeholder="confirm password"> <br /> <br />
				
					<input  class ="button" type="submit" name="forminscription" value="Connexion" class="envoie" >
				</form>
			</div>
		</main>
		<footer>
			<?php include("footer.php") ;?>
		</footer>	
		<?php 
			if (isset($erreur)) {
				echo "$erreur";
			}
		?>

	</body>
</html>