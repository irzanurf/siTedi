<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penelitian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        $current_user=$this->Admin->is_role();
        
        //cek session dan level user
        $this->load->model('M_PropPenelitian');
        $this->load->model('M_SumberDana');
        $this->load->model('M_Luaran');
        $this->load->model('M_Dosen');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_Jenisp');
        $this->load->model('M_ReviewerPenelitian');
        $this->load->model('M_Profile');
        $this->load->model('M_Admin');

        $nip = $this->session->userdata('user_name');
        $cek= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        if (empty($cek)){
            redirect("login/");
        }

    }

    public function index()
    {
        $nip = $this->session->userdata('user_name');
        $username = $this->session->userdata('user_name');
        $nama['view']= $this->M_PropPenelitian->getwhere_viewpenelitian(array('nip'=>$username))->result();
        $nama['anggota']= $this->M_PropPenelitian->getwhere_viewanggota($nip)->result();
        $nip = $this->session->userdata('user_name');
        $nama['berita'] = $this->M_Admin->get_berita(array('id'=>1))->result();
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dashboard', $nama);
        $this->load->view("penelitian/footer");
    }

    public function success(){
        $this->load->view("penelitian/header");
        $this->load->view("dosen/success");
        $this->load->view("penelitian/footer");
    }

    public function penilaian_penelitian()
    {
        $username = $this->session->userdata('user_name');
        $nip = $this->session->userdata('user_name');
        $data['view']= $this->M_ReviewerPenelitian->getwhere_penilaian(array('nip'=>$username))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('reviewer/penelitian/penilaian', $data);
        $this->load->view("penelitian/footer");
    }

    public function formPenilaian()
    {
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("reviewer/penelitian/penilaian_penelitian");
        }
        $nip = $this->session->userdata('user_name');
        $id_jenis = $this->input->post('jenis');
        $username = $this->session->userdata('user_name');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['proposal']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['view']= $this->M_ReviewerPenelitian->get_komponen(array('id_jenis'=>$id_jenis))->result();
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$username))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$username))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('reviewer/penelitian/formnilai', $data);
        $this->load->view("penelitian/footer");
    }

    public function editPenilaian()
    {
        $id = $this->input->post('id',true);
        if($id==NULL){
            redirect("reviewer/penelitian/penilaian_penelitian");
        }
        $id_jenis = $this->input->post('jenis');
        $user = $this->session->userdata('user_name');
        $reviewer = $this->session->userdata('user_name');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['proposal']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['komponen'] = $this->M_ReviewerPenelitian->get_nilai(array('id_proposal'=>$id, 'reviewer'=>$reviewer))->result();
        $assign = $this->M_ReviewerPenelitian->getwhere_assignment(array('id_proposal'=>$id))->row();
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$user))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$user))->result();
        if($assign->reviewer == $reviewer){
            $data['nilai'] = $this->M_ReviewerPenelitian->getwhere_nilai(array('id_proposal'=>$id))->row()->nilai;
            $data['komentar'] = $this->M_ReviewerPenelitian->getwhere_nilai(array('id_proposal'=>$id))->row()->komentar;

        } else if($assign->reviewer2 == $reviewer){
            $data['nilai'] = $this->M_ReviewerPenelitian->getwhere_nilai(array('id_proposal'=>$id))->row()->nilai2;
            $data['komentar'] = $this->M_ReviewerPenelitian->getwhere_nilai(array('id_proposal'=>$id))->row()->komentar2;
        }
        $this->load->view('penelitian/header', $nama);
        $this->load->view('reviewer/penelitian/editnilai', $data);
        $this->load->view("penelitian/footer");
    }


    // public function reviewpenelitian(){
    //     $id = $this->input->post('id');
    //     $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
    //     $this->load->view('reviewer/reviewpenelitian',$data);
    // }

    public function submitNilai()
    {
        $nip = $this->session->userdata('user_name');
        $id = $this->input->post('id',true);
        $komentar = $this->input->post('komentar',true);
        $total_nilai = $this->input->post('total_nilai');
        $data_assign = [
            'id_proposal' => $id
        ];
        $reviewer = $this->M_ReviewerPenelitian->getwhere_assignment($data_assign)->row();
        $nilai_prop = $this->M_ReviewerPenelitian->getwhere_nilai($data_assign)->row();
        if($nilai_prop == NULL){
            if($reviewer->reviewer == $this->session->userdata('user_name')){
                $data = [
                    'id_proposal' => $id,
                    'komentar'=> $komentar,
                    'nilai'=>$total_nilai
                ];
    
            } else if ($reviewer->reviewer2 == $this->session->userdata('user_name')){
                $data = [
                    'id_proposal' => $id,
                    'komentar2'=> $komentar,
                    'nilai2'=>$total_nilai
                ];
    
            }

            $this->M_ReviewerPenelitian->insert_nilaiprop($data);
            
            
            $prop = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
            $komponen = $this->M_ReviewerPenelitian->get_komponen(array('id_jenis'=>$prop->id_jenis))->result();
            $reviewer_user = $this->session->userdata('user_name');
            foreach($komponen as $k){
                $skor = $this->input->post($k->id);
                // $nilai_kom = $k->bobot * $skor;
                $detail = [
                    'id_proposal' => $id,
                    'reviewer' => $reviewer_user,
                    'id_komponen' => $k->id,
                    'skor' => $skor,
                    'nilai' => $this->input->post('nilai'.$k->id)
                ];
                $this->M_ReviewerPenelitian->insert_detailnilai($detail);
    
            }
            
        }else{
            if($reviewer->reviewer == $this->session->userdata('user_name')){
                $data = [
                    'komentar'=> $komentar,
                    'nilai'=>$total_nilai
                ];
    
            } else if ($reviewer->reviewer2 == $this->session->userdata('user_name')){
                $data = [
                    'komentar2'=> $komentar,
                    'nilai2'=>$total_nilai
                ];
    
            }
           
            $this->M_ReviewerPenelitian->update_nilaiprop($id,$data);
            $prop = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
            $komponen = $this->M_ReviewerPenelitian->get_komponen(array('id_jenis'=>$prop->id_jenis))->result();
            $reviewer_user = $this->session->userdata('user_name');
            foreach($komponen as $k){
                $skor = $this->input->post($k->id);
                // $nilai_kom = $k->bobot * $skor;
                $detail = [
                    'id_proposal' => $id,
                    'reviewer' => $reviewer_user,
                    'id_komponen' => $k->id,
                    'skor' => $skor,
                    'nilai' => $this->input->post('nilai'.$k->id)
                ];
                $this->M_ReviewerPenelitian->insert_detailnilai($detail);
    
            }


        }

            $status = [
                'status' => "13"
            ];
        
        $this->M_PropPenelitian->update_prop($id,$status);
        $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan penilaian</p>');
        $this->session->set_flashdata('button', 'reviewer/penelitian/penilaian_penelitian');
        redirect("reviewer/penelitian/success"); 
    
    }


    
    public function updateNilai()
    {

        $id = $this->input->post('id',true);
        $reviewer = $this->session->userdata('user_name');
        $komentar = $this->input->post('komentar',true);
        $total_nilai = $this->input->post('total_nilai');
        $assign = $this->M_ReviewerPenelitian->getwhere_assignment(array('id_proposal' => $id))->row();
        if($assign->reviewer == $reviewer){
            $data = [
                'komentar'=> $komentar,
                'nilai'=>$total_nilai
            ];
        } else if($assign->reviewer2 == $reviewer){
            $data = [
                'komentar2'=> $komentar,
                'nilai2'=>$total_nilai
            ];
        }
        $this->M_ReviewerPenelitian->update_nilai($id,$data);

        $prop = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $komponen = $this->M_ReviewerPenelitian->get_komponen(array('id_jenis'=>$prop->id_jenis))->result();
        foreach($komponen as $k){
            $skor = $this->input->post($k->id);
            // $nilai_kom = $k->bobot * $skor;
            $komp = $k->id;
            $detail = [
                'skor' => $skor,
                'nilai' => $this->input->post('nilai'.$k->id)
            ];
            $id_detail = $this->M_ReviewerPenelitian->getwhere_detailnilai(array('id_proposal'=>$id,'id_komponen'=>$k->id))->row()->id;
            $this->M_ReviewerPenelitian->update_detailnilai($id_detail,$detail);
        }
        $this->M_ReviewerPenelitian->update_nilai($id,$data);
        $status = [
            'status' => "13"
        ];
    
        $this->M_PropPenelitian->update_prop($id,$status);
        $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan penilaian</p>');
        $this->session->set_flashdata('button', 'reviewer/penelitian/penilaian_penelitian');
        redirect("reviewer/penelitian/success"); 
    }



    public function finishNilai(){
        $id = $this->input->post('id');
        $reviewer= $this->session->userdata('user_name');
        $assign = $this->M_ReviewerPenelitian->getwhere_assignment(array('id_proposal'=>$id))->row();
        $prop = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        if($prop->status == '1'){
            if($assign->reviewer==$reviewer){
                $status = [
                    'status' => "11"
                ];
            }else if($assign->reviewer2 ==$reviewer){
                $status = [
                    'status' => "12"
                ];
            }
            
        }else if ($prop->status == "11"||$prop->status=="12"){
            $status = [
                'status' => "13"
            ];
        }
        
        $this->M_PropPenelitian->update_prop($id,$status);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Finalisasi Berhasil</strong></div>');   
        redirect('reviewer/penelitian/penilaian_penelitian');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function monev()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_ReviewerPenelitian->getwhere_monev(array('nip'=>$username))->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('reviewer/penelitian/monev', $data);
        $this->load->view("penelitian/footer");
    }

    public function cr()
    {
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("reviewer/penelitian/monev");
        }
        $nip = $this->session->userdata('user_name');
        $id_jenis = $this->input->post('jenis');
        $username = $this->session->userdata('user_name');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $data['monev'] = $this->M_ReviewerPenelitian->get_monev(array('id_proposal'=>$id))->row();
        $nip = $data['proposal']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$username))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$username))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('reviewer/penelitian/formmonev', $data);
        $this->load->view("penelitian/footer");
    }

    public function submitMonev()
    {
        $nip = $this->session->userdata('user_name');
        $id = $this->input->post('id',true);
        $komentar = $this->input->post('komentar',true);
        $data_assign = [
            'id_proposal' => $id
        ];
        $reviewer = $this->M_ReviewerPenelitian->getwhere_assignment($data_assign)->row();
        $nilai_prop = $this->M_ReviewerPenelitian->getwhere_nilai($data_assign)->row();
        
            if($reviewer->reviewer == $this->session->userdata('user_name')){
                $data = [
                    'cr_monev'=> $komentar,
                ];
    
            } else if ($reviewer->reviewer2 == $this->session->userdata('user_name')){
                $data = [
                    'cr_monev2'=> $komentar,
                ];
    
            }

            $this->M_ReviewerPenelitian->update_monev($id,$data);
        $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan penilaian</p>');
        $this->session->set_flashdata('button', 'reviewer/penelitian/monev');
        redirect("reviewer/penelitian/success"); 
    }

    public function finishClickMonev(){
        $id = $this->input->post('id');
        $data = [
            "status"=>"4",];
            $this->M_ReviewerPenelitian->update_monev($id,$data);
          redirect('reviewer/penelitian/monev');
    }

    public function editCr()
    {
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("reviewer/penelitian/monev");
        }
        $nip = $this->session->userdata('user_name');
        $id_jenis = $this->input->post('jenis');
        $username = $this->session->userdata('user_name');
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $data['monev'] = $this->M_ReviewerPenelitian->get_monev(array('id_proposal'=>$id))->row();
        $nip = $data['proposal']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$username))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$username))->result();
        $reviewer = $this->session->userdata('user_name');
        $assign = $this->M_ReviewerPenelitian->getwhere_assignment(array('id_proposal'=>$id))->row();
        if($assign->reviewer == $reviewer){
            $data['komentar'] = $this->M_ReviewerPenelitian->getwhere_cr(array('id_proposal'=>$id))->row()->cr_monev;
        } else if($assign->reviewer2 == $reviewer){
            $data['komentar'] = $this->M_ReviewerPenelitian->getwhere_cr(array('id_proposal'=>$id))->row()->cr_monev2;
        }
        $this->load->view('penelitian/header', $nama);
        $this->load->view('reviewer/penelitian/editmonev', $data);
        $this->load->view("penelitian/footer");
    }
}