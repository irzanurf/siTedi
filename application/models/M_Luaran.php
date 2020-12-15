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
    
}