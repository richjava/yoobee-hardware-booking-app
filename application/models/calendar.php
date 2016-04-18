<?php

class Calendar extends CI_Model
{

    function getDates()
    {
        $this->db->select('devices_name')->from('devices_tb');
        $this->db->select('start_date', 'end_date')->from('bookings_tb');

        $this->db->select('selected_devices_id')->from('selected_devices_tb');
        $this->db->join('booking_tb', 'comments.id = blogs.id');

        $query = $this->db->get();


        $this->db->select()->from('devices_tb');
        $query = $this->db->get();
        return $query->result_array();

    }

    /*getting device names and start dates and end dates from db to write onto calendar*/
    function devicesToCalendar()
    {

        $this->db->select('device_name,start_date,end_date');
        $this->db->from('bookings_tb');
        $this->db->join('selected_devices_tb', 'selected_devices_tb.booking_id = bookings_tb.booking_id');
        $this->db->join('devices_tb', 'devices_tb.device_id = selected_devices_tb.device_id');
        $query = $this->db->get();
        return $query->result_array();

    }

}
