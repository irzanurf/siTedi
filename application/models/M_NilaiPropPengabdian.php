<?php

class M_NilaiPropPengabdian extends CI_Model
{

    public function getwhere_nilai(array $data)
    {
        return $this->db->get_where('nilai_proposal_pengabdian',$data);
    }

    
    public function update_nilai($id,array $data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('nilai_proposal_pengabdian', $data);
    }

    public function insert_nilai($data)
    {
        $this->db->insert('nilai_proposal_pengabdian',$data);
    }

    
}