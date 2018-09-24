<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Annuaire de contact</title>
		<?php include("bootstrap.php"); ?>
	</head>
	<body>
		<header>
			<?php include("nav.php"); ?>
			</header>
		<section>
		<?php
		if($_SESSION['droit'] == 1 || $_SESSION['droit'] == 2){ ?>
			<?php
			if(@$_GET['id']){
				require "bdd.php";
				$read = $cnx->prepare("SELECT * FROM employes WHERE id like :id");
				$read->execute(array(
					"id" => $_GET['id']));

				$result = $read->fetch();

				if(!$result){
					echo"User inexistant";
				}
				else{

					if(@$_POST['submit']){
						$update = $cnx->prepare("UPDATE employes SET prenom= :surname, nom= :name, email= :mail, age= :age, ville= :city WHERE id= :id");
						$update->execute(array(
							"surname" => $_POST['surname'],
							"name" => $_POST['name'],
							"mail" => $_POST['mail'],
							"age" => $_POST['age'],
							"city" => $_POST['city'],
							"id" => $_GET['id']));

						echo "Profil bien mise à jour";
					}
			?>
			<h2>Mise à jour utilisateur <?php echo $result['prenom'].' '.$result['nom']; ?></h2>
			
			<form method="POST">
				Prénom : <input type="text" id="surname" name="surname" value="<? echo $result['prenom']; ?>" required/><br>
				Nom : <input type="text" id="name" name="name" value="<? echo $result['nom']; ?>" required/><br>
				Mail : <input type="mail" id="mail" name="mail" value="<? echo $result['email']; ?>"><br>
				Age : <input type ="number" id="age" name="age" value="<? echo $result['age']; ?>"><br>
				Ville : <input type="text" id="city" name="city" value="<? echo $result['ville']; ?>"><br>
				Sexe : <? echo $result['sexe']; ?><br><br>

				<?php 
				if($_SESSION['droit'] == 2) {
					?>
				Droit utilisateur :<strong> <?php echo $droit = $result['droit'] == 0 ? "Utilisateur" : "Admin"; ?></strong> <br>
				<? } ?>

				<input type="submit" name="submit" value="Update" class="btn btn-warning"> <a href="list.php" class="btn btn-danger">Retour</a>
			</form>
		<?php } 
		unset($result);
	}
	else
		echo "Oups une erreur s'est produit...";
	?>
<? } else{
	header('Location: index.php');
	exit();
} ?>
		</section>
		<footer><?php include("footer.php"); ?></footer>
	</body>
</html>