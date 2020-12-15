<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "2"){
            redirect("login/");
        }
    }

    public function index()
    {

        $this->load->view("reviewer/dashboard");            

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}