<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadep extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
        //cek session dan level user
        
        $this->load->model('M_Admin');
        $this->load->model('M_Kadep');
        $this->load->model('M_Profile');
        $this->load->model('M_Dosen');
        $this->load->model('M_JadwalPenelitian');
        $this->load->model('M_JadwalPengabdian');
        $this->load->model('M_PropPenelitian');
        $this->load->model('M_PropPengabdian');
        $this->load->model('M_ReviewerPenelitian');
        $this->load->model('M_ReviewerPengabdian');
        $this->load->model('M_AdminPenelitian');
        $this->load->model('M_AssignProposalPengabdian');
        $this->load->model('M_Mitra');
        $this->load->model('M_Luaran');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_SkemaPengabdian');
        $this->load->model('M_SumberDana');

        $nip = $this->session->userdata('user_name');
        $cek= $this->M_Profile->cekKadep(array('nip'=>$nip))->result();
        if (empty($cek)){
            redirect("login/");
        }
    }

    public function index()
    {
        $user = $this->session->userdata('user_name');
        $data['nama']= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
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
        
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/dashboard',$data);  
        $this->load->view('layout/footer');        

    }

    public function listSubmitPenelitian()
    {
        $user = $this->session->userdata('user_name');
        $data['jadwal'] = $this->M_JadwalPenelitian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/daftarPenelitian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function daftarPenelitian($id)
    {
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view'] = $this->M_Kadep->get_wherePenelitian(array('id_jadwal'=>$id, 'dosen.program_studi'=>$dep,))->result();
        $data['id'] = $id;
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/daftar_prop_penelitian',$data);
        $this->load->view('layout/footer'); 
    }

    public function listMonevPenelitian()
    {
        $data['jadwal'] = $this->M_JadwalPenelitian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/monevPenelitian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function monevPenelitian($jadwal)
    {
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view']= $this->M_Kadep->getwhere_viewmonev(array('proposal_penelitian.id_jadwal'=>$jadwal, 'dosen.program_studi'=>$dep,))->result();
        $data['id'] = $jadwal;
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/monev_penelitian', $data);
        $this->load->view('layout/footer'); 
    }

    public function listAkhirPenelitian()
    {
        $data['jadwal'] = $this->M_JadwalPenelitian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/akhirPenelitian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function akhirPenelitian($jadwal)
    {
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view']= $this->M_Kadep->getwhere_viewakhir(array('proposal_penelitian.id_jadwal'=>$jadwal, 'dosen.program_studi'=>$dep,))->result();
        $data['id'] = $jadwal;
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/akhir_penelitian', $data);
        $this->load->view('layout/footer'); 
    }

    public function detailAkhirPenelitian($id){
        $jadwal = $this->input->post('jadwal');
        $data['luaran'] = $this->M_PropPenelitian->get_luaran(array('id_proposal'=>$id))->result();
        $data['jadwal'] = $jadwal;
        $data['akhir'] = $this->M_ReviewerPenelitian->get_akhir(array('id_proposal'=>$id))->row();
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/akhir_penelitian_detail', $data);
        $this->load->view('layout/footer'); 
    }

    public function detailMonevPenelitian($id){
        $jadwal = $this->input->post('jadwal');
        $data['jadwal'] = $jadwal;
        $data['monev'] = $this->M_ReviewerPenelitian->get_monev(array('id_proposal'=>$id))->row();
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/monev_penelitian_detail',$data);
        $this->load->view('layout/footer'); 
    }

    public function detailAkhirPengabdian($id){
        $jadwal = $this->input->post('jadwal');
        $data['jadwal'] = $jadwal;
        $data['akhir'] = $this->M_Admin->get_akhir(array('id_proposal'=>$id))->row();
        $data['luaran'] = $this->M_PropPengabdian->get_luaran(array('id_proposal'=>$id))->result();
        $data['proposal'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/akhir_pengabdian_detail', $data);
        $this->load->view('layout/footer'); 
    }

    public function detailProposalPengabdian($id)
    {

        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['sumberdana']= $this->M_SumberDana->getwhere_sumberdana(array('id'=>$data['prop']->id_sumberdana))->row()->sumberdana;
        $data['anggota_dsn'] = $this->M_Dosen->getwhere_dosenpengabdiannama(array('id_proposal'=>$data['prop']->id))->result();
        $data['luaran'] = $this->M_Luaran->getwhere_luaranpengabdian(array('id_proposal'=>$data['prop']->id))->result();
        $data['mahasiswa'] = $this->M_Mahasiswa->getwhere_mahasiswapengabdian(array('id_proposal'=>$data['prop']->id))->result();
        if($data['prop']->id_mitra==0){
            $data['mitra']='0';
        }else{
            $data['mitra']= $this->M_Mitra->getwhere_mitra(array('id'=>$data['prop']->id_mitra))->row();
        }
    

        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/detail_proposal_pengabdian_mitra',$data);
        $this->load->view('layout/footer');

    }
    

    public function detailProposalPenelitian($id)
    {

        $data['prop'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['sumberdana']= $this->M_SumberDana->getwhere_sumberdana(array('id'=>$data['prop']->id_sumberdana))->row()->sumberdana;
        $data['anggota_dsn'] = $this->M_Dosen->getwhere_dosenpenelitiannama(array('id_proposal'=>$data['prop']->id))->result();
        $data['luaran'] = $this->M_Luaran->getwhere_luaranpenelitian(array('id_proposal'=>$data['prop']->id))->result();
        $data['mahasiswa'] = $this->M_Mahasiswa->getwhere_mahasiswapenelitian(array('id_proposal'=>$data['prop']->id))->result();
        
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/detail_proposal_penelitian',$data);
        $this->load->view('layout/footer');

    }
    

    public function listSubmitPengabdian()
    {
        $user = $this->session->userdata('user_name');
        $data['jadwal'] = $this->M_JadwalPengabdian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/daftarPengabdian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function daftarPengabdian($id)
    {
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view'] = $this->M_Kadep->get_wherePengabdian(array('id_jadwal'=>$id, 'dosen.program_studi'=>$dep,))->result();
        $data['id'] = $id;
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/daftar_prop_pengabdian',$data);
        $this->load->view('layout/footer'); 

    }

    public function listAkhirPengabdian()
    {
        $data['jadwal'] = $this->M_JadwalPengabdian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/akhirPengabdian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function akhirPengabdian($jadwal)
    {
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view']= $this->M_Kadep->get_whereAkhir(array('proposal_pengabdian.id_jadwal'=>$jadwal, 'dosen.program_studi'=>$dep,))->result();
        $data['id'] = $jadwal;
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/akhir_pengabdian', $data);
        $this->load->view('layout/footer'); 
    }
    

    public function profile()
    {
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Kadep->getwhere_profile(array('nip'=>$nip))->result();
        
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/profile', $nama);
        $this->load->view('layout/footer'); 
    }

    public function listAssignPenelitian()
    {
        $data['jadwal'] = $this->M_JadwalPenelitian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/assignProposalPenelitian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function assignProposalPenelitian($jadwal)
    {
        $data['jadwal'] = $jadwal;
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view']= $this->M_Kadep->get_viewAssignPenelitian(array('proposal_penelitian.id_jadwal'=>$jadwal, 'dosen.program_studi'=>$dep,))->result();
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/assign_penelitian',$data);
        $this->load->view('layout/footer'); 
    }

    public function setReviewerPenelitian($id)
    {
        $jadwal = $this->input->post('jadwal');
        $data['jadwal'] = $jadwal;
        $data['prop'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPenelitian->get_reviewer()->result();
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/setreviewerPenelitian',$data);
        $this->load->view('layout/footer'); 
    }

    public function EditReviewerPenelitian($id)
    {
        $jadwal = $this->input->post('jadwal');
        $data['jadwal'] = $jadwal;
        $data['prop'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPenelitian->get_reviewer()->result();
        $data['assigned'] = $this->M_AdminPenelitian->getwhere_assignment(array('id_proposal'=>$id))->row();

        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/editreviewerPenelitian',$data);
        $this->load->view('layout/footer'); 
    }

    public function submitAssignEditPenelitian()
    {
        $jadwal = $this->input->post('jadwal');
        $idProp = $this->input->post('id');
        $reviewer = $this->input->post('reviewer');
        $reviewer2 = $this->input->post('reviewer2');
        $data = [
            'id_proposal' => $idProp,
            'reviewer' => $reviewer,
            'reviewer2' => $reviewer2
        ];

        $this->M_AdminPenelitian->update_reviewer($data,$idProp);
        redirect("kadep/kadep/assignProposalPenelitian"."/".$jadwal);
    }

    public function submitAssignReviewerPenelitian()
    {
        $jadwal = $this->input->post('jadwal');
        $idProp = $this->input->post('id');
        $reviewer = $this->input->post('reviewer');
        $reviewer2 = $this->input->post('reviewer2');
        $proposalid = [
            'id_proposal'=>$idProp,
        ];
        $data = [
            'id_proposal' => $idProp,
            'reviewer' => $reviewer,
            'reviewer2' => $reviewer2
        ];
        $this->M_AdminPenelitian->insert_reviewer($data,$proposalid);
        redirect("kadep/kadep/assignProposalPenelitian"."/".$jadwal);
    }

    public function listAssignPengabdian()
    {
        $data['jadwal'] = $this->M_JadwalPengabdian->get_jadwal()->result();
        $data['jenis'] = 'kadep/kadep/assignProposalPengabdian';
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('admin/chooseJadwal', $data);
        $this->load->view('layout/footer'); 
    }

    public function assignProposalPengabdian($jadwal)
    {
        $data['jadwal'] = $jadwal;
        $user = $this->session->userdata('user_name');
        $dep= $this->M_Kadep->getwhere_profile(array('nip'=>$user))->row()->dep;
        $data['view'] = $this->M_Kadep->get_viewAssignPengabdian(array('proposal_pengabdian.id_jadwal'=>$jadwal, 'dosen.program_studi'=>$dep,))->result();
        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/assign_pengabdian',$data);
        $this->load->view('layout/footer'); 
    }

    public function setReviewerPengabdian($id)
    {
        $jadwal = $this->input->post('jadwal');
        $data['jadwal'] = $jadwal;
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPengabdian->get_reviewer()->result();

        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/setreviewerPengabdian',$data);
        $this->load->view('layout/footer'); 

    }

   

    public function EditReviewerPengabdian($id)
    {
        $jadwal = $this->input->post('jadwal');
        $data['jadwal'] = $jadwal;
        $data['prop'] = $this->M_PropPengabdian->getwhere_proposal(array('id'=>$id))->row();
        $id_mitra = $data['prop']->id_mitra;
        $data['mitra'] = $this->M_Mitra->getwhere_mitra(array('id'=>$id_mitra))->row();
        $nip = $data['prop']->nip;
        $data['dosen'] = $this->M_Dosen->getwhere_dosen(array('nip'=>$nip))->row();
        $data['reviewer'] = $this->M_ReviewerPengabdian->get_reviewer()->result();
        $data['assigned'] = $this->M_AssignProposalPengabdian->getwhere_assignment(array('id_proposal'=>$id))->row();

        $this->load->view('layout/sidebar_kadep');
        $this->load->view('kadep/editreviewerPengabdian',$data);
        $this->load->view('layout/footer'); 

    }

    public function submitAssignReviewerPengabdian()
    {
        $jadwal = $this->input->post('jadwal');
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
        
        redirect("kadep/kadep/assignProposalPengabdian"."/".$jadwal);

    }

    public function submitAssignEditPengabdian()
    {
        $jadwal = $this->input->post('jadwal');
        $idProp = $this->input->post('id');
        $reviewer = $this->input->post('reviewer');
        $reviewer2 = $this->input->post('reviewer2');
        $data = [
            'reviewer' => $reviewer,
            'reviewer2' => $reviewer2
        ];

        $this->M_AssignProposalPengabdian->update_reviewerAssign($idProp,$data);
        redirect("kadep/kadep/assignProposalPengabdian"."/".$jadwal);

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}