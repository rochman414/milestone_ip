<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function index()
	{
        $data['tittle'] = "Milestone Status";
        $data['isi'] = "status_milestone/index";
		$this->load->view('layouts/wrapper',$data);
	}
}
