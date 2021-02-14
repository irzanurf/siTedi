<?php

class M_JadwalPenelitian extends CI_Model
{
    public function get_jadwal()
    {
        return $this->db->query ("SELECT * FROM jadwal_penelitian ORDER BY id DESC");
        
    }

    public function get_last_jadwal()
    {
        return $this->db->query("SELECT * FROM jadwal_penelitian ORDER BY id DESC LIMIT 1");
        
    }

    public function get_jadwalPenelitian()
    {
        return $this->db->query("SELECT id FROM jadwal_penelitian ORDER BY id DESC LIMIT 1");
        
    }

    public function getwhere_jadwal(array $data)
    {
        return $this->db->get_where('jadwal_penelitian', $data);
    }

    public function insert_jadwal($data){
        $this->db->insert('jadwal_penelitian',$data);
    }

    public function update_jadwal($data,$idKomp)
    {
        $this->db->where('id',$idKomp);
        $this->db->update('jadwal_penelitian',$data);
    }

    public function hapus_jadwal($data)
    {
        $query = $this->db->delete('jadwal_penelitian',$data);
        return $query;
    }

}