<?php
header("Access-Control-Allow-Origin : *");

//require APPPATH . '/libraries/REST_Controller.php';

class Api extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
    }

    public function bookdevices()
    {
        $data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $this->device->insertBookedDevices($data);
    }

    function getBookingID()
    {
        $this->db->select_max('booking_id');
        $result = $this->db->get('bookings_tb')->row_array();
        echo json_decode($result['booking_id']);
    }

    /*START  -------------  CATEGORY TABLE*/
    function categories()
    {
        $data = $this->device->getCategory();
        echo json_encode($data);
    }

    /*END --------------- CATEGORY TABLE*/

    /*START -------------- DEVICES TABLE*/
    function devices()
    {
        $data = $this->device->getDevice();
        echo json_encode($data);
    }

    /*END ----------------- DEVICES TABLE */

    /*START ------------------  CALENDAR TABLE */
    function getAllBookedDevices()
    {
        $data = $this->calendar->getUnavailableDevices();
        echo json_encode($data);
    }

    public function addNewBookedDates()
    {
        $data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
//        $this->calendar->addBookingDates($data);
        $this->db->insert('bookings_tb', $data);
    }

    /*END -------------- CALENDAR TABLE*/

    /*START --------------------- CONFIRMATION PAGE*/

    public function getBookingDetails($id)
    {
        $this->db->select()->from('bookings_tb')->where('booking_id', $id);
        $query = $this->db->get();
        echo json_encode($query->result());
    }

    /*END --------------------- CONFIRMATION PAGE*/

    /*START --------------------- current student booking details*/

    public function getStudentDetails()
    {
        $this->db->select('')->from('students_tb')->where('username', $this->session->userdata('username'));
        $query = $this->db->get();
        echo json_encode($query->result());
    }

    /*END --------------------- current student booking details*/

    /*START --------------------- get booked devices from DB*/

    public function getBookedDevicesDetails($id)
    {
        $this->db->select('device_name');
        $this->db->from('selected_devices_tb')->where('booking_id', $id);
        $this->db->join('devices_tb', 'selected_devices_tb.device_id = devices_tb.device_id');
        $query = $this->db->get();
        echo json_encode($query->result_array());
    }

    /*END --------------------- get booked devices from DB*/


    /*START --------------------- EMAIL*/
    function sendEmail($id, $booking_id)
    {
        $data = $this->student->email($id);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('sales@ebazaar.nz', 'Beshad Ghorbani');
        $this->email->to($data[0]['email']);
        $this->email->subject('Booking Confirmation');
        $this->email->message('<strong>This is Yoobee Hardware Booking confirmation email</strong>');
        $this->email->send();
        $this->email->clear();

        $data = array(
            'student_id' => $id,
            'status' => 'AWAITING COLLECTION'
        );
        $this->db->where('booking_id', $booking_id);
        $this->db->update('bookings_tb', $data);


    }
    /*END --------------------- EMAIL*/


} //class Api extends REST_Controller


