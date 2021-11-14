<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller {
	public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index(){
        $data['title'] = 'Forgot Password';
        $this->themes->Auth('auth/forgot-password',$data);
    }

    public function proses(){
		$check      = $this->m_forgot_password->proses();	
        $num        = $check->num_rows();
        $getAkun    = $check->row();
        if($num > 0){
            $this->session->set_userdata(array('id_user'=>$getAkun->id));
            $msg = array(
                'msg'   => 'Lanjutkan reset password anda',
                'icon'  => 'success',
                'link'  => 'reset-password',
            );
        }else{
            $msg = array(
                'msg'=>'Email yang anda masukkan tidak terdaftar',
                'icon' => 'warning',
            ); 
            
        }
        echo json_encode($msg);
    }

}