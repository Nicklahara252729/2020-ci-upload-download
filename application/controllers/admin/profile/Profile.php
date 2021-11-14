<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller{
    public function __construct()
	{
		parent::__construct();	
		date_default_timezone_set("Asia/Jakarta");
		isAuth();
    }
    
    public function index(){
        $data['info']           = getInfo();

        $data['subtitle']       = 'Profile';
    	$data['subtitle_small'] = 'Profile';
    	$data['page']           = 'profile';
    
        $this->themes->Display('admin/profile/index', $data);
    }

    public function changeUsername(){
        $saveData = $this->m_profile->changeUsername();
        
        if($saveData['status'] == TRUE){
            $msg = array(
                'msg'  =>'Data berhasil disimpan',
                'icon' => 'success',
                'link' => 'profile',
            );
        }else{
            $msg = array(
                'msg'  => $saveData['msg'],
                'icon' => $saveData['icon'],
            );
        }
        echo json_encode($msg);
    }

    public function ubahPhotoProfile(){
        $saveData = $this->m_profile->ubahPhotoProfile();
        
        if($saveData['status'] == TRUE){
            $msg = array(
                'msg'  =>'Data berhasil disimpan',
                'icon' => 'success',
                'link' => 'profile',
            );
        }else{
            $msg = array(
                'msg'  => $saveData['msg'],
                'icon' => $saveData['icon'],
            );
        }
        echo json_encode($msg);
    }
}