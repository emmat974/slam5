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
			<?php if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2) { ?> 
						<h2>Delete un employée</h2>

						<?php
						if(@$_GET['id']){
							require 'bdd.php';

							$delete = $cnx->prepare("DELETE FROM employes WHERE id like :id");
							$delete->execute(array(
								"id" => $_GET['id']));

							echo "Utilisateur supprimé";
						}
						?>
						<p>
						<a href="list.php" class="btn btn-danger">Retourner dans la liste</a></p>
					<?php }
					else{
						header('Location: index.php');
						exit();
					} ?>
		</section>
		<footer><?php include("footer.php"); ?></footer>
	</body>
</html>