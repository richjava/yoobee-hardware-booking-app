<?php


class Device extends CI_Model
{

    public function insertBookedDevices($data)/*insert selected devices for one booking in selected devices table*/
    {
        $this->db->insert('selected_devices_tb', $data);
    }

    public function getCategory()
    {
        $this->db->select()->from('categories_tb');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getDevice()
    {
        $this->db->select()->from('devices_tb');
        $query = $this->db->get();
        return $query->result_array();
    }
}
