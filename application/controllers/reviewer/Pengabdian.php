<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengabdian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "2"){
            redirect("login/");
        }
        $this->load->model('M_PropPengabdian');
        $this->load->model('M_Mitra');
        $this->load->model('M_User');
        $this->load->model('M_SumberDana');
        $this->load->model('M_Dosen');
        $this->load->model('M_NilaiPropPengabdian');
        $this->load->model('M_ReviewerPengabdian');
        $this->load->model('M_KomponenNilaiPengabdian');
        $this->load->model('M_DetailNilaiProposalPengabdian');
        $this->load->model('M_AssignProposalPengabdian');
        $this->load->model('M_Profile');
        $this->load->model('M_Admin');

    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['nama'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$user))->result();
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$user))->result();
        $data['berita'] = $this->M_Admin->get_berita(array('id'=>2))->result();
        $data['view']= $this->M_PropPengabdian->get_viewpengajuan()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian',$nama);
        $this->load->view("reviewer/dashboardpengabdian",$data);
    }

    public function daftarProposal()
    {
        $nip = $this->session->userdata('user_name');
        $data['view'] = $this->M_PropPengabdian->get_viewpenilaian()->result();
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian',$nama);
        $this->load->view('reviewer/penilaian_prop_pengabdian',$data);


    }

    public function nilaiProposal()
    {
        $nip = $this->session->userdata('user_name');
        $data['view'] = $this->M_PropPengabdian->get_viewgrade()->result();
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian',$nama);
        $this->load->view('reviewer/nilai_prop_pengabdian',$data);


    }

    public function penilaianProposal($id)
    {
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=>$data['prop']->id_skema))->result();
        $nip = $this->session->userdata('user_name');
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian',$nama);
        $this->load->view('reviewer/formnilai_prop_pengabdian',$data);


    }

    //detail untuk melihat info dan nilai proposal. (belum dibuat)
    public function detailProposal($id)
    {
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->get_nilaikomponen(array('id_proposal'=>$id))->result();
        $data['nilai'] = $this->M_NilaiPropPengabdian->getwhere_nilai(array('id_proposal'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian',$nama);
        $this->load->view('reviewer/detailnilai_prop_pengabdian',$data);


    }

    public function editProposal($id)
    {
        $reviewer = $this->session->userdata('user_name');
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['komponen'] = $this->M_KomponenNilaiPengabdian->get_nilaikomponen(array('id_proposal'=>$id, 'reviewer'=>$reviewer))->result();
        $assign = $this->M_AssignProposalPengabdian->getwhere_assignment(array('id_proposal'=>$id))->row();
        if($assign->reviewer == $reviewer){
            $data['nilai'] = $this->M_NilaiPropPengabdian->getwhere_nilai(array('id_proposal'=>$id))->row()->nilai;
            $data['komentar'] = $this->M_NilaiPropPengabdian->getwhere_nilai(array('id_proposal'=>$id))->row()->komentar;

        } else if($assign->reviewer2 == $reviewer){
            $data['nilai'] = $this->M_NilaiPropPengabdian->getwhere_nilai(array('id_proposal'=>$id))->row()->nilai2;
            $data['komentar'] = $this->M_NilaiPropPengabdian->getwhere_nilai(array('id_proposal'=>$id))->row()->komentar2;
        }
        
        $nip = $this->session->userdata('user_name');
        $nama['cek']= $this->M_Profile->cekRevPengabdian(array('nip'=>$nip))->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_dosen_pengabdian',$nama);
        $this->load->view('reviewer/editnilai_prop_pengabdian',$data);


    }

    public function submitNilai()
    {
        $id = $this->input->post('id',true);
        $komentar = $this->input->post('komentar',true);
        $total_nilai = $this->input->post('total_nilai');
        $data_assign = [
            'id_proposal' => $id
        ];
        $reviewer = $this->M_AssignProposalPengabdian->getwhere_assignment($data_assign)->row();
        $nilai_prop = $this->M_NilaiPropPengabdian->getwhere_nilai($data_assign)->row();
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

            $this->M_NilaiPropPengabdian->insert_nilai($data);
            
            
            $prop = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
            $komponen = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=>$prop->id_skema))->result();
            $reviewer_user = $this->session->userdata('user_name');
            foreach($komponen as $k){
                $skor = $this->input->post($k->id);
                // $nilai_kom = $k->bobot * $skor;
                $detail = [
                    'id_proposal' => $id,
                    'reviewer' => $reviewer_user,
                    'id_komponen_nilai' => $k->id,
                    'skor' => $skor,
                    'nilai' => $this->input->post('nilai'.$k->id)
                ];
                $this->M_DetailNilaiProposalPengabdian->insert_detailnilai($detail);
    
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
           
            $this->M_NilaiPropPengabdian->update_nilai($id,$data);
            $prop = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
            $komponen = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=>$prop->id_skema))->result();
            $reviewer_user = $this->session->userdata('user_name');
            foreach($komponen as $k){
                $skor = $this->input->post($k->id);
                // $nilai_kom = $k->bobot * $skor;
                $detail = [
                    'id_proposal' => $id,
                    'reviewer' => $reviewer_user,
                    'id_komponen_nilai' => $k->id,
                    'skor' => $skor,
                    'nilai' => $this->input->post('nilai'.$k->id)
                ];
                $this->M_DetailNilaiProposalPengabdian->insert_detailnilai($detail);
    
            }


        }
        redirect('reviewer/pengabdian/nilaiProposal');
    
    }

    public function finalSubmitNilai($id)
    {

        // $id = $this->input->post('id',true);
        // $komentar = $this->input->post('komentar',true);
        // $total_nilai = $this->input->post('total_nilai');

        // $data = [
        //     'komentar'=> $komentar,
        //     'nilai'=>$total_nilai
        // ];
        $reviewer= $this->session->userdata('user_name');
        $assign = $this->M_AssignProposalPengabdian->getwhere_assignment(array('id_proposal'=>$id))->row();
        $prop = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        if($prop->status == 'ASSIGNED'){
            if($assign->reviewer==$reviewer){
                $status = [
                    'status' => 'GRADED1'
                ];
            }else if($assign->reviewer2 ==$reviewer){
                $status = [
                    'status' => 'GRADED2'
                ];
            }
            
        }else if ($prop->status == 'GRADED1'||$prop->status=='GRADED2'){
            $status = [
                'status' => 'NEED_APPROVAL'
            ];
        }
        
        
        // $prop = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        // $komponen = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=>$prop->id_skema))->result();
        // foreach($komponen as $k){
        //     $skor = $this->input->post($k->id);
        //     // $nilai_kom = $k->bobot * $skor;
        //     $komp = $k->id;
        //     $detail = [
        //         'skor' => $skor,
        //         'nilai' => $this->input->post('nilai'.$k->id)
        //     ];
        //     $id_detail = $this->M_DetailNilaiProposalPengabdian->getwhere_detailnilai(array('id_proposal'=>$id,'id_komponen_nilai'=>$k->id))->row()->id;
        //     $this->M_DetailNilaiProposalPengabdian->update_detailnilai($id_detail,$detail);

        // }
        // $this->M_NilaiPropPengabdian->update_nilai($id,$data);
        $this->M_PropPengabdian->update_prop($id,$status);


        redirect('reviewer/pengabdian/nilaiProposal');
    
    }

    public function updateNilai()
    {

        $id = $this->input->post('id',true);
        $reviewer = $this->session->userdata('user_name');
        $komentar = $this->input->post('komentar',true);
        $total_nilai = $this->input->post('total_nilai');
        $assign = $this->M_AssignProposalPengabdian->getwhere_assignment(array('id_proposal' => $id))->row();
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
        $this->M_NilaiPropPengabdian->update_nilai($id,$data);

       
       
        
        $prop = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $komponen = $this->M_KomponenNilaiPengabdian->getwhere_komponen(array('id_skema_pengabdian'=>$prop->id_skema))->result();
        foreach($komponen as $k){
            $skor = $this->input->post($k->id);
            // $nilai_kom = $k->bobot * $skor;
            $komp = $k->id;
            $detail = [
                'skor' => $skor,
                'nilai' => $this->input->post('nilai'.$k->id)
            ];
            $id_detail = $this->M_DetailNilaiProposalPengabdian->getwhere_detailnilai(array('id_proposal'=>$id,'id_komponen_nilai'=>$k->id, 'reviewer'=>$reviewer))->row()->id;
            $this->M_DetailNilaiProposalPengabdian->update_detailnilai($id_detail,$detail);

        }
        


        redirect('reviewer/pengabdian/nilaiProposal');
    
    }
}