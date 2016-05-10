<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $data['error'] = 0;
        if ($_POST) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $student = $this->student->login($username, $password);
            if (!$student) {
                $data['error'] = 1;
            } else {
                $this->session->set_userdata('username', $student['username']);
                $this->db->select('role')->from('students_tb')->where('username', $student['username']);
                $query = $this->db->get();
                $user = $query->result_array();
                $this->session->set_userdata('role', $user[0]['role']);
                redirect(base_url() . 'home/#/booking');
            }
        }
        $this->load->view('header');
        $this->load->view('login', $data);
        $this->load->view('footer');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'auth');
    }


    public function register()
    {
        $data['errors'] = 0;
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'trim|required|xss_clean|min_length[3]|is_unique[students_tb.username]'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|xss_clean|min_length[5]'
                ),
                array(
                    'field' => 'password_confirm',
                    'label' => 'Password Confirm',
                    'rules' => 'trim|required|xss_clean|min_length[5]|matches[password]'
                ),
                array(
                    'field' => 'fullname',
                    'label' => 'Fullname',
                    'rules' => 'trim|required|xss_clean|min_length[3]'
                ),
                array(
                    'field' => 'address',
                    'label' => 'Address',
                    'rules' => 'trim|xss_clean|required'
                ),
                array(
                    'field' => 'phone',
                    'label' => 'Phone number',
                    'rules' => 'trim|xss_clean|required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|xss_clean|is_unique[students_tb.email]|valid_email'
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
