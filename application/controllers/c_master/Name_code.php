<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Name_code extends CI_Controller {

	public function index()
	{
        $data['tittle'] = "Name Code TL";
        $data['isi'] = "v_master/name_code";
		$this->load->view('layouts/wrapper',$data);
	}
}
