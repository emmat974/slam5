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
			<?php if(@$_SESSION['userId']){ ?>
			<?php 
			require "bdd.php";
			$read = $cnx->prepare('SELECT * FROM employes');
			$read->execute();

			if(@($_POST['submit'])){
				

				if(!empty($_POST['city'])){
				$read = $cnx->prepare('SELECT * FROM employes WHERE ville like :city');
				$read->execute(array(
					'city' => $_POST['city']));
				}

			}

			$result = $read->fetchAll();
			if(!$result)
				echo "Aucun résultat trouvé";
			else{ ?>
				<center>
			<p>
			<form method="POST">
				<i class="fas fa-map-marker-alt"></i> Ville <input type="text" name="city" id="city" size=50/>
				<input type="submit" name="submit" value="Rechercher" class="btn btn-primary"> <a target="_blank" href="impression.php" class="btn btn-success"><i class="fas fa-print"></i></a> <a href="csv.php" class="btn btn-warning"> <i class="far fa-file"></i> CSV </a>
			</form></p>


				<table>
					<?php if($_SESSION['droit'] == 0){ ?> 
					<tr><td>Prénom</td><td>Mail</td><td>Age</td><td>Ville</td><td>Date</td><tr>
					<?php } elseif($_SESSION['droit'] == 1 || $_SESSION['droit'] == 2){ ?> 
					<tr><td>#</td><td>Prénom</td><td>Mail</td><td>Age</td><td>Ville</td><td>Date</td><td></td><td></td><td>X</td><tr>
					<? } ?>
					<?php
					if($_SESSION['droit'] == 0){
							foreach($result as $key => $value){
										echo'<tr><td>'.$value['prenom'].'</td><td>'.$value['email'].'</td><td>'.$value['age'].'</td><td>'.$value['ville'].'</td><td>'.$value['date'].'</td></tr>';
					}
				}
					elseif($_SESSION['droit'] == 1 || $_SESSION['droit'] == 2){
						foreach($result as $key => $value){
							echo'<tr><td>'.$value['id'].'</td><td>'.$value['prenom'].'</td><td>'.$value['email'].'</td><td>'.$value['age'].'</td><td>'.$value['ville'].'</td><td>'.$value['date'].'</td><td><a href="update.php?id='.$value['id'].'" class="btn btn-info"><i class="fas fa-edit"></i></a></td><td><a href="delete.php?id='.$value['id'].'" class="btn btn-danger"> X</td><td><input type="checkbox" name="tb_delete[]" value="'.$value['id'].'"></td></tr>';
						}
					}

					?>
				</table><br>
										<?php if($_SESSION['droit'] == 1 || $_SESSION['droit'] == 2){ ?> 
						<form action="delete_lot.php" method="POST">
						<input type="submit" class="btn btn-danger" value="Suppression de masse" name="submit">
					<? } ?>
			</form>
			
			</center>
				<?
				unset($result);
				unset($read);
			}
			?>
		<?php } ?>
		</section>
		<footer><?php include("footer.php"); ?></footer>
	</body>
</html>