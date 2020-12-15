<?php
class model_coba extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        return $this->db->get('dosen');
    }
}