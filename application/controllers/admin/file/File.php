<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class File extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		date_default_timezone_set("Asia/Jakarta");
		isAuth();
	}	

	public function index(){
            $data['info']           = getInfo();
            
	        $data['subtitle']       = 'File';
    		$data['subtitle_small'] = 'Data File';
            $data['page']           = 'file';
        
    		$this->themes->Display('admin/file/index', $data);
    }	

    public function saveFile(){
        if(!empty(trim($this->input->post('id','true')))){
            $saveData = $this->m_file->updateFile();
        }else{
            $saveData = $this->m_file->saveFile();
        }
        
        if($saveData['status'] == TRUE){
            $msg = array(
                'msg'  =>'Data berhasil disimpan',
                'icon' => 'success',
                'link' => 'file',
            );
        }else{
            $msg = array(
                'msg'  => $saveData['msg'],
                'icon' => $saveData['icon'],
            );
        }
        echo json_encode($msg);
    }

    public function viewFile(){
        $data['data'] = $this->m_file->viewFile()->result_array();
        echo json_encode($data);
    }

    public function deleteFile(){
        $id       = trim($this->input->post('id','true'));
        $deleted  = $this->m_file->deleteFile($id);
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

    public function getFile(){
        $id   = trim($this->input->post('id','true'));
        $data = $this->m_file->getFile($id);
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

    public function downloadFile(){
        $saveData = $this->m_file->downloadFile();
        if($saveData['status'] == TRUE){
            $msg = array(
                'msg'  =>'success',
                'link' => $saveData['link'],
            );
        }else{
            $msg = array(
                'msg'  => $saveData['msg'],
            );
        }
        echo json_encode($msg);
    }
}
