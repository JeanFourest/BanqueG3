<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['fullname'], $_POST['phone'], $_POST['email'], $_POST['message'])) {
	error_die('Formulaire non recu.', '/?page=contact');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
	error_die('Email invalide.', '/?page=contact');
}

if (empty($_POST['fullname'])) {
	error_die('Entrez votre nom', '/?page=contact');
}

if (empty($_POST['phone'])) {
	error_die('Entrez votre telephone', '/?page=contact');
}

if (empty($_POST['message'])) {
	error_die('Entrez votre message', '/?page=contact');
}

if (strlen($_POST['message']) > 1000) {
	error_die('Message de 1000 caracteres max', '/?page=contact');
}

$_POST['fullname'] = htmlspecialchars($_POST['fullname']);
$_POST['phone'] = htmlspecialchars($_POST['phone']);
$_POST['message'] = htmlspecialchars($_POST['message']);

/* Prochaines etapes:
- Sanitize la donnee
- 2. Gerer les erreurs/success sur la page
- 3. Transformer l'enregistrement de message + header + die en une fonction
*/

$contactFormManager->save_contact_form($_POST['fullname'], $_POST['phone'], $_POST['email'], $_POST['message']);

$_SESSION['success_message'] = 'Message envoye!';
header('Location: /?page=contact');
