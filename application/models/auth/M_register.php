<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_register extends CI_Model{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function checkAccount(){
        $email      = trim($this->input->post('email','true'));
        $username   = trim($this->input->post('username','true'));
        return $this->db->where('email',$email)
                        ->or_where('username',$username)
                        ->get('user');
    }

    public function proses(){
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $nama     = trim($this->input->post('nama','true'));
        $email    = trim($this->input->post('email','true'));    
        $username = trim($this->input->post('username','true'));
        $password = trim($this->input->post('password','true'));
        $no_telp  = trim($this->input->post('no_telp','true'));

        $this->db->trans_begin();
        $this->db->insert('user',
                        [
                        'nama'          => $nama,
                        'email'         => $email,
                        'username'      => $username,
                        'password'      => md5($password),
                        'no_telp'       => $no_telp,
                        'id_role'       => '2',
                        'created_at'    => $created_at,
                        'updated_at'    => $updated_at,
                        ]
                );
        if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
    }

}