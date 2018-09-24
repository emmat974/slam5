<?php include "templates/header.php";?>
<?php if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2) { ?>
    <center><br><br><br>
<h2>Mise à jour un employé</h2>

<form action="?ctrl=employe&mth=edit&id=<?php echo $_GET['id']; ?>" method="post">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" value="<?php echo $employes['prenom']; ?>" required/><br>
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" value="<?php echo $employes['nom']; ?>" required/><br>
    <label for="email">Adresse mail</label>
    <input type="text" name="email" id="email" value="<?php echo $employes['email']; ?>" required/><br>
    <label for="age">Age</label>
    <input type="text" name="age" id="age" value="<?php echo $employes['age']; ?>" required/><br>
    <label for="ville">ville de résidence</label>
    <input type="text" name="ville" id="ville" value ="<?php echo $employes['ville']; ?>" required/><br>
    <br><br>
    <input type="submit" name="submit" value="Mettre à jour" class="btn btn-primary"> <a href="?ctrl=employe" class="btn btn-danger">Retour</a><br><br>
    <br><br>

</form>
</center>
<?php } else { echo "Vous n'avez pas le droit d'accéder à cette page"; } ?>
<?php include "templates/footer.php";?>