<?php

class M_PropPengabdian extends CI_Model
{
    public function insert_proposal($prop)
    {
        $this->db->insert('proposal_pengabdian',$prop);
        return $this->db->insert_id();
    }

    public function get_proposal()
    {
        return $this->db->get('proposal_pengabdian');
    }

    public function getwhere_proposal(array $data)
    {
        return $this->db->get_where('proposal_pengabdian',$data);
    }
    
    public function get_viewpengajuan()
    {
        $query = $this->db->select('proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','inner')
                        ->get();
        return $query;
    }
    public function get_viewpenilaian()
    {
        $query = $this->db->select('assign_proposal_pengabdian.*, proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','inner')
                        // ->join('nilai_proposal_pengabdian','proposal_pengabdian.id=nilai_proposal_pengabdian.id_proposal','left')
                        ->join('assign_proposal_pengabdian','proposal_pengabdian.id=assign_proposal_pengabdian.id_proposal','left')
                        ->where('proposal_pengabdian.status = "ASSIGNED"')
                        ->get();
        return $query;
    }

    public function delete_proposal($id){
        $this->db->where($id);
        $this->db->delete('proposal_pengabdian');
    }



    public function get_viewgrade()
    {
        $query = $this->db->select('assign_proposal_pengabdian.*,nilai_proposal_pengabdian.*, proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','inner')
                        ->join('nilai_proposal_pengabdian','proposal_pengabdian.id=nilai_proposal_pengabdian.id_proposal','left')
                        ->join('assign_proposal_pengabdian','proposal_pengabdian.id=assign_proposal_pengabdian.id_proposal','left')
                        ->get();
        return $query;
    }

    public function get_viewApproval()
    {
        $query = $this->db->select('nilai_proposal_pengabdian.*, proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','inner')
                        ->join('nilai_proposal_pengabdian','proposal_pengabdian.id=nilai_proposal_pengabdian.id_proposal','left')
                        // ->where('proposal_pengabdian.status= "NEED_APPROVAL"')
                        ->get();
        return $query;
    }

    public function get_viewAssign()
    {
        $query = $this->db->select('proposal_pengabdian.*, dosen.*, r1.nama as nama_reviewer1, r2.nama as nama_reviewer2')
                        ->from('proposal_pengabdian')
                        ->join('dosen ','proposal_pengabdian.nip=dosen.nip','inner')
                        ->join('assign_proposal_pengabdian','proposal_pengabdian.id=assign_proposal_pengabdian.id_proposal','left')
                        ->join('reviewer_pengabdian r1', 'assign_proposal_pengabdian.reviewer=r1.nip','left')
                        ->join('reviewer_pengabdian r2', 'assign_proposal_pengabdian.reviewer2=r2.nip','left')
                        // ->where('proposal_pengabdian.status= "SUBMITTED"')
                        ->get();

        return $query;
    }

    public function get_viewPengabdian()
    {
        $query = $this->db->select('nilai_proposal_pengabdian.*, proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','inner')
                        ->join('nilai_proposal_pengabdian','proposal_pengabdian.id=nilai_proposal_pengabdian.id_proposal','left')
                        ->where('proposal_pengabdian.status= "ACCEPTED" OR proposal_pengabdian.status= "REJECTED" ')
                        ->get();
        return $query;
    }

    public function get_viewAnnouncement()
    {
        $query = $this->db->select('proposal_pengabdian.*, dosen.nama as nama, dosen.program_studi as program_studi')
                        ->from('proposal_pengabdian')
                        ->join('dosen','proposal_pengabdian.nip=dosen.nip','inner')
                        ->where('proposal_pengabdian.status= "ACCEPTED"')
                        ->get();
        return $query;
    }
    public function get_viewListProp()
    {
        $query = $this->db->select('proposal_pengabdian.*, dosen.nama as nama, dosen.program_studi as program_studi')
                        ->from('proposal_pengabdian')
                        ->join('dosen','proposal_pengabdian.nip=dosen.nip','inner')
                        ->get();
        return $query;
    }

    public function get_viewlaporanakhir()
    {
        $query = $this->db->select('proposal_pengabdian.*, laporan_akhir_pengabdian.id as id_lap, laporan_akhir_pengabdian.laporan_akhir as laporan_akhir, laporan_akhir_pengabdian.belanja as belanja, laporan_akhir_pengabdian.logbook as logbook, laporan_akhir_pengabdian.luaran as luaran ')
                        ->from('proposal_pengabdian')
                        ->join('laporan_akhir_pengabdian','proposal_pengabdian.id=laporan_akhir_pengabdian.id_proposal','inner')
                        ->get();
        return $query;
    }

    public function get_word_laporanakhir()
    {
        $query = $this->db->select('proposal_pengabdian.*, dosen.nama as nama, laporan_akhir_pengabdian.id as id_lap, laporan_akhir_pengabdian.laporan_akhir as laporan_akhir, laporan_akhir_pengabdian.belanja as belanja, laporan_akhir_pengabdian.logbook as logbook, laporan_akhir_pengabdian.luaran as luaran ')
                        ->from('proposal_pengabdian')
                        ->join('laporan_akhir_pengabdian','proposal_pengabdian.id=laporan_akhir_pengabdian.id_proposal','inner')
                        ->join('dosen','proposal_pengabdian.nip=dosen.nip','inner')
                        ->where('laporan_akhir is NOT NULL')
                        ->where('belanja is NOT NULL')
                        ->where('logbook is NOT NULL')
                        ->where('luaran is NOT NULL')
                        ->get();
        return $query;
    }
    public function update_prop($id,array $data)
    {
        $this->db->where('id',$id);
        $this->db->update('proposal_pengabdian', $data);
    }
    public function dosen_update_prop($id)
    {
        $query = $this->db->select('dsn_pengabdian.*, dosen.nama as nama, dosen.program_studi as program_studi')
                        ->from('dsn_pengabdian')
                        ->join('dosen','dsn_pengabdian.nip=dosen.nip','inner')
                        ->where('dsn_pengabdian.id_proposal = '.$id.'')
                        ->get();
        return $query;
    }

    public function mhs_update_prop($id)
    {
        $query = $this->db->select('mhs_pengabdian.*')
                        ->from('mhs_pengabdian')
                        ->where('mhs_pengabdian.id_proposal = '.$id.'')
                        ->get();
        return $query;
    }


    public function dosen($data_dosen)
    {
        $this->db->insert_batch('dsn_pengabdian', $data_dosen);
    }
    
    public function mahasiswa($data_mahasiswa)
    {
        $this->db->insert_batch('mhs_pengabdian', $data_mahasiswa);
    }

    public function getNilaiProp(array $data)
    {
        return $this->db->get_where('nilai_proposal_pengabdian',$data);

    }

    public function update_dosen_anggota($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('dsn_pengabdian',$data);
    }

    public function hapus_dosen_anggota($data)
    {
        $query = $this->db->delete('dsn_pengabdian',$data);
        return $query;
    }

    public function insert_dsn_anggota($data){
        $this->db->insert('dsn_pengabdian',$data);
    }

    public function update_mhs_anggota($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('mhs_pengabdian',$data);
    }

    public function hapus_mhs_anggota($data)
    {
        $query = $this->db->delete('mhs_pengabdian',$data);
        return $query;
    }

    public function insert_mhs_anggota($data){
        $this->db->insert('mhs_pengabdian',$data);
    }

}