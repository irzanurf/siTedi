<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        //cek session dan level user
        if($this->Admin->is_role() != "1"){
            redirect("login/");
        }
        $this->load->model('M_Admin');
        $this->load->model('M_Profile');
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['user'] = $this->M_Admin->getwhere_admin(array('nip'=>$user))->row();
        $this->load->view('layout/header');  
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dashboard',$data);          

    }
//sumber dana
    public function sumberdana()
    {
        $data['view'] = $this->M_Admin->get_sumberdana()->result();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/sumberdana',$data);
    }

    public function deletesd()
    {
        $id = $this->input->post('id');
        $data = [
            'id' => $id,
        ];
        $this->M_Admin->deletesd($data);
        redirect('admin/dashboard/sumberdana');
    }

    public function addsd()
    {
        $data = [
            'sumberdana'=>$this->input->post('sumberdana'), 
            'tgl'=>date('Y'), 
        ];
        $this->M_Admin->insert_sd($data);
        redirect('admin/dashboard/sumberdana');
    }

    public function editsd()
    {
        $id = $this->input->post('id');
        $data = [
            'sumberdana'=>$this->input->post('sumberdana'), 
        ];
        $this->M_Admin->update_sd($id,$data);
        redirect('admin/dashboard/sumberdana');
    }

//luaran
    public function luaran()
    {
        $id = $this->input->post('id');
        $data['view'] = $this->M_Admin->get_luaran()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/luaran',$data);
    }

    public function deleteluaran()
    {
        $id = $this->input->post('id');
        $data = [
            'id' => $id,
        ];
        $this->M_Admin->deleteluaran($data);
        redirect('admin/dashboard/luaran');
    }

    public function addluaran()
    {
        $data = [
            'luaran'=>$this->input->post('luaran'), 
            'tgl'=>date('Y'), 
        ];
        $this->M_Admin->insert_luaran($data);
        redirect('admin/dashboard/luaran');
    }

    public function editluaran()
    {
        $id = $this->input->post('id');
        $data = [
            'luaran'=>$this->input->post('luaran'), 
        ];
        $this->M_Admin->update_luaran($id,$data);
        redirect('admin/dashboard/luaran');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function viewMahasiswa()
    {
        $data['view']= $this->M_Profile->get_mhs()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/mahasiswa',$data);
    }

    public function tambahMhs()
    {
        $data['view']= $this->M_Profile->get_mhs()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/tambahMhs',$data);
    }

    public function addMhsToDb()
    {
        $this->form_validation->set_rules('nama','nama', 'required');
        $this->form_validation->set_rules('nim','nim', 'required');
        
        $data = [
            "nim"=>$this->input->post('nim',true),
            "nama"=>$this->input->post('nama',true),
            "jenis_kelamin"=>$this->input->post('jenis_kelamin',true),
            "angkatan"=>$this->input->post('angkatan',true),
            "program_studi"=>$this->input->post('program_studi',true),
            
        ];
        
        $this->M_Profile->insert_mhs($data);
        redirect("admin/dashboard/viewMahasiswa");
    }

    public function editMhs()
    {
        $nim = $this->input->post('nim');
        $data['view']= $this->M_Profile->getwhere_mhs(array('nim'=> $nim))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/editMhs',$data);
    }

    public function hapusMhs()
    {
        $nim = $this->input->post('nim');
        $data = [
            'nim' => $nim,
        ];
        
        $this->M_Profile->hapus_mhs($data);
        redirect('admin/dashboard/viewMahasiswa');
    }

    public function editMhsInDb()
    {
        $this->form_validation->set_rules('nama','nama', 'required');
        $nim = $this->input->post('nim',true);
        
        $data = [
            "nama"=>$this->input->post('nama',true),
            "jenis_kelamin"=>$this->input->post('jenis_kelamin',true),
            "angkatan"=>$this->input->post('angkatan',true),
            "program_studi"=>$this->input->post('program_studi',true),
        ];
        $this->M_Profile->update_mhs($nim,$data);
        redirect("admin/dashboard/viewMahasiswa");
    }

    public function viewDosen()
    {
        $data['view']= $this->M_Profile->get_profile()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dosen',$data);
    }

    public function tambahDosen()
    {
        $data['view']= $this->M_Profile->get_profile()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/tambahDosen',$data);
    }

    public function editDosen()
    {
        $nip = $this->input->post('nip');
        $data['view']= $this->M_Profile->getwhere_profile(array('nip'=> $nip))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/editDosen',$data);
    }

    public function hapusDosen()
    {
        $nip = $this->input->post('nip');
        $data = [
            'nip' => $nip,
        ];
        $user = [
            'username' => $nip,
        ];
        $this->M_Profile->hapus_dosen($data);
        $this->M_Profile->hapus_user($user);
        redirect('admin/dashboard/viewDosen');
    }

    public function addDosenToDb()
    {
        $this->form_validation->set_rules('nama','nama', 'required');
        $this->form_validation->set_rules('nip','nip', 'required');
        $password = MD5($this->input->post('password', TRUE));
        $data = [
            "nip"=>$this->input->post('nip',true),
            "nama"=>$this->input->post('nama',true),
            "golongan"=>$this->input->post('golongan',true),
            "jabatan"=>$this->input->post('jabatan',true),
            "pendidikan"=>$this->input->post('pendidikan',true),
            "th_lulus"=>$this->input->post('th_lulus',true),
            "kepakaran"=>$this->input->post('kepakaran',true),
            "status_bekerja"=>$this->input->post('status_bekerja',true),
            "jenis"=>$this->input->post('jenis',true),
            "status_kepegawaian"=>$this->input->post('status_kepegawaian',true),
            "fakultas"=>$this->input->post('fakultas',true),
            "departemen"=>$this->input->post('departemen',true),
            "program_studi"=>$this->input->post('program_studi',true),
            "no_telp"=>$this->input->post('no_telp',true),
            "email"=>$this->input->post('email',true),
        ];
        $user = [
            "username"=>$this->input->post('nip',true),
            "password"=>$password,
            "role"=>"3",
        ];
        $this->M_Profile->insert_dosen($data);
        $this->M_Profile->insert_user($user);
        redirect("admin/dashboard/viewDosen");
    }

    public function editDosenInDb()
    {
        $this->form_validation->set_rules('nama','nama', 'required');
        $password = MD5($this->input->post('password', TRUE));
        $nip = $this->input->post('nip',true);
        
        $data = [
            "nama"=>$this->input->post('nama',true),
            "golongan"=>$this->input->post('golongan',true),
            "jabatan"=>$this->input->post('jabatan',true),
            "pendidikan"=>$this->input->post('pendidikan',true),
            "th_lulus"=>$this->input->post('th_lulus',true),
            "kepakaran"=>$this->input->post('kepakaran',true),
            "status_bekerja"=>$this->input->post('status_bekerja',true),
            "jenis"=>$this->input->post('jenis',true),
            "status_kepegawaian"=>$this->input->post('status_kepegawaian',true),
            "fakultas"=>$this->input->post('fakultas',true),
            "departemen"=>$this->input->post('departemen',true),
            "program_studi"=>$this->input->post('program_studi',true),
            "no_telp"=>$this->input->post('no_telp',true),
            "email"=>$this->input->post('email',true),
        ];
        $this->M_Profile->update_dosen($nip,$data);
        redirect("admin/dashboard/viewDosen");
    }

    

}