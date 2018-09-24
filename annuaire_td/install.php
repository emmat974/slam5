<?php
	$host = "localhost";
	$user = "ad_annuaire";
	$pwd  = "pwannuaire";
	$db   = "dbannuaire";
	$dsn  = "mysql:host=$host;dbname=$db";
	$tbl  = "employes";

	$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );


try {
    $connection = new PDO("mysql:host=$host", $user, $pwd, $options);
    $sql = file_get_contents("init.sql");
    $connection->exec($sql);
    
    echo "La base de données ont été créés avec succès.";
    echo "<br><br> <a href='index.php'>Retour</a>";

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
