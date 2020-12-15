<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
     
    class M_index extends CI_Model {
     
        function getData(){
            return $this->db->get('dosen')->result_array();
        }
    }