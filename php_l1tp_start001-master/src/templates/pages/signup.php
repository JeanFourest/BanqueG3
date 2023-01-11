<?php

$page_title = "SignUp - MonSite.com";

// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>
<h1>Signup</h1>

<?php show_error(); ?>

<form action="/actions/signup.php" method="post">
	<div>
		<label for="email">Email</label>
		<input type="text" id="email" name="email">
	</div>
	<div>
		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password">
	</div>
	<div>
		<label for="cpassword">Confirmez Mot de passe</label>
		<input type="password" id="cpassword" name="cpassword">
	</div>
	<button type="submit">Signup</button>
</form>

<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
