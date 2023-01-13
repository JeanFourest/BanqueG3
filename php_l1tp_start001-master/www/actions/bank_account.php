<?php

require_once __DIR__ . "/../../src/init.php";

if (empty($_POST["price"])) {

    error_die('Erreur du formulaire', '/?page=bank_account');


} else {

    if (filter_var($_POST["price"], FILTER_VALIDATE_INT)) {
        $_SESSION['success_message'] = 'Message envoye!';
        $_POST["price"] = htmlspecialchars($_POST["price"]);
        $_POST["message"] = htmlspecialchars($_POST["message"]);

        $deposer = $depoWith-> deposer($_POST["price"], $_POST["message"]);

    } else {
        error_die('pas un nombre !', '/?page=bank_account');
    }
}

header('Location: /?page=bank_account');
