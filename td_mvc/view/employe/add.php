<?php include "templates/header.php";?>
<?php if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2) { ?>
<center><br><br>
<h2>Ajouter un employée</h2>

<form action="?ctrl=employe&mth=add" method="post">
    <h2>Information Essenciel</h2>
        <label for="email">Adresse mail</label>
    <input type="email" name="email" id="email" required/><br>
        <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd" id="pwd" required/><br>
    <label for="droit">Droit d'utilisateur</label>
    <select name="droit">
        <option value="0">Utilisateur</option>
        <option value="1">Administrateur</option>
        <option value="2">Super-Administrateur</option>
    </select>
    <hr>
    <h2>Information complétementaire</h2>
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" required/><br>
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required/><br>

    <label for="age">Age</label>
    <input type="number" name="age" id="age" required/><br>
    <label for="ville">ville de résidence</label>
    <input type="text" name="ville" id="ville" required/><br>

    <label for="sexe">Sexe</label>
    <select name="sexe">
        <option value="Homme"> Homme</option>
        <option value="Femme"> Femme</option>
    </select>
    <br><br>
    <input type="submit" name="submit" class="btn btn-primary" value="Ajouter"> <a href="?ctrl=employe" class="btn btn-warning"><i class="fas fa-undo-alt"></i> Retour</a><br><br>
    <br><br>    
</form>
</center>
<?php } else { echo "Vous n'avez pas le droit d'accéder à cette page"; } ?>
<?php include "templates/footer.php";?>
