<?php

class M_DetailNilaiProposalPengabdian extends CI_Model
{

    public function getwhere_detailnilai(array $data)
    {
        return $this->db->get_where('detail_nilai_proposal_pengabdian',$data);
    }

    
    public function update_detailnilai($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('detail_nilai_proposal_pengabdian', $data);
    }

    public function insert_detailnilai($data)
    {
        $this->db->insert('detail_nilai_proposal_pengabdian',$data);
    }

    
}