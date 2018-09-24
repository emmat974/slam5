<?php include "templates/header.php";?>
<center><br><br><br>
<h2>Profil de : <?php echo $employe['nom']; ?> <?php echo $employe['prenom']; ?></h2>
<a href="?ctrl=employe" class="btn btn-danger">Retour</a><br><br>
<table>
	<tbody>
		<tr>
			<td>Prénom</td>
			<td><?php echo $employe['prenom']; ?></td>
		</tr>
		<tr>
			<td>Nom</td>
			<td><?php echo $employe['nom']; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><a href="mailto:<?php echo $employe['email']; ?>"><?php echo $employe['email']; ?></a></td>
		</tr>
		<tr>
			<td>Age</td>
			<td><a <?php echo $employe['age']; ?>"><?php echo $employe['age']; ?></a></td>
		</tr>
		<tr>
			<td>Ville</td>
			<td><a href="https://www.google.com/maps?q=<?php echo $employe['ville']; ?>"><?php echo $employe['ville']; ?> <i class="fas fa-map-marker-alt"></i> </a></td>
		</tr>
		<tr>
			<td>Sexe</td>
			<td><?php echo $employe['sexe']; ?></a></td>
		</tr>
		<tr>
			<td>Droit d'utilisateur</td>
			<td><?php echo $employe['droit']; ?></a></td>
		</tr>
	</tbody>
</table>
</center>
<?php include "templates/footer.php";?>