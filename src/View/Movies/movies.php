<?php if (!$_SESSION == 0): ?>
	<div class="add">
		<ul id="movies_ul">
			<li><a class="add_a" href="/webacademie_sem2/PiePHP/add/movies">+ Ajouter un film</a></li>
			<li><a class="add_a" href="/webacademie_sem2/PiePHP/delete/film">- Supprimer un film</a></li>
		</ul>
	</div>
<?php endif; ?>
<div class="container_block_movies">
	<?php for ($i = 0; $i < count($movies); $i++){ ?>
		<div class="movies_block">
			<a class="a_movies" href="/webacademie_sem2/PiePHP/movies/resum?id=<?= $movies[$i]['id_film'];?>">
				<img src="<?= $movies[$i]['cover']; ?>" alt="<?= $movies[$i]['title']; ?>">
			</a>
		</div>
	<?php } ?>
</div>