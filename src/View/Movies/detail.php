<h1><?= $detail[0]['title']; ?></h1>
<div class="container_block_detail">
	<div class="container_flex">
		<div class="movies_block">
			<img src="<?= $detail[0]['cover']; ?>" alt="<?= $detail[0]['title']; ?>">
		</div>

		<div class="detail_block">
			<h2 class="h2_resum">Résumé</h2>
			<p><?= $detail[0]['resum']; ?></p>
			<h3>Date de sortie : <?= $detail[0]['production']; ?></h3>
		</div>
	</div>
</div>