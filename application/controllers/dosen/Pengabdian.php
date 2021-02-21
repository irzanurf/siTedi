<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengabdian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        //cek session dan level user
        if($this->Admin->is_role() == "1" || $this->Admin->is_role()=='4'){
            redirect("login/");
        }
        $this->load->model('M_PropPengabdian');
        $this->load->model('M_Mitra');
        $this->load->model('M_User');
        $this->load->model('M_Profile');
        $this->load->model('M_SumberDana');
        $this->load->model('M_Dosen');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_SkemaPengabdian');
        $this->load->model('M_Admin');
        $this->load->model('M_LaporanAkhirPengabdian');
        $this->load->model('M_JadwalPengabdian');
        $this->load->model('M_Luaran');
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['nama'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$user))->row();
        $data['berita'] = $this->M_Admin->get_berita(array('id'=>2))->result();
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$user))->result();
        $data['view']= $this->M_PropPengabdian->get_viewpengajuan()->result();
        $this->load->view('pengabdian/header',$nama);
        $this->load->view("dosen/dashboardpengabdian",$data);
        $this->load->view("pengabdian/footer");
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
        $jadwal = $this->M_JadwalPengabdian->get_last_jadwal()->row()->id;
        $biaya = str_replace('.','',$this->input->post('biaya',true));
        
        $prop = [
            "id_mitra"=>$mitra,
            "nip"=>$nip,
            "judul"=>$this->input->post('judul',true),
            "abstrak"=>$this->input->post('abstrak',true),
            "tgl_upload"=>$date,
            "id_jadwal" => $jadwal,
            "lokasi"=>$this->input->post('lokasi',true),
            "lama_pelaksanaan"=>$bulan,
            "id_sumberdana"=>$this->input->post('sumberdana',true),
            "biaya"=>$biaya,
            "id_skema"=>$this->input->post('skema_pengabdian')

        ];
        $proposal=$this->M_PropPengabdian->insert_proposal($prop);


        /**
         * upload file proposal
         */
        
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

        $id_luaran= $this->input->post('luaran[]');
        $data_luaran = array();
        for($i=0; $i<count($id_luaran)-1; $i++)
        {
            $data_luaran[$i] = array(
                'id_luaran'  =>$id_luaran[$i],
                "id_proposal"=>$proposal,
            );
        }
        $this->M_PropPengabdian->luaran($data_luaran);
        
        $nim= $this->input->post('nim_mahasiswa[]');
        $nama_mhs = $this->input->post('nama_mahasiswa[]');
        $data_mahasiswa = array();
        for($i=0; $i<count($nim)-1; $i++)
        {
            $data_mahasiswa[$i] = array(
                'nim'  => $nim[$i],
                'nama' => $nama_mhs[$i],
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
        $nip = $this->session->userdata('user_name');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $data['skema'] = $this->M_SkemaPengabdian->get_skemapengabdian()->result();
        $data['luaran']= $this->M_Luaran->get_luaran_pengabdian()->result();
        $data['jadwal'] = $this->M_JadwalPengabdian->get_last_jadwal()->row();
        $now = date('Y-m-d', strtotime(date('Y-m-d')));
        $awal = date('Y-m-d', strtotime($data['jadwal']->tgl_mulai));
        $akhir = date('Y-m-d', strtotime($data['jadwal']->tgl_selesai));
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();

        
        $this->load->view('pengabdian/header',$nama);
        if(($now >= $awal) && ($now<=$akhir)){
            $this->load->view('dosen/form_permohonan_pengabdian',$data);
        } else {
            $this->load->view('dosen/closed_form', $data);
        }
        $this->load->view('pengabdian/footer');
    }
        
    public function UploadSuratMitra()
    {
        $nip = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPengabdian->get_viewpengajuan()->result();
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('pengabdian/header',$nama);
        $this->load->view('dosen/upload_surat_mitra',$data);
        $this->load->view('pengabdian/footer');

    }



    public function hapusProposal($id)
    {
        $data = array('id' => $id);
        $mitra_id = $this->M_PropPengabdian->getwhere_proposal($data)->row();
        $data_mitra = array('id' => $mitra_id->id_mitra);
        $mitra = $this->M_Mitra->getwhere_mitra($data_mitra)->row();
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
        $nip = $this->session->userdata('user_name');
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPengabdian->get_viewpengajuan()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        // $data = array(
        //     'sumberdana' => $this->M_SumberDana->get_sumberdana(),
        //     'sumberdana_selected' => '',
        // );
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('pengabdian/header',$nama);
        $this->load->view('dosen/formpengabdian', $data);
        $this->load->view('pengabdian/footer');

    }

    public function updateSurat()
    {
        $surat = $_FILES['file_persetujuan'];
        if(!empty($surat['name'])){
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
        $data['luaran']= $this->M_Luaran->get_luaran_pengabdian()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $data['skema'] = $this->M_SkemaPengabdian->get_skemapengabdian()->result();
        $data['anggota_dosen'] = $this->M_PropPengabdian->dosen_update_prop($id)->result();
        $data['anggota_mhs'] = $this->M_PropPengabdian->mhs_update_prop($id)->result();
        $data['nilai_luaran'] = $this->M_PropPengabdian->luaran_update_prop($id)->result();
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $this->session->userdata('user_name');
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('pengabdian/header',$nama);
        $this->load->view('dosen/upproppengabdian',$data);
        $this->load->view('pengabdian/footer');
    }

    public function updateProposal(){
        $this->form_validation->set_rules('judul','Judul Pengabdian', 'required');
        $this->form_validation->set_rules('abstrak','Abstrak', 'required');
        $id = $this->input->post('id');
        $nip = $this->session->userdata('user_name');
        $data_proposal = $this->M_PropPengabdian->getwhere_proposal(array('id'=> $id))->row();
        
        $date = date('Y-m-d');
        $old_username_mitra = $this->M_Mitra->getwhere_mitra(array('id'=>$data_proposal->id_mitra))->row()->username;
        $biaya = str_replace('.','',$this->input->post('biaya',true));
        $prop = array (
            "nip"=>$nip,
            "judul"=>$this->input->post('judul',true),
            "abstrak"=>$this->input->post('abstrak',true),
            "tgl_upload"=>$date,
            "lokasi"=>$this->input->post('lokasi',true),
            "biaya"=>$biaya,
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
            /* update anggota dosen */
            $dsn_update = $this->input->post('dosen[]');
            $id_dsn_anggota = $this->input->post('id_dsn_anggota[]');
            $dsn_new = $this->input->post('dosen_new[]');
            $data_dsn_anggota = $this->M_PropPengabdian->dosen_update_prop($id)->result();
            $luaran_update = $this->input->post('luaran[]');
            $id_nilai_luaran = $this->input->post('id_nilai_luaran[]');
            $luaran_new = $this->input->post('luaran_new[]');
            $data_nilai_luaran = $this->M_PropPengabdian->luaran_update_prop($id)->result();
            // print_r($dsn_update);
            if(!empty($dsn_update)){
            foreach($data_dsn_anggota as $k){
                for($i=0;$i<count($dsn_update);$i++){
                    if($k->id == $id_dsn_anggota[$i]){
                        
                        $dsn=$dsn_update[$i];
                        $data_dosen =[
                            'nip' => $dsn,
                        ];
                        $this->M_PropPengabdian->update_dosen_anggota($data_dosen, $id_dsn_anggota[$i]);
                        continue 2;
                    }
                } 
                $this->M_PropPengabdian->hapus_dosen_anggota(array('id'=>$k->id));
            }
        }
        if(!empty($luaran_update)){
            foreach($data_nilai_luaran as $k){
                for($i=0;$i<count($luaran_update);$i++){
                    if($k->id == $id_nilai_luaran[$i]){
                        
                        $luaran=$luaran_update[$i];
                        $data_luaran =[
                            'id_luaran' => $luaran,
                        ];
                        $this->M_PropPengabdian->update_nilai_luaran($data_luaran, $id_nilai_luaran[$i]);
                        continue 2;
                    }
                } 
                $this->M_PropPengabdian->hapus_nilai_luaran(array('id'=>$k->id));
            }
        }
        if(empty($dsn_update)){
            for($j=0; $j<count($dsn_new)-1;$j++)
                {
                    $this->M_PropPengabdian->hapus_dosen_anggota(array('id_proposal'=>$id));
                    $dosen_new=$dsn_new[$j];
                    $data_dosen_new =[
                        'nip' => $dosen_new,
                        'id_proposal' => $id
                    ];
                    $this->M_PropPengabdian->insert_dsn_anggota($data_dosen_new);
                }
            }
            
            
            if(empty($luaran_update)){
                for($j=0; $j<count($luaran_new)-1;$j++)
                {
                    $this->M_PropPengabdian->hapus_nilai_luaran(array('id_proposal'=>$id));
                    $l_new=$luaran_new[$j];
                    $data_luaran_new =[
                        'id_luaran' => $l_new,
                        'id_proposal' => $id
                    ];
                    $this->M_PropPengabdian->insert_nilai_luaran($data_luaran_new);
                }
            }

        /* update anggota mahasiswa */
        $mhs_update = $this->input->post('nim_mahasiswa[]');
        $mhs_nama_update = $this->input->post('nama_mahasiswa[]');
        $id_mhs_anggota = $this->input->post('id_mhs_anggota[]');
        $mhs_new = $this->input->post('nim_mahasiswa_new[]');
        $mhs_nama_new = $this->input->post('nama_mahasiswa_new[]');
        $data_mhs_anggota = $this->M_PropPengabdian->mhs_update_prop($id)->result();

        foreach($data_mhs_anggota as $k){
            for($i=0;$i<count($mhs_update);$i++){
                if($k->id == $id_mhs_anggota[$i]){
                    $mhs=$mhs_update[$i];
                    $data_mhs =[
                        'nim' => $mhs,
                        'nama'=> $mhs_nama_update[$i],
                    ];
                    $this->M_PropPengabdian->update_mhs_anggota($data_mhs, $id_mhs_anggota[$i]);
                    continue 2;
                }
            } 
            $this->M_PropPengabdian->hapus_mhs_anggota(array('id'=>$k->id));
        }

        for($j=0; $j<count($mhs_new)-1;$j++)
            {
                $mahasiswa_new=$mhs_new[$j];
                $data_mhs_new =[
                    'nim' => $mahasiswa_new,
                    'nama' => $mhs_nama_new[$j],
                    'id_proposal' => $id
                ];
                $this->M_PropPengabdian->insert_mhs_anggota($data_mhs_new);
            }

        /* edit mitra  */

        $id_mitra = $this->input->post('id_mitra');
        $data_mitra = [
            "nama_instansi"=> $this->input->post('instansi',true),
            "penanggung_jwb"=>$this->input->post('pj',true),
            "no_telp"=> $this->input->post('no_telp',true),
            "alamat"=>$this->input->post('alamat',true),
            "email"=>$this->input->post('email',true),
            "username"=>$this->input->post('username',true),
        ];

        $this->M_Mitra->update_mitra($id_mitra, $data_mitra);

        $pass = $this->input->post('password');
        if($pass != null){
            $data_user_mitra = [
                'username' =>$this->input->post('username'),
                'password' =>md5($pass)
            ];

        } else{
            $data_user_mitra = [
                'username' => $this->input->post('username')
            ];
        }

        $this->M_User->update_user($old_username_mitra, $data_user_mitra);

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
        $nip = $this->session->userdata('user_name');
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('pengabdian/header',$nama);
        $this->load->view('dosen/daftar_permohonan_pengabdian', $data);
        $this->load->view('pengabdian/footer');

    }

    public function laporanAkhir()
    {
        $data['view']= $this->M_PropPengabdian->get_viewlaporanakhir()->result();
        $nip = $this->session->userdata('user_name');
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('pengabdian/header',$nama);
        $cekjad=$data['jadwal'] = $this->M_JadwalPengabdian->get_last_jadwal()->row();
        if (empty($cekjad)){
            $this->load->view('dosen/closed_form_akhir', $data);
        }
        else{
        $now = date('Y-m-d', strtotime(date('Y-m-d')));
        $awal = date('Y-m-d', strtotime($data['jadwal']->tgl_mulai));
        $akhir = date('Y-m-d', strtotime($data['jadwal']->tgl_akhir));
        if(($now>= $awal) && ($now<=$akhir)){
            $this->load->view('dosen/laporan_akhir_pengabdian', $data);

        } 
     else {
        $this->load->view('dosen/closed_form_akhir', $data);
    }
}
$this->load->view('pengabdian/footer');
        
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}