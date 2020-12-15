<?php

class M_ReviewerPengabdian extends CI_Model
{
    public function getwhere_reviewer(array $data)
    {
        return $this->db->get_where('reviewer_pengabdian', $data);
    }
    
    public function get_reviewer()
    {
        return $this->db->get('reviewer_pengabdian');
        
    }
    
    
}