<?php 
class M_Kadep extends CI_Model
{
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
}
?>