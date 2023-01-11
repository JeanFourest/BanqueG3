<?php

function error_die($message, $url) {
	$_SESSION['error_message'] = $message;
	header('Location: ' . $url);
	die();
}

function show_error() {
	if (isset($_SESSION['error_message'])) {
		echo '<p class="alert alert-error">' . $_SESSION['error_message'] . '</p>';
		unset($_SESSION['error_message']);
	}
}
