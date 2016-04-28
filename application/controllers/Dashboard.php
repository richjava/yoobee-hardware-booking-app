<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function bookings()
    {
        if ($this->session->userdata('username')) { /*check if student is loggd in or not, redirect to login page if not*/
            $this->load->view('header', (object)array('js_files' => array(), 'css_files' => array()));
            $crud = new grocery_CRUD();
            $crud->set_table('bookings_tb');
            $crud->set_relation('student_id', 'students_tb', 'fullname');
            $crud->set_subject(' Booking');
            $crud->columns('booking_id', 'student_id', 'start_date', 'end_date', 'status');
            $output = $crud->render();
            $this->load->view('dashboard/categories', $output);
            $this->load->view('footer');
        } else {
            redirect(base_url() . 'auth');
        }
    }

    public function categories()
    {
        if ($this->session->userdata('username')) { /*check if student is loggd in or not, redirect to login page if not*/
            $this->load->view('header', (object)array('js_files' => array(), 'css_files' => array()));
            $crud = new grocery_CRUD();
            $crud->set_table('categories_tb');
            $crud->set_subject(' Device Category');
            $output = $crud->render();
            $this->load->view('dashboard/categories', $output);
            $this->load->view('footer');
        } else {
            redirect(base_url() . 'auth');
        }
    }

    public function devices()
    {
        if ($this->session->userdata('username')) { /*check if student is loggd in or not, redirect to login page if not*/
            $this->load->view('header', (object)array('js_files' => array(), 'css_files' => array()));
            $crud = new grocery_CRUD();
            $crud->set_table('devices_tb');
            $crud->set_relation('category_id', 'categories_tb', 'category_name');
            $crud->display_as('category_id', 'Category');
            $crud->set_subject(' Device');
            $crud->set_field_upload('image_url', 'assets/uploads/files');
            $crud->display_as('image_url', 'Image');
            $crud->columns('image_url', 'device_name', 'description', 'category');
            $output = $crud->render();
            $this->load->view('dashboard/devices', $output);
            $this->load->view('footer');
        } else {
            redirect(base_url() . 'auth');
        }
    }

    public function students()
    {
        if ($this->session->userdata('username')) { /*check if student is loggd in or not, redirect to login page if not*/
            $this->load->view('header', (object)array('js_files' => array(), 'css_files' => array()));
            $crud = new grocery_CRUD();
            $crud->set_table('students_tb');
            $crud->set_relation('programme_id', 'programmes_tb', 'programme_name');
            $crud->display_as('programme_id', 'Programme');
            $crud->set_subject(' Student');
            $output = $crud->render();
            $this->load->view('dashboard/students', $output);
            $this->load->view('footer');
        } else {
            redirect(base_url() . 'auth');
        }
    }

    public function programmes()
    {
        if ($this->session->userdata('username')) { /*check if student is loggd in or not, redirect to login page if not*/
            $this->load->view('header', (object)array('js_files' => array(), 'css_files' => array()));
            $crud = new grocery_CRUD();
            $crud->set_table('programmes_tb');
            $crud->set_subject(' Programme');
            $output = $crud->render();
            $this->load->view('dashboard/programmes', $output);
            $this->load->view('footer');
        } else {
            redirect(base_url() . 'auth');
        }

    }
}

