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
        if($this->Admin->is_role() == "1" || $this->Admin->is_role()=='4'){
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
        $this->load->model('M_Admin');
        $this->load->model('M_SkemaPenelitian');
        $this->load->model('M_ReviewerPenelitian');
        
    }

    

    public function index()
    {
        $nip = $this->session->userdata('user_name');
        $nama['view']= $this->M_PropPenelitian->getwhere_viewpenelitian(array('nip'=>$nip))->result();
        $nama['anggota']= $this->M_PropPenelitian->getwhere_viewanggota($nip)->result();
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $nama['berita'] = $this->M_Admin->get_berita(array('id'=>1))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dashboard', $nama);
        $this->load->view("penelitian/footer");
    }

    public function addformProposal()
    {
        $this->form_validation->set_rules('judul','Judul Penelitian', 'required');
        $this->form_validation->set_rules('abstrak','Abstrak', 'required');
        $this->form_validation->set_rules('luaran','Luaran','required');
        // $this->form_validation->set_rules('lokasi','Lokasi','required');
        $nip = $this->session->userdata('user_name');
        $date = date('Y-m-d');
        $bulan = $this->input->post('bulan',true);
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
        $biaya = str_replace('.','',$this->input->post('biaya',true));
        $prop = [
            "nip"=>$nip,
            "judul"=>$this->input->post('judul',true),
            "abstrak"=>$this->input->post('abstrak',true),
            "id_jenis"=>$this->input->post('jenis',true),
            "id_jadwal" => $jadwal,
            "tgl_upload"=>$date,
            "lokasi"=>$this->input->post('lokasi',true),
            "mitra"=>$this->input->post('mitra',true),
            "lama_pelaksanaan"=>$bulan,
            "id_sumberdana"=>$this->input->post('sumberdana',true),
            "biaya"=>$biaya,
            "status"=>1,
            "file"=>$prop_file

        ];
        $proposal=$this->M_PropPenelitian->insert_proposal($prop);
        $nip= $this->input->post('dosen[]');
        
        $data_dosen = array();
        for($i=0; $i<count($nip)-1; $i++)
        {
            if($nip[$i]==""||$nip[$i]==null||$nip[$i]==0){

            }
            else{
            $data_dosen[$i] = array(
                'nip'  =>      $nip[$i],
                "id_proposal"=>$proposal,
            );
        }
        }
        $this->M_PropPenelitian->dosen($data_dosen);

        $id_luaran= $this->input->post('luaran[]');
        $data_luaran = array();
        for($i=0; $i<count($id_luaran)-1; $i++)
        {
            if($id_luaran[$i]==""||$id_luaran[$i]==null||$id_luaran[$i]==0){

            }
            else{
            $data_luaran[$i] = array(
                'id_luaran'  =>$id_luaran[$i],
                "id_proposal"=>$proposal,
            );
        }
        }
        $this->M_PropPenelitian->luaran($data_luaran);
        
        $nim= $this->input->post('nim_mahasiswa[]');
        $nama_mhs = $this->input->post('nama_mahasiswa[]');
        $data_mahasiswa = array();
        for($i=0; $i<count($nim)-1; $i++)
        {
            $data_mahasiswa[$i] = array(
                'nim'  =>      $nim[$i],
                'nama' => $nama_mhs[$i],
                "id_proposal"=>$proposal,
            );
        }
        $this->M_PropPenelitian->mahasiswa($data_mahasiswa);
            $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan pengajuan proposal <br> Proposal dapat dirubah selama jadwal pengumpulan belum berakhir <br> Pastikan Anda telah mengecek kembali proposal Anda sebelum jadwal pengumpulan berakhir </p>');
            $this->session->set_flashdata('button', 'dosen/penelitian/submit');
            redirect("dosen/penelitian/success");
    }

    public function success(){
        $this->load->view("penelitian/header");
        $this->load->view("dosen/success");
        $this->load->view("penelitian/footer");
    }
        

    public function PengisianForm()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->get_viewpenelitian()->result();
        $data['jenispenelitian']= $this->M_Jenisp->get_jenispenelitian()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['luaran']= $this->M_Luaran->get_luaran_penelitian()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $cekjad=$data['jadwal'] = $this->M_JadwalPenelitian->get_last_jadwal()->row();
        $this->load->view('penelitian/header', $nama);
        if (empty($cekjad)){
            $this->load->view('dosen/penelitian/closed_form', $data);
        }
        else{
        $now = date('Y-m-d', strtotime(date('Y-m-d')));
        $awal = date('Y-m-d', strtotime($data['jadwal']->tgl_mulai));
        $akhir = date('Y-m-d', strtotime($data['jadwal']->tgl_selesai));
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        
        if(($now>= $awal) && ($now<=$akhir)){
            $this->load->view('dosen/penelitian/pengisianform', $data);
        } 
     else {
        $this->load->view('dosen/penelitian/closed_form', $data);
    }
}
        
        $this->load->view("penelitian/footer");
    }
    
    // public function EditPenelitian()
    // {
    //     $username = $this->session->userdata('user_name');
    //     $data['view']= $this->M_PropPenelitian->get_viewpenelitian()->result();
    //     $data['v']= $this->M_PropPenelitian->get_penelitian()->result();
    //     $nip = $this->session->userdata('user_name');
    //     $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
    //     $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
    //     $this->load->view('penelitian/header', $nama);
    //     $this->load->view("layout_penelitian/sidebar");
    //     $this->load->view('dosen/editpenelitian', $data);
    // }

    public function submit()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->getwhere_viewpenelitian(array('nip'=>$username))->result();
        $data['anggota']= $this->M_PropPenelitian->getwhere_viewanggota($username)->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/submit', $data);
        $this->load->view("penelitian/footer");
    }

    public function detailProposal(){
        $username = $this->session->userdata('user_name');
        $id = $this->input->post('id');
        $data['view']= $this->M_PropPenelitian->get_viewpenelitian()->result();
        $data['sumberdana']= $this->M_SumberDana->get_sumberdana()->result();
        $data['luaran']= $this->M_Luaran->get_luaran_penelitian()->result();
        
        if($id==NULL){
            redirect("dosen/penelitian/submit");
        }
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['mahasiswa']= $this->M_Mahasiswa->get_mahasiswa()->result();
        $data['skema'] = $this->M_SkemaPenelitian->get_skemapenelitian()->result();
        $data['anggota_dosen'] = $this->M_PropPenelitian->dosen_update_prop($id)->result();
        $data['nilai_luaran'] = $this->M_PropPenelitian->luaran_update_prop($id)->result();
        $data['anggota_mhs'] = $this->M_PropPenelitian->mhs_update_prop($id)->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/detailproposal',$data);
        $this->load->view("penelitian/footer");
        
    }

    public function editformProposal()
    {
            $this->form_validation->set_rules('judul','Judul Pengabdian', 'required');
            $this->form_validation->set_rules('abstrak','Abstrak', 'required');
            $this->form_validation->set_rules('bulan','bulan', 'required');
            $id = $this->input->post('id');
            $nip = $this->session->userdata('user_name');
            $data_proposal = $this->M_PropPenelitian->getwhere_proposal(array('id'=> $id))->row();
            $cek_file = $this->input->post('file_prop',true);
            $date = date('Y-m-d');
            $bulan = $this->input->post('bulan',true);
            $biaya = str_replace('.','',$this->input->post('biaya',true));
        
            $prop = array (
                "nip"=>$nip,
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
                            if($dsn_new[$j]==""||$dsn_new[$j]==null){

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
            
            redirect("dosen/penelitian/submit");
        } else {
            $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan perubahan proposal <br> Proposal dapat dirubah selama jadwal pengumpulan belum berakhir <br> Pastikan Anda telah mengecek kembali proposal Anda sebelum jadwal pengumpulan berakhir </p>');
            $this->session->set_flashdata('button', 'dosen/penelitian/submit');
            redirect("dosen/penelitian/success");
        }
        

    }

    // public function uploadFileProp(){
    //     $id=$this->input->post('id');
    //     $prop = $_FILES['file_prop'];
    //     if($prop=''){}else{
    //         $config['upload_path'] = './assets/prop_penelitian';
    //         $config['allowed_types'] = 'pdf';
    //         $config['encrypt_name'] = TRUE;

    //         $this->load->library('upload',$config);
    //         if(!$this->upload->do_upload('file_prop')){
    //             echo "Upload Gagal"; die();
    //         } else {
    //             $prop=$this->upload->data('file_name');
    //         }
    //     }
    //     $data = [
    //         "file"=>$prop,];
    //     $this->M_PropPenelitian->update_prop($id,$data);
    //     redirect('dosen/penelitian/submit');

    // }

    public function editProposal(){
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("dosen/penelitian/submit");
        }
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
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

    public function deleteForm(){
        $id = $this->input->post('id');
        
            $this->M_PropPenelitian->delete_prop($id,$data);

        redirect('dosen/penelitian/submit');
    }

    public function monev()
    {
        $username = $this->session->userdata('user_name');
        $data['view']= $this->M_PropPenelitian->getwhere_viewmonev(array('proposal_penelitian.nip'=>$username))->result();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $cekjad=$data['jadwal'] = $this->M_JadwalPenelitian->get_last_jadwal()->row();
        $this->load->view('penelitian/header', $nama);
        if (empty($cekjad)){
            $this->load->view('dosen/penelitian/closed_form', $data);
        }
        else{
        $now = date('Y-m-d', strtotime(date('Y-m-d')));
        $awal = date('Y-m-d', strtotime($data['jadwal']->tgl_mulai));
        $akhir = date('Y-m-d', strtotime($data['jadwal']->tgl_monev));
        if(($now>= $awal) && ($now<=$akhir)){
            $this->load->view('dosen/penelitian/monev', $data);
        } 
     else {
        $this->load->view('dosen/penelitian/closed_form_monev', $data);
    }
}
        
        $this->load->view("penelitian/footer");
    }

    public function editMonev(){
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("dosen/penelitian/monev");
        }
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $data['monev'] = $this->M_ReviewerPenelitian->get_monev(array('id_proposal'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/editmonev',$data);
        $this->load->view("penelitian/footer");
    }

    function checkJudul(){
        $judul = $this->input->post('judul');
        $if_exists = $this->M_PropPenelitian->checkJudulExist($judul);
        if ($if_exists > 0) {
          echo json_encode('Judul sudah diajukan');
        } else {
          echo json_encode('Judul belum diajukan');
        }
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
                echo "Upload Gagal, Terdapat Field Kosong"; die();
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
            "tgl_upload"=>$date,
            "status"=>1,
        ];
        $this->M_PropPenelitian->update_monev($data,$id);

        $stat = [
            "status"=>"3",];
            $this->M_PropPenelitian->update_prop($id,$stat);
            $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan pengumpulan laporan monev <br> Laporan monev dapat dirubah selama jadwal pengumpulan belum berakhir <br> Pastikan Anda telah mengecek kembali laporan monev Anda sebelum jadwal pengumpulan berakhir </p>'); 
            $this->session->set_flashdata('button', 'dosen/penelitian/monev');
        redirect("dosen/penelitian/success"); 

    }

    public function updateMonev(){
        $id=$this->input->post('id');
        $nip = $this->session->userdata('user_name');
        $date = date('Y-m-d');
        $prop1 = $_FILES['file1'];
        $prop2 = $_FILES['file2'];
        $prop3 = $_FILES['file3'];
            if(empty($prop1['name'])){}
            else{
                $config['upload_path'] = './assets/monev_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file1')){
                echo "Upload Gagal"; die();
            } else {
                $prop1=$this->upload->data('file_name');
            }
            $datafile = [
                "file1"=>$prop1,];
                $proposal=$this->M_PropPenelitian->update_monev($datafile,$id);
            }
        

            if(empty($prop2['name'])){}
            else{
                $config['upload_path'] = './assets/monev_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file2')){
                echo "Upload Gagal"; die();
            } else {
                $prop2=$this->upload->data('file_name');
            }
            $datafile = [
                "file2"=>$prop2,];
                $proposal=$this->M_PropPenelitian->update_monev($datafile,$id);
            }

            if(empty($prop3['name'])){}
            else{
                $config['upload_path'] = './assets/monev_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file3')){
                echo "Upload Gagal"; die();
            } else {
                $prop3=$this->upload->data('file_name');
            }
            $datafile = [
                "file3"=>$prop3,];
                $proposal=$this->M_PropPenelitian->update_monev($datafile,$id);
            }

        $data = [
            "id_proposal"=>$id,
            "nip"=>$nip,
            "catatan"=>$this->input->post('catatan',true),
            "tgl_upload"=>$date,
            "status"=>1,
        ];
        $this->M_PropPenelitian->update_monev($data,$id);

        $stat = [
            "status"=>"3",];
            $this->M_PropPenelitian->update_prop($id,$stat);
            $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan perubahan laporan monev <br> Laporan monev dapat dirubah selama jadwal pengumpulan belum berakhir <br> Pastikan Anda telah mengecek kembali laporan monev Anda sebelum jadwal pengumpulan berakhir </p>'); 
        $this->session->set_flashdata('button', 'dosen/penelitian/monev');
        redirect("dosen/penelitian/success"); 

    }

    public function updateAkhir(){
        $id=$this->input->post('id');
        $nip = $this->session->userdata('user_name');
        $date = date('Y-m-d');
        $prop1 = $_FILES['file1'];
        $prop2 = $_FILES['file2'];
        $prop3 = $_FILES['file3'];
        $prop4 = $_FILES['file4'];
        
        if(empty($prop1['name'])){}
            else{
                $config['upload_path'] = './assets/lap_akhir_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file1')){
                echo "Upload Gagal"; die();
            } else {
                $prop1=$this->upload->data('file_name');
            }
            $datafile = [
                "file1"=>$prop1,];
                $proposal=$this->M_PropPenelitian->update_akhir($datafile,$id);
            }
        

            if(empty($prop2['name'])){}
            else{
                $config['upload_path'] = './assets/lap_akhir_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file2')){
                echo "Upload Gagal"; die();
            } else {
                $prop2=$this->upload->data('file_name');
            }
            $datafile = [
                "file2"=>$prop2,];
                $proposal=$this->M_PropPenelitian->update_akhir($datafile,$id);
            }

            if(empty($prop3['name'])){}
            else{
                $config['upload_path'] = './assets/lap_akhir_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file3')){
                echo "Upload Gagal"; die();
            } else {
                $prop3=$this->upload->data('file_name');
            }
            $datafile = [
                "file3"=>$prop3,];
                $proposal=$this->M_PropPenelitian->update_akhir($datafile,$id);
            }

            if(empty($prop4['name'])){}
            else{
                $config['upload_path'] = './assets/lap_akhir_penelitian';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file4')){
                echo "Upload Gagal"; die();
            } else {
                $prop4=$this->upload->data('file_name');
            }
            $datafile = [
                "file4"=>$prop4,];
                $proposal=$this->M_PropPenelitian->update_akhir($datafile,$id);
            }

        $data = [
            "id_proposal"=>$id,
            "nip"=>$nip,
            "catatan"=>$this->input->post('catatan',true),
            "tgl_upload"=>$date,
            "status"=>1,
        ];
        $this->M_PropPenelitian->update_akhir($data,$id);
        $stat = [
            "status"=>"4",];
            $this->M_PropPenelitian->update_prop($id,$stat);
            $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan perubahan laporan akhir <br> Laporan akhir dapat dirubah selama jadwal pengumpulan belum berakhir <br> Pastikan Anda telah mengecek kembali laporan akhir Anda sebelum jadwal pengumpulan berakhir </p>'); 
            $this->session->set_flashdata('button', 'dosen/penelitian/akhir');
        redirect("dosen/penelitian/success"); 
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
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $cekjad=$data['jadwal'] = $this->M_JadwalPenelitian->get_last_jadwal()->row();
        $this->load->view('penelitian/header', $nama);
        if (empty($cekjad)){
            $this->load->view('dosen/penelitian/closed_form', $data);
        }
        else{
        $now = date('Y-m-d', strtotime(date('Y-m-d')));
        $awal = date('Y-m-d', strtotime($data['jadwal']->tgl_mulai));
        $akhir = date('Y-m-d', strtotime($data['jadwal']->tgl_akhir));
        if(($now>= $awal) && ($now<=$akhir)){
            $this->load->view('dosen/penelitian/akhir', $data);
        } 
     else {
        $this->load->view('dosen/penelitian/closed_form_akhir', $data);
    }
}
        
        $this->load->view("penelitian/footer");
    }

    public function editAkhir(){
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("dosen/penelitian/akhir");
        }
        $data['proposal'] = $this->M_PropPenelitian->getwhere_proposal(array('id'=>$id))->row();
        $data['akhir'] = $this->M_ReviewerPenelitian->get_akhir(array('id_proposal'=>$id))->row();
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        $this->load->view('penelitian/header', $nama);
        $this->load->view('dosen/penelitian/editakhir',$data);
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
            "tgl_upload"=>$date,
            "status"=>1,
        ];
        $this->M_PropPenelitian->update_akhir($data,$id);
        $stat = [
            "status"=>"4",];
            $this->M_PropPenelitian->update_prop($id,$stat);
            $this->session->set_flashdata('pesan', '<p>Terimakasih Anda berhasil melakukan pengumpulan laporan akhir <br> Laporan akhir dapat dirubah selama jadwal pengumpulan belum berakhir <br> Pastikan Anda telah mengecek kembali laporan akhir Anda sebelum jadwal pengumpulan berakhir </p>');
        $this->session->set_flashdata('button', 'dosen/penelitian/akhir');
        redirect("dosen/penelitian/success"); 
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