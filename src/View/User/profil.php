<div class="container_block">
	<div class="container_flex">
		<div class="block_1">
			<h1 id="title_profil">Bonjour <?= $_SESSION['pseudo']; ?></h1>
			<p>Email : <?= $_SESSION['email']; ?></p>
		</div>

		<div class="block_2">
			<h2>Modifier votre profil</h2>
			<form method="post" action="/webacademie_sem2/PiePHP/User/update?email">
				<label for="email">Changer mon adresse email</label>
				<input type="email" name="email" id="email">
				<input type="submit" name="submit" id="submit">
			</form>

			<?php if(isset($_SESSION['flash'])): ?>
				<?php foreach ($_SESSION['flash'] as $key => $value): ?>
					<?= $value; ?>
				<?php endforeach;
				unset($_SESSION['flash']);
			endif; ?>

			<form method="post" action="/webacademie_sem2/PiePHP/User/update?pseudo">
				<label for="pseudo">Changer mon pseudo</label>
				<input type="text" name="pseudo" id="pseudo">
				<input type="submit" name="submit" id="submit_login">
			</form>

			<?php if(isset($_SESSION['flash1'])): ?>
				<?php foreach ($_SESSION['flash1'] as $key => $value): ?>
					<?= $value; ?>
				<?php endforeach;
				unset($_SESSION['flash1']);
			endif; ?>

			<h2>Changer mon mot de passe</h2>
			<form method="post" action="/webacademie_sem2/PiePHP/User/update?password">
				<label for="password">Taper le mot de passe</label>
				<input type="password" name="password" id="password">
				<label for="re_password">Retapé le mot de passe</label>
				<input type="password" name="re_password" id="re_password">
				<input type="submit" name="submit" id="submit_password">
			</form>

			<?php if(isset($_SESSION['flash2'])): ?>
				<?php foreach ($_SESSION['flash2'] as $key => $value): ?>
					<?= $value; ?>
				<?php endforeach;
				unset($_SESSION['flash2']);
			endif; ?>

			<h2>Supprimer le compte</h2>
			<form method="post" action="/webacademie_sem2/PiePHP/User/delete">
				<label for="delete">Êtes-vous sûr de vouloir supprimer votre compte ?</label>
				<select id="delete" name="compte">
					<option value="oui">Oui</option>
					<option value="non">Non</option>
				</select><br>
				<input type="submit" name="submit" id="submit_delete">
			</form>

			<?php if(isset($_SESSION['flash2'])): ?>
				<?php foreach ($_SESSION['flash2'] as $key => $value): ?>
					<?= $value; ?>
				<?php endforeach;
				unset($_SESSION['flash2']);
			endif; ?>

		</div>
	</div>
</div>