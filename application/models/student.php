<?php class Student extends CI_Model
{
    function create_student($data)
    {
        $this->db->insert('students_tb', $data);
    }

    function login($username, $password, $type)
    {
        $where = array(
            'username' => $username,
            'password' => $password,
            'user_type' => $type
        );
        $this->db->select()->from('users')->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function register_student($data)
    {
        $this->db->insert('students_tb', $data);
        return $this->db->insert_id();
    }

}
