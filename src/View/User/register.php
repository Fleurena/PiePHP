<div class="container_block">
	<div class="container_flex">
		<div class="block_1">
			<h2 data-content="Regist">REGISTER</h2>
			<form method="post" action="/webacademie_sem2/PiePHP/User/register">
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo">

				<label for="email">Email</label>
				<input type="text" name="email" id="email">

				<label for="password">Password</label>
				<input type="password" name="password" id="password">

				<input type="submit" name="submit" id="submit">
			</form>

			<?php if(isset($_SESSION['flash'])): ?>
				<?php foreach ($_SESSION['flash'] as $key => $value): ?>
					<?= $value; ?>
				<?php endforeach;
				unset($_SESSION['flash']);
			endif; ?>
		</div>

		<div class="block_2">
			<h2>LOGIN</h2>
			<form method="post" action="/webacademie_sem2/PiePHP/User/login">
				<label for="email">Email</label>
				<input type="email" name="email" id="email_login">

				<label for="password">Password</label>
				<input type="password" name="password" id="password_login">

				<input type="submit" name="submit" id="submit_login">
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