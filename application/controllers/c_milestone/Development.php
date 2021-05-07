<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Development extends CI_Controller {

	public function index()
	{
        $data['tittle'] = "Milestone Development";
        $data['isi'] = "v_milestone/development";
		$this->load->view('layouts/wrapper',$data);
	}
}
