<h1>Supprimer un film</h1>
<form action="/webacademie_sem2/PiePHP/movie/delete" method="post">
	<label for="delete">ID du film</label>
	<input type="text" name="delete" id="delete">

	<input type="submit" name="submit" id="submit">
	<?php if(isset($_SESSION['flash'])): ?>
		<?php foreach ($_SESSION['flash'] as $key => $value): ?>
			<?= $value; ?>
		<?php endforeach;
		unset($_SESSION['flash']);
	endif; ?>
</form>