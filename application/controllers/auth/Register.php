<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index(){
        $data['title'] = 'Registrasi Pedagang Baru';
        $this->themes->Auth('auth/register',$data);
    }

    public function proses(){
		$check      = $this->m_register->checkAccount();	
        $num        = $check->num_rows();
        $getAkun    = $check->row();
        if($num > 0){
            $msg = array(
                'msg'=>'Email atau username telah terdaftar. Silahkan gunakan email dan username yang lain.',
                'icon' => 'warning',
            ); 
        }else{
            $saveData   = $this->m_register->proses();
            if($saveData == TRUE){
                $msg = array(
                    'msg'   => 'Registrasi berhasil. Silahkan login menggunakan username dan password yang anda daftar.',
                    'icon'  => 'success',
                );
            }else{
                $msg = array(
                    'msg'   =>'Gagal menyimpan data',
                    'icon'  => 'error',
                );
            }
        }
        echo json_encode($msg);
    }

}