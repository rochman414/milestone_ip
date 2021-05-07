<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operational extends CI_Controller {

	public function index()
	{
        $data['tittle'] = "Milestone Operational";
        $data['isi'] = "v_milestone/operational";
		$this->load->view('layouts/wrapper',$data);
	}
}
