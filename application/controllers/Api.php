<?php
header("Access-Control-Allow-Origin : *");

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    function __construct()
    {
        parent:: __construct();
    }

    public function bookdevices_post()
    {
        $data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $this->device->insertBookedDevices($data);
    }

    function getLastBookingID_get()
    {
        $this->db->select_max('booking_id');
        $result = $this->db->get('bookings_tb')->row_array();
        echo json_decode($result['booking_id']);
    }

    /*START  -------------  CATEGORY TABLE*/
    function categories_get()
    {
        $data = $this->device->getCategory();
        echo json_encode($data);
    }

    /*END --------------- CATEGORY TABLE*/

    /*START -------------- DEVICES TABLE*/
    function devices_get()
    {
        $data = $this->device->getDevice();
        echo json_encode($data);
    }

    /*END ----------------- DEVICES TABLE */

    /*START ------------------  CALENDAR TABLE */
    function getAllBookedDevices_get()
    {
        $data = $this->calendar->getUnavailableDevices();
        echo json_encode($data);
    }

    public function addNewBookedDatesToDB_post()
    {
        $data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $this->calendar->addBookingDates($data);
    }

    /*END -------------- CALENDAR TABLE*/

    /*START --------------------- CONFIRMATION PAGE*/

    public function fetchCompletedBooking_get()
    {
        $booking_id = $this->input->get('id', TRUE);
        $this->db->select()->from('bookings_tb')->where('booking_id', $booking_id);
        $query = $this->db->get();
        echo json_encode($query->result_array());
    }

    /*END --------------------- CONFIRMATION PAGE*/

} //class Api extends REST_Controller


