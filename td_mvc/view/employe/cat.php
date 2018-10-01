<?php include "templates/header.php";?>
<?php if(@$_SESSION['droit'] == 1 || @$_SESSION['droit'] == 2) { ?>
<center>
	<br>
	<p><h2>Gestion Catégorie</h2></p>
	<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom Catégorie</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($categories) {
			foreach ($categories as $k => $v) {
			?>
				<tr>
					<td><?php echo $k+1; ?></td>
					<td><?php echo $v['name']; ?></td>
					<td><a href="?ctrl=employe&mth=updatecat&id=<?php echo $v['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
				</tr>
			<?php
			}
		} else { ?>
			<tr>
				<td colspan="6">Aucune catégorie ajouter</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table><br>
<p><a href="?ctrl=employe&mth=addcat" class="btn btn-success">Ajouter une catégorie</a> <a href="?ctrl=employe" class="btn btn-danger">Retour</a></p>

</center>
<?php } else { echo "Vous n'avez pas le droit d'accéder à cette page"; } ?>
<?php include "templates/footer.php";?>
