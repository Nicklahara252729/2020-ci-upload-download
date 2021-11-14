<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_download extends CI_Model {
    public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	public function viewRiwayatDownload(){
		return $this->db->select('*,riwayat.created_at as time')
						->join('user','user.id = riwayat.id_user')
                        ->join('file','file.id = riwayat.id_file')
						->get_where('riwayat',['type'=>'download']);
	}
}