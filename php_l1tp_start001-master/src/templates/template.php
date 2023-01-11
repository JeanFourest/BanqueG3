<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $page_title; ?></title>
		<?= $head_metas ;?>
	</head>
	<body>
	<div class="menu">
		<?php require_once __DIR__ . '/partials/menu.php'; ?>
	</div>
	<?= $page_content ;?>
	<?= $page_scripts ;?>
	</body>
</html>
