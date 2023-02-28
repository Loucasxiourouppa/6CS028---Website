<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Apis extends BaseController
{
	public function wikipedia()
	{
		// Since 2010 a user agent is required
		ini_set('user_agent', 'University of Wolverhampton');

		$website = "www.bdtheque.com";

		$url = "http://en.wikipedia.org/w/api.php?"
			."action=query&"
			."list=exturlusage&"
			."eulimit=500&"
			."format=xml&"
			."euquery=".$website;
		  
		// Get data from URL and store in object
		$data['links'] = simplexml_load_file($url);
		$data['title'] = "Wikipedia API";

		echo view('templates/header', $data);
		echo view('apis/wikipedia', $data);
		echo view('templates/footer', $data);		
	}
	
	
	
	
	
	public function videogamenews()
	{
		// Since 2010 a user agent is required
		ini_set('user_agent', 'University of Wolverhampton');

		$website = "https://mi-linux.wlv.ac.uk/~2007307/project-root/public/";

		$url = 'https://videogames-news2.p.rapidapi.com/videogames_news/search_news'
			."action=query&"
			."list=exturlusage&"
			."eulimit=500&"
			."format=xml&"
			."euquery=".$website;
		  
		// Get data from URL and store in object
		$data['links'] = simplexml_load_file($url);
		$data['title'] = "Wikipedia API";

		echo view('templates/header', $data);
		echo view('apis/videogamenews', $data);
		echo view('templates/footer', $data);	




		
	}
}