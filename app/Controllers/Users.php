<?php

namespace App\Controllers;

class Users extends BaseController
{
    
    public function login()
	{
		return view('templates/header')
			  .view('users/login')
			  .view('templates/footer');
	}
    
	public function logout()
	{
		return view('users/logout');
	}
	
	public function info($user_id)
	{
		print ("This is an info page for user " . $user_id) ;
	}
}