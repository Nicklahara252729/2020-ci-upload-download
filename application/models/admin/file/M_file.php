<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_file extends CI_Model {
    public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	public function viewFile(){
        return $this->db->select('* , file.created_at as time, file.id as idfile ')
                        ->join('riwayat','riwayat.id_file = file.id')
                        ->join('user','user.id = riwayat.id_user')
                        ->get_where('file',['riwayat.type'=>'upload']);
    }

    public function storeImage(){
        $config['upload_path']   = './assets/filenya/';
        $config['allowed_types'] = '*';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload',$config);
        $this->upload->do_upload("file");
        $dataimg                 = array('upload_data' => $this->upload->data());
        $file                    = $dataimg['upload_data']['file_name']; 
        return $file;
    }

    public function saveFile(){
        $created_at     = date('Y-m-d H:i:s');
        $updated_at     = date('Y-m-d H:i:s');
        $file           = $this->m_file->storeImage();
        $user           = getInfo();
        
        //from input
        $id             = $this->uuid->v4();
        $id             = str_replace('-', '', $id);
        $nama_file      = trim($this->input->post('nama_file','true'));

        //check data
        $checkData      = $this->db->where('nama_file',$nama_file)
                                   ->get('file')
                                   ->num_rows();

        $this->db->trans_begin();
        $this->db->insert('file',[
                      'id'          => $id,
                      'nama_file'   => $nama_file,
					  'file'        => $file,
                      'created_at'  => $created_at,
                      'updated_at'  => $updated_at,
                  ]);
                  
        $this->db->insert('riwayat',[
                      'id_file'     => $id,
                      'id_user'     => $user->id,
                      'type'        => 'upload',
                      'created_at'  => $created_at,
                      'updated_at'  => $updated_at,
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
            $msg = ['status'=>TRUE];
			      $this->db->trans_commit();
        }
        return $msg;
    }

    public function updateFile(){
        $created_at     = date('Y-m-d H:i:s');
        $updated_at     = date('Y-m-d H:i:s');
        $user           = getInfo();
        
        //from input
        $nama_file      = trim($this->input->post('nama_file','true'));
        $id             = trim($this->input->post('id'));

        if(file_exists($_FILES['file']['tmp_name'])) {
            $checkData = $this->db->get_where('file',['id'=>$id]);
            $data = $checkData->row();
            unlink('assets/filenya/'. $data->file);
			$file          = $this->m_file->storeImage();
		}else{
            $getFile       = $this->getFile($id);
            $file          = $getFile['file'];
        }

        $this->db->trans_begin();
        $this->db->where(['id'=>$id])
                ->update('file',[
                        'nama_file'   => $nama_file,
                        'file'        => $file,
                        'updated_at'  => $updated_at,
                      ]);

        if($this->db->trans_status() === FALSE){
          $this->db->trans_rollback();
          $txt    = 'Terjadi kesalahan saat menyimpan data';
          $icon   = 'error';
          $msg    = ['msg' => $txt,'status'=>FALSE,'icon'=>$icon];
        }else{
          $this->db->trans_commit();
          $msg = ['status'=>TRUE];
        }
        return $msg;
    }

    public function deleteFile($id){
        $checkData = $this->db->get_where('file',['id'=>$id]);
        $this->db->trans_begin();
        $this->db->delete('file',['id'=>$id]);
        if($this->db->trans_status() === FALSE || $checkData->num_rows() <= 0){
          $this->db->trans_rollback();
          return FALSE;
        }else{
          $data = $checkData->row();
          unlink('assets/filenya/'. $data->file);	
          $this->db->trans_commit();
          return TRUE;
        }
    }

    public function getFile($id){
        $cekData = $this->db->get_where('file',['id'=>$id]);
        if($cekData->num_rows() > 0 ){
            return $cekData->row_array();
        }else{
            return FALSE;
        }   
    }

    public function downloadFile(){
        $created_at     = date('Y-m-d H:i:s');
        $updated_at     = date('Y-m-d H:i:s');
        $user           = getInfo();
        
        //from input
        $id             = trim($this->input->post('id','true'));

        $this->db->trans_begin();
                  
        $this->db->insert('riwayat',[
                      'id_file'     => $id,
                      'id_user'     => $user->id,
                      'type'        => 'download',
                      'created_at'  => $created_at,
                      'updated_at'  => $updated_at,
                  ]);
        $checkData = $this->db->get_where('file',['id'=>$id])->row();
        
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $txt    = 'Terjadi kesalahan saat menyimpan data';
            $icon   = 'error';
            $msg    = ['msg' => $txt,'status'=>FALSE,'icon'=>$icon];
		}else{
            $msg    = ['status'=>TRUE,'link' => 'assets/filenya/'.$checkData->file,];
			$this->db->trans_commit();
        }
        return $msg;
    }
}