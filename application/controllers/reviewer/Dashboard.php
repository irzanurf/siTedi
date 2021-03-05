<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        $this->load->model('M_Profile');
        //cek session dan level user
        if($this->Admin->is_role() != "2"){
            redirect("login/");
        }
    }

    public function index()
    {
        $nip = $this->session->userdata('user_name');
        $data['cek']= $this->M_Profile->cekKadep(array('nip'=>$nip))->result();
        $this->load->view("reviewer/dashboard", $data);            

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}