<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['email'], $_POST['password'])) {
	error_die('Erreur du formulaire', '/?page=login');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
	error_die('Email invalide.', '/?page=login');
}

// Verifier si utilisateur existe en DB
$user = $userManager->getByEmail($_POST['email']);
if ($user === false) {
	error_die('Mot de passe incorrect', '/?page=login');
}
// Verifier le mot de passe
if (!$user->verifyPassword($_POST['password'])) {
	error_die('Mot de passe incorrect', '/?page=login');
}

// on verra pourquoi on ne stock que l'id
$_SESSION['user_id'] = $user->id;

header('Location: /?page=home');
