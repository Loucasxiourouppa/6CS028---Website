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
			echo view('apis/videogamenews', ['data' => $data]);
			echo view('templates/footer', $data);

		}
    }
}


