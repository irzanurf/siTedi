<?php

class M_Jenisp extends CI_Model
{
    public function get_jenispenelitian()
    {
        $query = $this->db->select('*')
                        ->from('jenispenelitian')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
    }
    
    
}