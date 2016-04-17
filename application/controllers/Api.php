<?php
header("Access-Control-Allow-Origin : *");

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    function __construct()
    {
        parent:: __construct();
    }

    public function bookings_post()
    {
        $data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $this->device->insert_selected_devices($data);
    }

    function booking_id_get()
    {
        $this->db->select('booking_id')->from('Bookings_tb');
        $query = $this->db->get();
        echo $query->num_rows();
    }

    function categories_get()
    {
        $data = $this->device->getCategory();
        echo json_encode($data);
    }

    function devices_get()
    {
        $data = $this->device->getDevice();
        echo json_encode($data);
    }

    function getDates()
    {

    }

} //class Api extends REST_Controller


