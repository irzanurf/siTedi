<?php

class M_PropPenelitian extends CI_Model
{
    public function insert_proposal($prop,$nip,$jadwal)
    {
        $query = $this->db->query("SELECT * FROM proposal_penelitian WHERE nip = '$nip' AND id_jadwal='$jadwal' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('proposal_penelitian',$prop);
        return $this->db->insert_id();
        }
        else{
            redirect("dosen/penelitian/submit");
        }   
        
    }

    public function getwhere_rev(array $data)
    {
        return $this->db->get_where('assign_proposal_penelitian',$data);
    }

    public function insert_monev($prop,$id)
    {
        $query = $this->db->query("SELECT * FROM laporan_monev_penelitian WHERE id_proposal='$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('laporan_monev_penelitian', $prop);
        }
        else{
            
        }       
    }

    public function insert_akhir($prop,$id)
    {
        $query = $this->db->query("SELECT * FROM laporan_akhir_penelitian WHERE id_proposal='$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('laporan_akhir_penelitian', $prop);
        }
        else{
            
        }   
    }

    public function cancel_monev($id,$prop)
    {
        $query = $this->db->query("SELECT * FROM laporan_monev_penelitian WHERE id_proposal='$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (!empty($count)){
            $this->db->delete('laporan_monev_penelitian', $prop);
        }
        else{
            
        }       
    }

    public function cancel_akhir($id,$prop)
    {
        $query = $this->db->query("SELECT * FROM laporan_akhir_penelitian WHERE id_proposal='$id' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (!empty($count)){
            $this->db->delete('laporan_akhir_penelitian', $prop);
        }
        else{
            
        }   
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
        $query = $this->db->select('proposal_penelitian.*,jenispenelitian.jenis as jenis,jadwal_penelitian.tgl_selesai')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('jadwal_penelitian','proposal_penelitian.id_jadwal=jadwal_penelitian.id','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function getwhere_viewanggota($data)
    {
        $query = $this->db->select('proposal_penelitian.*,jenispenelitian.jenis as jenis')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('dsn_penelitian','dsn_penelitian.id_proposal=proposal_penelitian.id')
                        ->where('dsn_penelitian.nip = "'.$data.'" ')
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }
    
    public function update_prop($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('proposal_penelitian', $data);
    }
    public function delete_prop($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('proposal_penelitian');
    }
    public function dosen($data_dosen)
    {
        $this->db->insert_batch('dsn_penelitian', $data_dosen);
    }

    public function luaran($data_luaran)
    {
        $this->db->insert_batch('luaran_prop_penelitian', $data_luaran);
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

    public function get_needSubmitProp()
    {
        $query = $this->db->select('proposal_penelitian.*')
                        ->from('proposal_penelitian')
                        ->where('proposal_penelitian.status=0')
                        // ->where('proposal_pengabdian.status= "NEED_APPROVAL"')
                        ->get();
        return $query;
    }

    public function get_needUnsubmitProp()
    {
        $query = $this->db->select('proposal_penelitian.*')
                        ->from('proposal_penelitian')
                        ->where('proposal_penelitian.status=1')
                        // ->where('proposal_pengabdian.status= "NEED_APPROVAL"')
                        ->get();
        return $query;
    }

    public function get_needSubmitMonev()
    {
        $query = $this->db->select('laporan_monev_penelitian.*')
                        ->from('laporan_monev_penelitian')
                        ->where('laporan_monev_penelitian.status=0')
                        ->get();
        return $query;
    }

    public function get_needSubmitAkhir()
    {
        $query = $this->db->select('laporan_akhir_penelitian.*')
                        ->from('laporan_akhir_penelitian')
                        ->where('laporan_akhir_penelitian.status=0')
                        ->get();
        return $query;
    }

    public function checkJudulExist($judul) {
        return $this->db->get_where('proposal_penelitian', ['judul' => $judul])->num_rows();
    }

    public function get_word_monev($data)
    {
        $query = $this->db->select('proposal_penelitian.*,dosen.nama as nama, laporan_monev_penelitian.file1 as file1,laporan_monev_penelitian.file2 as file2,laporan_monev_penelitian.file3 as file3,laporan_monev_penelitian.catatan as catatan, jenispenelitian.jenis as skema')
                        ->from('proposal_penelitian')
                        ->join('dosen','dosen.nip = proposal_penelitian.nip')
                        ->join('jenispenelitian','jenispenelitian.id = proposal_penelitian.id_jenis', 'inner')
                        ->join('laporan_monev_penelitian','proposal_penelitian.id=laporan_monev_penelitian.id_proposal','inner')
                        ->where('file1 is NOT NULL')
                        ->where('file2 != ""')
                        ->where('file3 != ""')
                        ->where($data)
                        ->get();
        return $query;
    }


    public function get_word_akhir($data)
    {  
        $query = $this->db->select('proposal_penelitian.*,dosen.nama as nama, laporan_akhir_penelitian.file1 as file1,laporan_akhir_penelitian.file2 as file2,laporan_akhir_penelitian.file3 as file3,laporan_akhir_penelitian.file4 as file4, jenispenelitian.jenis as skema')
                        ->from('proposal_penelitian')
                        ->join('dosen','dosen.nip = proposal_penelitian.nip')
                        ->join('jenispenelitian','jenispenelitian.id = proposal_penelitian.id_jenis','inner')
                        ->join('laporan_akhir_penelitian','proposal_penelitian.id=laporan_akhir_penelitian.id_proposal','inner')
                        ->where('file1 != ""')
                        ->where('file2 != ""')
                        ->where('file3 != ""')
                        ->where('file4 != ""')
                        ->where($data)
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
        $query = $this->db->select('proposal_penelitian.*,jenispenelitian.jenis as jenis,laporan_akhir_penelitian.file1,laporan_akhir_penelitian.status as status_monev,jadwal_penelitian.tgl_akhir')
                        ->from('proposal_penelitian')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id','inner')
                        ->join('laporan_akhir_penelitian','proposal_penelitian.id=laporan_akhir_penelitian.id_proposal','inner')
                        ->join('jadwal_penelitian','proposal_penelitian.id_jadwal=jadwal_penelitian.id','inner')
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

    public function get_viewAnnouncement($data)
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.nama as nama, dosen.program_studi as program_studi, jenispenelitian.jenis as skema')
                        ->from('proposal_penelitian')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->join('jenispenelitian','proposal_penelitian.id_jenis=jenispenelitian.id')
                        ->where($data)
                        ->where('proposal_penelitian.status > 1')
                        ->where('proposal_penelitian.status < 5')
                        ->get();
        return $query;
    }

    public function get_viewListProp($data)
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.nama as nama, dosen.program_studi as program_studi, jenispenelitian.jenis as skema')
                        ->from('proposal_penelitian')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->join('jenispenelitian','jenispenelitian.id=proposal_penelitian.id_jenis','inner')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function get_viewListPropReviewer($data)
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.nama as nama, dosen.program_studi as program_studi, jenispenelitian.jenis as skema, assign_proposal_penelitian.*')
                        ->from('proposal_penelitian')
                        ->join('dosen','proposal_penelitian.nip=dosen.nip','inner')
                        ->join('jenispenelitian','jenispenelitian.id=proposal_penelitian.id_jenis','inner')
                        ->join('assign_proposal_penelitian','proposal_penelitian.id=assign_proposal_penelitian.id_proposal','inner')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function dosen_update_prop($id)
    {
        $query = $this->db->select('dsn_penelitian.*, dosen.nama as nama, dosen.program_studi as program_studi')
                        ->from('dsn_penelitian')
                        ->join('dosen','dsn_penelitian.nip=dosen.nip','inner')
                        ->where('dsn_penelitian.id_proposal = '.$id.'')
                        ->get();
        return $query;
    }

    public function luaran_update_prop($id)
    {
        $query = $this->db->select('luaran_prop_penelitian.*, luaran_penelitian.luaran as luaran')
                        ->from('luaran_prop_penelitian')
                        ->join('luaran_penelitian','luaran_prop_penelitian.id_luaran=luaran_penelitian.id','inner')
                        ->where('luaran_prop_penelitian.id_proposal = '.$id.'')
                        ->get();
        return $query;
    }

    public function mhs_update_prop($id)
    {
        $query = $this->db->select('mhs_penelitian.*')
                        ->from('mhs_penelitian')
                        ->where('mhs_penelitian.id_proposal = '.$id.'')
                        ->get();
        return $query;
    }

    public function update_dosen_anggota($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('dsn_penelitian',$data);
    }

    public function hapus_dosen_anggota($data)
    {
        $query = $this->db->delete('dsn_penelitian',$data);
        return $query;
    }

    public function insert_dsn_anggota($data){
        $this->db->insert('dsn_penelitian',$data);
    }

    public function update_nilai_luaran($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('luaran_prop_penelitian',$data);
    }

    public function hapus_nilai_luaran($data)
    {
        $query = $this->db->delete('luaran_prop_penelitian',$data);
        return $query;
    }

    public function insert_nilai_luaran($data){
        $this->db->insert('luaran_prop_penelitian',$data);
    }

    public function update_mhs_anggota($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('mhs_penelitian',$data);
    }

    public function hapus_mhs_anggota($data)
    {
        $query = $this->db->delete('mhs_penelitian',$data);
        return $query;
    }

    public function insert_mhs_anggota($data){
        $this->db->insert('mhs_penelitian',$data);
    }

}