<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengabdian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() == "1" || $this->admin->is_role()=='4'){
            redirect("login/");
        }
        $this->load->model('M_PropPengabdian');
        $this->load->model('M_Mitra');
        $this->load->model('M_User');
        $this->load->model('M_SumberDana');
        $this->load->model('M_Dosen');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_SkemaPengabdian');
        $this->load->model('M_LaporanAkhirPengabdian');
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['nama'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$user))->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view("dosen/dashboardpengabdian",$data);
    }

    function checkUsername(){
        $userName = $this->input->post('username');
        $if_exists = $this->M_User->checkUserexist($userName);
        if ($if_exists > 0) {
          echo json_encode('Username tidak tersedia');
        } else {
          echo json_encode('Username tersedia');
        }
      }

    public function addformProposal()
    {
        $this->form_validation->set_rules('judul','Judul Pengabdian', 'required');
        $this->form_validation->set_rules('abstrak','Abstrak', 'required');
        $this->form_validation->set_rules('instansi','Nama Instansi', 'required');
        $this->form_validation->set_rules('pj','Penanggung Jawab', 'required');
        $this->form_validation->set_rules('no_telp','Nomor Telepon', 'required');
        $this->form_validation->set_rules('email','Email', 'required');
        $this->form_validation->set_rules('username','Username', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
        if($this->form_validation->run()==false){
            redirect("dosen/pengabdian/pengisianform");
        } else {
            $nip = $this->session->userdata('user_name');
        $data = [
            "nama_instansi"=> $this->input->post('instansi',true),
            "penanggung_jwb"=>$this->input->post('pj',true),
            "no_telp"=> $this->input->post('no_telp',true),
            "alamat"=>$this->input->post('alamat',true),
            "email"=>$this->input->post('email',true),
            "username"=>$this->input->post('username',true),
            "status"=>"0"

        ];
        $mitra=$this->M_Mitra->insert_mitra($data);
        $date = date('Y-m-d');
        $bulan = $this->input->post('bulan',true);
        // $tahun = $this->input->post('tahun',true); 
        // if($tahun=='0' || $tahun==''){
        //     $lama= $bulan." bulan";
        // } else {
        //     $lama = $tahun." tahun ".$bulan." bulan ";
        // }
        $prop = [
            "id_mitra"=>$mitra,
            "nip"=>$nip,
            "judul"=>$this->input->post('judul',true),
            "abstrak"=>$this->input->post('abstrak',true),
            "tgl_upload"=>$date,
            "lokasi"=>$this->input->post('lokasi',true),
            "lama_pelaksanaan"=>$bulan,
            "id_sumberdana"=>$this->input->post('sumberdana',true),
            "biaya"=>$this->input->post('biaya',true),
            "id_skema"=>$this->input->post('skema_pengabdian')

        ];
        $proposal=$this->M_PropPengabdian->insert_proposal($prop);


        /**
         * upload file proposal
         */
        $prop_file = $_FILES['file_prop'];
        if($prop_file=''){}else{
            $config['upload_path'] = './assets/prop_pengabdian';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file_prop')){
                echo "Upload Gagal"; die();
            } else {
                $prop_file=$this->upload->data('file_name');
            }
        }
        $data_file = array('file'=>$prop_file);
        $this->M_PropPengabdian->update_prop($proposal,$data_file);



        $nip= $this->input->post('dosen[]');
        $data_dosen = array();
        for($i=0; $i<count($nip)-1; $i++)
        {
            $data_dosen[$i] = array(
                'nip'  =>      $nip[$i],
                "id_proposal"=>$proposal,
            );
        }
        $this->M_PropPengabdian->dosen($data_dosen);
        
        $nim= $this->input->post('mahasiswa[]');
        $data_mahasiswa = array();
        for($i=0; $i<count($nim)-1; $i++)
        {
            $data_mahasiswa[$i] = array(
                'nim'  =>      $nim[$i],
                "id_proposal"=>$proposal,
            );
        }
        $this->M_PropPengabdian->mahasiswa($data_mahasiswa);


        $role_mitra='4';
        $password= md5($this->input->post('password',true));
        $user_mitra = [
            "username"=>$this->input->post('username',true),
            "password"=>$password,
            "role"=>$role_mitra
        ];
        $this->M_User->insert_user($user_mitra);
            $this->session->set_flashdata('success','Pengajuan proposal berhasil ditambahkan');
            redirect("dosen/pengabdian/submitpermohonan");
        }
        
        
        

    }

    public function PengisianForm()
    {
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $data['skema'] = $this->M_SkemaPengabdian->get_skemapengabdian()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view('dosen/form_permohonan_pengabdian',$data);

    }

    public function UploadSuratMitra()
    {
        $data['view']= $this->M_PropPengabdian->get_viewpengajuan()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view('dosen/upload_surat_mitra',$data);

    }

    public function hapusProposal($id)
    {
        $data = array('id' => $id);
        $mitra_id = $this->M_PropPengabdian->getwhere_proposal($data)->result();
        $data_mitra = array('id' => $mitra_id->id_mitra);
        $mitra = $this->M_Mitra->getwhere_mitra($data_mitra)->result();
        $data_user = array(
            'username' => $mitra->username
        );
        $this->M_User->delete_user($data_user);
        $data_foreign = array('id_proposal'=>$id);
        $this->M_Mitra->delete_mitra($data_mitra);
        $this->M_PropPengabdian->delete_proposal($data);
        $this->M_Dosen->delete_dosenpengabdian($data_foreign);
        $this->M_Mahasiswa->delete_mahasiswapengabdian($data_foreign);
        redirect('dosen/pengabdian/submitpermohonan');



    }

    public function SubmitPermohonan()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPengabdian->get_viewpengajuan()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        // $data = array(
        //     'sumberdana' => $this->M_SumberDana->get_sumberdana(),
        //     'sumberdana_selected' => '',
        // );
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view('dosen/formpengabdian', $data);

    }

    public function updateSurat()
    {
        $surat = $_FILES['file_persetujuan'];
        if($surat=''){}else{
            $config['upload_path'] = './assets/suratmitra';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file_persetujuan')){
                echo "Upload Gagal"; die();
            } else {
                $surat=$this->upload->data('file_name');
            }
        }
        $id = $this->input->post('id');
        $data = array('file_persetujuan'=>$surat);
        $this->M_Mitra->update_mitra($id,$data);
        redirect('dosen/pengabdian/submitpermohonan');
    }

    public function uploadLaporanAkhir()
    {
        $surat = $_FILES['laporan_akhir'];
        if($surat=''){}else{
            $config['upload_path'] = './assets/laporan_akhir';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('laporan_akhir')){
                echo "Upload Gagal"; die();
            } else {
                $surat=$this->upload->data('file_name');
            }
        }
        $id = $this->input->post('id');
        $data = array('laporan_akhir'=>$surat);
        $this->M_LaporanAkhirPengabdian->update_laporan($id,$data);
        redirect('dosen/pengabdian/laporanakhir');
    }

    public function uploadLogbook()
    {
        $surat = $_FILES['logbook'];
        if($surat=''){}else{
            $config['upload_path'] = './assets/logbook';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('logbook')){
                echo "Upload Gagal"; die();
            } else {
                $surat=$this->upload->data('file_name');
            }
        }
        $id = $this->input->post('id');
        $data = array('logbook'=>$surat);
        $this->M_LaporanAkhirPengabdian->update_laporan($id,$data);
        redirect('dosen/pengabdian/laporanakhir');
    }

    public function uploadBelanja()
    {
        $surat = $_FILES['belanja'];
        if($surat=''){}else{
            $config['upload_path'] = './assets/belanja';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('belanja')){
                echo "Upload Gagal"; die();
            } else {
                $surat=$this->upload->data('file_name');
            }
        }
        $id = $this->input->post('id');
        $data = array('belanja'=>$surat);
        $this->M_LaporanAkhirPengabdian->update_laporan($id,$data);
        redirect('dosen/pengabdian/laporanakhir');
    }

    public function uploadLuaran()
    {
        $surat = $_FILES['luaran'];
        if($surat=''){}else{
            $config['upload_path'] = './assets/luaran';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('luaran')){
                echo "Upload Gagal"; die();
            } else {
                $surat=$this->upload->data('file_name');
            }
        }
        $id = $this->input->post('id');
        $data = array('luaran'=>$surat);
        $this->M_LaporanAkhirPengabdian->update_laporan($id,$data);
        redirect('dosen/pengabdian/laporanakhir');
    }

    public function editProposal($id){
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['proposal'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['proposal']->id_mitra;
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $data['skema'] = $this->M_SkemaPengabdian->get_skemapengabdian()->result();
        $data['anggota_dosen'] = $this->M_PropPengabdian->dosen_update_prop($id);
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view('dosen/upproppengabdian',$data);
    }

    public function updateProposal(){
        $this->form_validation->set_rules('judul','Judul Pengabdian', 'required');
        $this->form_validation->set_rules('abstrak','Abstrak', 'required');
        $id = $this->input->post('id');
        $nip = $this->session->userdata('user_name');
        
        $date = date('Y-m-d');
        
        $prop = array (
            "nip"=>$nip,
            "judul"=>$this->input->post('judul',true),
            "abstrak"=>$this->input->post('abstrak',true),
            "tgl_upload"=>$date,
            "lokasi"=>$this->input->post('lokasi',true),
            "biaya"=>$this->input->post('biaya',true),
    );
        $proposal=$this->M_PropPengabdian->update_prop($id,$prop);
        /**
         * upload file proposal
         */
        
            $prop_file = $_FILES['file_prop'];
            if(!empty($prop_file['name'])){
                $config['upload_path'] = './assets/prop_pengabdian';
                $config['allowed_types'] = 'pdf';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file_prop')){
                    echo "Upload Gagal"; die();
                } else {
                    $prop_file=$this->upload->data('file_name');
                }
                $data_file = array('file'=>$prop_file);
            $this->M_PropPengabdian->update_prop($id,$data_file);
            }
            

        // $nip= $this->input->post('dosen[]');
        // $data_dosen = array();
        // for($i=0; $i<count($nip)-1; $i++)
        // {
        //     $data_dosen[$i] = array(
        //         'nip'  =>      $nip[$i],
        //         "id_proposal"=>$proposal,
        //     );
        // }
        // $this->M_PropPengabdian->dosen($data_dosen);
        
        // $nim= $this->input->post('mahasiswa[]');
        // $data_mahasiswa = array();
        // for($i=0; $i<count($nim)-1; $i++)
        // {
        //     $data_mahasiswa[$i] = array(
        //         'nim'  =>      $nim[$i],
        //         "id_proposal"=>$proposal,
        //     );
        // }
        // $this->M_PropPengabdian->mahasiswa($data_mahasiswa);


        // $role_mitra='4';
        // $password= md5($this->input->post('password',true));
        // $user_mitra = [
        //     "username"=>$this->input->post('username',true),
        //     "password"=>$password,
        //     "role"=>$role_mitra
        // ];
        // $this->M_User->insert_user($user_mitra);
        if($this->form_validation->run()==false){
            redirect("dosen/pengabdian/pengisianform");
        } else {
            $this->session->set_flashdata('success','Pengajuan proposal berhasil ditambahkan');
            redirect("dosen/pengabdian/submitpermohonan");
        }

    }

    public function finalSubmitProp($id){
        $data = array('status'=>'SUBMITTED');
        $this->M_PropPengabdian->update_prop($id,$data);
        redirect('dosen/pengabdian/submitpermohonan');

    }

    public function DaftarPermohonan()
    {
        $data['view']= $this->M_PropPengabdian->get_viewpengajuan()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view('dosen/daftar_permohonan_pengabdian', $data);

    }

    public function laporanAkhir()
    {
        $data['view']= $this->M_PropPengabdian->get_viewlaporanakhir()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian');
        $this->load->view('dosen/laporan_akhir_pengabdian', $data);

    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}