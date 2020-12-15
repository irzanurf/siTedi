<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "4"){
            redirect("login/");
        }
        $this->load->model('M_Mitra');
        $this->load->model('M_PropPengabdian');
        $this->load->model('M_Dosen');
    }

    public function index()
    {
        $username = $this->session->userdata('user_name');
        $data_user = array('username'=>$username);
        $data['mitra']=$this->M_Mitra->getwhere_mitra($data_user)->row();
        $id_mitra = $data['mitra']->id;
        $data_mitra = array('id_mitra'=>$id_mitra);
        $data['proposal']=$this->M_PropPengabdian->getwhere_proposal($data_mitra)->row();
        $data['dosen']= $this->M_Dosen->getwhere_dosen(array('nip'=>$data['proposal']->nip))->row();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view("mitra/verifikasimitra", $data);
    }

    public function approval(){
        $id_mitra=$this->input->post('mitra');
        $data = array('status' => "1");
        $this->M_Mitra->update_mitra($id_mitra,$data);
        redirect('mitra/verifikasi');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}