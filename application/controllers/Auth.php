<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }


    public function register()
    {
        $data['errors'] = 0;
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'trim|required|min_length[3]|is_unique[students_tb.username]'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[5]'
                ),
                array(
                    'field' => 'password_confirm',
                    'label' => 'Password Confirm',
                    'rules' => 'trim|required|min_length[5]|matches[password]'
                ),
                array(
                    'field' => 'fullname',
                    'label' => 'Fullname',
                    'rules' => 'trim|required|min_length[3]'
                ),
                array(
                    'field' => 'address',
                    'label' => 'Address',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'phone',
                    'label' => 'Phone number',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|is_unique[students_tb.email]|valid_email'
                )
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $data['errors'] = validation_errors();
            } else {
                $data = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'fullname' => $_POST['fullname'],
                    'address' => $_POST['address'],
                    'phone' => $_POST['phone'],
                    'email' => $_POST['email']
                );
                $student_id = $this->student->insert_student($data);
                $this->session->set_userdata('student_id', $student_id);
                redirect(base_url() . 'auth');
            }
        }
        $this->load->view('header');
        $this->load->view('register', $data);
        $this->load->view('footer');
    }

}
