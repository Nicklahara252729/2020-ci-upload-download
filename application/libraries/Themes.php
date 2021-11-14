<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Themes{
    protected $_ci;
     function __construct(){
        $this->_ci =&get_instance();
    }

    function Display($theme, $data=null){
        $data['_config_content']=$this->_ci->load->view($theme,$data,true);
        $data['header']=$this->_ci->load->view('theme/admin/header.php',$data,true);
        $data['footer']=$this->_ci->load->view('theme/admin/footer.php',$data,true);
        $data['js']=$this->_ci->load->view('theme/admin/js.php',$data,true);
        $data['sidebar']=$this->_ci->load->view('theme/admin/sidebar.php',$data,true);
        $data['breadcum']=$this->_ci->load->view('theme/admin/breadcum.php',$data,true);
        $data['modal']=$this->_ci->load->view('theme/admin/modal.php',$data,true);
        $this->_ci->load->view('/DefaultTemplate.php', $data);
    }

    function Auth($theme, $data=null){
        $data['_config_content']=$this->_ci->load->view($theme,$data,true);
        $data['js']=$this->_ci->load->view('theme/auth/js.php',$data,true);
        $this->_ci->load->view('/AuthTemplate.php', $data);
    }

    function Cetak($theme, $data=null){
        $data['_config_content']=$this->_ci->load->view($theme,$data,true);
        $this->_ci->load->view('/CetakTemplate.php', $data);
    }
}