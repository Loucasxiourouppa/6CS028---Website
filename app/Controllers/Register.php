<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }
 
    public function index() 
    {
        $data['title'] = 'Register';
        $this->load->view('templates/header', $data);
        $this->load->view('register');
        $this->load->view('templates/footer');
    }
 
    public function register_user() 
    {
        // validate form input
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');
 
        if ($this->form_validation->run() == false) {
            // validation failed, show registration form again
            $data['title'] = 'Register';
            $this->load->view('templates/header', $data);
            $this->load->view('register');
            $this->load->view('templates/footer');
        } else {
            // validation succeeded, insert user data into database
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                // add any other user data you want to insert into the database
            );
            $this->User_model->insert_user($data);
            redirect('login');
        }
    }
}

