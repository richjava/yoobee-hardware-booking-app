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
        $this->db->select()->from('categories_tb');
        $query = $this->db->get();
        /*returns the query result as a pure array*/
//        foreach ($query->result_array() as $row)
//        {
//            echo $row['category_id'];
//            echo $row['category_name'];
//        }
        /*returns the query result as an array of objects*/
        foreach ($query->result() as $row) {
            echo $row->category_name;
        }
    }

    function devices_get()
    {
        $this->db->select();
        $this->db->from('devices_tb');
        $query = $this->db->get();
        /*returns the query result as an array of objects*/
        foreach ($query->result() as $row) {
            echo $row->device_name;
            echo $row->description;
        }
    }

} //class Api extends REST_Controller


