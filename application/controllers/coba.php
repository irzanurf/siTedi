<?php
class coba extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_coba'));
    }
    
    function index(){
        // menyimpan data siswa untuk dipassing ke view
        $data['dosens'] = $this->model_coba->getAll();
        $this->load->view('coba/list',$data);
    }
}