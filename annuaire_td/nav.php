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
      <?php
      if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2){
        ?>
      <li class="nav-item">
        <a class="nav-link" href="ajout.php">Ajouter un employée</a>
      </li>
       <? } if(@$_SESSION['userId']){ ?>
      <li class="nav-item">
        <a class="nav-link" href="list.php">Rechercher un employée</a>
      </li> <? } if(@$_SESSION['droit'] == 2) { ?> 
            <li class="nav-item">
        <a class="nav-link" href="install.php">Installer la base de donnée</a>
      </li> <? } ?>
    </ul>
  </div>
</nav>