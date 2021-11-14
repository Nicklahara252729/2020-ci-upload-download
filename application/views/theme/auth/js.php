<?php
$uri = $this->uri->segment(1);
if($uri == ''){
    $uri = 'login';
}
$this->load->view('auth/js/js-'.$uri);
?>