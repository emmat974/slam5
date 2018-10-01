<?php include "templates/header.php";?>
<?php if (@$_SESSION['id']) { ?><center><br><br><br><br>
<?php
if (!empty($data['notification'])) {
	echo '<p>'.$data['notification'].'</p>';
}
?>
			<form method="POST" action="?ctrl=employe&mth=searchcat">
				<p>Rechercher par Catégorie : <select name="categorie">
					<?php foreach($categorie as $key => $value){
						echo '<option value='.$value['id'].'>'.$value['name'].'</option>';
					}?></select>
					<input type="submit" name="submit" value="Search" class="btn btn-dark">
					<a href="?ctrl=employe" class="btn btn-danger"><i class="fas fa-sync-alt"></i></a></p>
			</form> 
<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Ville</th>
			<th>Age</th>
			<th>Ville</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($data['employes']) {
			foreach ($data['employes'] as $k => $v) {
			?>
				<tr>
					<td><?php echo $k+1; ?></td>
					<td><a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>"><?php echo $v['prenom']; ?></a></td>
					<td><a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>"><?php echo $v['nom']; ?></a></td>
					<td><a href="mailto:<?php echo $v['email']; ?>"><?php echo $v['email']; ?></a></td>
					<td><?php echo $v['age']; ?></td>
					<td><a href="https://www.google.com/maps?q=<?php echo $v['ville']; ?>"><?php echo $v['ville']; ?> <i class="fas fa-map-marker-alt"></i> </a></td>
					<td>
						<a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>" class="btn btn-info"><i class="fas fa-eye"></i></a><?php if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2) { ?>
						<a href="?ctrl=employe&mth=edit&id=<?php echo $v['id']; ?>" class=" btn btn-warning"><i class="fas fa-edit"></i></a>
						<a href="?ctrl=employe&mth=delete&id=<?php echo $v['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
						<input type="checkbox" name="tb_delete[]" value="<?php echo $v['id']; ?>"> <?php } ?>
					</td>
				</tr>
			<?php
			}
		} else { ?>
			<tr>
				<td colspan="6">Aucun employé</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table><br>
</center>
<?php } else { ?>
	<center><br><br><br>
<form method="POST" action="?ctrl=employe&mth=connexion">
	<?php
if (!empty($data['notification'])) {
	echo '<p>'.$data['notification'].'</p>';
}
?>
				<i class="far fa-envelope"></i>	Adresse mail  <br> <input type="mail" id="email" name="email" required/><br>
				<i class="fas fa-key"></i>	Mot de passe <br> <input type="password" id="pwd" name="pwd" required /><br><br>
					<p><input type="submit" name="submit" class="btn btn-primary" value="Me connecter !"></p>
				</form> </center>
<?php } ?>
<?php include "templates/footer.php";?>
