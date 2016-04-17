<?php


class Device extends CI_Model
{

    public function insert_selected_devices($data)/*insert selected deviced for one booking in selected devices table*/
    {
        $this->db->insert('selected_devices_tb', $data);
        return $this->db->insert_id();
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
