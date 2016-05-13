<?php


class Device extends CI_Model
{

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
