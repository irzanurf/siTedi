<?php

class M_Profile extends CI_Model
{
    public function getwhere_profile(array $data)
    {
        return $this->db->get_where('dosen',$data);
    }

    public function getwhere_kadep(array $data)
    {
        return $this->db->get_where('kadep',$data);
    }

    public function cekKadep($nip)
    {
        $query = $this->db->select('nip')
                        ->from('kadep')
                        ->where($nip)
                        ->get();
        return $query;
    }

    public function cekRevPenelitian($nip)
    {
        $query = $this->db->select('nip')
                        ->from('reviewer_penelitian')
                        ->where($nip)
                        ->get();
        return $query;
    }

    public function cekRevPengabdian($nip)
    {
        $query = $this->db->select('nip')
                        ->from('reviewer_pengabdian')
                        ->where($nip)
                        ->get();
        return $query;
    }

    public function getwhere_mhs(array $data)
    {
        return $this->db->get_where('mahasiswa',$data);
    }

    public function get_profile()
    {
        return $this->db->get('dosen');
    }

    public function get_kadep()
    {
        $query = $this->db->select('kadep.*,departemen.departemen as dep, departemen.id')
                        ->from('kadep')
                        ->join('departemen','kadep.id_departemen=departemen.id','inner')
                        ->order_by("id")
                        ->get();
        return $query;
    }

    public function get_cari($cari)
    {
        return $this->db->query("SELECT * FROM dosen WHERE nama LIKE '%$cari%'");
    }

    public function get_mhs()
    {
        return $this->db->get('mahasiswa');
    }

    public function insert_dosen($data)
    {
        $this->db->insert('dosen', $data);
    }

    public function insert_kadep($data)
    {
        $this->db->insert('kadep', $data);
    }

    public function insert_mhs($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    public function update_dosen($nip,$data)
    {
        $this->db->where('nip',$nip);
        $this->db->update('dosen',$data);
    }

    public function update_kadep($nip,$data)
    {
        $this->db->where('nip',$nip);
        $this->db->update('kadep',$data);
    }

    public function update_mhs($nim,$data)
    {
        $this->db->where('nim',$nim);
        $this->db->update('mahasiswa',$data);
    }


    public function insert_user($user)
    {
        $this->db->insert('user', $user);
    }

    public function hapus_dosen($data){
        $this->db->where($data);
        $this->db->delete('dosen');
    }

    public function hapus_kadep($data){
        $this->db->where($data);
        $this->db->delete('kadep');
    }

    public function hapus_mhs($data){
        $this->db->where($data);
        $this->db->delete('mahasiswa');
    }

    public function hapus_user($user){
        $this->db->where($user);
        $this->db->delete('user');
    }

    public function update_pass($data,$nip)
    {
        $this->db->where('username',$nip);
        $this->db->update('user',$data);
    }
    
    
}