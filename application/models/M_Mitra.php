<?php

class M_Mitra extends CI_Model
{
    public function insert_mitra($data){
        $this->db->insert('mitra',$data);
        return $this->db->insert_id();
    }
    
    public function get_mitra()
    {
        return $this->db->get('mitra');
    }

    public function checkUserexist($userName) {
        return $this->db->get_where('mitra', ['username' => $userName])->num_rows();
    }

    public function getwhere_mitra(array $data)
    {
        return $this->db->get_where('mitra',$data);
    }

    public function update_mitra($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('mitra', $data);
    }

    public function delete_mitra($id){
        $this->db->where($id);
        $this->db->delete('mitra');
    }
}