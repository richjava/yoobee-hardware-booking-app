<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('username')) { /*check if student is loggd in or not, redirect to login page if not*/
            $this->load->view('header');
            $this->load->view('home');
            $this->load->view('footer');
        } else {
            redirect(base_url() . 'auth');
        }

    }
}
