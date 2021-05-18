<?php 
    if($this->session->userdata['userdata']['role_id'] == 2 ){
        header('location:'.base_url('dashboard'));
    }
?>