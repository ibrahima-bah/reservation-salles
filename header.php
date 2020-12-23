<?php 
if (isset($_POST["deco"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<header>
  <nav>
    <a id="header-title" href="index.php">Home</a>
    <ul>
      <li><a href="planning.php">NOS DISPONIBILITÉS</a></li>
      <li><a href="reservation-form.php">RÉSERVER UN ESPACE</a></li>

      <?php 
        if (isset($_SESSION['login'])):
      ?>    
      <li><a href="profil.php">PROFIL</a></li>
      <li><form action="deconnexion.php" method="post">
            <input id="deco" name="deco" value="DECONNEXION" type="submit"/>
          </form>
      </li>

      <?php
        else :
      ?>

      <li><a href="connexion.php"> LOGIN &nbsp;</a><i class="far fa-user"></i></li>

      <?php endif;?>
    </ul>
  </nav>
</header>