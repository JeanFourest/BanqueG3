<?php

// la variable dsn     v
// protocol:var1=value1;var2=value2;..
// mysql:host=C_DB_HOST;dbname=C_DB_NAME;port=C_DB_PORT
try {
	$dsn = 'mysql:host='.$config['db']['host'].';dbname='.$config['db']['name'].';port='.$config['db']['port'].'';
	$db = new PDO($dsn, $config['db']['user'], $config['db']['pass']);

} catch (Exception $e) {
	die('Erreur MySQL. ' . $e->getMessage());
}
