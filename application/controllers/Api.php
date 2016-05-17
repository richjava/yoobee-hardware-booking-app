<?php
header("Access-Control-Allow-Origin : *");

//require APPPATH . '/libraries/REST_Controller.php';

class Api extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
    }

    public function createNewBooking()
    {
        $this->db->select('student_id')->from('students_tb')->where('username', $this->session->userdata('username'));
        $query = $this->db->get();
        $student = $query->result_array();
        $booking = array(
            'student_id' => $student[0]['student_id'],
            'status' => 'PENDING'
        );
        $this->db->insert('bookings_tb', $booking);
        echo json_decode($this->db->insert_id());
    }


    public function addDevices()
    {

        $input_data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $booking['booking_id'] = filter_var($input_data[0]->booking_id, FILTER_SANITIZE_STRING);
        $this->db->select('booking_id')->from('selected_devices_tb')->where('booking_id', $booking['booking_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $this->db->where('booking_id', $booking['booking_id']);
            $this->db->delete('selected_devices_tb');
            foreach ($input_data as $data) {
                $this->db->insert('selected_devices_tb', $data);
            }
        } else {
            foreach ($input_data as $data) {
                $this->db->insert('selected_devices_tb', $data);
            }
        }

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

    function getDevicesForBooking($id)
    {
        $this->db->select('device_id')->from('selected_devices_tb')->where('booking_id', $id);
        $query = $this->db->get();
        echo json_encode($query->result());
    }


    function getBookedDevices($id)
    {
//        $this->db->select('device_name,start_date,end_date')->from('selected_devices_tb');
//        $this->db->join('bookings_tb', 'selected_devices_tb.booking_id = bookings_tb.booking_id AND selected_devices_tb.booking_id !=' . $id);
//        $this->db->join('devices_tb', 'selected_devices_tb.device_id = devices_tb.device_id');
        $query = $this->db->query('SELECT d.device_id, d.device_name, b.start_date, b.end_date FROM bookings_tb b, devices_tb d, selected_devices_tb sd WHERE sd.device_id IN (SELECT d.device_id FROM bookings_tb b, devices_tb d, selected_devices_tb sd WHERE b.booking_id = sd.booking_id AND d.device_id = sd.device_id AND b.booking_id= "' . $id . '") AND b.booking_id = sd.booking_id AND d.device_id = sd.device_id AND b.booking_id != "' . $id . '";');
//        $result = $this->db->get()->result_array();
        echo json_encode($query->result_array());
    }

    public function addDates()
    {
        $input_data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $data['start_date'] = filter_var($input_data->start_date, FILTER_SANITIZE_STRING);
        $data['end_date'] = filter_var($input_data->end_date, FILTER_SANITIZE_STRING);
        $data['booking_id'] = filter_var($input_data->booking_id, FILTER_SANITIZE_STRING);
        $this->db->where('booking_id', $data['booking_id']);
        $this->db->update('bookings_tb', $data);
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
        $this->db->select('device_name,image_url');
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
//        $this->email->to($data[0]['email']); /*email is disabled for development*/
        $this->email->subject('Booking Confirmation');
        $this->email->message('<strong>This is Yoobee Hardware Booking confirmation email</strong>');
        $this->email->send();
        $this->email->clear();

        $data = array(
            'status' => 'Awaiting Collection'
        );
        $this->db->where('booking_id', $booking_id);
        $this->db->update('bookings_tb', $data);
    }

    /*END --------------------- EMAIL*/


    function updateStudentDetails()
    {
        $input_data = json_decode(trim(file_get_contents('php://input')));/*Convert Object to array*/
        $data['fullname'] = filter_var($input_data->fullname, FILTER_SANITIZE_STRING);
        $data['address'] = filter_var($input_data->address, FILTER_SANITIZE_STRING);
        $data['phone'] = filter_var($input_data->phone, FILTER_SANITIZE_STRING);
        $data['email'] = filter_var($input_data->email, FILTER_SANITIZE_STRING);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('students_tb', $data);
    }

    function getAllBookingDetails()
    {
        $this->db->select('student_id')->from('students_tb')->where('username', $this->session->userdata('username'));
        $id = $this->db->get();
        $student = $id->result_array();
        $this->db->select('booking_id,date_created,start_date,end_date,status')->from('bookings_tb');
        $this->db->join('students_tb', 'students_tb.student_id = ' . $student[0]['student_id']);
        $query = $this->db->get();
        echo json_encode($query->result_array());
    }

    function editBooking($id)
    {
        $this->db->select('device_id')->from('selected_devices_tb')->where('booking_id', $id);
        $query = $this->db->get()->result_array();
        echo json_encode($query);
    }

    function editDates($id)
    {
        $this->db->select('start_date,end_date')->from('bookings_tb')->where('booking_id', $id);
        $query = $this->db->get()->result_array();
        echo json_encode($query);
    }



    function deleteBooking($id)
    {
        $this->db->where('booking_id', $id);
        $this->db->delete('bookings_tb');

        $this->db->where('booking_id', $id);
        $this->db->delete('selected_devices_tb');
    }

} //class Api extends CI_Controller


