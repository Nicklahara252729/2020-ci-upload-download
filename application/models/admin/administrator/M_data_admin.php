<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_data_admin extends CI_Model {
    public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	public function viewDataAdmin(){
		return $this->db->where_not_in('level', ['SUPERADMIN'])
						->get('user');
    }

    public function saveDataAdmin(){
        $created_at     = date('Y-m-d H:i:s');
        $updated_at     = date('Y-m-d H:i:s');
        
        //from input
        $nama    		= trim($this->input->post('nama','true'));
        $email          = trim($this->input->post('email','true'));
        $username       = trim($this->input->post('username','true'));
		$password       = trim($this->input->post('password','true'));

        //check data
        $checkData      = $this->db->where('email',$email)
                                   ->or_where('username',$username)
                                   ->get('user')
                                   ->num_rows();

        $this->db->trans_begin();
        $this->db->insert('user',[
                      'nama'   		=> $nama,
					  'email'       => $email,
                      'username'    => $username,
                      'level'       => 'admin',
                      'password'    => password_hash($password,PASSWORD_DEFAULT),
                      'created_at'  => $created_at,
                      'updated_at'  => $updated_at,
                  ]);
        
        if($this->db->trans_status() === FALSE || $checkData > 0){
            $this->db->trans_rollback();
            if($checkData > 0){
                $txt    =  'Username atau email sudah terdaftar';
                $icon   =  'warning';
            }else{
                $txt    = 'Terjadi kesalahan saat menyimpan data';
                $icon   = 'error';
            }
            $msg = ['msg' => $txt,'status'=>FALSE,'icon'=>$icon];
		}else{
            $msg = ['status'=>TRUE];
			      $this->db->trans_commit();
        }
        return $msg;
    }

    public function updateDataAdmin(){
        $created_at     = date('Y-m-d H:i:s');
        $updated_at     = date('Y-m-d H:i:s');
        
        //from input
        $nama    		= trim($this->input->post('nama','true'));
        $email          = trim($this->input->post('email','true'));
        $username       = trim($this->input->post('username','true'));
        $id           = trim($this->input->post('id'));

        $this->db->trans_begin();
        $this->db->where(['id'=>$id])
                ->update('user',[
                        'nama'   	  => $nama,
                        'email'       => $email,
                        'username'    => $username,
                        'updated_at'  => $updated_at,
                      ]);

        if($this->db->trans_status() === FALSE){
          $this->db->trans_rollback();
          $txt    = 'Terjadi kesalahan saat menyimpan data';
          $icon   = 'error';
          $msg    = ['msg' => $txt,'status'=>FALSE,'icon'=>$icon];
        }else{
          $this->db->trans_commit();
          $msg = ['status'=>TRUE];
        }
        return $msg;
    }

    public function deleteDataAdmin($id){
        $checkData = $this->db->get_where('user',['id'=>$id])->num_rows();
        
        $this->db->trans_begin();
        $this->db->delete('user',['id'=>$id]);
        if($this->db->trans_status() === FALSE || $checkData <= 0){
          $this->db->trans_rollback();
          return FALSE;
        }else{
          $this->db->trans_commit();
          return TRUE;
        }
    }

    public function getDataAdmin($id){
        $cekData = $this->db->get_where('user',['id'=>$id]);
        if($cekData->num_rows() > 0 ){
            return $cekData->row_array();
        }else{
            return FALSE;
        }   
    }
}