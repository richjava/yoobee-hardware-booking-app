<?php class Student extends CI_Model
{

    public function insert_student($data){
        $this->db->insert('students_tb',$data);
        return $this->db->insert_id();
    }

    function login($username,$password){
        $where = array (
            'username' => $username,
            'password' => $password
        );
        $this->db->select()->from('students_tb')->where($where);
        $query=$this->db->get();
        return $query->first_row('array');
    }

    function email($id)
    {
        $this->db->select('email')->from('students_tb')->where('student_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
