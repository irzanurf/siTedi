<?php

class M_Mahasiswa extends CI_Model
{
    public function get_mahasiswa()
    {
        return $this->db->get('mahasiswa');
        
    }

    public function getwhere_mahasiswa(array $data)
    {
        return $this->db->get_where('mahasiswa', $data);
    }

    public function getwhere_mahasiswapengabdian(array $data)
    {
        return $this->db->get_where('mhs_pengabdian', $data);
    }
    public function delete_mahasiswapengabdian($id){
        $this->db->where($id);
        $this->db->delete('mhs_pengabdian');
    }

    public function getwhere_mahasiswapenelitian(array $data)
    {
        return $this->db->get_where('mhs_penelitian', $data);
    }
    
}