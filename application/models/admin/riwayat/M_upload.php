<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_upload extends CI_Model {
    public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	public function viewRiwayatUpload(){
		return $this->db->select('*,riwayat.created_at as time')
						->join('user','user.id = riwayat.id_user')
                        ->join('file','file.id = riwayat.id_file')
						->get_where('riwayat',['type'=>'upload']);
	}

}