<?php
header("Access-Control-Allow-Origin : *");
header('Content-Type: application/json');

class Api extends CI_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('device');
        json_decode(trim(file_get_contents('php://input')));
    }

    public function index()
    {
        $http_verb = $_SERVER['REQUEST_METHOD'];
        if ($http_verb == 'GET') {
            /*do this*/
        } else if ($http_verb == 'POST') {
            /*do this*/
        }
    }
}
