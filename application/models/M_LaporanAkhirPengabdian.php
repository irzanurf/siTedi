<?php

class M_LaporanAkhirPengabdian extends CI_Model
{
    public function insert_laporan($data){
        $this->db->insert('laporan_akhir_pengabdian',$data);
        return $this->db->insert_id();
    }
    
    public function get_laporan()
    {
        return $this->db->get('laporan_akhir_pengabdian');
    }

    public function getwhere_laporan(array $data)
    {
        return $this->db->get_where('laporan_akhir_pengabdian',$data);
    }

    public function update_laporan($id,array $data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('laporan_akhir_pengabdian', $data);
    }
}