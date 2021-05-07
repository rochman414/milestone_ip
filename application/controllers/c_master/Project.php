<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function index()
	{
        $data['tittle'] = "Project / Klien / Initiative / Program / Aktivitas";
        $data['isi'] = "v_master/project";
		$this->load->view('layouts/wrapper',$data);
	}
}
