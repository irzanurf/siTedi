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

    public function getwhere_luaranpengabdian(array $data)
    {
        $query = $this->db->select('luaran_pengabdian.*, luaran_prop_pengabdian.*')
                        ->from('luaran_prop_pengabdian')
                        ->join('luaran_pengabdian','luaran_prop_pengabdian.id_luaran=luaran_pengabdian.id','inner')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function getwhere_luaranpenelitian(array $data)
    {
        $query = $this->db->select('luaran_penelitian.*, luaran_prop_penelitian.*')
                        ->from('luaran_prop_penelitian')
                        ->join('luaran_penelitian','luaran_prop_penelitian.id_luaran=luaran_penelitian.id','inner')
                        ->where($data)
                        ->get();
        return $query;
    }
    
}