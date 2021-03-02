<?php

class M_Luaran extends CI_Model
{
    public function get_luaran()
    {
        $query = $this->db->select('*')
                        ->from('luaran')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
        
    }

    public function get_luaran_penelitian()
    {
        $query = $this->db->select('*')
                        ->from('luaran_penelitian')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
        
    }

    public function get_luaran_pengabdian()
    {
        $query = $this->db->select('*')
                        ->from('luaran_pengabdian')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
        
    }

    public function delete_luaranpengabdian($id){
        $this->db->where($id);
        $this->db->delete('luaran_prop_pengabdian');
    }

    public function delete_luaranpenelitian($id){
        $this->db->where($id);
        $this->db->delete('luaran_prop_penelitian');
    }
    
}