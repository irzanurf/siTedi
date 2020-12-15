<?php

class M_KomponenNilaiPenelitian extends CI_Model
{
    public function getwhere_komponen(array $data)
    {
        return $this->db->get_where('komp_penilaian_penelitian', $data);
    }

    public function getwhere_skema(array $data)
    {
        return $this->db->get_where('jenispenelitian', $data);
    }
    
    public function get_komponen()
    {
        return $this->db->get('komp_penilaian_penelitian');
        
    }

    public function insert_komponen($data){
        $this->db->insert('komp_penilaian_penelitian',$data);
    }

    public function hapus_komponen($data)
    {
        $query = $this->db->delete('komp_penilaian_penelitian',$data);
        return $query;
    }
    
    public function update_komponen($data,$idKomp)
    {
        $this->db->where('id',$idKomp);
        $this->db->update('komp_penilaian_penelitian',$data);
    }

    public function update_judul($judul, $id_skema)
    {
        $this->db->where('id',$id_skema);
        $this->db->update('jenispenelitian',$judul);
    }
    
}