<?php

$page_title = "Contact - MonSite.com";

ob_start();
?>
<h1>Contactez-nous</h1>

<?php show_error(); ?>
<?php include_once __DIR__ . '/../partials/alert_success.php'; ?>

<form action="/actions/send_contact.php" method="POST">
	<div>
		<label for="fullname">Votre nom complet</label>
		<input type="text" id="fullname" name="fullname">
	</div>
	<div>
		<label for="phone">Numero de Telephone</label>
		<input type="text" id="phone" name="phone">
	</div>
	<div>
		<label for="email">Email</label>
		<input type="text" id="email" name="email">
	</div>
	<div>
		<label for="message">Votre message</label>
		<textarea name="message" id="textarea" cols="30" rows="10"></textarea>
	</div>
	<button type="submit">Envoyer</button>
</form>

<?php
$page_content = ob_get_clean();
