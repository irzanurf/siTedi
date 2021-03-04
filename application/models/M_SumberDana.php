<?php

class M_SumberDana extends CI_Model
{
    public function get_sumberdana()
    {
        $query = $this->db->select('*')
                        ->from('sumberdana')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
        
    }

    public function getwhere_sumberdana(array $data)
    {
        return $this->db->get_where('sumberdana',$data);
    }
    


}