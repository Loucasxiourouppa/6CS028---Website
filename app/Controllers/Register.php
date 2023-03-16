<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',
            array(
                'required' => 'Please enter a username',
                'is_unique' => 'This username is already taken'
            )
        );
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',
            array(
                'required' => 'Please enter your email address',
                'valid_email' => 'Please enter a valid email address',
                'is_unique' => 'This email is already registered'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',
            array(
                'required' => 'Please enter a password',
                'min_length' => 'Password must be at least 6 characters long'
            )
        );
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]',
            array(
                'required' => 'Please confirm your password',
                'matches' => 'Passwords do not match'
            )
        );

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('register');
        }
        else
        {
            $this->user_model->create_user();
            redirect('login');
        }
    }

}
