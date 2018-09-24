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
			if(@$_SESSION['userId'] != ""){
				$droit = @$_SESSION['droit'] == 0 ? "utilisateur" : "admin/super-admin";
				echo "Bienvenue, ".$_SESSION['name']." ".$_SESSION['surname']." vous êtes un <strong>".$droit."</strong>";
				echo "<br><a href='deconnexion.php'>Deconnexion</a>";
			}
			else{
				if(@$_POST['submit']){
						require 'bdd.php';
						$mail = @$_POST['mail'];

						$req = $cnx->prepare('SELECT id,prenom,nom,droit,motdepasse FROM employes WHERE email = :mail');
						$req->execute(array(
							"mail" => $mail));
						$result = $req->fetch();

						$verifyPwd = password_verify($_POST['pwd'],$result['motdepasse']);

						if(!$result){
							echo "Mauvais identifiquant/Mot de passe";
						}
						else{
							if($verifyPwd){
								session_start();
								$_SESSION['userId'] = $result['id'];
								$_SESSION['name'] = $result['nom'];
								$_SESSION['surname'] = $result['prenom'];
								$_SESSION['droit'] = $result['droit'];

								header('Location: index.php');
								unset($req);
								unset($result);
								exit();
							}
							else{
								echo "Mauvais mot de passe";
							}
						}
					}
				?>
				<form method="POST">
				<i class="far fa-envelope"></i>	Adresse mail  <br> <input type="mail" id="mail" name="mail" required/><br>
				<i class="fas fa-key"></i>	Mot de passe <br> <input type="password" id="pwd" name="pwd" required /><br><br>
					<p><input type="submit" name="submit" class="btn btn-primary" value="Me connecter !"></p>
				</form>
			<? } ?>
		</section>
		<footer><?php include("footer.php"); ?></footer>
	</body>
</html>