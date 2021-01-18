<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penelitian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $current_user=$this->admin->is_role();
        //cek session dan level user
        if(!(($current_user != "2") || ($current_user != "3"))){
            redirect("login/");
        }
        $this->load->model('M_PropPenelitian');
        $this->load->model('M_SumberDana');
        $this->load->model('M_Luaran');
        $this->load->model('M_Dosen');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_Jenisp');
        $this->load->model('M_Profile');
        $this->load->model('M_JadwalPenelitian');
    }

    public function index()
    {
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dashboard', $nama);
        $this->load->view("penelitian/footer");
    }

    public function addformProposal()
    {
        $this->form_validation->set_rules('judul','Judul Penelitian', 'required');
        $this->form_validation->set_rules('abstrak','Abstrak', 'required');
        $this->form_validation->set_rules('luaran','Luaran','required');
        $this->form_validation->set_rules('lokasi','Lokasi','required');
        $nip = $this->session->userdata('user_name');
        $date = date('Y-m-d');
        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true); 
        if($tahun=='0' || $tahun==''){
            $lama= $bulan." bulan";
        } else {
            $lama = $tahun." tahun ".$bulan." bulan ";
        }
        $prop_file = $_FILES['file_prop'];
        if($prop_file=''){}else{
            $config['upload_path'] = './assets/prop_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file_prop')){
                echo "Upload Gagal"; die();
            } else {
                $prop_file=$this->upload->data('file_name');
            }
        }
        $jadwal = $this->M_JadwalPenelitian->get_last_jadwal()->row()->id;
        $prop = [
            "nip"=>$nip,
            "judul"=>$this->input->post('judul',true),
            "abstrak"=>$this->input->post('abstrak',true),
            "id_jenis"=>$this->input->post('jenis',true),
            "id_luaran"=>$this->input->post('luaran',true),
            "id_jadwal" => $jadwal,
            "tgl_upload"=>$date,
            "lokasi"=>$this->input->post('lokasi',true),
            "mitra"=>$this->input->post('mitra',true),
            "lama_pelaksanaan"=>$lama,
            "id_sumberdana"=>$this->input->post('sumberdana',true),
            "biaya"=>$this->input->post('biaya',true),
            "file"=>$prop_file

        ];
        $proposal=$this->M_PropPenelitian->insert_proposal($prop);

        $nip= $this->input->post('dosen[]');
        $data_dosen = array();
        for($i=0; $i<count($nip)-1; $i++)
        {
            $data_dosen[$i] = array(
                'nip'  =>      $nip[$i],
                "id_proposal"=>$proposal,
            );
        }
        $this->M_PropPenelitian->dosen($data_dosen);
        
        $nim= $this->input->post('mahasiswa[]');
        $data_mahasiswa = array();
        for($i=0; $i<count($nim)-1; $i++)
        {
            $data_mahasiswa[$i] = array(
                'nim'  =>      $nim[$i],
                "id_proposal"=>$proposal,
            );
        }
        $this->M_PropPenelitian->mahasiswa($data_mahasiswa);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Anda Berhasil Menginput Data</strong></div>');
            redirect("dosen/penelitian/submit");
    }
        

    public function PengisianForm()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->get_viewpenelitian()->result();
        $data['jenispenelitian']= $this->M_Jenisp->get_jenispenelitian()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['luaran']= $this->M_Luaran->get_luaran()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();

        $data['jadwal'] = $this->M_JadwalPenelitian->get_last_jadwal()->row();
        $now = date('Y-m-d', strtotime(date('Y-m-d')));
        $awal = date('Y-m-d', strtotime($data['jadwal']->tgl_mulai));
        $akhir = date('Y-m-d', strtotime($data['jadwal']->tgl_selesai));

        $this->load->view('penelitian/header', $nama);
        if(($now>= $awal) && ($now<=$akhir)){
            $this->load->view('dosen/penelitian/pengisianform', $data);
        } else{
            $this->load->view('dosen/penelitian/closed_form', $data);
        }
        
        $this->load->view("penelitian/footer");
    }
    
    public function EditPenelitian()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->get_viewpenelitian()->result();
        $data['v']= $this->M_PropPenelitian->get_penelitian()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['luaran']= $this->M_Luaran->get_luaran()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view("layout_penelitian/sidebar");
        $this->load->view('dosen/editpenelitian', $data);
    }

    public function submit()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->getwhere_viewpenelitian(array('nip'=>$username))->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/submit', $data);
        $this->load->view("penelitian/footer");
    }

    public function detailProposal(){
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->get_viewpenelitian()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['luaran']= $this->M_Luaran->get_luaran()->result();
        $id = $this->input->post('id');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/detailproposal',$data);
        $this->load->view("penelitian/footer");
        
    }

    public function editformProposal()
    {
        $id=$this->input->post('id');
        $this->form_validation->set_rules('judul','Judul Penelitian', 'required');
        $this->form_validation->set_rules('abstrak','Abstrak', 'required');
        $this->form_validation->set_rules('luaran','Luaran','required');
        $this->form_validation->set_rules('lokasi','Lokasi','required');
        $nip = $this->session->userdata('user_name');
        $date = date('Y-m-d');
        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true); 
        if($tahun=='0' || $tahun==''){
            $lama= $bulan." bulan";
        } else {
            $lama = $tahun." tahun ".$bulan." bulan ";
        }
        $prop = [
            "nip"=>$nip,
            "judul"=>$this->input->post('judul',true),
            "abstrak"=>$this->input->post('abstrak',true),
            "id_luaran"=>$this->input->post('abstrak',true),
            "tgl_upload"=>$date,
            "lokasi"=>$this->input->post('lokasi',true),
            "mitra"=>$this->input->post('mitra',true),
            "lama_pelaksanaan"=>$lama,
            "id_sumberdana"=>$this->input->post('sumberdana',true),
            "biaya"=>$this->input->post('biaya',true)

        ];
        
        $proposal=$this->M_PropPenelitian->update_prop($id,$prop);
        if($this->form_validation->run()==false){
            redirect("dosen/penelitian/pengisianform");
        } else {
            redirect("dosen/penelitian/pengisianform");
        }
        

    }

    public function uploadFileProp(){
        $id=$this->input->post('id');
        $prop = $_FILES['file_prop'];
        if($prop=''){}else{
            $config['upload_path'] = './assets/prop_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file_prop')){
                echo "Upload Gagal"; die();
            } else {
                $prop=$this->upload->data('file_name');
            }
        }
        $data = [
            "file"=>$prop,];
        $this->M_PropPenelitian->update_prop($id,$data);
        redirect('dosen/penelitian/');

    }

    public function editProposal(){
        $id = $this->input->post('id');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/editpropenelitian',$data);
        $this->load->view("penelitian/footer");
    }

    public function finishClick(){
        $id = $this->input->post('id');
        $nip = $this->session->userdata('user_name');
        $prop = [
            "nip"=>$nip,
            "id_proposal"=>$id,
        ];
        $data = [
            "status"=>"1",];
            $this->M_PropPenelitian->update_prop($id,$data);

        redirect('dosen/penelitian/submit');
    }

    public function monev()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->getwhere_viewmonev(array('proposal_penelitian.nip'=>$username))->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/monev', $data);
        $this->load->view("penelitian/footer");
    }

    public function editMonev(){
        $id = $this->input->post('id');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/uploadmonev',$data);
        $this->load->view("penelitian/footer");
    }

    public function uploadMonev(){
        $id=$this->input->post('id');
        $nip = $this->session->userdata('user_name');
        $date = date('Y-m-d');
        $config['upload_path'] = './assets/monev_penelitian';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $prop1 = $_FILES['file1'];
        $prop2 = $_FILES['file2'];
        $prop3 = $_FILES['file3'];
        
        if($prop1=''){}else{
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file1')){
                echo "Upload Gagal"; die();
            } else {
                $prop1=$this->upload->data('file_name');
            }
        }

        if($prop2=''){}else{
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file2')){
                echo "Upload Gagal"; die();
            } else {
                $prop2=$this->upload->data('file_name');
            }
        }

        if($prop3=''){}else{
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file3')){
                echo "Upload Gagal"; die();
            } else {
                $prop3=$this->upload->data('file_name');
            }
        }

        $data = [
            "id_proposal"=>$id,
            "nip"=>$nip,
            "file1"=>$prop1,
            "file2"=>$prop2,
            "file3"=>$prop3,
            "catatan"=>$this->input->post('catatan',true),
            "tgl_upload"=>$date];
        $this->M_PropPenelitian->update_monev($data,$id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Anda Berhasil Menginput Data</strong></div>');
        redirect('dosen/penelitian/monev');

    }

    public function finishClickMonev(){
        $id = $this->input->post('id');
        $data = [
            "status"=>"1",];
            $this->M_PropPenelitian->status_monev($id,$data);
        $stat = [
            "status"=>"3",];
            $this->M_PropPenelitian->update_prop($id,$stat);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Finalisasi Berhasil</strong></div>');   
        redirect('dosen/penelitian/monev');
    }


    public function akhir()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->getwhere_viewakhir(array('proposal_penelitian.nip'=>$username))->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/akhir', $data);
        $this->load->view("penelitian/footer");
    }

    public function editAkhir(){
        $id = $this->input->post('id');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/uploadakhir',$data);
        $this->load->view("penelitian/footer");
    }

    public function uploadAkhir(){
        $id=$this->input->post('id');
        $nip = $this->session->userdata('user_name');
        $date = date('Y-m-d');
        $config['upload_path'] = './assets/lap_akhir_penelitian';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $prop1 = $_FILES['file1'];
        $prop2 = $_FILES['file2'];
        $prop3 = $_FILES['file3'];
        $prop4 = $_FILES['file4'];
        
        if($prop1=''){}else{
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file1')){
                echo "Upload Gagal"; die();
            } else {
                $prop1=$this->upload->data('file_name');
            }
        }

        if($prop2=''){}else{
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file2')){
                echo "Upload Gagal"; die();
            } else {
                $prop2=$this->upload->data('file_name');
            }
        }

        if($prop3=''){}else{
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file3')){
                echo "Upload Gagal"; die();
            } else {
                $prop3=$this->upload->data('file_name');
            }
        }

        if($prop4=''){}else{
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file4')){
                echo "Upload Gagal"; die();
            } else {
                $prop4=$this->upload->data('file_name');
            }
        }

        $data = [
            "id_proposal"=>$id,
            "nip"=>$nip,
            "file1"=>$prop1,
            "file2"=>$prop2,
            "file3"=>$prop3,
            "file4"=>$prop4,
            "catatan"=>$this->input->post('catatan',true),
            "tgl_upload"=>$date];
        $this->M_PropPenelitian->update_akhir($data,$id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Anda Berhasil Menginput Data</strong></div>');
        redirect('dosen/penelitian/akhir');

    }

    public function finishClickAkhir(){
        $id = $this->input->post('id');
        $data = [
            "status"=>"1",];
            $this->M_PropPenelitian->status_akhir($id,$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Finalisasi Berhasil</strong></div>');   
        redirect('dosen/penelitian/akhir');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}