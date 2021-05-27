<?php

class M_AdminPenelitian extends CI_Model
{
    public function get_jadwal()
    {
        return $this->db->get('jadwal_penelitian');
    }

    public function insert_jadwal($data)
    {
        $this->db->insert('jadwal_penelitian',$data);
        return $this->db->insert_id();
    }

    public function insert_proposal($prop,$ketua,$judul,$jadwal)
    {
        $query = $this->db->query("SELECT * FROM proposal_penelitian WHERE nip = '$ketua' AND judul='$judul' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('proposal_penelitian',$prop);
        return $this->db->insert_id();
        }
        elseif (!empty($count)){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Judul telah ada dan dimasukkan oleh ketua yang sama</strong></div>');
            redirect("admin/penelitian/daftarPenelitian"."/".$jadwal);
        }   
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Mohon maaf terjadi masalah, tolong periksa kembali apakah ada judul yang sama</strong></div>');
            redirect("admin/penelitian/daftarPenelitian"."/".$jadwal);
        }
        
    }

    public function getwhere_viewAssign($data)
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.*, r1.nama as nama_reviewer1, r2.nama as nama_reviewer2')
                        ->from('proposal_penelitian')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        // ->join('nilai_proposal_penelitian ','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->join('assign_proposal_penelitian','proposal_penelitian.id=assign_proposal_penelitian.id_proposal','left')
                        ->join('reviewer_penelitian r1', 'assign_proposal_penelitian.reviewer=r1.nip','left')
                        ->join('reviewer_penelitian r2', 'assign_proposal_penelitian.reviewer2=r2.nip','left')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();

        return $query;
    }

    public function get_viewAssign()
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.*, r1.nama as nama_reviewer1, r2.nama as nama_reviewer2')
                        ->from('proposal_penelitian')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        // ->join('nilai_proposal_penelitian ','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->join('assign_proposal_penelitian','proposal_penelitian.id=assign_proposal_penelitian.id_proposal','left')
                        ->join('reviewer_penelitian r1', 'assign_proposal_penelitian.reviewer=r1.nip','left')
                        ->join('reviewer_penelitian r2', 'assign_proposal_penelitian.reviewer2=r2.nip','left')
                        ->get();

        return $query;
    }
    
    public function getwhere_reviewer(array $data)
    {
        
        $query = $this->db->select('reviewer_penelitian.*, dosen.*, ')
                        ->from('reviewer_penelitian')
                        ->join('dosen ','reviewer_penelitian.nip=dosen.nip','inner')
                        ->get();

        return $query;
    }

    public function check_reviewer(array $data)
    {
        
        $query = $this->db->get_where('reviewer_penelitian',$data);

        return $query;
    }

    public function insert_reviewer($data,$proposalid)
    {
        $query = $this->db->get_where('assign_proposal_penelitian',$proposalid);
        $result = $query->result_array();
        $count = count($result);
        if (empty($count)){
        $this->db->insert('assign_proposal_penelitian',$data);
        return $this->db->insert_id();
        }
        else{
            //nothing to do it
         } 
    }

    public function update_reviewer($data,$idProp)
    {
        $this->db->where('id_proposal',$idProp);
        $this->db->update('assign_proposal_penelitian',$data);
    }

    public function updaterole_reviewerpenelitian($nip,$role)
    {
        $this->db->where('username',$nip);
        $this->db->update('user',$role);
    }
    
    public function insert_reviewerpenelitian($data,$nip)
    {
        $query = $this->db->query("SELECT * FROM reviewer_penelitian WHERE nip = '$nip' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('reviewer_penelitian',$data);
            return $this->db->insert_id();
        }
        else{
           //nothing to do it
        }          
    }

    public function hapus_reviewerpenelitian($data)
    {
        $query = $this->db->delete('reviewer_penelitian',$data);
        return $query;
    }

    public function get_viewApproval($data)
    {
        $query = $this->db->select('nilai_proposal_penelitian.*, dosen.*, proposal_penelitian.*')
                        ->from('proposal_penelitian')
                        ->join('nilai_proposal_penelitian','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function approval($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('proposal_penelitian', $data);
    }
    
    public function getwhere_viewmonev($data)
    {
        $query = $this->db->select('proposal_penelitian.*,dosen.*,laporan_monev_penelitian.file1 as file1,laporan_monev_penelitian.file2 as file2,laporan_monev_penelitian.file3 as file3,laporan_monev_penelitian.catatan as catatan,laporan_monev_penelitian.status as stat,laporan_monev_penelitian.tgl_upload as tgl,nilai_proposal_penelitian.*')
                        ->from('proposal_penelitian')
                        ->join('laporan_monev_penelitian','proposal_penelitian.id=laporan_monev_penelitian.id_proposal','inner')
                        ->join('nilai_proposal_penelitian','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        ->where($data)
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
    }

    public function getwhere_viewakhir($data)
    {
        $query = $this->db->select('proposal_penelitian.*,dosen.*,laporan_akhir_penelitian.file1 as file1,laporan_akhir_penelitian.file2 as file2,laporan_akhir_penelitian.file3 as file3,laporan_akhir_penelitian.file4 as file4, laporan_akhir_penelitian.status as stat, laporan_akhir_penelitian.catatan as catatan,laporan_akhir_penelitian.tgl_upload as tgl')
                        ->from('proposal_penelitian')
                        ->join('laporan_akhir_penelitian','proposal_penelitian.id=laporan_akhir_penelitian.id_proposal','inner')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        ->where($data)
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
    }

    public function update_prop($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('proposal_penelitian', $data);
    }

    public function update_monev($id,array $data)
    {
        $query = $this->db->query("SELECT * FROM laporan_monev_penelitian WHERE id_proposal = '$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (!empty($count)){
            $this->db->where('id_proposal',$id);
            $this->db->update('laporan_monev_penelitian', $data);
        }
        else{
           //nothing to do it
        }   
        
    }

    public function update_akhir($id,array $data)
    {
        $query = $this->db->query("SELECT * FROM laporan_akhir_penelitian WHERE id_proposal = '$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (!empty($count)){
            $this->db->where('id_proposal',$id);
            $this->db->update('laporan_akhir_penelitian', $data);
        }
        else{
           //nothing to do it
        }   
    }

    public function get_viewPenelitian()
    {
        $query = $this->db->select('nilai_proposal_penelitian.*, proposal_penelitian.*,jenispenelitian.jenis as jenis,dosen.nama as nama_dosen, jadwal_penelitian.keterangan as ket')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->join('jadwal_penelitian','proposal_penelitian.id_jadwal=jadwal_penelitian.id', 'inner')
                        ->join('nilai_proposal_penelitian','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function get_wherePenelitian($data)
    {
        $query = $this->db->select('nilai_proposal_penelitian.*, proposal_penelitian.*,jenispenelitian.jenis as jenis,dosen.nama as nama_dosen, jadwal_penelitian.keterangan as ket')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->join('jadwal_penelitian','proposal_penelitian.id_jadwal=jadwal_penelitian.id', 'inner')
                        ->join('nilai_proposal_penelitian','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }


    public function getwhere_assignment(array $data)
    {
        return $this->db->get_where('assign_proposal_penelitian',$data);
    }

    public function get_luaran(){
        $query = $this->db->select('*')
                        ->from('luaran_penelitian')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
    }

    public function getwhere_luaran(array $data)
    {
        return $this->db->get_where('luaran_penelitian',$data);
    }

    public function deleteluaran($data)
    {
        $query = $this->db->delete('luaran_penelitian',$data);
        return $query;
    }
    
    public function insert_luaran($data)
    {
        $this->db->insert('luaran_penelitian',$data);
        return $this->db->insert_id();
    }
    public function update_luaran($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('luaran_penelitian',$data);
    }
    public function delProp($data)
    {
        $query = $this->db->delete('proposal_penelitian',$data);
        return $query;
    }
    public function delMonev($data)
    {
        $query = $this->db->delete('laporan_monev_penelitian',$data);
        return $query;
    }
    public function delAkhir($data)
    {
        $query = $this->db->delete('laporan_akhir_penelitian',$data);
        return $query;
    }
    public function delMhs($data)
    {
        $query = $this->db->delete('mhs_penelitian',$data);
        return $query;
    }
    public function delDsn($data)
    {
        $query = $this->db->delete('dsn_penelitian',$data);
        return $query;
    }
    public function delLuaran($data)
    {
        $query = $this->db->delete('luaran_prop_penelitian',$data);
        return $query;
    }


}