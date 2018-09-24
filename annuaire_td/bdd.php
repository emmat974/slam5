<?
	$host = "localhost";
	$user = "ad_annuaire";
	$pwd  = "pwannuaire";
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
	?>