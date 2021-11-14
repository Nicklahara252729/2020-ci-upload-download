<?php
if(!defined('BASEPATH')) exit('no file allowed');
function isAuth(){
    $Ci =& get_instance();
    $status_login = $Ci->session->userdata('status_login');
    if ($status_login == false) {
        redirect('/');
    }
}

function isLogged(){
    $Ci =& get_instance();
    $status_login = $Ci->session->userdata('status_login');
    if ($status_login == true) {
        redirect('file');
    }
}

function getInfo(){
    $Ci =& get_instance();
    $id = $Ci->session->userdata('id_user');

    $getData    = $Ci->db->get_where('user',['id'=>$id])->row();
    return $getData;
}



