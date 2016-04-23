<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function index()
    {
        $this->_example_output((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function _example_output($output = null)
    {
        $this->load->view('example.php', $output);
    }

    public function students()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('students_tb');

        $output = $crud->render();


        $this->_example_output($output);


    }

    public function devices()
    {
        $crud = new grocery_CRUD();

        $crud->set_theme('bootstrap');
        $crud->set_table('devices_tb');
        $crud->columns('device_id', 'device_name', 'description', 'category_id');

        $output = $crud->render();

        $this->_example_output($output);
    }

}