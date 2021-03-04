<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadep extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        //cek session dan level user
        if($this->Admin->is_role() != "5"){
            redirect("login/");
        }
        $this->load->model('M_Admin');
        $this->load->model('M_Kadep');
        $this->load->model('M_Profile');
        $this->load->model('M_JadwalPenelitian');
        $this->load->model('M_JadwalPengabdian');
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $id_penelitian= $this->M_JadwalPenelitian->get_jadwalPenelitian()->row()->id;
        $id_pengabdian= $this->M_JadwalPengabdian->get_jadwalPengabdian()->row()->id;
        $data['jadwal_penelitian'] = $this->M_JadwalPenelitian->get_last_jadwal()->result();
        $data['jadwal_pengabdian'] = $this->M_JadwalPengabdian->get_last_jadwal()->result();
        $data['prop_penelitian'] = $this->M_Admin->get_propPenelitian(array('id_jadwal'=>$id_penelitian));
        $data['monev_penelitian'] = $this->M_Admin->get_monevPenelitian(array('id_jadwal'=>$id_penelitian));
        $data['akhir_penelitian'] = $this->M_Admin->get_akhirPenelitian(array('id_jadwal'=>$id_penelitian));
        $data['prop_pengabdian'] = $this->M_Admin->get_propPengabdian(array('id_jadwal'=>$id_pengabdian));
        $data['akhir_pengabdian'] = $this->M_Admin->get_akhirPengabdian(array('id_jadwal'=>$id_pengabdian));
        $data['user'] = $this->M_Admin->getwhere_admin(array('nip'=>$user))->row();
        
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/dashboard',$data);  
        $this->load->view('layout/footer');        

    }

    public function listSubmitPenelitian()
    {
        $user = $this->session->userdata('user_name');
        $data['jadwal'] = $this->M_JadwalPenelitian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/daftarPenelitian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function daftarPenelitian($id)
    {
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view'] = $this->M_Kadep->get_wherePenelitian(array('id_jadwal'=>$id, 'dosen.program_studi'=>$dep,))->result();
        $data['id'] = $id;
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/daftar_prop_penelitian',$data);
        $this->load->view('layout/footer'); 

    }

    public function listSubmitPengabdian()
    {
        $user = $this->session->userdata('user_name');
        $data['jadwal'] = $this->M_JadwalPengabdian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/daftarPengabdian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function daftarPengabdian($id)
    {
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view'] = $this->M_Kadep->get_wherePengabdian(array('id_jadwal'=>$id, 'dosen.program_studi'=>$dep,))->result();
        $data['id'] = $id;
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/daftar_prop_pengabdian',$data);
        $this->load->view('layout/footer'); 

    }


    public function assignProposal()
    {
        $data['view'] = $this->M_AdminPenelitian->get_viewAssign()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/assign',$data);
        $this->load->view('layout/footer'); 

    }

    public function profile()
    {
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Kadep->getwhere_profile(array('nip'=>$nip))->result();
        
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/profile', $nama);
        $this->load->view('layout/footer'); 
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}