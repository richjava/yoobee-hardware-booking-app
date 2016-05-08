<?php

class Calendar extends CI_Model
{

    /*getting device names and start dates and end dates from db to write onto calendar*/
    function unavailableDevices($id) /*$id is the booking id for the current booking*/
    {
        $this->db->select('booking_id,start_date,end_date')->from('selected_devices_tb_tb');
        $this->db->join('bookings_tb', 'selected_devices_tb.device_id = ' . $id);
//        $this->db->group_by('selected_devices_id');
        $query = $this->db->get();
        return $query->result_array();

    }

    function addBookingDates($data)
    {
        $this->db->insert('bookings_tb', $data);
        return $this->db->insert_id();
    }

}
