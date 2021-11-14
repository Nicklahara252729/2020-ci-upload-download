<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller{
    public function __construct()
	{
		parent::__construct();	
		date_default_timezone_set("Asia/Jakarta");
		isAuth();
    }
    
    public function index(){
        $data['info']           = getInfo();

        $data['subtitle']       = 'Riwayat';
    	$data['subtitle_small'] = 'Riwayat Download';
    	$data['page']           = 'Riwayat';
    
        $this->themes->Display('admin/riwayat/download/index', $data);
    }

    public function viewRiwayatDownload(){
        $data['data'] = $this->m_download->viewRiwayatDownload()->result_array();
        echo json_encode($data);
    }
}