<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
// require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengabdian extends CI_Controller
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
        $this->load->model('M_PropPengabdian');
        $this->load->model('M_Mitra');
        $this->load->model('M_User');
        $this->load->model('M_SumberDana');
        $this->load->model('M_Dosen');
        $this->load->model('M_NilaiPropPengabdian');
        $this->load->model('M_Admin');
        $this->load->model('M_ReviewerPengabdian');
        $this->load->model('M_AssignProposalPengabdian');
        $this->load->model('M_KomponenNilaiPengabdian');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_LaporanAkhirPengabdian');
        $this->load->model('M_SkemaPengabdian');
        $this->load->model('M_AdminPenelitian');
        $this->load->model('M_JadwalPengabdian');
        $this->load->model('M_Luaran');
        
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['user'] = $this->M_Admin->getwhere_admin(array('nip'=>$user))->row();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('layout/footer'); 
    }

    public function approval()
    {
        $data['view'] = $this->M_PropPengabdian->get_viewApproval()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/approval_prop_pengabdian',$data);
        $this->load->view('layout/footer'); 
    }

    public function jadwalpengabdian()
    {
        $data['jadwal'] = $this->M_JadwalPengabdian->get_jadwal()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/jadwal_pengabdian',$data);
        $this->load->view('layout/footer'); 
    }

    public function formJadwalPengabdian()
    {
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/form_jadwal_pengabdian');
        $this->load->view('layout/footer'); 
    }

    public function editJadwalPengabdian($id)
    {
        $data['jadwal'] = $this->M_JadwalPengabdian->getwhere_jadwal(array('id'=>$id))->row();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/edit_jadwal_pengabdian', $data);
        $this->load->view('layout/footer'); 
    }

    public function hapusJadwalPengabdian($id)
    {
        $this->M_JadwalPengabdian->hapus_jadwal(array('id'=>$id));
        redirect('admin/pengabdian/jadwalpengabdian');
    }

    public function submitJadwalPengabdian()
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
        ];
        $this->M_JadwalPengabdian->insert_jadwal($data);
        redirect('admin/pengabdian/jadwalpengabdian');
    }


    public function updateJadwalPengabdian()
    {
        $id = $this->input->post('id');
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),   
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'tgl_selesai' =>$this->input->post('tgl_selesai')
        ];

        $this->M_JadwalPengabdian->update_jadwal($data, $id);
        redirect('admin/pengabdian/jadwalpengabdian');
    }
    public function berita()
    {
        
        $data = $this->M_Admin->get_berita(array('id'=>2))->row();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/berita',$data);
        $this->load->view('layout/footer'); 
    }

    public function Saveberita(){
        $berita=$this->input->post('berita');
        $id=2;
        $data=[
            "berita"=>$berita,
        ];
        $this->M_Admin->simpan_berita($id,$data);
        $this->session->set_flashdata('error','Pengumuman berhasil ter-update' );
        redirect('admin/pengabdian/berita');
    }


    public function daftarPengabdian()
    {
        $data['view'] = $this->M_Admin->get_viewPengabdian()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/daftar_prop_pengabdian',$data);
        $this->load->view('layout/footer'); 
    }

    public function assignProposal()
    {
        $data['view'] = $this->M_PropPengabdian->get_viewAssign()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/assign_pengabdian',$data);
        $this->load->view('layout/footer'); 
    }

    public function assignReviewerProposal($id)
    {
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPengabdian->get_reviewer()->result();

        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/assign_reviewer_pengabdian',$data);
        $this->load->view('layout/footer'); 

    }

   

    public function editReviewerProposal($id)
    {
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPengabdian->get_reviewer()->result();
        $data['assigned'] = $this->M_AssignProposalPengabdian->getwhere_assignment(array('id_proposal'=>$id))->row();

        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/edit_reviewer_pengabdian',$data);
        $this->load->view('layout/footer'); 

    }

    public function submitAllProposal()
    {
        $props = $this->M_PropPengabdian->get_needSubmitProp()->result();
        foreach($props as $prop){
            $stat = [
                'status' => 'SUBMITTED'
            ];
            $this->M_PropPengabdian->update_prop($prop->id,$stat);
        }
        redirect('admin/pengabdian/assignProposal');


    }

    public function showReviewer()
    {
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['view'] = $this->M_ReviewerPengabdian->get_reviewer()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/show_reviewer_pengabdian',$data);
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
        $this->M_Admin->insert_reviewerpengabdian($data,$nip);
        $this->M_Admin->updaterole_reviewerpengabdian($nip,$role);
        redirect('admin/pengabdian/showReviewer');
        
    }

    public function hapusReviewer()
    {
        $nip = $this->input->post('nip');
        $data = [
            'nip' => $nip,
        ];
        $check = $this->M_AdminPenelitian->check_reviewer(array('nip'=>$nip))->row();
        if($check == NULL){
            $role = [
                'role' => 3
            ];
            $this->M_Admin->updaterole_reviewerpengabdian($nip,$role);

        }
        $this->M_Admin->hapus_reviewerpengabdian($data);
        redirect('admin/pengabdian/showReviewer');
        
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
        $status = [
            'status' => 'ASSIGNED'
        ];

        $this->M_AssignProposalPengabdian->insert_assignment($data);
        // $this->M_AssignProposalPengabdian->insert_assignment($data2);
        $this->M_PropPengabdian->update_prop($idProp,$status);
        
        redirect('admin/pengabdian/assignproposal');

    }

    public function updateAssignReviewer()
    {
        $idProp = $this->input->post('id');
        $reviewer = $this->input->post('reviewer');
        $reviewer2 = $this->input->post('reviewer2');
        $data = [
            'reviewer' => $reviewer,
            'reviewer2' => $reviewer2
        ];

        $this->M_AssignProposalPengabdian->update_reviewerAssign($idProp,$data);
        redirect('admin/pengabdian/assignproposal');

    }

    public function detailProposal($id)
    {
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->get_nilaikomponen(array('id_proposal'=>$id))->result();
        $data['nilai'] = $this->M_NilaiPropPengabdian->getwhere_nilai(array('id_proposal'=>$id))->row();

        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/detail_proposal',$data);
        $this->load->view('layout/footer'); 

    }

    public function skemaPengabdian()
    {
        $data['skema'] = $this->M_SkemaPengabdian->get_skemapengabdian()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/skema_pengabdian', $data);
        $this->load->view('layout/footer'); 
    }

    public function detailSkemaPengabdian($id)
    {
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=> $id))->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/detail_skema_pengabdian', $data);
        $this->load->view('layout/footer'); 
    }

    public function editSkemaPengabdian($id)
    {
        $data['id_skema'] = $id;
        $data['skema'] = $this->M_KomponenNilaiPengabdian->getwhere_skema(array('id'=> $id))->result();
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=> $id))->result();
        // $data['count'] = $data['komponen']->count;
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/edit_skema_pengabdian', $data);
        $this->load->view('layout/footer'); 
    }

    public function hapusSkemaPengabdian($id)
    {
        $skema =[
            'id' => $id
        ];

        $id_skema = [
            'id_skema_pengabdian' => $id
        ];
        // $data['komponen'] = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=> $id))->result();
        $this->M_SkemaPengabdian->hapus_skema($skema);
        $this->M_KomponenNilaiPengabdian->hapus_komponen($id_skema);
        redirect('admin/pengabdian/skemaPengabdian');
    }

    public function formTambahSkema()
    {
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/form_skema_pengabdian');
        $this->load->view('layout/footer'); 

    }

    public function submitSkemaPengabdian()
    {
        $jenis = $this->input->post('jenis');
        $data_jenis =[
            'jenis_pengabdian' => $jenis,
            'tgl'=>date('Y'),
        ];
        $id_skema = $this->M_SkemaPengabdian->insert_skema($data_jenis);
        $komponen = $this->input->post('komponen[]');
        $bobot = $this->input->post('bobot[]');
        for($i=0; $i<count($komponen)-1;$i++)
        {
            $komp=str_replace(PHP_EOL,"<br>",$komponen[$i]);
            $data_komponen =[
                'id_skema_pengabdian' => $id_skema,
                'komponen_penilaian' => $komp,
                'bobot' => $bobot[$i]
            ];
            $this->M_KomponenNilaiPengabdian->insert_komponen($data_komponen);
        }

        redirect('admin/pengabdian/skemaPengabdian');


    }

    public function updateSkemaPengabdian()
    {
        $id_skema = $this->input->post('id_skema');
        $data_komponen = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=>$id_skema))->result();
        $komponen_update = $this->input->post('komponen[]');
        $bobot_update = $this->input->post('bobot[]');
        $id_komponen = $this->input->post('id_komp[]');
        

        foreach($data_komponen as $k){
            for($i=0;$i<count($komponen_update);$i++){
                if($k->id == $id_komponen[$i]){
                    $komp=str_replace(PHP_EOL,"<br>",$komponen_update[$i]);
                    $data_komponen =[
                        'komponen_penilaian' => $komp,
                        'bobot' => $bobot_update[$i]
                    ];
                    $this->M_KomponenNilaiPengabdian->update_komponen($data_komponen, $id_komponen[$i]);
                    continue 2;
                }
            } 

            $this->M_KomponenNilaiPengabdian->hapus_komponen(array('id'=>$k->id));

        }
        $jenis = $this->input->post('jenis');
        $komponen_new = $this->input->post('komponen_baru[]');
        $bobot_new = $this->input->post('bobot_baru[]');

        for($j=0; $j<count($komponen_new)-1;$j++)
        {
            $komp_new=str_replace(PHP_EOL,"<br>",$komponen_new[$j]);
            $data_komponen_new =[
                'id_skema_pengabdian' => $id_skema,
                'komponen_penilaian' => $komp_new,
                'bobot' => $bobot_new[$j]
            ];
            $this->M_KomponenNilaiPengabdian->insert_komponen($data_komponen_new);
        }
        $judul = [
            'jenis_pengabdian' => $jenis
        ];
        $this->M_KomponenNilaiPengabdian->update_judul($judul, $id_skema);
        redirect('admin/pengabdian/skemaPengabdian');

    }

    public function acceptProposal($id)
    {
        $status = [
            'status' => 'ACCEPTED'
        ];
        $prop = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();

        $data = [
            'id_proposal' => $id,
            'nip' => $prop->nip,
        ];

        $this->M_PropPengabdian->update_prop($id,$status);
        
        $lap = $this->M_LaporanAkhirPengabdian->getwhere_laporan(array('id_proposal'=>$id))->row();
        if( $lap == NULL){
            $this->M_LaporanAkhirPengabdian->insert_laporan($data);
        }

        // $from = $this->config->item('smtp_user');
        // $to = $this->M_Dosen->getwhere_dosen(array('nip'=>$prop->nip))->row()->email;
        // $subject = 'APPROVAL PROPOSAL PENGABDIAN';
        // $message = 'Proposal pengabdian anda yang berjudul '.$prop->judul.' berstatus approved';

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
        
        redirect('admin/pengabdian/approval');
    }

    public function rejectProposal($id)
    {
        $status = [
            'status' => 'REJECTED'
        ];

        $this->M_PropPengabdian->update_prop($id,$status);
        redirect('admin/pengabdian/approval');

    }

    public function laporanAkhir()
    {
        $data['view']= $this->M_PropPengabdian->get_viewlaporanakhir()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/laporan_akhir_pengabdian', $data);
        $this->load->view('layout/footer'); 
    }

    public function testword()
    {
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
        $section->addText(htmlspecialchars("Proposal Pengabdian yang Akan Diberi Pendanaan"), 'tFont','tStyle');
        $section->addText(htmlspecialchars(date('Y-m-d')), 'dFont','tStyle');
    
        
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));


        $prop = $this->M_PropPengabdian->get_viewAnnouncement()->result();


        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText("No");
        $table->addCell(2000, $cellRowSpan)->addText("Judul Pengabdian");
        $table->addCell(2000, $cellRowSpan)->addText("Ketua Pengabdian");
        $table->addCell(4000, $cellColSpan)->addText("Anggota Pengabdian");
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
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            $celldsn = $table->addCell(2000,$styleCell);
            foreach( $dosen as $dsn){
                $celldsn->addText($noDsn++.'. '.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            }

            // foreach($dosen as $dsn){
            //     $table->addCell(2000)->addText($noDsn++.''.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            // }
            $cellmhs = $table->addCell(2000,$styleCell);
            foreach($this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result() as $mhs){
                $cellmhs->addText($noMhs++.'. '.$this->M_Mahasiswa->getwhere_mahasiswa(array('nim'=>$mhs->nim))->row()->nama);
            }
            $table->addCell(2000,$styleCell)->addText(number_format($p->biaya,0,',','.'));

        }
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
        header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
        header('Cache-Control: max-age=0');
        
        
        $objWriter->save( "php://output" );
    }

    public function laporanAkhirWord()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
        
		
		$writer = new Word2007($phpWord);
		
        $filename = 'SubmittedLaporanAkhirPengabdian';
        
        $cellRowSpan = array('vMerge' => 'restart', 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellRowContinue = array('vMerge' => 'continue',  'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellColSpan = array('gridSpan' => 2, 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        
        $section_style = $section->getStyle();
        $phpWord->addFontStyle('tFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => false, 'size' => 16, 'allCaps' => true));
        $phpWord->addFontStyle('dFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 12, 'allCaps' => true));
        $phpWord->addParagraphStyle('tStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText(htmlspecialchars("List Pengabdian yang Telah Mengumpulkan Laporan Akhir"), 'tFont','tStyle');
        $section->addText(htmlspecialchars(date('Y-m-d')), 'dFont','tStyle');
    
        
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));


        $prop = $this->M_PropPengabdian->get_word_laporanakhir()->result();


        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText("No");
        $table->addCell(2000, $cellRowSpan)->addText("Judul Pengabdian");
        $table->addCell(2000, $cellRowSpan)->addText("Ketua Pengabdian");
        // $table->addCell(4000, $cellColSpan)->addText("Anggota Pengabdian");
        $table->addCell(2000, $cellRowSpan)->addText("Kelengkapan laporan akhir");

        $table->addRow();
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        // $table->addCell(2000,$styleCell)->addText("Dosen");
        // $table->addCell(2000,$styleCell)->addText("Mahasiswa");
        $table->addCell(null, $cellRowContinue);
        $no = 1;
        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $table->addRow();
            $table->addCell(2000,$styleCell)->addText($no++);
            $table->addCell(2000,$styleCell)->addText($p->judul);
            $table->addCell(2000,$styleCell)->addText($p->nama);
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            // $celldsn = $table->addCell(2000,$styleCell);
            // foreach( $dosen as $dsn){
            //     $celldsn->addText($noDsn++.'. '.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            // }

            // // foreach($dosen as $dsn){
            // //     $table->addCell(2000)->addText($noDsn++.''.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            // // }
            // $cellmhs = $table->addCell(2000,$styleCell);
            // foreach($this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result() as $mhs){
            //     $cellmhs->addText($noMhs++.'. '.$this->M_Mahasiswa->getwhere_mahasiswa(array('nim'=>$mhs->nim))->row()->nama);
            // }
            $table->addCell(2000,$styleCell)->addText('Lengkap');

        }
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
        header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
        header('Cache-Control: max-age=0');
        
        
        $objWriter->save( "php://output" );
    }

    public function laporanAkhirExcel()
    {
        $fileName = 'ListLaporanAkhirSubmitted';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPengabdian->get_word_laporanakhir()->result();
        $sheet->setCellValue('A1', 'List Pengabdian yang Telah Mengumpulkan Laporan Akhir');
        $sheet->setCellValue('A2', date('Y-m-d'));
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Skema Pengabdian');
        $sheet->setCellValue('C3', 'Judul Pengabdian');
        $sheet->setCellValue('D3', 'Ketua Pengabdian');
        $sheet->setCellValue('E3', 'Kelengkapan');
        
        $no = 1;
        $rows = 4;

        foreach($prop as $p){
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result();
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, $p->skema);
            $sheet->setCellValue('C'.$rows, $p->judul);
            $sheet->setCellValue('D'.$rows, $p->nama);
            $sheet->setCellValue('E'.$rows, 'Lengkap');
            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }


    public function proposalword()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
        
		$writer = new Word2007($phpWord);
		
        $filename = 'PengajuanProposal';
        
        $cellRowSpan = array('vMerge' => 'restart', 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellRowContinue = array('vMerge' => 'continue',  'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellColSpan = array('gridSpan' => 2, 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        $section_style = $section->getStyle();
        $phpWord->addFontStyle('tFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => false, 'size' => 16, 'allCaps' => true));
        $phpWord->addFontStyle('dFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 12, 'allCaps' => true));
        $phpWord->addParagraphStyle('tStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText(htmlspecialchars("List Semua Proposal Pengabdian"), 'tFont','tStyle');
        $section->addText(htmlspecialchars(date('Y-m-d')), 'dFont','tStyle');
    
        
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));


        $prop = $this->M_PropPengabdian->get_viewListProp()->result();


        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText("No");
        $table->addCell(2000, $cellRowSpan)->addText("Judul Pengabdian");
        $table->addCell(2000, $cellRowSpan)->addText("Ketua Pengabdian");
        $table->addCell(4000, $cellColSpan)->addText("Anggota Pengabdian");
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
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            $celldsn = $table->addCell(2000,$styleCell);
            foreach( $dosen as $dsn){
                $celldsn->addText($noDsn++.'. '.$this->M_Dosen->getwhere_dosen(array('nip'=>$dsn->nip))->row()->nama);
            }

            $cellmhs = $table->addCell(2000,$styleCell);
            foreach($this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result() as $mhs){
                $cellmhs->addText($noMhs++.'. '.$this->M_Mahasiswa->getwhere_mahasiswa(array('nim'=>$mhs->nim))->row()->nama);
            }
            $table->addCell(2000,$styleCell)->addText(number_format($p->biaya,0,',','.'));

        }
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
        header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
        header('Cache-Control: max-age=0');
        
        $objWriter->save( "php://output" );
    }
    public function testexcel()
    {
        $fileName = 'AcceptedProposal';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPengabdian->get_viewAnnouncement()->result();
        $sheet->setCellValue('A1', 'Proposal Pengabdian yang Akan Diberi Pendanaan');
        $sheet->setCellValue('A2', date('Y-m-d'));
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Skema Pengabdian');
        $sheet->setCellValue('C3', 'Judul Pengabdian');
        $sheet->setCellValue('D3', 'Ketua Pengabdian');
        $sheet->setCellValue('E3', 'Dosen Anggota');
	    $sheet->setCellValue('F3', 'Mahasiswa Anggota');
        $sheet->setCellValue('G3', 'Program Studi');
        $sheet->setCellValue('H3', 'Jumlah Dana per Judul(Rp)');
        
        $no = 1;
        $rows = 4;

        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result();
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
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    public function proposalexcel()
    {
        $fileName = 'PengajuanProposal';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPengabdian->get_viewListProp()->result();
        $sheet->setCellValue('A1', 'List Semua Proposal Pengabdian');
        $sheet->setCellValue('A2', date('Y-m-d'));
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Skema Pengabdian');
        $sheet->setCellValue('C3', 'Judul Pengabdian');
        $sheet->setCellValue('D3', 'Ketua Pengabdian');
        $sheet->setCellValue('E3', 'Dosen Anggota');
	    $sheet->setCellValue('F3', 'Mahasiswa Anggota');
        $sheet->setCellValue('G3', 'Program Studi');
        $sheet->setCellValue('H3', 'Jumlah Dana per Judul(Rp)');
        
        $no = 1;
        $rows = 4;

        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result();
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
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    public function luaran()
    {
        $id = $this->input->post('id');
        $data['temp'] = "Pengabdian";
        $data['view'] = $this->M_Admin->get_luaran()->result();
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/luaran', $data);
        $this->load->view('layout/footer'); 
    }

    public function deleteluaran()
    {
        $id = $this->input->post('id');
        $data = [
            'id' => $id,
        ];
        $this->M_Admin->deleteluaran($data);
        redirect('admin/pengabdian/luaran');
    }

    public function addluaran()
    {
        $data = [
            'luaran'=>$this->input->post('luaran'), 
            'tgl'=>date('Y'), 
        ];
        $this->M_Admin->insert_luaran($data);
        redirect('admin/pengabdian/luaran');
    }

    public function deleteProp()
    {
        $id = $this->input->post('id');
        $id_mitra = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row()->id_mitra;
        $user_mitra = $this->M_Admin->get_userMitra(array('id'=>$id_mitra))->row()->username;
        $this->M_Admin->delProp(array('id'=>$id));
        $this->M_Admin->delLuaran(array('id_proposal'=>$id));
        $this->M_Admin->delDsn(array('id_proposal'=>$id));
        $this->M_Admin->delMhs(array('id_proposal'=>$id));
        $this->M_Admin->delMitra(array('id'=>$id_mitra));
        $this->M_Admin->delUserMitra(array('username'=>$user_mitra));
        redirect('admin/pengabdian/daftarPengabdian');
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
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/editProposal', $data);
        $this->load->view('layout/footer'); 
    }

    public function updateProposal(){
        $this->form_validation->set_rules('nip','nip', 'required');
        $this->form_validation->set_rules('judul','Judul Pengabdian', 'required');
        $this->form_validation->set_rules('abstrak','Abstrak', 'required');
        $id = $this->input->post('id');
        $nip = $this->session->userdata('user_name');
        $data_proposal = $this->M_PropPengabdian->getwhere_proposal(array('id'=> $id))->row();
        
        $date = date('Y-m-d');
        $old_username_mitra = $this->M_Mitra->getwhere_mitra(array('id'=>$data_proposal->id_mitra))->row()->username;
        $biaya = str_replace('.','',$this->input->post('biaya',true));
        $prop = array (
            "nip"=>$this->input->post('nip',true),
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
                $config['encrypt_name'] = TRUE;

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
                            $this->M_PropPengabdian->insert_dsn_anggota($data_dosen_new);
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
                            $this->M_PropPengabdian->update_nilai_luaran($data_luaran, $id_nilai_luaran[$i]);
                            continue 2;
                        }
                    } 
                    $this->M_PropPengabdian->hapus_nilai_luaran(array('id'=>$k->id));
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
                        $this->M_PropPengabdian->insert_nilai_luaran($data_luaran_new);
                    }
                    }
                }
            }
            if(empty($dsn_update)){
                $this->M_PropPengabdian->hapus_dosen_anggota(array('id_proposal'=>$id));
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
                        $this->M_PropPengabdian->insert_dsn_anggota($data_dosen_new);
                    }
                    }
                }
                
                
                if(empty($luaran_update)){
                    $this->M_PropPengabdian->hapus_nilai_luaran(array('id_proposal'=>$id));
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
                        $this->M_PropPengabdian->insert_nilai_luaran($data_luaran_new);
                    }
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
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Perubhan gagal disimpan</strong></div>');
            redirect("admin/pengabdian/daftarPengabdian");
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Perubhan berhasil disimpan</strong></div>');
            redirect("admin/pengabdian/daftarPengabdian");
        }

    }
}