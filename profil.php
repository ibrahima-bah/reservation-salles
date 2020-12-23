<?php 

session_start();


$bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', 'root', 'root');

if (isset($_SESSION['id'])) 
{
	$requser = $bdd->prepare("SELECT * FROM utilisateurs  WHERE id = ?");

	$requser->execute(array($_SESSION['id']));

	$user = $requser->fetch();

	if (isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $user['login'])
	{
		$newlogin = htmlspecialchars($_POST['newlogin']);
		$insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
		$insertlogin->execute(array($newlogin, $_SESSION['id']));
		header("location: profil.php?id=".$_SESSION['id']);
	}

	

	if (isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND isset($_POST['newpassword1']) AND !empty($_POST['newpassword1']))
	{
		$password = sha1($_POST['newpassword']);
		$password1 = sha1($_POST['newpassword1']);
		if ($password == $password1)
		{
			$insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
			$insertpassword->execute(array($password, $_SESSION['id']));
			header("location: profil.php?id=".$_SESSION['id']);
		}
		else
		{
			$message = "Vos deux mots de passe ne correspondent pas !";
		}	
	}	

?>

<!DOCTYPE html>
<html>
	<head>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<title>profil</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, user-scalable=yes" />
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="css/reservation.css">
		
	</head>
	<body>
		<header>
			<?php include("header.php"); ?>
		</header>
		<main>

			<section id="container-profil">
				<div>
				<h1> BONJOUR 
					<?php echo $_SESSION['login']; ?>
				</h1>
				</div>

				<h2 id='sub-profil'>modifier vos informations de connexion </h2>	

				<form  id="form-profil"action="profil.php" method="POST">
					<label class="champs-profil">nouveau login</label>
					<input id="cadre-profil" type="text" name="newlogin" placeholder="newlogin" value ="<?php echo $user['login']; ?>">

					<label class="champs-profil">New password:</label>
					<input id = "cadre-profil"type="password" name="newpassword" placeholder="newpassword">

					<label class="champs-profil">Confirm New password:</label>
					<input id="cadre-profil" type="password" name="newpassword1" placeholder="Confirm new password">

						
					<input  id = "button-profil" type="submit"  value="Modifier">
				</form>
			</section>
		</main>	
		<footer>
			<?php include("footer.php") ;?>
		</footer>
		<?php if (isset($message)) {echo $message;}?>
	</body>
</html>

<?php 


}

else
{
	//header("location:connexion.php");
}

?>