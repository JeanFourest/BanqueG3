<?php
$page_title = "Admin Contact - MonSite.com";

$forms = $contactFormManager->get_forms();

ob_start();
?>
<h1>Admin Contact</h1>

<?php
foreach ($forms as $cform) { ?>
<div>
	<span>Nom: <?= $cform->fullname ?></span><br />
	<span>Email: <?= $cform->email ?></span><br />
	<span>Phone: <?= $cform->phone ?></span><br />
	<span>Date: <?= $cform->getCreatedAt() ?></span><br />
	<span>Message:</span>
	<p><?= $cform->message ?></p>
</div>
<hr>
<?php
}
?>

<?php
$page_content = ob_get_clean();
