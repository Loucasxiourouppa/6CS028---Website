<!DOCTYPE html>
<html>
<h2>Recent Articles</h2>
<head>
	<title>Video Game News</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style>
		.card {
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php foreach ($data as $item) { ?>
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
					<div class="card-body">
						<h5 class="card-title"><?= $item['title'] ?></h5>
						<p class="card-text"><?= $item['description'] ?></p>
						<a href="<?= $item['link'] ?>" class="btn btn-primary">Read More</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>




