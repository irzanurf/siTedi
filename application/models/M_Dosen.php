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

    public function getwhere_dosenpengabdiannama(array $data)
    {
        $query = $this->db->select('dsn_pengabdian.*, dosen.*')
                        ->from('dsn_pengabdian')
                        ->join('dosen ','dsn_pengabdian.nip=dosen.nip','inner')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function getwhere_dosenpenelitiannama(array $data)
    {
        $query = $this->db->select('dsn_penelitian.*, dosen.*')
                        ->from('dsn_penelitian')
                        ->join('dosen ','dsn_penelitian.nip=dosen.nip','inner')
                        ->where($data)
                        ->get();
        return $query;
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