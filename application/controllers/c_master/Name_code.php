<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Name_code extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Code_tl_model');
	}

	public function index()
	{
        $data['tittle'] = "Name Code TL";
        $data['isi'] = "v_master/name_code";
		$data['data'] = base_url('c_master/name_code/data');
		$this->load->view('layouts/wrapper',$data);
	}

	public function data()
	{
		$temp_data = [];
		$where = [];
        $no = $this->input->post('start');
        $list = $this->Code_tl_model->lists(
            '   
                name_code_tl.*,
				division_milestone.id as division_id,
				division_milestone.name as division_name, 
            ',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start')
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['code_tl'] = $ls['code_tl'];
				$row['name'] = $ls['name'];
				$row['division_name'] = $ls['division_name'];
				$row['division_id'] = $ls['division_id'];
				$row['status'] = $ls['status'];
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Code_tl_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Code_tl_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
	}

}
