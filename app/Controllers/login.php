<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->user_model->get_user($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $user_data = array(
                        'user_id' => $user['id'],
                        'email' => $email,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('login_failed', 'Invalid email or password');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('login_failed', 'Invalid email or password');
                redirect('login');
            }
        }
    }
}
