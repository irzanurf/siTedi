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
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "1"){
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
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['user'] = $this->M_Admin->getwhere_admin(array('nip'=>$user))->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/dashboard',$data);
    }

    public function berita()
    {
        
        $data = $this->M_Admin->get_berita(array('id'=>1))->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/berita',$data);
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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/daftar_prop_penelitian',$data);

    }

    public function jadwalpenelitian()
    {
        $data['jadwal'] = $this->M_JadwalPenelitian->get_jadwal()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/jadwal_penelitian',$data);

    }

    public function formJadwalPeneltian()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/form_jadwal_penelitian');

    }

    public function editJadwalPenelitian($id)
    {
        $data['jadwal'] = $this->M_JadwalPenelitian->getwhere_jadwal(array('id'=>$id))->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/edit_jadwal_penelitian', $data);

    }

    public function hapusJadwalPenelitian($id)
    {
        $this->M_JadwalPenelitian->hapus_jadwal(array('id'=>$id));
        redirect('admin/penelitian/jadwalpenelitian');
    }

    public function submitJadwalPenelitian()
    {
        $data = [
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
        ];
        $this->M_JadwalPenelitian->insert_jadwal($data);
        redirect('admin/penelitian/jadwalpenelitian');
    }


    public function updateJadwalPenelitian()
    {
        $id = $this->input->post('id');
        $data = [
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' =>$this->input->post('tgl_selesai')
        ];

        $this->M_JadwalPenelitian->update_jadwal($data, $id);
        redirect('admin/penelitian/jadwalpenelitian');
    }

    public function jadwal()
    {
        $data['view'] = $this->M_AdminPenelitian->get_jadwal()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/jadwal',$data);
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

    public function assignProposal()
    {
        $data['view'] = $this->M_AdminPenelitian->get_viewAssign()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/assign',$data);

    }

    public function setReviewer($id)
    {
        $data['prop'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPenelitian->get_reviewer()->result();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/setreviewer',$data);
    }

    public function EditReviewer($id)
    {
        $data['prop'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPenelitian->get_reviewer()->result();
        $data['assigned'] = $this->M_AdminPenelitian->getwhere_assignment(array('id_proposal'=>$id))->row();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/editreviewer',$data);
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
        $this->M_PropPengabdian->update_prop($idProp,$status);
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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/showrev',$data);
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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/approval',$data);

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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/detail',$data);
        
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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/detailnilai', $data);
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

        $from = $this->config->item('smtp_user');
        $to = $this->M_Dosen->getwhere_dosen(array('nip'=>$prop->nip))->row()->email;
        $subject = 'APPROVAL PROPOSAL PENELITIAN';
        $message = 'Proposal penelitian anda yang berjudul '.$prop->judul.' berstatus approved';

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

    public function monev()
    {
        $data['view']= $this->M_AdminPenelitian->getwhere_viewmonev()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/monev', $data);
    
    }

    public function akhir()
    {
        $data['view']= $this->M_AdminPenelitian->getwhere_viewakhir()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/akhir', $data);
    
    }

    public function skemaPenelitian()
    {
        $data['skema'] = $this->M_SkemaPenelitian->get_skemapenelitian()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/skema_penelitian', $data);
    }

    public function detailSkemaPenelitian($id)
    {
        $data['komponen'] = $this->M_KomponenNilaiPenelitian->getwhere_komponen(array('id_jenis'=> $id))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/detail_skema_penelitian', $data);
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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/form_skema_penelitian');


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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/penelitian/edit_skema_penelitian', $data);
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
            $dosen = $this->M_Dosen->getwhere_dosenpenelitian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapenelitian(array('id_proposal'=>$p->id))->result();
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
        $prop = $this->M_PropPenelitian->get_viewListProp()->result();
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
            $dosen = $this->M_Dosen->getwhere_dosenpenelitian(array('id_proposal'=>$p->id))->result();
            $mhs = $this->M_Mahasiswa->getwhere_mahasiswapenelitian(array('id_proposal'=>$p->id))->result();
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