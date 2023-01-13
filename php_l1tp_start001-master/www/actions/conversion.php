<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['money_conversion'])) {
    error_die('Champs pas rempli', '/?page=conversion');
}

header('Location: /?page=conversion');