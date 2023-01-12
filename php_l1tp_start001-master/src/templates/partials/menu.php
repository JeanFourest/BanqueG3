<?php if ($user->role == false) { ?>
<ul>
	<li><a href="/?page=home">Home</a></li>
<?php if ($user === false) { ?>
	<li><a href="/?page=signup">Signup</a></li>
	<li><a href="/?page=login">Login</a></li>
<?php } else { ?>
	<li><?= $user->email; ?></li>
	<li><a href="/actions/logout.php">Logout</a></li>
<?php } ?>
</ul>
<?php } if ($user->role >= $role['lvl']['manager']){ ?>
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
<?php } elseif ($user->role == $role['lvl']['verif']) { ?>
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
</ul>
<?php } elseif ($user->role == $role['lvl']['noVerif']) { ?>
	<p>Vous allez être vérifié par un manager ou un admin.</p>
	<p>Veuillez attendre quelques instants</p>

<?php } elseif ($user->role == $role['lvl']['noVerif']) { ?>
	<p>Vous avez été banni de ce site pour certaines raisons.</p>
<?php } ?>
