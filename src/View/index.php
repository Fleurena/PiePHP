<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>My cinema</title>
	<link rel="stylesheet" type="text/css" href="/webacademie_sem2/PiePHP/webroot/css/style.css">
	<link rel="stylesheet" type="text/css" href="/webacademie_sem2/PiePHP/webroot/css/movies.css">
</head>
<body>
	<header>
		<nav>
			<a class="a_logo" href="/webacademie_sem2/PiePHP/movies"><img class="logo" src="/webacademie_sem2/PiePHP/webroot/assets/logo.png" alt="mycinema"></a>
			<ul>
				<li><a href="/webacademie_sem2/PiePHP/movies">Home</a></li>
				<?php if (!$_SESSION == 0): ?>
					<li><a href="/webacademie_sem2/PiePHP/User/log">Profil</a></li>
				<?php endif; ?>
				<?php if (empty($_SESSION)): ?>
					<li><a href="/webacademie_sem2/PiePHP/User">Login/Register</a></li>
				<?php endif; ?>
				<?php if (!$_SESSION == 0): ?>
					<li><a href="/webacademie_sem2/PiePHP/User/logout">Logout</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</header>

	<div class="container">
		<?= $view ?>
	</div>
	
</body>
</html>