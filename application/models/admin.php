<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Model
{
    //fungsi cek session logged in
    function is_logged_in()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function cek_old()
  {
   $old = md5($this->input->post('old'));    
   $this->db->where('password',$old);
   $query = $this->db->get('user');
      return $query->result();;
          }

    
    public function save($user,$new)
    {
    $this->db->where('username', $user);
    $this->db->update('user', $new);
 }
}