<?php class Device extends CI_Model
{

    public function insert_device($data)
    {
        $this->db->insert('bookings_tb', $data);
        return $this->db->insert_id();
    }
}
