<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;


class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'Game Blogs',
        ];
    
		return view('templates/header', $data)
            . view('news/index', $data)
            . view('templates/footer', $data);
	}

	public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find blog: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
	
	
	//This function is for the creation of news articles
	public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create Blog'])
                . view('news/create')
                . view('templates/footer');
        }
	
		$post = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/create')
                . view('templates/footer');
        }

        $model = model(NewsModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/success')
            . view('templates/footer');
    }
	
	public function deleteNews($slug)
{
    $model = model(NewsModel::class);
    $data['news'] = $model->where('slug', $slug)->first();

    if (empty($data['news'])) {
        throw new PageNotFoundException('Cannot find blog: ' . $slug);
    }

    $model->delete($data['news']['id']);

    $data['title'] = $data['news']['title'];

    return view('templates/header', $data)
        . view('news/delete_success')
        . view('templates/footer');
}



	
}

	

	
	
	
	
	
	


	

