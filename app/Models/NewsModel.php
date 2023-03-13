<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
	
	protected $allowedFields = ['title', 'slug', 'body'];

	public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
	
	public function deleteNews($slug)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('news');
		$builder->delete(['slug' => $slug]);	
	}
	
	
	
	
	
	public function search($search_query) {
	  $this->db->select('*');
	  $this->db->from('news');
	  $this->db->like('title', $search_query);
	  $this->db->or_like('content', $search_query);
	  $query = $this->db->get();
	  return $query->result_array();
	}
}



	
