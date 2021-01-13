<?php 
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', 'root', '');


if (isset($_POST['submit']))
{

	$login = htmlspecialchars($_POST['login']);
	$password = sha1($_POST['password']);
		
	if (!empty($login) AND !empty($password))
	{	
		
		$req = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
		$req->execute(array($login, $password));
		$userexist = $req->rowCount();
		if ($userexist == 1) 
		{
			$userinfo = $req->fetch();
			
			$_SESSION['user'] == true;
			$_SESSION['id'] = $userinfo['id'];

			$_SESSION['login'] = $userinfo['login'];
			$_SESSION['password'] = $userinfo['password'];
			header("location:index.php?id=".$_SESSION['id']);
		}
		
		else
		{
			$erreur="Mauvais identifiants!";
		}
			
	}
	else
	{
		$erreur="tous les champs doivent etre remplis";
	}
	

		
}		

	

?>







<!DOCTYPE html>
<html lang="fr">
	<head>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="utf-8">
		<meta name="viewport" content="with=device-with , initial-scale=1.0">
		
		<link rel="stylesheet"  href="http://fonts.googleapis.com/css?family=Crete+Round">
		<link rel="stylesheet" href="css/reservation.css">
		<title>Connexion</title>
	</head>
	<body>
		<header>
			<?php include("header.php") ;?>
		</header>
		</main>
			<section id = "container-connexion">
		
				<div id="left">

					<div id="left-presentation">
						<h2 class="animation a1">Bienvenue!</h2>
						<h4 class="animation a2">Connexion avec login et password</h4></div>
					</div>	
					<form id ="form" action="connexion.php" method="POST">
		
						<input class="form-animation a3" type="text" name="login" placeholder="login" required=""></input>
			
						<input class="form-animation a4" type="password" name="password" placeholder="mot de passe" required="">
				
						<input id ="button-connexion" type="submit" name="submit" value="Connexion">

						<p class="animation a5"><a id="connect" href="inscription.php">Pas encore inscrit ? Rejoignez-nous maintenant !</a></p>


					</form>
				</div>
				<div id="right">		
					<?php 
					if (isset($erreur)) {
						echo "$erreur";
					}
					?>
				</div>
			</section>	
		</main>	
		<footer>
			<?php include('footer.php'); ?>
		</footer>
	</body>
</html>