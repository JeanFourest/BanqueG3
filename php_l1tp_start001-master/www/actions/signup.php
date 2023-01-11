<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['email'], $_POST['password'], $_POST['cpassword'])) {
	error_die('Erreur du formulaire', '/?page=signup');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
	error_die('Email invalide.', '/?page=signup');
}

if (strlen($_POST['password']) < 4) {
	error_die('Mot de passe trop court', '/?page=signup');
}

if ($_POST['password'] !== $_POST['cpassword']) {
	error_die('Les 2 mot de passe sont differents', '/?page=signup');
}


// Verifier si utilisateur existe deja en DB
$alreadyUser = $userManager->getByEmail($_POST['email']);
if ($alreadyUser !== false) {
	error_die('Deja inscrit', '/?page=signup');
}

// Creer et inserer utilisateur en DB
$user = User::create($_POST['email'], $_POST['password'], 1, $_SERVER['REMOTE_ADDR']);
$user_id = $userManager->insert($user);

// on verra pourquoi on ne stock que l'id
$_SESSION['user_id'] = $user_id;

header('Location: /?page=home');
