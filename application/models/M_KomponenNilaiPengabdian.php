<?php

class M_KomponenNilaiPengabdian extends CI_Model
{
    public function getwhere_komponen(array $data)
    {
        return $this->db->get_where('komponen_nilai_pengabdian', $data);
    }

    public function getwhere_skema(array $data)
    {
        return $this->db->get_where('skema_pengabdian', $data);
    }
    
    public function get_komponen()
    {
        return $this->db->get('komponen_nilai_pengabdian');
        
    }

    public function get_nilaikomponen(array $data)
    {
        $query = $this->db->select('komponen_nilai_pengabdian.*, detail_nilai_proposal_pengabdian.skor as skor, detail_nilai_proposal_pengabdian.nilai as nilai, proposal_pengabdian.id as id_proposal')
                        ->from('komponen_nilai_pengabdian')
                        ->join('proposal_pengabdian','komponen_nilai_pengabdian.id_skema_pengabdian=proposal_pengabdian.id_skema','inner')
                        ->join('detail_nilai_proposal_pengabdian','proposal_pengabdian.id=detail_nilai_proposal_pengabdian.id_proposal and komponen_nilai_pengabdian.id=detail_nilai_proposal_pengabdian.id_komponen_nilai','left')
                        ->where($data)
                        ->get();
        return $query;
        
    }

    public function get_nilaikomponenProp($id,$data)
    {
        return $this->db->query("SELECT * FROM detail_nilai_proposal_pengabdian WHERE id_proposal=$id AND reviewer='$data' ORDER BY id_komponen_nilai ASC");
    }

    public function insert_komponen($data){
        $this->db->insert('komponen_nilai_pengabdian',$data);
    }

    public function update_komponen($data,$idKomp)
    {
        $this->db->where('id',$idKomp);
        $this->db->update('komponen_nilai_pengabdian',$data);
    }

    public function hapus_komponen($data)
    {
        $query = $this->db->delete('komponen_nilai_pengabdian',$data);
        return $query;
    }
    
    public function update_judul($judul, $id_skema)
    {
        $this->db->where('id',$id_skema);
        $this->db->update('skema_pengabdian',$judul);
    }
    
}