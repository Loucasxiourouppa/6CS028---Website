const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '13642575f2mshace0ec313c339b1p147722jsneb5fcb808122',
		'X-RapidAPI-Host': 'videogames-news2.p.rapidapi.com'
	}
};

fetch('https://videogames-news2.p.rapidapi.com/videogames_news/search_news?query=GTA', options)
	.then(response => response.json())
	.then(response => console.log(response))
	.catch(err => console.error(err));