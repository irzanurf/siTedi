<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->model('M_Dosen');
        $this->load->model('M_Profile');
        $this->load->model('M_Kadep');
        $this->load->model('M_JadwalPenelitian');
        $this->load->model('M_JadwalPengabdian');
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $id_penelitian= $this->M_JadwalPenelitian->get_jadwalPenelitian()->row()->id;
        $id_pengabdian= $this->M_JadwalPengabdian->get_jadwalPengabdian()->row()->id;
        $data['jadwal_penelitian'] = $this->M_JadwalPenelitian->get_last()->result();
        $data['jadwal_pengabdian'] = $this->M_JadwalPengabdian->get_last_jadwal()->result();
        $data['prop_penelitian'] = $this->M_Admin->get_propPenelitian(array('id_jadwal'=>$id_penelitian));
        $data['monev_penelitian'] = $this->M_Admin->get_monevPenelitian(array('id_jadwal'=>$id_penelitian));
        $data['akhir_penelitian'] = $this->M_Admin->get_akhirPenelitian(array('id_jadwal'=>$id_penelitian));
        $data['prop_pengabdian'] = $this->M_Admin->get_propPengabdian(array('id_jadwal'=>$id_pengabdian));
        $data['akhir_pengabdian'] = $this->M_Admin->get_akhirPengabdian(array('id_jadwal'=>$id_pengabdian));
        $data['user'] = $this->M_Admin->getwhere_admin(array('nip'=>$user))->row();
          
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dashboard',$data);  
        $this->load->view('layout/footer');        

    }
//sumber dana
    public function sumberdana()
    {
        $data['view'] = $this->M_Admin->get_sumberdana()->result();
        
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/sumberdana',$data);
        $this->load->view('layout/footer'); 
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
        
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/luaran',$data);
        $this->load->view('layout/footer'); 
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
        
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/mahasiswa',$data);
        $this->load->view('layout/footer'); 
    }

    public function tambahMhs()
    {
        $data['view']= $this->M_Profile->get_mhs()->result();
     
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/tambahMhs',$data);
        $this->load->view('layout/footer'); 
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
        
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/editMhs',$data);
        $this->load->view('layout/footer'); 
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
        $data['cek']="view";
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dosen',$data);
        $this->load->view('layout/footer'); 
    }

    public function searchDosen()
    {   
        $cari=$this->input->post('cari',true);
        $data['view']= $this->M_Profile->get_cari($cari)->result();
        $data['cek']="cari";
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dosen',$data);
        $this->load->view('layout/footer'); 
    }

    public function tambahDosen()
    {
        $data['view']= $this->M_Profile->get_profile()->result();
        $data['departemen']= $this->M_Kadep->get_departemen()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/tambahDosen',$data);
        $this->load->view('layout/footer'); 
    }

    public function editDosen()
    {
        $nip = $this->input->post('nip');
        $data['view']= $this->M_Profile->getwhere_profile(array('nip'=> $nip))->result();
        $data['departemen']= $this->M_Kadep->get_departemen()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/editDosen',$data);
        $this->load->view('layout/footer'); 
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
        $password = MD5($this->input->post('nip', TRUE));
        $data = [
            "nip"=>$this->input->post('nip',true),
            "nomor_induk"=>$this->input->post('nomor_induk',true),
            "nama"=>$this->input->post('nama',true),
            "jabatan"=>$this->input->post('jabatan',true),
            "pendidikan"=>$this->input->post('pendidikan',true),
            "status_kepegawaian"=>$this->input->post('status_kepegawaian',true),
            "program_studi"=>$this->input->post('program_studi',true),
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
            "nomor_induk"=>$this->input->post('nomor_induk',true),
            "nama"=>$this->input->post('nama',true),
            "jabatan"=>$this->input->post('jabatan',true),
            "pendidikan"=>$this->input->post('pendidikan',true),
            "status_kepegawaian"=>$this->input->post('status_kepegawaian',true),
            "program_studi"=>$this->input->post('program_studi',true),
            
        ];
        $this->M_Profile->update_dosen($nip,$data);
        redirect("admin/dashboard/viewDosen");
    }

    public function viewKadep()
    {
        $data['view']= $this->M_Kadep->get_kadep()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['departemen']= $this->M_Kadep->get_departemen()->result();
        $data['cek']="view";
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/kadep',$data);
        $this->load->view('layout/footer'); 
    }

    public function tambahKadep()
    {
        $data['view']= $this->M_Profile->get_kadep()->result();
        $data['departemen']= $this->M_Kadep->get_departemen()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/tambahKadep',$data);
        $this->load->view('layout/footer'); 
    }

    public function addKadepToDb()
    {
        $this->form_validation->set_rules('nip','nip', 'required');
        $this->form_validation->set_rules('dep','dep', 'required');
        $data = [
            "nip"=>$this->input->post('nip',true),
            "id_departemen"=>$this->input->post('dep',true),
        ];
        $this->M_Profile->insert_kadep($data);
        redirect("admin/dashboard/viewkadep");
    }

    public function editKadepInDb()
    {
        $this->form_validation->set_rules('nama','nama', 'required');
        $password = MD5($this->input->post('password', TRUE));
        $nip = $this->input->post('nip',true);
        
        $data = [
            "nomor_induk"=>$this->input->post('nomor_induk',true),
            "nama"=>$this->input->post('nama',true),
            "id_departemen"=>$this->input->post('dep',true),
            
        ];
        $this->M_Profile->update_kadep($nip,$data);
        redirect("admin/dashboard/viewKadep");
    }

    public function hapusKadep()
    {
        $nip = $this->input->post('nip');
        $data = [
            'nip' => $nip,
        ];
        $this->M_Profile->hapus_kadep($data);
        redirect('admin/dashboard/viewkadep');
    }

    public function editKadep()
    {
        $nip = $this->input->post('nip');
        $data['departemen']= $this->M_Kadep->get_departemen()->result();
        $data['view']= $this->M_Profile->getwhere_kadep(array('nip'=> $nip))->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/editKadep',$data);
        $this->load->view('layout/footer'); 
    }

    public function editAkun()
    {
        $nip = $this->input->post('nip');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['view']= $this->M_Profile->getwhere_profile(array('nip'=> $nip))->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/akun',$data);
        $this->load->view('layout/footer'); 
    }

    public function gantiPass()
    {
        $this->form_validation->set_rules('pass','pass', 'required');
        $password = MD5($this->input->post('pass', TRUE));
        $nip = $this->input->post('nip',true);
        $data = [
            "password"=>$password,
        ];
        $this->M_Profile->update_pass($data,$nip);
        redirect("admin/dashboard/viewDosen");
    }

    

    

}