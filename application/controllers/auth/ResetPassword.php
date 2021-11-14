<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {
	public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index(){        
        $data['title'] = 'Reset Password';
        $this->themes->Auth('auth/reset-password',$data);
    }

    public function proses(){
        try {
            $update = $this->m_reset_password->proses();
            if($update){
                $msg = array(
                    'msg'  => 'Reset password berhasil',
                    'icon' => 'success',
                    'link' => '/',
                );
            }else{
                $msg = array(
                    'msg'  => 'Reset password gagal',
                    'icon' => 'error',
                );
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        echo json_encode($msg);
    }

}