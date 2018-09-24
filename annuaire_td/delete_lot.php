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
						<h2>Delete masse gens</h2>

						<?php
							if(@$_POST['submit']){
								require 'bdd.php';
								$tab = $_POST['tb_delete'];

								foreach($tab as $key){
									$id = addslashes($key);
									$delete = $cnx->prepare("DELETE FROM employes WHERE id like :id");
									$delete->execute(array(
										"id" => $id));
								}

								echo "Les utilisateurs ont bien était supprimé";

							}
						?>
						<p>
						<a href="list.php" class="btn btn-danger">Retourner dans la liste</a></p>
					<? } else {
						header('Location: index.php');
						exit();
					} ?>
		</section>
		<footer><?php include("footer.php"); ?></footer>
	</body>
</html>