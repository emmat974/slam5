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
				<form method="POST">
				<i class="far fa-envelope"></i>	Adresse mail  <br> <input type="mail" id="mail" name="mail" required/><br>
				<i class="fas fa-key"></i>	Mot de passe <br> <input type="password" id="pwd" name="pwd" required /><br><br>
					<p><input type="submit" name="submit" class="btn btn-primary" value="Me connecter !"></p>
				</form>
		</section>
		<footer><?php include("footer.php"); ?></footer>
	</body>
</html>