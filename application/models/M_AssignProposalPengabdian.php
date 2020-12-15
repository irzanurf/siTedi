<?php

class M_AssignProposalPengabdian extends CI_Model
{
    public function insert_assignment($data){
        $this->db->insert('assign_proposal_pengabdian',$data);
        return $this->db->insert_id();
    }
    
    public function get_assignment()
    {
        return $this->db->get('assign_proposal_pengabdian');
    }

    public function getwhere_assignment(array $data)
    {
        return $this->db->get_where('assign_proposal_pengabdian',$data);
    }

    public function update_assignment($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('assign_proposal_pengabdian', $data);
    }

    public function update_reviewerAssign($id,array $data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('assign_proposal_pengabdian', $data);
    }
}