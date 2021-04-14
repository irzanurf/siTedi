<?php

class M_Admin extends CI_Model
{
    public function getwhere_admin(array $data)
    {
        return $this->db->get_where('admin', $data);
    }
    
    public function get_admin()
    {
        return $this->db->get('admin');
        
    }
    public function get_akhir(array $data)
    {
        return $this->db->get_where('laporan_akhir_pengabdian',$data);
    }

    public function get_propPenelitian($id_penelitian)
    {
        $this->db->select('id');
        $this->db->from('proposal_penelitian');
        $this->db->where($id_penelitian);
        return $num_results = $this->db->count_all_results();
    }
    public function get_monevPenelitian($data)
    {
        $query = $this->db->select('proposal_penelitian.id, laporan_monev_penelitian.status as status_monev')
                        ->from('proposal_penelitian')
                        ->join('laporan_monev_penelitian','proposal_penelitian.id=laporan_monev_penelitian.id_proposal','inner')
                        ->where($data)
                        ->where('laporan_monev_penelitian.status > 0');
                        return $num_results = $this->db->count_all_results();
    }
    
    public function get_akhirPenelitian($data)
    {
        $query = $this->db->select('proposal_penelitian.id, laporan_akhir_penelitian.status as status_akhir')
                        ->from('proposal_penelitian')
                        ->join('laporan_akhir_penelitian','proposal_penelitian.id=laporan_akhir_penelitian.id_proposal','inner')
                        ->where($data)
                        ->where('laporan_akhir_penelitian.status > 0');
                        return $num_results = $this->db->count_all_results();
    }
    public function get_propPengabdian($id_pengabdian)
    {
        $this->db->select('id');
        $this->db->from('proposal_pengabdian');
        $this->db->where($id_pengabdian);
        return $num_results = $this->db->count_all_results();
    }
    public function get_akhirPengabdian($data)
    {
        $query = $this->db->select('proposal_pengabdian.id, laporan_akhir_pengabdian.id as id_akhir')
                        ->from('proposal_pengabdian')
                        ->join('laporan_akhir_pengabdian','proposal_pengabdian.id=laporan_akhir_pengabdian.id_proposal','inner')
                        ->where($data);
                        return $num_results = $this->db->count_all_results();
    }
    
    public function get_sumberdana(){
        $query = $this->db->select('*')
                        ->from('sumberdana')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
    }

    public function deletesd($data)
    {
        $query = $this->db->delete('sumberdana',$data);
        return $query;
    }
    
    public function insert_sd($data)
    {
        $this->db->insert('sumberdana',$data);
        return $this->db->insert_id();
    }
    public function update_sd($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('sumberdana',$data);
    }

    public function get_luaran(){
        $query = $this->db->select('*')
                        ->from('luaran_pengabdian')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
    }

    public function getwhere_luaran(array $data)
    {
        return $this->db->get_where('luaran_pengabdian',$data);
    }

    public function deleteluaran($data)
    {
        $query = $this->db->delete('luaran_pengabdian',$data);
        return $query;
    }
    
    public function insert_luaran($data)
    {
        $this->db->insert('luaran_pengabdian',$data);
        return $this->db->insert_id();
    }
    public function update_luaran($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('luaran_pengabdian',$data);
    }


    public function updaterole_reviewerpengabdian($nip,$role)
    {
        $this->db->where('username',$nip);
        $this->db->update('user',$role);
    }
    
    public function insert_reviewerpengabdian($data,$nip)
    {
        $query = $this->db->query("SELECT * FROM reviewer_pengabdian WHERE nip = '$nip' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('reviewer_pengabdian',$data);
            return $this->db->insert_id();
        }
        else{
           //nothing to do it
        }          
    }

    public function hapus_reviewerpengabdian($data)
    {
        $query = $this->db->delete('reviewer_pengabdian',$data);
        return $query;
    }

    public function get_berita($data){
        $query = $this->db->select('berita')
                        ->from('pengumuman')
                        ->where($data)
                        ->get();
        return $query;
    }
    
    public function simpan_berita($id, $data){
        $this->db->where('id',$id);
        $this->db->update('pengumuman',$data);
    }

    public function get_viewPengabdian()
    {
        $query = $this->db->select('nilai_proposal_pengabdian.*, proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id, jadwal_pengabdian.keterangan as ket')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','inner')
                        ->join('jadwal_pengabdian','proposal_pengabdian.id_jadwal=jadwal_pengabdian.id', 'inner')
                        ->join('nilai_proposal_pengabdian','proposal_pengabdian.id=nilai_proposal_pengabdian.id_proposal','left')
                        ->where('proposal_pengabdian.status= "ACCEPTED" OR proposal_pengabdian.status= "REJECTED" OR proposal_pengabdian.status= "" OR  proposal_pengabdian.status= "SUBMITTED"')
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function get_wherePengabdian($data)
    {
        $query = $this->db->select('nilai_proposal_pengabdian.*, proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id, jadwal_pengabdian.keterangan as ket')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','left')
                        ->join('jadwal_pengabdian','proposal_pengabdian.id_jadwal=jadwal_pengabdian.id', 'inner')
                        ->join('nilai_proposal_pengabdian','proposal_pengabdian.id=nilai_proposal_pengabdian.id_proposal','left')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function get_userMitra(array $data)
    {
        return $this->db->get_where('mitra',$data);
    }

    public function delProp($data)
    {
        $query = $this->db->delete('proposal_pengabdian',$data);
        return $query;
    }
    public function delMhs($data)
    {
        $query = $this->db->delete('mhs_pengabdian',$data);
        return $query;
    }
    public function delDsn($data)
    {
        $query = $this->db->delete('dsn_pengabdian',$data);
        return $query;
    }
    public function delLuaran($data)
    {
        $query = $this->db->delete('luaran_prop_pengabdian',$data);
        return $query;
    }
    public function delMitra($data)
    {
        $query = $this->db->delete('mitra',$data);
        return $query;
    }
    public function delUserMitra($data)
    {
        $query = $this->db->delete('user',$data);
        return $query;
    }
    public function delAkhir($data)
    {
        $query = $this->db->delete('laporan_akhir_pengabdian',$data);
        return $query;
    }
}