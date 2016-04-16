<?php
header("Access-Control-Allow-Origin : *");

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    function __construct()
    {
        parent:: __construct();
    }

    public function createBooking_post()
    {

//        $data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $data = $this->input->post();
        $this->device->insert_device($data);
    }
} //class Api extends REST_Controller


