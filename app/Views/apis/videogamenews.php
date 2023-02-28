<?php

$client = new http\Client;
$request = new http\Client\Request;

$request->setRequestUrl('https://videogames-news2.p.rapidapi.com/videogames_news/recent');
$request->setRequestMethod('GET');
$request->setHeaders([
	'X-RapidAPI-Key' => '13642575f2mshace0ec313c339b1p147722jsneb5fcb808122',
	'X-RapidAPI-Host' => 'videogames-news2.p.rapidapi.com'
]);

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();

