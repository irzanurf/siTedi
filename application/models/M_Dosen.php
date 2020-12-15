<?php

class M_Dosen extends CI_Model
{
    public function getwhere_dosen(array $data)
    {
        return $this->db->get_where('dosen', $data);
    }
    
    public function get_dosen()
    {
        return $this->db->get('dosen');
        
    }

    public function getwhere_dosenpengabdian(array $data)
    {
        return $this->db->get_where('dsn_pengabdian', $data);
    }

    public function delete_dosenpengabdian($id){
        $this->db->where($id);
        $this->db->delete('dsn_pengabdian');
    }

    public function getwhere_dosenpenelitian(array $data)
    {
        return $this->db->get_where('dsn_penelitian', $data);
    }

    public function get_nip(array $data)
    {
        $query = $this->db->select('nip')
                        ->from('proposal_penelitian')
                        ->where($data)
                        ->get();
        return $query;
    }
    
    
}