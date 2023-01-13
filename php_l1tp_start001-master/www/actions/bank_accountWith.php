<?php

require_once __DIR__ . "/../../src/init.php";


if (empty($_POST["priceWith"])) {

    error_die('Erreur du formulaire', '/?page=bank_account');


} else {

    if (filter_var($_POST["priceWith"], FILTER_VALIDATE_INT)) {
        $_SESSION['success_message'] = 'Message envoye!';
        $_POST["priceWith"] = htmlspecialchars($_POST["priceWith"]);

        $retirer = $depoWith-> retirer($_POST["priceWith"]);

    } else {
        error_die('pas un nombre !', '/?page=bank_account');
    }
}

header('Location: /?page=bank_account');
