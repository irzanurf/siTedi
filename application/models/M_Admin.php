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
                        ->from('luaran')
                        ->order_by("tgl", "desc")
                        ->get();
        return $query;
    }

    public function getwhere_luaran(array $data)
    {
        return $this->db->get_where('luaran',$data);
    }

    public function deleteluaran($data)
    {
        $query = $this->db->delete('luaran',$data);
        return $query;
    }
    
    public function insert_luaran($data)
    {
        $this->db->insert('luaran',$data);
        return $this->db->insert_id();
    }
    public function update_luaran($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('luaran',$data);
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
}