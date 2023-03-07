<h2><?= esc($title) ?></h2>

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>


		<div class="card w-55 mb-3">
		  <div class="card-body">
			<h5 class="card-title"><?= esc($news_item['title']) ?></h5>
			<p class="card-text"><?= esc($news_item['body']) ?></p>
			<a href="<?=base_url()?>/news/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-primary">View article</a>
			<a href="<?=base_url()?>/news/delete/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-danger">Delete Article</a>
		  </div>
		</div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>