	<?php 
			require "bdd.php";
			$read = $cnx->prepare('SELECT * FROM employes');
			$read->execute();

			$result = $read->fetchAll();
			?>

<html>
<body onload="window.print()">
	<h1>Fiche des employée</h1>
<table>
		<tr><td>Prénom</td><td>Mail</td><td>Age</td><td>Ville</td><td>Date</td><tr>
			<?
					foreach($result as $key => $value){
										echo'<tr><td>'.$value['prenom'].'</td><td>'.$value['email'].'</td><td>'.$value['age'].'</td><td>'.$value['ville'].'</td><td>'.$value['date'].'</td></tr>';
					}
					?>
</table>

</body>
</html> 