<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    public function getNews()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'https://videogames-news2.p.rapidapi.com/videogames_news/recent', [
            'headers' => [
                'X-RapidAPI-Key' => '13642575f2mshace0ec313c339b1p147722jsneb5fcb808122',
                'X-RapidAPI-Host' => 'videogames-news2.p.rapidapi.com'
            ]
        ]);

        $body = $response->getBody();

        $news = [];

        foreach ($body->articles as $article) {
            $news[] = [
                'date' => $article->publishedAt,
                'description' => $article->description,
                'image' => $article->urlToImage,
                'link' => $article->url,
                'title' => $article->title
            ];
        }

        return $news;
    }
}
