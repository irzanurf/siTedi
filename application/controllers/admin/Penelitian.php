<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penelitian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        //cek session dan level user
        if($this->Admin->is_role() != "1"){
            redirect("login/");
        }
        $this->load->config('email');
        $this->load->library('email');
        $this->load->model('M_PropPenelitian');
        $this->load->model('M_User');
        $this->load->model('M_SumberDana');
        $this->load->model('M_Dosen');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_Admin');
        $this->load->model('M_AdminPenelitian');
        $this->load->model('M_ReviewerPenelitian');
        $this->load->model('M_SkemaPenelitian');
        $this->load->model('M_KomponenNilaiPenelitian');
        $this->load->model('M_JadwalPenelitian');
        $this->load->model('M_Luaran');
        $this->load->model('M_Jenisp');
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['user'] = $this->M_Admin->getwhere_admin(array('nip'=>$user))->row();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('layout/footer');
    }

    public function berita()
    {
        
        $data = $this->M_Admin->get_berita(array('id'=>1))->row();
        
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/berita',$data);
        $this->load->view('layout/footer');
    }

    public function Saveberita(){
        $berita=$this->input->post('berita');
        $id=1;
        $data=[
            "berita"=>$berita,
        ];
        $this->M_Admin->simpan_berita($id,$data);
        $this->session->set_flashdata('error','Pengumuman berhasil ter-update' );
        redirect('admin/penelitian/berita');
    }

    public function daftarPenelitian()
    {
        $data['view'] = $this->M_AdminPenelitian->get_viewPenelitian()->result();
        
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/daftar_prop_penelitian',$data);
        $this->load->view('layout/footer'); 

    }

    public function jadwalpenelitian()
    {
        $data['jadwal'] = $this->M_JadwalPenelitian->get_jadwal()->result();
       
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/jadwal_penelitian',$data);
        $this->load->view('layout/footer'); 

    }

    public function formJadwal()
    {
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/form_jadwal_penelitian');
        $this->load->view('layout/footer'); 

    }

    public function editJadwalPenelitian($id)
    {
        $data['jadwal'] = $this->M_JadwalPenelitian->getwhere_jadwal(array('id'=>$id))->row();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/edit_jadwal_penelitian', $data);
        $this->load->view('layout/footer'); 

    }

    public function hapusJadwalPenelitian($id)
    {
        $this->M_JadwalPenelitian->hapus_jadwal(array('id'=>$id));
        redirect('admin/penelitian/jadwalpenelitian');
    }

    public function submitJadwalPenelitian()
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_monev' => $this->input->post('tgl_monev'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
        ];
        $this->M_JadwalPenelitian->insert_jadwal($data);
        redirect('admin/penelitian/jadwalpenelitian');
    }


    public function updateJadwalPenelitian()
    {
        $id = $this->input->post('id');
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),       
            'tgl_monev' => $this->input->post('tgl_monev'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'tgl_selesai' =>$this->input->post('tgl_selesai')
        ];

        $this->M_JadwalPenelitian->update_jadwal($data, $id);
        redirect('admin/penelitian/jadwalpenelitian');
    }

    public function jadwal()
    {
        $data['view'] = $this->M_AdminPenelitian->get_jadwal()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/jadwal',$data);
        $this->load->view('layout/footer'); 
    }

    public function tambahJadwal()
    {
        $data = [
            "tgl_mulai"=>date('Y-m-d',strtotime($this->input->post('tgl_mulai'))),
            "tgl_monev"=>date('Y-m-d',strtotime($this->input->post('tgl_monev'))),
            "tgl_akhir"=>date('Y-m-d',strtotime($this->input->post('tgl_akhir'))),
            "tgl_selesai"=>date('Y-m-d',strtotime($this->input->post('tgl_selesai'))),   
        ];
        $this->M_AdminPenelitian->insert_jadwal($data);
        redirect('admin/penelitian/jadwal');
    }

    public function submitAllMonev()
    {
        $monevs = $this->M_PropPenelitian->get_needSubmitMonev()->result();
        foreach($monevs as $monev){
            $stat_monev = [
                'status' => 1
            ];
            $stat_prop = [
                'status' => 3
            ];
            $this->M_PropPenelitian->update_prop($monev->id_proposal, $stat_prop);
            $this->M_PropPenelitian->update_monev($stat_monev,$monev->id_proposal);
        }
        redirect('admin/penelitian/monev');

    }

    public function submitAllAkhir()
    {
        $akhirs = $this->M_PropPenelitian->get_needSubmitAkhir()->result();
        foreach($akhirs as $akhir){
            $stat_akhir = [
                'status' => 1
            ];
            $stat_prop = [
                'status' => 4
            ];
            $this->M_PropPenelitian->update_prop($akhir->id_proposal, $stat_prop);
            $this->M_PropPenelitian->update_akhir($stat_akhir,$akhir->id_proposal);
        }
        redirect('admin/penelitian/akhir');

    }

    public function assignProposal()
    {
        $data['view'] = $this->M_AdminPenelitian->get_viewAssign()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/assign',$data);
        $this->load->view('layout/footer'); 

    }

    public function setReviewer($id)
    {
        $data['prop'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPenelitian->get_reviewer()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/setreviewer',$data);
        $this->load->view('layout/footer'); 
    }

    public function EditReviewer($id)
    {
        $data['prop'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPenelitian->get_reviewer()->result();
        $data['assigned'] = $this->M_AdminPenelitian->getwhere_assignment(array('id_proposal'=>$id))->row();

        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/editreviewer',$data);
        $this->load->view('layout/footer'); 
    }

    public function submitAssignEdit()
    {
        $idProp = $this->input->post('id');
        $reviewer = $this->input->post('reviewer');
        $reviewer2 = $this->input->post('reviewer2');
        $data = [
            'id_proposal' => $idProp,
            'reviewer' => $reviewer,
            'reviewer2' => $reviewer2
        ];

        $status = [
            'status' => 10,
        ];
        
        $this->M_AdminPenelitian->update_reviewer($data,$idProp);
        $this->M_PropPenelitian->update_prop($idProp,$status);
        redirect('admin/penelitian/assignProposal');
    }

    public function submitAssignReviewer()
    {
        $idProp = $this->input->post('id');
        $reviewer = $this->input->post('reviewer');
        $reviewer2 = $this->input->post('reviewer2');
        $data = [
            'id_proposal' => $idProp,
            'reviewer' => $reviewer,
            'reviewer2' => $reviewer2
        ];
        $this->M_AdminPenelitian->insert_reviewer($data);
        redirect('admin/penelitian/assignProposal');
    }

    public function showReviewer()
    {
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['view'] = $this->M_ReviewerPenelitian->get_reviewer()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/showrev',$data);
        $this->load->view('layout/footer'); 
    }

    public function tambahReviewer()
    {
        $nip = $this->input->post('reviewer');
        $data['reviewer'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $nama = $data['reviewer']->nama;
        $data = [
            'nip' => $nip,
            'nama' => $nama
        ];
        $role = [
            'role' => 2
        ];
        $this->M_AdminPenelitian->insert_reviewerpenelitian($data,$nip);
        $this->M_AdminPenelitian->updaterole_reviewerpenelitian($nip,$role);
        redirect('admin/penelitian/showReviewer');
        
    }

    public function hapusReviewer()
    {
        $nip = $this->input->post('nip');
        $data = [
            'nip' => $nip,
        ];
        $this->M_AdminPenelitian->hapus_reviewerpenelitian($data);
        redirect('admin/penelitian/showReviewer');
        
    }

    public function approval()
    {
        $data['view'] = $this->M_AdminPenelitian->get_viewApproval()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/approval',$data);
        $this->load->view('layout/footer'); 

    }

    public function editProposal($id){
        $data['view']= $this->M_PropPenelitian->get_viewpenelitian()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['luaran']= $this->M_Luaran->get_luaran_penelitian()->result();
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $data['skema'] = $this->M_SkemaPenelitian->get_skemapenelitian()->result();
        $data['anggota_dosen'] = $this->M_PropPenelitian->dosen_update_prop($id)->result();
        $data['nilai_luaran'] = $this->M_PropPenelitian->luaran_update_prop($id)->result();
        $data['anggota_mhs'] = $this->M_PropPenelitian->mhs_update_prop($id)->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/editProposal',$data);
        $this->load->view('layout/footer'); 
        
    }

    public function editformProposal()
    {
            $id = $this->input->post('id');
            $this->form_validation->set_rules('judul','Judul Pengabdian', 'required');
            $this->form_validation->set_rules('abstrak','Abstrak', 'required');
            $this->form_validation->set_rules('nip','nip', 'required');
            $this->form_validation->set_rules('bulan','bulan', 'required');
            $nip = $this->M_PropPenelitian->getwhere_proposal(array('id'=> $id))->row()->nip;
            $data_proposal = $this->M_PropPenelitian->getwhere_proposal(array('id'=> $id))->row();
            $cek_file = $this->input->post('file_prop',true);
            $date = date('Y-m-d');
            $bulan = $this->input->post('bulan',true);
            $biaya = str_replace('.','',$this->input->post('biaya',true));
        
            $prop = array (
                "nip"=>$this->input->post('nip',true),
                "judul"=>$this->input->post('judul',true),
                "abstrak"=>$this->input->post('abstrak',true),
                "lokasi"=>$this->input->post('lokasi',true),
                "id_jenis"=>$this->input->post('jenis',true),
                "mitra"=>$this->input->post('mitra',true),
                "tgl_upload"=>$date,
                "biaya"=>$biaya,
                "lama_pelaksanaan"=>$bulan,
                "id_sumberdana"=>$this->input->post('sumberdana',true),
        );
        $proposal=$this->M_PropPenelitian->update_prop($id,$prop);
            $file = $_FILES['file_prop'];
            if(!empty($file['name'])){
                $config['upload_path'] = './assets/prop_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file_prop')){
                echo "Upload Gagal"; die();
            } else {
                $prop=$this->upload->data('file_name');
            }
            $datafile = [
                "file"=>$prop,];
                $proposal=$this->M_PropPenelitian->update_prop($id,$datafile);
            }
            
                $dsn_update = $this->input->post('dosen[]');
                $id_dsn_anggota = $this->input->post('id_dsn_anggota[]');
                $dsn_new = $this->input->post('dosen_new[]');
                $data_dsn_anggota = $this->M_PropPenelitian->dosen_update_prop($id)->result();
                $luaran_update = $this->input->post('luaran[]');
                $id_nilai_luaran = $this->input->post('id_nilai_luaran[]');
                $luaran_new = $this->input->post('luaran_new[]');
                $data_nilai_luaran = $this->M_PropPenelitian->luaran_update_prop($id)->result();
                // print_r($dsn_update);
                if(!empty($dsn_update)){
                foreach($data_dsn_anggota as $k){
                    for($i=0;$i<count($dsn_update);$i++){
                        if($k->id == $id_dsn_anggota[$i]){
                            
                            $dsn=$dsn_update[$i];
                            $data_dosen =[
                                'nip' => $dsn,
                            ];
                            $this->M_PropPenelitian->update_dosen_anggota($data_dosen, $id_dsn_anggota[$i]);
                            continue 2;
                        }
                    } 
                    $this->M_PropPenelitian->hapus_dosen_anggota(array('id'=>$k->id));
                }
                if(!empty($dsn_new)){
                    for($j=0; $j<count($dsn_new)-1;$j++)
                        {
                            if($dsn_new[$j]==""||$dsn_new[$j]==null||$dsn_new[$j]==0){

                            }
                            else{
                            $dosen_new=$dsn_new[$j];
                            $data_dosen_new =[
                                'nip' => $dosen_new,
                                'id_proposal' => $id
                            ];
                            $this->M_PropPenelitian->insert_dsn_anggota($data_dosen_new);
                        }
                        }
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
                            $this->M_PropPenelitian->update_nilai_luaran($data_luaran, $id_nilai_luaran[$i]);
                            continue 2;
                        }
                    } 
                    $this->M_PropPenelitian->hapus_nilai_luaran(array('id'=>$k->id));
                }
                if(!empty($luaran_new)){
                    for($j=0; $j<count($luaran_new)-1;$j++)
                    {
                        if($luaran_new[$j]==""||$luaran_new[$j]==null||$luaran_new[$j]==0){

                        }
                        else{
                       $l_new=$luaran_new[$j];
                        $data_luaran_new =[
                            'id_luaran' => $l_new,
                            'id_proposal' => $id
                        ];
                        $this->M_PropPenelitian->insert_nilai_luaran($data_luaran_new);
                    }
                    }
                }
            }

            if(empty($dsn_update)){    
                $this->M_PropPenelitian->hapus_dosen_anggota(array('id_proposal'=>$id));
                for($j=0; $j<count($dsn_new)-1;$j++)
                    {
                        if($dsn_new[$j]==""||$dsn_new[$j]==null||$dsn_new[$j]==0){

                        }
                        else{
                        
                        $dosen_new=$dsn_new[$j];
                        $data_dosen_new =[
                            'nip' => $dosen_new,
                            'id_proposal' => $id
                        ];
                        $this->M_PropPenelitian->insert_dsn_anggota($data_dosen_new);
                    }
                    }
                }
                
                if(empty($luaran_update)){
                    $this->M_PropPenelitian->hapus_nilai_luaran(array('id_proposal'=>$id));
                for($j=0; $j<count($luaran_new)-1;$j++)
                    {
                        if($luaran_new[$j]==""||$luaran_new[$j]==null||$luaran_new[$j]==0){

                        }
                        else{
                        
                        $l_new=$luaran_new[$j];
                        $data_luaran_new =[
                            'id_luaran' => $l_new,
                            'id_proposal' => $id
                        ];
                        $this->M_PropPenelitian->insert_nilai_luaran($data_luaran_new);
                    }
                    }
                }
    
            /* update anggota mahasiswa */
            $mhs_update = $this->input->post('nim_mahasiswa[]');
            $mhs_nama_update = $this->input->post('nama_mahasiswa[]');
            $id_mhs_anggota = $this->input->post('id_mhs_anggota[]');
            $mhs_new = $this->input->post('nim_mahasiswa_new[]');
            $mhs_nama_new = $this->input->post('nama_mahasiswa_new[]');
            $data_mhs_anggota = $this->M_PropPenelitian->mhs_update_prop($id)->result();
    
            foreach($data_mhs_anggota as $k){
                for($i=0;$i<count($mhs_update);$i++){
                    if($k->id == $id_mhs_anggota[$i]){
                        $mhs=$mhs_update[$i];
                        $data_mhs =[
                            'nim' => $mhs,
                            'nama'=> $mhs_nama_update[$i],
                        ];
                        $this->M_PropPenelitian->update_mhs_anggota($data_mhs, $id_mhs_anggota[$i]);
                        continue 2;
                    }
                } 
                $this->M_PropPenelitian->hapus_mhs_anggota(array('id'=>$k->id));
            }
    
            for($j=0; $j<count($mhs_new)-1;$j++)
                {
                 
                    $mahasiswa_new=$mhs_new[$j];
                    $data_mhs_new =[
                        'nim' => $mahasiswa_new,
                        'id_proposal' => $id
                    ];
                    $this->M_PropPenelitian->insert_mhs_anggota($data_mhs_new);
                }
        
                
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Perubhan gagal disimpan</strong></div>');
            redirect("admin/penelitian/daftarPenelitian");
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Perubhan berhasil disimpan</strong></div>');
            redirect("admin/penelitian/daftarPenelitian");
        }
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
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/detail',$data);
        $this->load->view('layout/footer'); 
    }

    public function detailNilai($id)
    {
        $id_jenis = $this->input->post('jenis');
        $username = $this->session->userdata('user_name');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['proposal']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['nilai']= $this->M_ReviewerPenelitian->get_nilai(array('id_proposal'=>$id))->result();
        $data['total'] = $this->M_ReviewerPenelitian->getwhere_nilai(array('id_proposal'=>$id))->row();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/detailnilai', $data);
        $this->load->view('layout/footer'); 
    }

    public function acceptProposal($id)
    {
        $status = [
            'status' => '2'
        ];
        $prop = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['proposal']->nip;
        $this->M_AdminPenelitian->approval($id,$status);
        $insert = [
            "nip"=>$nip,
            "id_proposal"=>$id,
        ];
            $this->M_PropPenelitian->insert_monev($insert);
            $this->M_PropPenelitian->insert_akhir($insert);

        // $from = $this->config->item('smtp_user');
        // $to = $this->M_Dosen->getwhere_dosen(array('nip'=>$prop->nip))->row()->email;
        // $subject = 'APPROVAL PROPOSAL PENELITIAN';
        // $message = 'Proposal penelitian anda yang berjudul '.$prop->judul.' berstatus approved';

        // $this->email->set_newline("\r\n");
        // $this->email->from($from);
        // $this->email->to($to);
        // $this->email->subject($subject);
        // $this->email->message($message);

        // if ($this->email->send()) {
        //     echo 'Your Email has successfully been sent.';
        // } else {
        //     show_error($this->email->print_debugger());
        // }
        redirect('admin/penelitian/approval');
    }

    public function rejectProposal($id)
    {
        $status = [
            'status' => '5'
        ];

        $this->M_AdminPenelitian->approval($id,$status);
        redirect('admin/penelitian/approval');

    }

    public function cancelProposal($id)
    {
        $status = [
            'status' => '13'
        ];

        $this->M_AdminPenelitian->approval($id,$status);
        redirect('admin/penelitian/approval');

    }

    public function monev()
    {
        $data['view']= $this->M_AdminPenelitian->getwhere_viewmonev()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/monev', $data);
        $this->load->view('layout/footer'); 
    }

    public function akhir()
    {
        $data['view']= $this->M_AdminPenelitian->getwhere_viewakhir()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/akhir', $data);
        $this->load->view('layout/footer'); 
    }

    public function skemaPenelitian()
    {
        $data['skema'] = $this->M_SkemaPenelitian->get_skemapenelitian()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/skema_penelitian', $data);
        $this->load->view('layout/footer'); 
    }

    public function detailSkemaPenelitian($id)
    {
        $data['komponen'] = $this->M_KomponenNilaiPenelitian->getwhere_komponen(array('id_jenis'=> $id))->result();
     
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/detail_skema_penelitian', $data);
        $this->load->view('layout/footer'); 
    }

    public function hapusSkemaPenelitian($id)
    {
        $skema =[
            'id' => $id
        ];

        $id_skema = [
            'id_jenis' => $id
        ];
        $this->M_SkemaPenelitian->hapus_skema($skema);
        $this->M_KomponenNilaiPenelitian->hapus_komponen($id_skema);
        redirect('admin/penelitian/skemaPenelitian');
    }

    public function formTambahSkema()
    {
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/form_skema_penelitian');
        $this->load->view('layout/footer'); 

    }

    public function submitSkemaPenelitian()
    {
        $jenis = $this->input->post('jenis');
        $data_jenis =[
            'jenis' => $jenis,
            "tgl"=>date('Y'), 
            
        ];
        $id_skema = $this->M_SkemaPenelitian->insert_skema($data_jenis);
        $komponen = $this->input->post('komponen[]');
        $bobot = $this->input->post('bobot[]');
        for($i=0; $i<count($komponen)-1;$i++)
        {
            $komp=str_replace(PHP_EOL,"<br>",$komponen[$i]);
            $data_komponen =[
                'id_jenis' => $id_skema,
                'komponen' => $komp,
                'bobot' => $bobot[$i]
            ];
            $this->M_KomponenNilaiPenelitian->insert_komponen($data_komponen);
        }

        redirect('admin/penelitian/skemaPenelitian');


    }


    public function editSkemaPenelitian($id)
    {
        $data['id_skema'] = $id;
        $data['skema'] = $this->M_KomponenNilaiPenelitian->getwhere_skema(array('id'=> $id))->result();
        $data['komponen'] = $this->M_KomponenNilaiPenelitian->getwhere_komponen(array('id_jenis'=> $id))->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/edit_skema_penelitian', $data);
        $this->load->view('layout/footer'); 
    }

    public function updateSkemaPenelitian()
    {
        $id_skema = $this->input->post('id_skema');
        $data_komponen = $this->M_KomponenNilaiPenelitian->getwhere_komponen(array('id_jenis'=>$id_skema))->result();
        $komponen_update = $this->input->post('komponen[]');
        $bobot_update = $this->input->post('bobot[]');
        $id_komponen = $this->input->post('id_komp[]');
        

        foreach($data_komponen as $k){
            
            
            
            for($i=0;$i<count($komponen_update);$i++){
                if($k->id == $id_komponen[$i]){
                    $komp=str_replace(PHP_EOL,"<br>",$komponen_update[$i]);
                    $data_komponen =[
                        'komponen' => $komp,
                        'bobot' => $bobot_update[$i]
                    ];
                    $this->M_KomponenNilaiPenelitian->update_komponen($data_komponen, $id_komponen[$i]);
                    continue 2;
                }
            } 

            $this->M_KomponenNilaiPenelitian->hapus_komponen(array('id'=>$k->id));

        }
        $jenis = $this->input->post('jenis');
        $komponen_new = $this->input->post('komponen_baru[]');
        $bobot_new = $this->input->post('bobot_baru[]');

        for($j=0; $j<count($komponen_new)-1;$j++)
        {
            $komp_new=str_replace(PHP_EOL,"<br>",$komponen_new[$j]);
            $data_komponen_new =[
                'id_jenis' => $id_skema,
                'komponen' => $komp_new,
                'bobot' => $bobot_new[$j]
            ];
            $this->M_KomponenNilaiPenelitian->insert_komponen($data_komponen_new);
        }
        $judul = [
            'jenis' => $jenis
        ];
        $this->M_KomponenNilaiPenelitian->update_judul($judul, $id_skema);

        redirect('admin/penelitian/skemaPenelitian');


    }

    public function laporanKemajuanExcel()
    {
        $fileName = 'ListLaporanKemajuanSubmitted';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPenelitian->get_word_monev()->result();
        $sheet->setCellValue('A1', 'List Penelitian yang Telah Mengumpulkan Laporan Kemajuan');
        $sheet->setCellValue('A2', date('Y-m-d'));
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Skema Penelitian');
        $sheet->setCellValue('C3', 'Judul Penelitian');
        $sheet->setCellValue('D3', 'Ketua Penelitian');
        $sheet->setCellValue('E3', 'Kelengkapan dokumen');
        
        $no = 1;
        $rows = 4;

        foreach($prop as $p){
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, $p->skema);
            $sheet->setCellValue('C'.$rows, $p->judul);
            $sheet->setCellValue('D'.$rows, $p->nama);
            $sheet->setCellValue('E'.$rows, 'Lengkap');
            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'laporan-siswa';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    public function laporanKemajuanWord()
    {
        // $phpWord = new PhpWord();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
        
		
		$writer = new Word2007($phpWord);
		
        $filename = 'ListLaporanKemajuanSubmitted';
        
        $cellRowSpan = array('vMerge' => 'restart', 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellRowContinue = array('vMerge' => 'continue',  'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellColSpan = array('gridSpan' => 2, 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        

        $section_style = $section->getStyle();
        $phpWord->addFontStyle('tFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => false, 'size' => 16, 'allCaps' => true));
        $phpWord->addFontStyle('dFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 12, 'allCaps' => true));
        $phpWord->addParagraphStyle('tStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText(htmlspecialchars("List Penelitian yang Telah Mengumpulkan Laporan Kemajuan"), 'tFont','tStyle');
        $section->addText(htmlspecialchars(date('Y-m-d')), 'dFont','tStyle');
    

        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $prop = $this->M_PropPenelitian->get_word_monev()->result();
        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText("No");
        $table->addCell(2000, $cellRowSpan)->addText("Judul Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Ketua Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Kelengkapan dokumen");

        $table->addRow();
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $no = 1;
        foreach($prop as $p){
            $table->addRow();
            $table->addCell(2000,$styleCell)->addText($no++);
            $table->addCell(2000,$styleCell)->addText($p->judul);
            $table->addCell(2000,$styleCell)->addText($p->nama);
            $table->addCell(2000,$styleCell)->addText('Lengkap');

        }
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
        header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
        header('Cache-Control: max-age=0');
        
        
        $objWriter->save( "php://output" );
		
        // $writer->save('php://output');
        // $phpword->save('Perfomance_Appraisal.docx', 'Word2007', true);
    }



    public function laporanAkhirExcel()
    {
        $fileName = 'ListLaporanAkhirSubmitted';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPenelitian->get_word_akhir()->result();
        $sheet->setCellValue('A1', 'List Penelitian yang Telah Mengumpulkan Laporan Akhir');
        $sheet->setCellValue('A2', date('Y-m-d'));
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Skema Penelitian');
        $sheet->setCellValue('C3', 'Judul Peneltiain');
        $sheet->setCellValue('D3', 'Ketua Penelitian');
        $sheet->setCellValue('E3', 'Kelengkapan dokumen');
        
        $no = 1;
        $rows = 2;

        foreach($prop as $p){
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, $p->skema);
            $sheet->setCellValue('C'.$rows, $p->judul);
            $sheet->setCellValue('D'.$rows, $p->nama);
            $sheet->setCellValue('E'.$rows, 'Lengkap');
            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'laporan-siswa';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    public function laporanAkhirWord()
    {
        // $phpWord = new PhpWord();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
        
		
		$writer = new Word2007($phpWord);
		
        $filename = 'ListLaporanAkhirSubmitted';
        
        $cellRowSpan = array('vMerge' => 'restart', 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellRowContinue = array('vMerge' => 'continue',  'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellColSpan = array('gridSpan' => 2, 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        
        $section_style = $section->getStyle();
        $phpWord->addFontStyle('tFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => false, 'size' => 16, 'allCaps' => true));
        $phpWord->addFontStyle('dFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 12, 'allCaps' => true));
        $phpWord->addParagraphStyle('tStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText(htmlspecialchars("List Penelitian yang Telah Mengumpulkan Laporan Akhir"), 'tFont','tStyle');
        $section->addText(htmlspecialchars(date('Y-m-d')), 'dFont','tStyle');
    
        
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));


        $prop = $this->M_PropPenelitian->get_word_akhir()->result();


        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText("No");
        $table->addCell(2000, $cellRowSpan)->addText("Judul Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Ketua Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Kelengkapan dokumen");

        $table->addRow();
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $no = 1;
        foreach($prop as $p){
            $table->addRow();
            $table->addCell(2000,$styleCell)->addText($no++);
            $table->addCell(2000,$styleCell)->addText($p->judul);
            $table->addCell(2000,$styleCell)->addText($p->nama);
            $table->addCell(2000,$styleCell)->addText('Lengkap');

        }
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
        header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
        header('Cache-Control: max-age=0');
        
        
        $objWriter->save( "php://output" );
		
        // $writer->save('php://output');
        // $phpword->save('Perfomance_Appraisal.docx', 'Word2007', true);
    }






    public function testword()
    {
        // $phpWord = new PhpWord();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
        
		
		$writer = new Word2007($phpWord);
		
        $filename = 'AcceptedProposal';
        
        $cellRowSpan = array('vMerge' => 'restart', 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellRowContinue = array('vMerge' => 'continue',  'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellColSpan = array('gridSpan' => 2, 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );

        $section_style = $section->getStyle();
        $phpWord->addFontStyle('tFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => false, 'size' => 16, 'allCaps' => true));
        $phpWord->addFontStyle('dFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 12, 'allCaps' => true));
        $phpWord->addParagraphStyle('tStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText(htmlspecialchars("Proposal Penelitian yang Akan Diberi Pendanaan"), 'tFont','tStyle');
        $section->addText(htmlspecialchars(date('Y-m-d')), 'dFont','tStyle');
    

        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));


        $prop = $this->M_PropPenelitian->get_viewAnnouncement()->result();


        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText("No");
        $table->addCell(2000, $cellRowSpan)->addText("Judul Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Ketua Penelitian");
        $table->addCell(4000, $cellColSpan)->addText("Anggota Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Jumlah Dana per Judul (Rp)");

        $table->addRow();
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(2000,$styleCell)->addText("Dosen");
        $table->addCell(2000,$styleCell)->addText("Mahasiswa");
        $table->addCell(null, $cellRowContinue);
        $no = 1;
        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $table->addRow();
            $table->addCell(2000,$styleCell)->addText($no++);
            $table->addCell(2000,$styleCell)->addText($p->judul);
            $table->addCell(2000,$styleCell)->addText($p->nama);
            $dosen = $this->M_Dosen->getwhere_dosenpenelitian(array('id_proposal'=>$p->id))->result();
            $celldsn = $table->addCell(2000,$styleCell);
            foreach( $dosen as $dsn){
                $celldsn->addText($noDsn++.'. '.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            }

            // foreach($dosen as $dsn){
            //     $table->addCell(2000)->addText($noDsn++.''.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            // }
            $cellmhs = $table->addCell(2000,$styleCell);
            foreach($this->M_Mahasiswa->getwhere_mahasiswapenelitian(array('id_proposal'=>$p->id))->result() as $mhs){
                $cellmhs->addText($noMhs++.'. '.$this->M_Mahasiswa->getwhere_mahasiswa(array('nim'=>$mhs->nim))->row()->nama);
            }
            $table->addCell(2000,$styleCell)->addText(number_format($p->biaya,0,',','.'));

        }
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
        header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
        header('Cache-Control: max-age=0');
        
        
        $objWriter->save( "php://output" );
		
        // $writer->save('php://output');
        // $phpword->save('Perfomance_Appraisal.docx', 'Word2007', true);
    }

    public function proposalword()
    {
        // $phpWord = new PhpWord();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
        
		
		$writer = new Word2007($phpWord);
		
        $filename = 'AcceptedProposal';
        
        $cellRowSpan = array('vMerge' => 'restart', 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellRowContinue = array('vMerge' => 'continue',  'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellColSpan = array('gridSpan' => 2, 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        $section_style = $section->getStyle();
        $phpWord->addFontStyle('tFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => false, 'size' => 16, 'allCaps' => true));
        $phpWord->addFontStyle('dFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 12, 'allCaps' => true));
        $phpWord->addParagraphStyle('tStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText(htmlspecialchars("List Semua Proposal Penelitian"), 'tFont','tStyle');
        $section->addText(htmlspecialchars(date('Y-m-d')), 'dFont','tStyle');
    
        
        
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));


        $prop = $this->M_PropPenelitian->get_viewListProp()->result();


        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText("No");
        $table->addCell(2000, $cellRowSpan)->addText("Judul Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Ketua Penelitian");
        $table->addCell(4000, $cellColSpan)->addText("Anggota Penelitian");
        $table->addCell(2000, $cellRowSpan)->addText("Jumlah Dana per Judul (Rp)");

        $table->addRow();
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(2000,$styleCell)->addText("Dosen");
        $table->addCell(2000,$styleCell)->addText("Mahasiswa");
        $table->addCell(null, $cellRowContinue);
        $no = 1;
        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $table->addRow();
            $table->addCell(2000,$styleCell)->addText($no++);
            $table->addCell(2000,$styleCell)->addText($p->judul);
            $table->addCell(2000,$styleCell)->addText($p->nama);
            $dosen = $this->M_Dosen->getwhere_dosenpenelitian(array('id_proposal'=>$p->id))->result();
            $celldsn = $table->addCell(2000,$styleCell);
            foreach( $dosen as $dsn){
                $celldsn->addText($noDsn++.'. '.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            }

            // foreach($dosen as $dsn){
            //     $table->addCell(2000)->addText($noDsn++.''.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            // }
            $cellmhs = $table->addCell(2000,$styleCell);
            foreach($this->M_Mahasiswa->getwhere_mahasiswapenelitian(array('id_proposal'=>$p->id))->result() as $mhs){
                $cellmhs->addText($noMhs++.'. '.$this->M_Mahasiswa->getwhere_mahasiswa(array('nim'=>$mhs->nim))->row()->nama);
            }
            $table->addCell(2000,$styleCell)->addText(number_format($p->biaya,0,',','.'));

        }
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
        header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
        header('Cache-Control: max-age=0');
        
        
        $objWriter->save( "php://output" );
		
        // $writer->save('php://output');
        // $phpword->save('Perfomance_Appraisal.docx', 'Word2007', true);
    }
    public function testexcel()
    {
        $fileName = 'AcceptedProposal';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPenelitian->get_viewAnnouncement()->result();
        $sheet->setCellValue('A1', 'Proposal Penelitian yang Akan Diberi Pendanaan');
        $sheet->setCellValue('A2', date('Y-m-d'));
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Skema Penelitian');
        $sheet->setCellValue('C3', 'Judul Penelitian');
        $sheet->setCellValue('D3', 'Ketua Penelitian');
        $sheet->setCellValue('E3', 'Dosen Anggota');
	    $sheet->setCellValue('F3', 'Mahasiswa Anggota');
        $sheet->setCellValue('G3', 'Program Studi');
        $sheet->setCellValue('H3', 'Jumlah Dana per Judul(Rp)');
        
        $no = 1;
        $rows = 4;

        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $dosen = $this->M_Dosen->getwhere_dosenpenelitian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapenelitian(array('id_proposal'=>$p->id))->result();
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, $p->skema);
            $sheet->setCellValue('C'.$rows, $p->judul);
            $sheet->setCellValue('D'.$rows, $p->nama);
            $anggota_dosen = "";
            $anggota_mhs ="";
            foreach($dosen as $d){
                if(empty($this->M_Dosen->getwhere_dosen(array('nip'=> $d->nip))->row()->nama)){
                    
                }
               else{
                   $anggota_dosen = $anggota_dosen."".$noDsn++.". ".$this->M_Dosen->getwhere_dosen(array('nip'=> $d->nip))->row()->nama."\n";
            
               }
               }
               
            foreach($mhs as $m){
                if(empty($m->nama)){
                    
                }
                else {
                $anggota_mhs = $anggota_mhs."".$noMhs++.". ".$m->nama."\n";
                }
            }
            $sheet->setCellValue('E'.$rows, $anggota_dosen);
            $sheet->setCellValue('F'.$rows,$anggota_mhs);
            $sheet->setCellValue('G'.$rows, $p->program_studi);
            $sheet->setCellValue('H'.$rows, $p->biaya);
            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'laporan-siswa';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    public function submitAllProposal()
    {
        $props = $this->M_PropPenelitian->get_needSubmitProp()->result();
        foreach($props as $prop){
            $stat = [
                'status' => 1
            ];
            $this->M_PropPenelitian->update_prop($prop->id,$stat);
        }
        redirect('admin/penelitian/assignProposal');


    }


    public function proposalexcel()
    {
        $fileName = 'PengajuanProposal';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPenelitian->get_viewListProp()->result();
        $sheet->setCellValue('A1', 'List Semua Proposal Penelitian');
        $sheet->setCellValue('A2', date('Y-m-d'));
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Skema Penelitian');
        $sheet->setCellValue('C3', 'Judul Penelitian');
        $sheet->setCellValue('D3', 'Ketua Penelitian');
        $sheet->setCellValue('E3', 'Dosen Anggota');
	    $sheet->setCellValue('F3', 'Mahasiswa Anggota');
        $sheet->setCellValue('G3', 'Program Studi');
        $sheet->setCellValue('H3', 'Jumlah Dana per Judul(Rp)');
        
        $no = 1;
        $rows = 4;

        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $dosen = $this->M_Dosen->getwhere_dosenpenelitian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapenelitian(array('id_proposal'=>$p->id))->result();
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, $p->skema);
            $sheet->setCellValue('C'.$rows, $p->judul);
            $sheet->setCellValue('D'.$rows, $p->nama);
            $anggota_dosen = "";
            $anggota_mhs ="";
            foreach($dosen as $d){
                if(empty($this->M_Dosen->getwhere_dosen(array('nip'=> $d->nip))->row()->nama)){
                    
                }
               else{
                   $anggota_dosen = $anggota_dosen."".$noDsn++.". ".$this->M_Dosen->getwhere_dosen(array('nip'=> $d->nip))->row()->nama."\n";
            
               }
               }
               
            foreach($mhs as $m){
                if(empty($m->nama)){
                    
                }
                else {
                $anggota_mhs = $anggota_mhs."".$noMhs++.". ".$m->nama."\n";
                }
            }
            $sheet->setCellValue('E'.$rows, $anggota_dosen);
            $sheet->setCellValue('F'.$rows,$anggota_mhs);
            $sheet->setCellValue('G'.$rows, $p->program_studi);
            $sheet->setCellValue('H'.$rows,$p->biaya);
            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'laporan-siswa';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    public function luaran()
    {
        $id = $this->input->post('id');
        $data['temp'] = "Penelitian";
        $data['view'] = $this->M_AdminPenelitian->get_luaran()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/luaran', $data);
        $this->load->view('layout/footer'); 
    }

    public function deleteluaran()
    {
        $id = $this->input->post('id');
        $data = [
            'id' => $id,
        ];
        $this->M_AdminPenelitian->deleteluaran($data);
        redirect('admin/penelitian/luaran');
    }

    public function addluaran()
    {
        $data = [
            'luaran'=>$this->input->post('luaran'), 
            'tgl'=>date('Y'), 
        ];
        $this->M_AdminPenelitian->insert_luaran($data);
        redirect('admin/penelitian/luaran');
    }

    public function deleteProp()
    {
        $id = $this->input->post('id');
        $this->M_AdminPenelitian->delProp(array('id'=>$id));
        $this->M_AdminPenelitian->delLuaran(array('id_proposal'=>$id));
        $this->M_AdminPenelitian->delDsn(array('id_proposal'=>$id));
        $this->M_AdminPenelitian->delMhs(array('id_proposal'=>$id));
        redirect('admin/penelitian/daftarPenelitian');
    }

}