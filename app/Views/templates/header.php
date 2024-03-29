<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSphere</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url('news')?>">GameSphere</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url('users/login')?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('pages/register')?>">Register</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=base_url('about')?>">About Us</a></li>
            <li><a class="dropdown-item" href="<?=base_url('apis')?>">Game News</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=base_url('news/create')?>">Create Post</a></li>
			<li><a class="dropdown-item" href="<?=base_url('contact')?>">Contact us</a></li>
          </ul>
        </li>
        <li class="nav-item">
          
        </li>
      </ul>
    <form class="d-flex" role="search">
	  <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search">
	  <button class="btn btn-outline-success" type="submit">Search</button>
	</form>
	<div id="search-results"></div>

	<script>
	$(document).ready(function() {
	  $('#search').on('input', function() {
		var search_query = $(this).val();
		$.ajax({
		  type: 'POST',
		  url: '<?=base_url("news/search")?>',
		  data: {'search_query': search_query},
		  success: function(data) {
			$('#search-results').html(data);
		  }
		});
	  });
	});
	</script>

	

	

	
	
	
	
	
    </div>
  </div>
</nav>