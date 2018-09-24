<?php
$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

echo $pwd ?>

<form method="post">
	<input type="password" name="pwd">
	<input type="submit">
</form>