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

    public function checkUserexist($userName) {
        return $this->db->get_where('user', ['username' => $userName])->num_rows();
    }

    public function update_user($username,array $data)
    {
        $this->db->where('username',$username);
        $this->db->update('user', $data);
    }

    
}