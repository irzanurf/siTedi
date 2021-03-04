<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('Admin');
        $this->load->model('M_Profile');
    }

    public function index()
    {

            if($this->Admin->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                //redirect berdasarkan level user
                if($this->session->userdata("role") == "1"){
                    redirect('admin/dashboard/');
                }else if($this->session->userdata("role") == "2"){
                    redirect('reviewer/dashboard/');
                }else if($this->session->userdata("role") == "3"){
                    redirect('dosen/welcome/');
                }else if($this->session->userdata("role")== "4"){
                    redirect('mitra/verifikasi');
                }else if($this->session->userdata("role")== "5"){
                    redirect('kadep/kadep/');
                }

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('password', 'password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->Admin->check_login('user', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                            'role'      => $apps->role
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("role") == "1"){
                            redirect('admin/dashboard/');
                        }else if($this->session->userdata("role") == "2"){
                            redirect('reviewer/dashboard/');
                        }else if($this->session->userdata("role") == "3"){
                            redirect('dosen/welcome/');
                        }else if($this->session->userdata("role")== "4"){
                            redirect('mitra/verifikasi');
                        }else if($this->session->userdata("role")== "5"){
                            redirect('kadep/kadep/');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

        }

    }

    public function ganti_password()
    { 
     $this->form_validation->set_rules('new','New','required|alpha_numeric');
     $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
     $user = $this->session->userdata('user_name');
     $pass = md5($this->input->post('new'));
     $new = [
        "password" => $pass
     ];
       if($this->form_validation->run() == FALSE)
     {
      $this->load->view('change_pass');
     }else{
      $cek_old = $this->Admin->cek_old();
      if ($cek_old == False){
       $this->session->set_flashdata('error','Kata sandi lama salah!' );
       $this->load->view('change_pass');
      }else{
       $this->Admin->save($user,$new);
       $this->session->sess_destroy();
       $this->session->set_flashdata('error','Your password success to change, please relogin !' );
       $this->load->view('login');
      }//end if valid_user
     }
    }

    public function profile()
    {
        $nip = $this->session->userdata('user_name');
        $nama['nama']= $this->M_Profile->getwhere_profile(array('nip'=>$nip))->result();
        $nama['cek']= $this->M_Profile->cekRevPenelitian(array('nip'=>$nip))->result();
        
        $this->load->view('header', $nama);
        $this->load->view('profile', $nama);
        $this->load->view("footer");
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}