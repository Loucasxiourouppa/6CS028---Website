<!-- game_news.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Game News</title>
</head>
<body>
    <h1>Game News</h1>

    <?php foreach ($articles as $article): ?>
        <div>
            <h2><?php echo $article->title; ?></h2>
            <p><?php echo $article->description; ?></p>
            <a href="<?php echo $article->link; ?>">Read More</a>
        </div>
    <?php endforeach; ?>

    <script src="/project-root/Views/apis/videogamenews.js"></script>
</body>
</html>


