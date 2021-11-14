<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_dashboard extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

    public function petani_baru(){
        return $this->db->order_by('id','desc')
                        ->limit(10)
                        ->get('tbl_petani');
    }
}