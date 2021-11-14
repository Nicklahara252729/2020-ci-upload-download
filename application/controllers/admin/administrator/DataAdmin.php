<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DataAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		date_default_timezone_set("Asia/Jakarta");
		isAuth();
	}	

	public function index(){
            $data['info']           = getInfo();
            
	        $data['subtitle']       = 'Administrator';
    		$data['subtitle_small'] = 'Data Admin';
            $data['page']           = 'administrator';
        
    		$this->themes->Display('admin/administrator/data-admin/index', $data);
    }	

    public function saveDataAdmin(){
        if(!empty(trim($this->input->post('id','true')))){
            $saveData = $this->m_data_admin->updateDataAdmin();
        }else{
            $saveData = $this->m_data_admin->saveDataAdmin();
        }
        
        if($saveData['status'] == TRUE){
            $msg = array(
                'msg'  =>'Data berhasil disimpan',
                'icon' => 'success',
                'link' => 'administrator/data-admin',
            );
        }else{
            $msg = array(
                'msg'  => $saveData['msg'],
                'icon' => $saveData['icon'],
            );
        }
        echo json_encode($msg);
    }

    public function viewDataAdmin(){
        $data['data'] = $this->m_data_admin->viewDataAdmin()->result_array();
        echo json_encode($data);
    }

    public function deleteDataAdmin(){
        $id       = trim($this->input->post('id','true'));
        $deleted  = $this->m_data_admin->deleteDataAdmin($id);
        if($deleted == TRUE){
            $msg = array(
                'msg'  => 'Berhasil menghapus data',
                'icon' => 'success',
            );
        }else{
            $msg = array(
                'msg'  => 'Data tidak ditemukan',
                'icon' => 'error',
            );
        }
        echo json_encode($msg);
    }

    public function getDataAdmin(){
        $id   = trim($this->input->post('id','true'));
        $data = $this->m_data_admin->getDataAdmin($id);
        if($data != false){
            echo json_encode($data);
        }else{
            $msg = array(
                'msg'  => 'Data tidak ditemukan',
                'icon' => 'error',
            );
            echo json_encode($msg);
        }   
    }
}
