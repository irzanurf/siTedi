<?php

class M_PropPenelitian extends CI_Model
{
    public function insert_proposal($prop)
    {
        $this->db->insert('proposal_penelitian',$prop);
        return $this->db->insert_id();
    }

    public function insert_monev($prop)
    {
        $this->db->insert('laporan_monev_penelitian',$prop);
        return $this->db->insert_id();
    }

    public function insert_akhir($prop)
    {
        $this->db->insert('laporan_akhir_penelitian',$prop);
        return $this->db->insert_id();
    }


    public function get_proposal()
    {
        return $this->db->get('proposal_penelitian');
    }

    public function getwhere_proposal(array $data)
    {
        return $this->db->get_where('proposal_penelitian',$data);
    }

    public function get_viewpenelitian()
    {
        $query = $this->db->select('*')
                        ->from('proposal_penelitian')
                        ->get();
        return $query;
    }

    public function getwhere_viewpenelitian(array $data)
    {
        $query = $this->db->select('proposal_penelitian.*,jenispenelitian.jenis as jenis')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }
    
    public function update_prop($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('proposal_penelitian', $data);
    }
    public function dosen($data_dosen)
    {
        $this->db->insert_batch('dsn_penelitian', $data_dosen);
    }
    
    public function mahasiswa($data_mahasiswa)
    {
        $this->db->insert_batch('mhs_penelitian', $data_mahasiswa);
    }
    
    public function update_monev($data,$id)
    {
        $query = $this->db->query("SELECT * FROM laporan_monev_penelitian WHERE id_proposal = '$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('laporan_monev_penelitian', $data);
        }
        else{
            $this->db->where('id_proposal', $id);
            $this->db->update('laporan_monev_penelitian', $data);  
        }          
    }

    public function get_viewmonev()
    {
        $query = $this->db->select('*')
                        ->from('laporan_monev_penelitian')
                        ->get();
        return $query;
    }

    public function status_monev($id,array $data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('laporan_monev_penelitian', $data);
    }

    public function status_akhir($id,array $data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('laporan_akhir_penelitian', $data);
    }

    public function getwhere_viewmonev(array $data)
    {
        $query = $this->db->select('proposal_penelitian.*,jenispenelitian.jenis as jenis,laporan_monev_penelitian.file1,laporan_monev_penelitian.status as status_monev')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('laporan_monev_penelitian','proposal_penelitian.id=laporan_monev_penelitian.id_proposal','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function get_viewakhir()
    {
        $query = $this->db->select('*')
                        ->from('laporan_akhir_penelitian')
                        ->get();
        return $query;
    }

    public function getwhere_viewakhir(array $data)
    {
        $query = $this->db->select('proposal_penelitian.*,jenispenelitian.jenis as jenis,laporan_akhir_penelitian.file1,laporan_akhir_penelitian.status as status_monev')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('laporan_akhir_penelitian','proposal_penelitian.id=laporan_akhir_penelitian.id_proposal','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function update_akhir($data,$id)
    {
        $query = $this->db->query("SELECT * FROM laporan_akhir_penelitian WHERE id_proposal = '$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('laporan_akhir_penelitian', $data);
        }
        else{
            $this->db->where('id_proposal', $id);
            $this->db->update('laporan_akhir_penelitian', $data);  
        }          
    }

    public function get_viewAnnouncement()
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.nama as nama, dosen.program_studi as program_studi')
                        ->from('proposal_penelitian')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->where('proposal_penelitian.status > 1')
                        ->where('proposal_penelitian.status < 5')
                        ->get();
        return $query;
    }

    public function get_viewListProp()
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.nama as nama, dosen.program_studi as program_studi')
                        ->from('proposal_penelitian')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->get();
        return $query;
    }

}