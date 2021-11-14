<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
    public function __construct()
	{
		parent::__construct();	
		date_default_timezone_set("Asia/Jakarta");
		isAuth();
    }
    
    public function index(){
        $data['info']           = getInfo();

        $data['subtitle']       = 'Admin';
    	$data['subtitle_small'] = 'Dashboard';
    	$data['page']           = 'dashboard';
        $data['subpage']        = '';	
        
        $this->themes->Display('admin/dashboard/index', $data);
    }
}