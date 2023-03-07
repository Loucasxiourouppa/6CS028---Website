<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Apis extends BaseController
{
    public function videogamenews()
    {
        $model = new NewsModel();
        $data['news'] = $model->getNews();

        echo view('templates/header');
        echo view('apis/videogamenews', $data);
        echo view('templates/footer');
    }
}
