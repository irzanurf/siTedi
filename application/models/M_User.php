<?php

class M_User extends CI_Model
{
    public function insert_user($data)
    {
        $this->db->insert('user',$data);
    }

    public function delete_user($data)
    {
        $this->db->where($data);
        $this->db->delete('user');
    }
    
}