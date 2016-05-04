<?php

class Calendar extends CI_Model
{

    /*getting device names and start dates and end dates from db to write onto calendar*/
    function getUnavailableDevices($id)
    {
        $this->db->select('device_name,start_date,end_date');
        $this->db->from('bookings_tb');
        $this->db->join('selected_devices_tb', 'selected_devices_tb.booking_id = ' . $id);
        $this->db->join('devices_tb', 'devices_tb.device_id = selected_devices_tb.device_id');
        $query = $this->db->get();
        return $query->result_array();

    }

    function addBookingDates($data)
    {
        $this->db->insert('bookings_tb', $data);
        return $this->db->insert_id();
    }

}
