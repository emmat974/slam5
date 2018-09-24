<?php

class AccueilController
{
	public function index()
	{
		include "templates/header.php";
		die("<br><br><br><center>
<h3>Bienvenue si vous voulez accéder à la gestion de l'employée cliquez <a href='?ctrl=employe'>ici</a></h3></center>
		");
		include "templates/footer.php"; 
	}
}


