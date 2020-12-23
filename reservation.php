<?php 

session_start();



$bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', '', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);



   

?>    

<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <title>Reservation</title>
  </head>
  <body>
    <header>
      <?php include ("header.php") ;?>

    </header>
    <main>
      <section id = "event">
        <div id="eventcontainer">
          <h1 id="title-event">EVENEMENTS</h1> 
          <?php 
           if (isset($_SESSION["login"]))
            {

             echo '<h2 id="subtitle-event">retrouvez les réservations en cours @ ' .$_SESSION['login'].'</h2><hr>'; 

            }
            if (isset($_GET['id']) AND $_GET['id'] >= 0) 
            {

              $getid = intval($_GET['id']);

              $desc = $bdd->prepare("SELECT titre, description,DATE_FORMAT(debut,'%d/%m/%Y'), DATE_FORMAT(fin,'%d/%m/%Y'),id_utilisateur, reservations.id, utilisateurs.login FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE reservations.id = '$getid'" );
              $desc->execute(array($getid));
            
              $m = $desc->fetch();
 
              //var_dump($desc);
              //var_dump($m);

         ?>

          <article>
            <?php echo 'TITRE EVENEMENT: '.$m['titre']. '</br>';?>
            <?php echo 'DESCRIPTION : '.$m['description'];?>

            <p>Début de l'évènement le : <i><?php echo "<b>".$m["DATE_FORMAT(debut,'%d/%m/%Y')"]."</b>"  ;?></i></p>
              
            <p>Fin de l'évènement le : <i><?php echo "<b>".$m["DATE_FORMAT(fin,'%d/%m/%Y')"]."</b>" ;?></i></p>


            <p>Organisé par <?php echo "<b>".$m['login']."</b>"; ?></p>
     
          </article>
        </div>
      </section>  
    </main>
    <footer>
      <?php include('footer.php') ;?>
    </footer>
  </body>
</html>

<?php 

}

?>
