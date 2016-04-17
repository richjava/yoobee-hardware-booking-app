<?php


class Device extends CI_Model
{

    public function insert_selected_devices($data)/*insert selected deviced for one booking in selected devices table*/
    {
        $this->db->insert('selected_devices_tb', $data);
        return $this->db->insert_id();
    }

}
