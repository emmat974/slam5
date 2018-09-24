<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Annuaire de contact</title>
		<link rel="stylesheet" type="text/css" href="annuaire.css">
		<?php include("bootstrap.php"); ?>
	</head>
	<body>
		<header>
			<?php include("nav.php"); ?>
			</header>
		<section>
			<?php
			if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2){ ?> 
						<h2>Ajouter un employée</h2>
			<?php 
			if(@($_POST['submit'])){
				require "bdd.php";

				$pwd_hache = password_hash($_POST['pwd'],PASSWORD_DEFAULT);
				$insert = $cnx->prepare('INSERT INTO employes VALUES("",:surname,:name,:mail,:age,:city,CURDATE(),:droit,:pwd,:sexe)');
				$insert->execute(array(
					'surname' => $_POST['surname'],
					'name' => $_POST['name'],
					'mail' => $_POST['mail'],
					'age' => $_POST['age'],
					'city' => $_POST['city'],
					'pwd' => $pwd_hache,
					'droit' => $_POST['droit'],
					'sexe' => $_POST['sexe']));

				echo "Bien add à la bdd";
			}
			?>
			
			<form method="POST">
				<h2>Identifiant</h2>
				Mail : <input type="mail" id="mail" name="mail" required/><br>
				Mot de passe : <input type="password" name="pwd" required /><br>
				<h2>Info Employée</h2>
				Prénom : <input type="text" id="surname" name="surname" required/><br>
				Nom : <input type="text" id="name" name="name" required/><br>
				Age : <input type ="number" id="age" name="age" min=0 max=99><br>
				Ville : <input type="text" id="city" name="city"><br>
				Genre : <br> <select name="sexe">
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select><br>
				<?php if(@$_SESSION['droit'] == 2) { ?>
				Droit utilisateur :<br> <select name="droit">
					<option value="0">Utilisateur</option>
					<option value="1">Admin</option>
					<option value="2">Super Admin</option>
				</select><br>
				<? } elseif(@$_SESSION['droit'] == 1){ ?>
					<input type="hidden" name="droit" value="0">
				<? } ?>

				<input type="submit" name="submit" value="Add" class="btn btn-primary">
			</form>
		<? } else {
					header('Location: index.php');
					exit();
		} ?>
		</section>
		<footer><?php include("footer.php"); ?></footer>
	</body>
</html>