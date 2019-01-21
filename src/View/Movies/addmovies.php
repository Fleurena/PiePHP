<h1>Ajouter un film</h1>
<div class="container_block">
	<form id="addmovies" action="/webacademie_sem2/PiePHP/add/film" method="post">
		<label for="title">Titre</label>
		<input type="text" name="title" id="title">

		<label for="resum">Resumé</label>
		<textarea name="resum" id="resum" cols="73">	
		</textarea>

		<label for="cover">Affiche</label>
		<input type="text" name="cover" id="cover">

		<label for="genre">ID du Genre</label>
		<input type="text" name="genre" id="genre">

		<label for="production">Année de production</label>
		<input type="text" name="production" id="production">

		<input type="submit" name="submit" id="submit">
	<?php if(isset($_SESSION['flash'])): ?>
		<?php foreach ($_SESSION['flash'] as $key => $value): ?>
			<?= $value; ?>
		<?php endforeach;
		unset($_SESSION['flash']);
	endif; ?>
	</form>
</div>