<?php

class M_SkemaPengabdian extends CI_Model
{
    public function get_skemapengabdian()
    {
        $query = $this->db->select('*')
                        ->from('skema_pengabdian')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
        
    }

    public function getwhere_skemapengabdian(array $data)
    {
        return $this->db->get_where('skema_pengabdian',$data);
    }


    public function insert_skema($data)
    {
        $this->db->insert('skema_pengabdian',$data);
        return $this->db->insert_id();
    }

    public function hapus_skema($data)
    {
        $query = $this->db->delete('skema_pengabdian',$data);
        return $query;
    }
    
}