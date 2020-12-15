<?php

class M_SkemaPenelitian extends CI_Model
{
    public function get_skemapenelitian()
    {
        $query = $this->db->select('*')
                        ->from('jenispenelitian')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
        
    }

    public function insert_skema($data)
    {
        $this->db->insert('jenispenelitian',$data);
        return $this->db->insert_id();
    }

    public function hapus_skema($data)
    {
        $query = $this->db->delete('jenispenelitian',$data);
        return $query;
    }
    
}