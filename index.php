<?php session_start(); 

if (isset($_POST["deco"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>page d'accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reservation.css">
</head>
<body>
    <header>
      <?php include("header.php")?>
    </header>
    <main>
      <section id="banner">
  
        <div id="presentation-index">

          <h1>UN ESPACE DE TRAVAIL OÙ QUE VOUS SOYEZ</h1>

          <?php if(isset($_SESSION['login'])): ?>

          <h2 id="hello">bienvenue @ <?php echo $_SESSION['login'] ?></h2>
            <p>Merci de nous avoir rejoint ! réservez dès maintenant votre espace de Travail ! 
            <div class="link">
              <a href='reservation-form.php'>RESERVER UN ESPACE</a>
            </div>
            </p>
        
          <?php else: ?> 
            <p>Rejoignez notre communauté de co-workers. Bookez un espace de travail seul ou à plusieurs...
              <div class="link">
                <a href='inscription.php' >S'INSCRIRE</a> 
              </div>
            </p>
            <a id="link" href="connexion.php">déja inscrit ? se connecter</a>
          <?php endif; ?>
        </div>
      
        <div id="slider">
          <figure>
            <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60">
            <img src="https://images.unsplash.com/photo-1551834317-9ddfd4ec7069?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60">
            <img src="https://images.unsplash.com/photo-1497366412874-3415097a27e7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60">
            <img src="https://images.unsplash.com/photo-1448932223592-d1fc686e76ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60">
            <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60">
          </figure>
        </div>
      </section>

      <section id="services">
        <h1>NOS SERVICES</h1>
        <div class="cen">
          <div class="service">
            <i class="fas fa-desktop"></i>
            <h2>un espace de travail</h2>
            <p>un poste de travail disponible à toute heure dans nos salles de co-working ou nos bureaux individuels</p>
          </div>

          <div class="service">
            <i class="fas fa-wifi"></i>
            <h2>wifi</h2>
            <p>un réseau wifi avec un débit ultra-performant vous permet de travailler efficacement et sereinement</p>
          </div>

          <div class="service">
            <i class="fas fa-print"></i>
            <h2>impressions</h2>
            <p>imprimez vos documents professionnels auprès de notre service reprographie ouvert toute la journée</p>
          </div>

          <div class="service">
            <i class="far fa-handshake"></i>
            <h2>salles de  réunion</h2>
            <p>organisez des meetings, recevez vos partenaires professionnels dans nos salles de réunions dédiées</p>
          </div>

          <div class="service">
            <i class="fas fa-coffee"></i>
            <h2>coffee shop</h2>
            <p>notre coffee shop vous propose un service de boissons chaudes et de snacks toute la journée</p>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <?php include("footer.php")?>
    </footer>
</body>
</html>