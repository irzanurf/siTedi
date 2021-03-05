<?php 
class M_Kadep extends CI_Model
{

    public function get_departemen()
    {
        $query = $this->db->select('*')
                        ->from('departemen')
                        ->order_by("id")
                        ->get();
        return $query;
        
    }

    public function get_kadep()
    {
        $query = $this->db->select('kadep.*,departemen.departemen as dep, departemen.id, dosen.nama as namakadep')
                        ->from('kadep')
                        ->join('departemen','kadep.id_departemen=departemen.id','inner')
                        ->join('dosen','kadep.nip=dosen.nip','inner')
                        ->order_by("id")
                        ->get();
        return $query;
    }
    public function getwhere_profile(array $data)
    {
        $query = $this->db->select('kadep.*,departemen.departemen as dep')
                        ->from('kadep')
                        ->join('departemen','kadep.id_departemen=departemen.id','inner')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function get_wherePenelitian($data)
    {
        $query = $this->db->select('nilai_proposal_penelitian.*, proposal_penelitian.*,jenispenelitian.jenis as jenis,dosen.nama as nama_dosen,dosen.program_studi as prodi, jadwal_penelitian.keterangan as ket')
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

    public function getwhere_viewmonev($data)
    {
        $query = $this->db->select('proposal_penelitian.*,dosen.*,laporan_monev_penelitian.file1 as file1,laporan_monev_penelitian.file2 as file2,laporan_monev_penelitian.file3 as file3,laporan_monev_penelitian.catatan as catatan,laporan_monev_penelitian.status as stat,nilai_proposal_penelitian.*')
                        ->from('proposal_penelitian')
                        ->join('laporan_monev_penelitian','proposal_penelitian.id=laporan_monev_penelitian.id_proposal','inner')
                        ->join('nilai_proposal_penelitian','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function getwhere_viewakhir($data)
    {
        $query = $this->db->select('proposal_penelitian.*,dosen.*,laporan_akhir_penelitian.file1 as file1,laporan_akhir_penelitian.file2 as file2,laporan_akhir_penelitian.file3 as file3,laporan_akhir_penelitian.file4 as file4, laporan_akhir_penelitian.status as stat, laporan_akhir_penelitian.catatan as catatan')
                        ->from('proposal_penelitian')
                        ->join('laporan_akhir_penelitian','proposal_penelitian.id=laporan_akhir_penelitian.id_proposal','inner')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function get_wherePengabdian($data)
    {
        $query = $this->db->select('nilai_proposal_pengabdian.*, proposal_pengabdian.*, mitra.nama_instansi as nama_instansi, mitra.status as status_mitra, mitra.file_persetujuan as file_persetujuan, mitra.id as mitra_id, jadwal_pengabdian.keterangan as ket,dosen.nama as nama_dosen,dosen.program_studi as prodi')
                        ->from('proposal_pengabdian')
                        ->join('mitra ','proposal_pengabdian.id_mitra=mitra.id','left')
                        ->join('dosen','proposal_pengabdian.nip=dosen.nip','inner')
                        ->join('jadwal_pengabdian','proposal_pengabdian.id_jadwal=jadwal_pengabdian.id', 'inner')
                        ->join('nilai_proposal_pengabdian','proposal_pengabdian.id=nilai_proposal_pengabdian.id_proposal','left')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function get_whereAkhir($data)
    {
        $query = $this->db->select('proposal_pengabdian.*, dosen.*, laporan_akhir_pengabdian.id as id_lap, laporan_akhir_pengabdian.laporan_akhir as laporan_akhir, laporan_akhir_pengabdian.belanja as belanja, laporan_akhir_pengabdian.logbook as logbook, laporan_akhir_pengabdian.luaran as luaran ')
                        ->from('proposal_pengabdian')
                        ->join('laporan_akhir_pengabdian','proposal_pengabdian.id=laporan_akhir_pengabdian.id_proposal','inner')
                        ->join('dosen','proposal_pengabdian.nip=dosen.nip','inner')
                        ->where($data)
                        ->order_by("tgl_upload", "desc")
                        ->get();
        return $query;
    }

    public function get_viewAssignPenelitian($data)
    {
        $query = $this->db->select('proposal_penelitian.*, dosen.*, r1.nama as nama_reviewer1, r2.nama as nama_reviewer2')
                        ->from('proposal_penelitian')
                        ->join('dosen ','proposal_penelitian.nip=dosen.nip','inner')
                        ->join('nilai_proposal_penelitian ','proposal_penelitian.id=nilai_proposal_penelitian.id_proposal','left')
                        ->join('assign_proposal_penelitian','proposal_penelitian.id=assign_proposal_penelitian.id_proposal','left')
                        ->join('reviewer_penelitian r1', 'assign_proposal_penelitian.reviewer=r1.nip','left')
                        ->join('reviewer_penelitian r2', 'assign_proposal_penelitian.reviewer2=r2.nip','left')
                        ->where($data)
                        ->get();

        return $query;
    }

    public function get_viewAssignPengabdian($data)
    {
        $query = $this->db->select('proposal_pengabdian.*, dosen.*, r1.nama as nama_reviewer1, r2.nama as nama_reviewer2')
                        ->from('proposal_pengabdian')
                        ->join('dosen ','proposal_pengabdian.nip=dosen.nip','inner')
                        ->join('assign_proposal_pengabdian','proposal_pengabdian.id=assign_proposal_pengabdian.id_proposal','left')
                        ->join('reviewer_pengabdian r1', 'assign_proposal_pengabdian.reviewer=r1.nip','left')
                        ->join('reviewer_pengabdian r2', 'assign_proposal_pengabdian.reviewer2=r2.nip','left')
                        ->where($data)
                        ->get();

        return $query;
    }
}
?>