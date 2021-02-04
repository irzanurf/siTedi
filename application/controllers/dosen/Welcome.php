<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        //cek session dan level user
        if($this->Admin->is_role() != "3"){
            redirect("login/");
        }
    }

    public function index()
    {

        $this->load->view("dosen/welcome");            

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}