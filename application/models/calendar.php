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
    }

}