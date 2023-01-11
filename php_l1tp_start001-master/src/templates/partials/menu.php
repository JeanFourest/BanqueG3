<ul>
	<li><a href="/?page=home">Home</a></li>
	<li><a href="/?page=contact">Contact</a></li>
<?php if ($user === false) { ?>
	<li><a href="/?page=signup">Signup</a></li>
	<li><a href="/?page=login">Login</a></li>
<?php } else { ?>
	<li><?= $user->email; ?></li>
	<li><a href="/actions/logout.php">Logout</a></li>
<?php } ?>
	<li><a href="/?page=admin_contact">Admin Contact</a></li>
</ul>
