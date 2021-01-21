<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once APPPATH.'vendor/autoload.php';

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
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "1"){
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
        
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['user'] = $this->M_Admin->getwhere_admin(array('nip'=>$user))->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dashboard',$data);
    }

    public function approval()
    {
        $data['view'] = $this->M_PropPengabdian->get_viewApproval()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/approval_prop_pengabdian',$data);


    }

    public function berita()
    {
        
        $data = $this->M_Admin->get_berita(array('id'=>2))->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/berita',$data);
    }

    public function Saveberita(){
        $berita=$this->input->post('berita');
        $id=2;
        $data=[
            "berita"=>$berita,
        ];
        $this->M_Admin->simpan_berita($id,$data);
        $this->session->set_flashdata('error','Pengumuman berhasil ter-update' );
        redirect('admin/penelitian/berita');
    }


    public function daftarPengabdian()
    {
        $data['view'] = $this->M_PropPengabdian->get_viewPengabdian()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/daftar_prop_pengabdian',$data);

    }

    public function assignProposal()
    {
        $data['view'] = $this->M_PropPengabdian->get_viewAssign()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/assign_pengabdian',$data);

    }

    public function assignReviewerProposal($id)
    {
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPengabdian->get_reviewer()->result();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/assign_reviewer_pengabdian',$data);


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

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/edit_reviewer_pengabdian',$data);


    }

    public function showReviewer()
    {
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['view'] = $this->M_ReviewerPengabdian->get_reviewer()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/show_reviewer_pengabdian',$data);
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
        // $data2 = [
        //     'id_proposal' => $idProp,
        //     'reviewer' => $reviewer2
        // ];
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
        // $this->M_AssignProposalPengabdian->insert_assignment($data2);
        
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

        // $this->load->view('layout/header');
        // $this->load->view('layout/sidebar_admin');
        // $this->load->view('reviewer/editnilai_prop_pengabdian',$data);

        // $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        // $id_mitra = $data['prop']->id_mitra;
        // $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        // $nip = $data['prop']->nip;
        // $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        // $data['nilai'] = $this->M_PropPengabdian->getNilaiProp(array('id_proposal'=>$id))->row();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/detail_proposal',$data);


    }

    public function skemaPengabdian()
    {
        $data['skema'] = $this->M_SkemaPengabdian->get_skemapengabdian()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/skema_pengabdian', $data);
    }

    public function detailSkemaPengabdian($id)
    {
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=> $id))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/detail_skema_pengabdian', $data);
    }

    public function editSkemaPengabdian($id)
    {
        $data['id_skema'] = $id;
        $data['skema'] = $this->M_KomponenNilaiPengabdian->getwhere_skema(array('id'=> $id))->result();
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=> $id))->result();
        // $data['count'] = $data['komponen']->count;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/edit_skema_pengabdian', $data);
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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/form_skema_pengabdian');


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

        $from = $this->config->item('smtp_user');
        $to = $this->M_Dosen->getwhere_dosen(array('nip'=>$prop->nip))->row()->email;
        $subject = 'APPROVAL PROPOSAL PENGABDIAN';
        $message = 'Proposal pengabdian anda yang berjudul '.$prop->judul.' berstatus approved';

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
        
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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/laporan_akhir_pengabdian', $data);

    
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
		
        // $writer->save('php://output');
        // $phpword->save('Perfomance_Appraisal.docx', 'Word2007', true);
    }

    public function proposalword()
    {
        // $phpWord = new PhpWord();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
        
		
		$writer = new Word2007($phpWord);
		
        $filename = 'PengajuanProposal';
        
        $cellRowSpan = array('vMerge' => 'restart', 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellRowContinue = array('vMerge' => 'continue',  'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $cellColSpan = array('gridSpan' => 2, 'borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
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
		
        // $writer->save('php://output');
        // $phpword->save('Perfomance_Appraisal.docx', 'Word2007', true);
    }
    public function testexcel()
    {
        $fileName = 'AcceptedProposal';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $prop = $this->M_PropPengabdian->get_viewAnnouncement()->result();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Judul Pengabdian');
        $sheet->setCellValue('C1', 'Ketua Pengabdian');
        $sheet->setCellValue('D1', 'Dosen Anggota');
	    $sheet->setCellValue('E1', 'Mahasiswa Anggota');
        $sheet->setCellValue('F1', 'Program Studi');
        $sheet->setCellValue('G1', 'Jumlah Dana per Judul(Rp)');
        
        $no = 1;
        $rows = 2;

        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result();
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, $p->judul);
            $sheet->setCellValue('C'.$rows, $p->nama);
            $anggota_dosen = "";
            $anggota_mhs ="";
            foreach($dosen as $d){
               $anggota_dosen = $anggota_dosen."".$noDsn++.". ".$this->M_Dosen->getwhere_dosen(array('nip'=> $d->nip))->row()->nama."\n";
            }
            foreach($mhs as $m){
                $anggota_mhs = $anggota_mhs."".$noMhs++.". ".$this->M_Mahasiswa->getwhere_mahasiswa(array('nim'=>$m->nim))->row()->nama."\n";
            }
            $sheet->setCellValue('D'.$rows, $anggota_dosen);
            $sheet->setCellValue('E'.$rows,$anggota_mhs);
            $sheet->setCellValue('F'.$rows, $p->program_studi);
            $sheet->setCellValue('G'.$rows, $p->biaya);
            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'laporan-siswa';
        
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
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Judul Pengabdian');
        $sheet->setCellValue('C1', 'Ketua Pengabdian');
        $sheet->setCellValue('D1', 'Dosen Anggota');
	    $sheet->setCellValue('E1', 'Mahasiswa Anggota');
        $sheet->setCellValue('F1', 'Program Studi');
        $sheet->setCellValue('G1', 'Jumlah Dana per Judul(Rp)');
        
        $no = 1;
        $rows = 2;

        foreach($prop as $p){
            $noDsn= 1;
            $noMhs = 1;
            $dosen = $this->M_Dosen->getwhere_dosenpengabdian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$p->id))->result();
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, $p->judul);
            $sheet->setCellValue('C'.$rows, $p->nama);
            $anggota_dosen = "";
            $anggota_mhs ="";
            foreach($dosen as $d){
               $anggota_dosen = $anggota_dosen."".$noDsn++.". ".$this->M_Dosen->getwhere_dosen(array('nip'=> $d->nip))->row()->nama."\n";
            }
            foreach($mhs as $m){
                $anggota_mhs = $anggota_mhs."".$noMhs++.". ".$this->M_Mahasiswa->getwhere_mahasiswa(array('nim'=>$m->nim))->row()->nama."\n";
            }
            $sheet->setCellValue('D'.$rows, $anggota_dosen);
            $sheet->setCellValue('E'.$rows,$anggota_mhs);
            $sheet->setCellValue('F'.$rows, $p->program_studi);
            $sheet->setCellValue('G'.$rows,$p->biaya);
            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'laporan-siswa';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }
}