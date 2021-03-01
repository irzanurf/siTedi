<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        //cek session dan level user
        
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
        // $this->form_validation->set_rules('file_persetujuan','File Persetujuan', 'required');
        $id_mitra=$this->input->post('mitra');
        // $data = array('status' => "1");
        // $this->M_Mitra->update_mitra($id_mitra,$data);
        $surat = $_FILES['file'];
        if($surat==0||$surat==null||$surat==""){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Maaf Surat Mitra Masih Kosong</strong></div>');
            redirect('mitra/verifikasi');
        }else{
            $config['upload_path'] = './assets/suratmitra';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;
            // echo $config['upload_path'];
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Maaf Surat Mitra Masih Kosong</strong></div>');
            redirect('mitra/verifikasi');
            } else {
                $surat=$this->upload->data('file_name');
            }
        }
        
        $data_surat = array(
            'status' => 1,
            'file_persetujuan'=>$surat);
        $this->M_Mitra->update_mitra($id_mitra,$data_surat);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Kerjasama pengabdian telah disetujui</strong></div>');
        redirect('mitra/verifikasi');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}