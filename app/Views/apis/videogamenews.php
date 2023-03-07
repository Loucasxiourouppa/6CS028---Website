<?php foreach ($news as $article): ?>
    <h2><?= $article['title'] ?></h2>
    <p><?= $article['description'] ?></p>
    <p><?= $article['date'] ?></p>
    <img src="<?= $article['image'] ?>" alt="<?= $article['title'] ?>">
    <a href="<?= $article['link'] ?>">Read more</a>
<?php endforeach; ?>
