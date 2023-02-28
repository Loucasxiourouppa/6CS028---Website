class GameNews extends CI_Controller {
    public function index()
    {
        $options = [
            'headers' => [
                'X-RapidAPI-Key' => '13642575f2mshace0ec313c339b1p147722jsneb5fcb808122',
                'X-RapidAPI-Host' => 'videogames-news2.p.rapidapi.com'
            ]
        ];

        $response = file_get_contents('https://videogames-news2.p.rapidapi.com/videogames_news/search_news?query=GTA', false, stream_context_create($options));
        $articles = json_decode($response);

        $this->load->view('game_news', ['articles' => $articles]);
    }
}

