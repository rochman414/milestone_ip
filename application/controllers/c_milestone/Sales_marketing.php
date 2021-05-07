<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_marketing extends CI_Controller {

	public function index()
	{
        $data['tittle'] = "Milestone Sales Marketing";
        $data['isi'] = "v_milestone/sales_marketing";
		$this->load->view('layouts/wrapper',$data);
	}
}
