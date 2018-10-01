<?php include "templates/header.php";?>
<?php if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2) { ?>
<center><br><br>
	<h2>Gestion Catégorie : Maj d'une catégorie</h2>
	<form action="?ctrl=employe&mth=updatecat&id=<?php echo $categorie['id']; ?>" method="post">
		<label name="nom">Nom de la Catégorie</label>
		<input type="text" name="name" value="<?php echo $categorie['name']; ?>" required/><br>
		<label name="description">Description de votre catégorie</label>
		<textarea name="description" cols="50" rows="15"><?php echo $categorie['description']; ?></textarea><br><br>
    <input type="submit" name="submit" class="btn btn-primary" value="Mise à jour"> <a href="?ctrl=employe&mth=cat" class="btn btn-warning"><i class="fas fa-undo-alt"></i> Retour</a><br><br>
    <br><br>    
</form>

</center>
<?php } else { echo "Vous n'avez pas le droit d'accéder à cette page"; } ?>
<?php include "templates/footer.php";?>
