<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller{
    public function __construct()
	{
		parent::__construct();	
		date_default_timezone_set("Asia/Jakarta");
		isAuth();
    }
    
    public function index(){
        $data['info']           = getInfo();

        $data['subtitle']       = 'Riwayat';
    	$data['subtitle_small'] = 'Riwayat Upload';
    	$data['page']           = 'Riwayat';
    
        $this->themes->Display('admin/riwayat/upload/index', $data);
    }

    public function viewRiwayatUpload(){
        $data['data'] = $this->m_upload->viewRiwayatUpload()->result_array();
        echo json_encode($data);
    }
}
