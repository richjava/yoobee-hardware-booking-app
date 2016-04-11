<?php class Student extends CI_Model
{
    public function insert_student($data){
        $this->db->insert('students_tb',$data);
        return $this->db->insert_id();
    }
}
