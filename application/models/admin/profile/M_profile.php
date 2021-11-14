<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_profile extends CI_Model {
    public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

    public function changeUsername(){
        $created_at   = date('Y-m-d H:i:s');
        $updated_at   = date('Y-m-d H:i:s');
        
        //from input
        $username     = trim($this->input->post('username','true'));
        $id           = trim($this->input->post('id_username','true'));

        //check data
        $checkData    = $this->db->get_where('tbl_user',[
                                      'username' => $username,
                                    ])
                                    ->num_rows();

        $this->db->trans_begin();
        $this->db->where(['id'=>$id])
                 ->update('tbl_user',[
                        'username'     => $username,
                        'updated_at'   => $updated_at,
                      ]);
        if($this->db->trans_status() === FALSE || $checkData > 0){
          $this->db->trans_rollback();
          if($checkData > 0){
            $txt    =  'Data sudah ada';
            $icon   =  'warning';
          }else{
            $txt    = 'Terjadi kesalahan saat menyimpan data';
            $icon   = 'error';
          }
          $msg = ['msg' => $txt,'status'=>FALSE,'icon'=>$icon];
        }else{
          $this->db->trans_commit();
          $msg = ['status'=>TRUE];
        }
        return $msg;
    }

    public function storeImage(){
        $config['upload_path']   = './assets/img/user/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload',$config);
        $this->upload->do_upload("files");
        $dataimg                 = array('upload_data' => $this->upload->data());
        $image                   = $dataimg['upload_data']['file_name']; 
        return $image;
    }

    public function ubahPhotoProfile(){
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $image      = $this->m_profile->storeImage();
        $id         = trim($this->input->post('idphoto','true'));

        //from input
        $data = array(
            'photo' 	    => $image,
            'created_at'    => $created_at,
			'updated_at'    => $updated_at,
        );

        // checking data
        $getData    = $this->db->get_where('tbl_user',['id'=>$id])->row();
        $getPegawai = $this->db->join('tbl_pegawai','tbl_pegawai.uuid = tbl_user.uuid')
                               ->get_where('tbl_user',['tbl_user.id'=>$id]);

        $this->db->trans_begin();

        if($getPegawai->num_rows() > 0){
            $this->db->where(['uuid'=>$getData->uuid])
                     ->update('tbl_pegawai',$data);
        }else{
            $this->db->where(['uuid'=>$getData->uuid])
                     ->update('tbl_dokter',$data);
        }
        

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            unlink("/assets/img/user/".$image);
            if($checkData > 0){
                $txt    =  'Data sudah ada';
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

}
