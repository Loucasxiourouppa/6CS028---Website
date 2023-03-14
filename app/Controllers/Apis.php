<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Apis extends BaseController
{
    public function videogame()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://videogames-news2.p.rapidapi.com/videogames_news/recent",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Key: 6df7509a92msh13bddbb28d52664p1e2c80jsnfafc28f381b5",
                "X-RapidAPI-Host: videogames-news2.p.rapidapi.com",
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // Handle cURL error
            echo "cURL Error #:" . $err;
        } else {
            // Display response data
          

            // Parse response data as JSON
            $data = json_decode($response, true);

            // Pass parsed data to view
            echo view('templates/header', $data);
			
            echo view('apis/videogamenews', $data);
            echo view('templates/footer', $data);
			
			// Use HTML markup to structure the output
echo '<div class="blog-posts">';
foreach ($data as $item) {
    echo '<div class="blog-post">';
    echo '<h2>' . $item['title'] . '</h2>';
    echo '<p class="date">' . $item['date'] . '</p>';
    echo '<img src="' . $item['image'] . '" alt="' . $item['title'] . '">';
    echo '<p class="description">' . $item['description'] . '</p>';
    echo '<a href="' . $item['link'] . '">Read more</a>';
    echo '</div>';
}
echo '</div>';

// Add some CSS styling
echo '<style>';
echo '.blog-posts { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); grid-gap: 20px; }';
echo '.blog-post { padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }';
echo '.blog-post h2 { margin-top: 0; }';
echo '.blog-post .date { font-size: 14px; color: #999; margin-bottom: 10px; }';
echo '.blog-post img { max-width: 100%; height: auto; margin-bottom: 10px; }';
echo '.blog-post .description { margin-bottom: 10px; }';
echo '.blog-post a { display: inline-block; padding: 5px 10px; background-color: #007bff; color: #fff; border-radius: 5px; text-decoration: none; }';
echo '.blog-post a:hover { background-color: #0069d9; }';
echo '</style>';

// Add some error handling
if ($err) {
    if (curl_errno($curl) == 28) {
        echo '<p>Sorry, the server is currently busy. Please try again later.</p>';
    } else {
        echo '<p>There was an error loading the blog posts. Please try again later.</p>';
    }

		}
				}
    }
}