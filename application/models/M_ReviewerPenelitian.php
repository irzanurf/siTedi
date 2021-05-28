<?php

class M_ReviewerPenelitian extends CI_Model
{
    public function getwhere_reviewer(array $data)
    {
        return $this->db->get_where('reviewer_penelitian', $data);
    }

    public function getwhere_assignment(array $data)
    {
        return $this->db->get_where('assign_proposal_penelitian',$data);
    }

    public function getwhere_nilai(array $data)
    {
        return $this->db->get_where('nilai_proposal_penelitian', $data);
    }

    public function update_detailnilai($id_detail,$detail)
    {
        $this->db->where('id',$id_detail);
        $this->db->update('nilai_penelitian', $detail);
    }

    public function insert_nilaiprop($data)
    {
        $this->db->insert('nilai_proposal_penelitian',$data);
    }

    public function update_nilaiprop($id,array $data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('nilai_proposal_penelitian', $data);
    }

    public function get_reviewer()
    {
        return $this->db->get('reviewer_penelitian');
        
    }


    public function getwhere_penilaian(array $data)
    {
        $query = $this->db->select('assign_proposal_penelitian.*,proposal_penelitian.id,proposal_penelitian.id_jenis,proposal_penelitian.status,proposal_penelitian.tgl_upload,proposal_penelitian.judul,nilai_proposal_penelitian.nilai,nilai_proposal_penelitian.nilai2,jenispenelitian.jenis as jenis,jenispenelitian.id as id_jenis')
                        ->from('proposal_penelitian')
                        ->join('nilai_proposal_penelitian','nilai_proposal_penelitian.id_proposal=proposal_penelitian.id','left')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('assign_proposal_penelitian','proposal_penelitian.id=assign_proposal_penelitian.id_proposal','left')
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }
    public function getwhere_monev(array $data)
    {
        $query = $this->db->select('assign_proposal_penelitian.*,nilai_proposal_penelitian.cr_monev,nilai_proposal_penelitian.cr_monev2,proposal_penelitian.id,proposal_penelitian.id_jenis,proposal_penelitian.status,proposal_penelitian.tgl_upload,proposal_penelitian.judul,nilai_proposal_penelitian.nilai,nilai_proposal_penelitian.nilai2,jenispenelitian.jenis as jenis,jenispenelitian.id as id_jenis,jadwal_penelitian.tgl_akhir')
                        ->from('proposal_penelitian')
                        ->join('nilai_proposal_penelitian','nilai_proposal_penelitian.id_proposal=proposal_penelitian.id','left')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('jadwal_penelitian','proposal_penelitian.id_jadwal=jadwal_penelitian.id','inner')
                        ->join('assign_proposal_penelitian','proposal_penelitian.id=assign_proposal_penelitian.id_proposal','left')
                        ->order_by("tgl_upload", "desc")
                        ->where('status >','2')
                        ->get();
        return $query;
    }

    public function get_excel_reviewer($data)
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.nama as nama')
                        ->from('proposal_penelitian')
                        ->join('assign_proposal_penelitian','proposal_penelitian.id=assign_proposal_penelitian.id_proposal','inner')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function get_monev(array $data)
    {
        return $this->db->get_where('laporan_monev_penelitian',$data);
    }

    public function get_akhir(array $data)
    {
        return $this->db->get_where('laporan_akhir_penelitian',$data);
    }

    public function get_komponen(array $data)
    {
        return $this->db->get_where('komp_penilaian_penelitian',$data);
    }

    public function get_nilai(array $data)
    {
        $query = $this->db->select('komp_penilaian_penelitian.*, nilai_penelitian.skor as skor, nilai_penelitian.nilai as nilai, proposal_penelitian.id as id_proposal')
                        ->from('komp_penilaian_penelitian')
                        ->join('proposal_penelitian','komp_penilaian_penelitian.id_jenis=proposal_penelitian.id_jenis','inner')
                        ->join('nilai_penelitian','proposal_penelitian.id=nilai_penelitian.id_proposal and komp_penilaian_penelitian.id=nilai_penelitian.id_komponen','left')
                        ->where($data)
                        ->get();
        return $query;
    }


    public function get_nilaiProp($id,$data)
    {
        // $condition="id_proposal='$id' AND reviewer='$data'";
        // $query = $this->db->select('*')
        //                 ->from('nilai_penelitian')
        //                 ->where($condition)
        //                 ->order_by("id_komponen", "asc")
        //                 ->get();
        // return $query;
        
        return $this->db->query("SELECT * FROM nilai_penelitian WHERE id_proposal=$id AND reviewer='$data' ORDER BY id_komponen ASC");
    }


    public function insert_detailnilai($data)
    {
        $this->db->insert('nilai_penelitian',$data);
    }

    public function update_nilai($id,$data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('nilai_proposal_penelitian',$data);
    }

    public function update_monev($id,$data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('nilai_proposal_penelitian',$data);
    }
    
    public function status_nilai($id,array $data)
    {
        $this->db->where('id_proposal',$id);
        $this->db->update('nilai_proposal_penelitian', $data);
    }

    public function getwhere_proposal(array $data)
    {
        return $this->db->get_where('proposal_penelitian',$data);
    }

    public function getwhere_cr(array $data)
    {
        return $this->db->get_where('nilai_proposal_penelitian',$data);
    }

    public function getwhere_detailnilai(array $data)
    {
        return $this->db->get_where('nilai_penelitian',$data);
    }
}