	<?php 

	$host = "localhost";
	$user = "root";
	$pwd  = "";
	$db   = "dbannuaire";
	$dsn  = "mysql:host=$host;dbname=$db";
	$tbl  = "employes";

	$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

	 try  {
			$cnx = new PDO($dsn,$user,$pwd,$options);
		}
		catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
			$read = $cnx->prepare('SELECT * FROM employes');
			$read->execute();

			$result = $read->fetchAll();
			?>

<html>
<body onload="window.print()">
	<h1>Fiche des employée</h1>
<table>
		<tr><td>Prénom</td><td>Mail</td><td>Age</td><td>Ville</td><td>Sexe</td><tr>
			<?php
					foreach($result as $key => $value)
						echo"<tr><td>$value[prenom]</td><td>$value[email]</td><td>$value[age]</td><td>$value[ville]</td><td>$value[sexe]</td></tr>";
					?>
</table>

</body>
</html> 