<h2><?= esc($news['title']) ?></h2>
<p><?= esc($news['body']) ?></p>
<img src="<?= base_url('uploads/'.$news['image']) ?>" alt="<?= esc($news['title']) ?>">

<p id="ajaxArticle"></p>











<script>
	function getData(slug) {
		
		// Fetch data
		fetch('https://mi-linux.wlv.ac.uk/~2007307/project-root/public/news/ajax/get/' + slug)
			
		  // Convert response string to json object
		  .then(response => response.json())
		  .then(response => {

			// Copy one element of response to our HTML paragraph
			document.getElementById("ajaxArticle").innerHTML = response.title + ": " + response.text;
		  })
		  .catch(err => {
			
			// Display errors in console
			console.log(err);
		});
	}
</script>