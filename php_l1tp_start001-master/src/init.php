<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

// fonctions utilitaires
require_once __DIR__ . '/utils/errors.php';

// pages existantes sur notre site internet
$pages = ['home', 'contact', 'signup', 'login', 'admin_contact'];

// init variables vides pour le template
$page_scripts = "";
$head_metas = "";

// Inclure les classes
// NOUVELLE LIGNE            v             v
require_once __DIR__ . '/class/ContactForm.php';
require_once __DIR__ . '/class/User.php';

// Inclure les managers
require_once __DIR__ . '/class/ContactFormManager.php';
require_once __DIR__ . '/class/UserManager.php';

// Initialiser les managers
$contactFormManager = new ContactFormManager($db);
$userManager = new UserManager($db);

/* Session & Auth */
$user = false;
if (isset($_SESSION['user_id'])) {
	$user = $userManager->getById($_SESSION['user_id']);
}
