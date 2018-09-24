<?php 
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Annuaire</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
    <?php if(@$_SESSION['droit'] == 2) {
            echo"<li class='nav-item'>
        <a class='nav-link' href='#'>Installer la base de donnée</a>
      </li>"; }
        if(@$_SESSION['id']){
          echo"
      <li class='nav-item'>
        <a class='nav-link' href='index.php?ctrl=employe'>Gérée les employés</a>
      <li class='nav-item'>
      <a class='nav-link' href='deconnexion.php'><i class='fas fa-sign-out-alt'></i> Deconnexion</a>
      </li>"; } ?>

    </ul>
  </div>
</nav>
