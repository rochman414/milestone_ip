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
		$data['save'] = base_url('c_master/name_code/save');
		$data['edit'] = base_url('c_master/name_code/edit');
		$data['select'] = base_url('c_master/name_code/select_division');
		$data['delete'] = base_url('c_master/name_code/delete');
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
				$row['departemen'] = $ls['departemen'];
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

		public function save()
	{
		$id = $this->input->post('id',true);
		$savedata['code_tl'] = $this->input->post('code',true);
		$savedata['name'] = ucfirst($this->input->post('name',true));
		$savedata['division_id'] = $this->input->post('division_id',true);
		$savedata['status'] = $this->input->post('status',true);
		$savedata['departemen'] =ucfirst($this->input->post('departemen',true));

		$where['code_tl'] = $savedata['code_tl'];
		$checkTL = $this->Code_tl_model->get($where);

		$this->db->trans_begin();
		if($id) { 
			// edit
			if($checkTL->id == $id){
				$this->Code_tl_model->update($savedata, array('id' => $id));
				$message = array(
					'type' => 'success',
					'msg' => "Tim Leader ". $savedata['name'] ." Berhasil di ubah!",
				);
			} else if (isset($checkTL)){
				$message =  array(
					'type' => 'error',
					'msg' => 'Code Tim Leader '. $savedata['code_tl'] .' sudah ada!',
				);
			}
		} else { 
			//create
			if(isset($checkTL)){
				$message =  array(
					'type' => 'error',
					'msg' => 'Code Tim Leader '. $savedata['code_tl'] .' sudah ada!',
				);
			} else {
				$this->Code_tl_model->insert($savedata);
				$message = array(
					'type' => 'success',
					'msg' => "Tim Leader ". $savedata['name'] ." Berhasil di simpan!",
				);
			}
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			$msg = array(
				'type' => 'error',
				'msg' => 'Tim Leader gagal di simpan!',
			);
		}else {
			$this->db->trans_commit();
			$msg = $message;
		}
		echo json_encode($msg);
	}

	public function edit()
	{
		$where['name_code_tl.id'] = $this->input->post('id',true);
		$select = 	"name_code_tl.*,
					division_milestone.id as division_id,
					division_milestone.name as division_name";
		$join	= 	[
						[
							"table"	=>	"division_milestone",
							"on"	=>	"division_milestone.id = name_code_tl.division_id"
						],
					];
		$data['data'] = $this->Code_tl_model->get($where,$select,$join);
		
		echo json_encode($data);
	}

	public function select_division()
	{
		$q = $this->input->get('q');
        $where = [];
        $this->Code_tl_model->order_by = "id";
        $this->Code_tl_model->search_field = "name";
        $this->Code_tl_model->column_search = "name";
        $this->Code_tl_model->table = "division_milestone";
        $data = $this->Code_tl_model->list_select($q, $where);
        echo json_encode($data);
	}
	
	public function delete()
	{
		$where['id'] = $this->input->get('id', true);
		$Tl = $this->Code_tl_model->get($where);
		switch($Tl->division_id){
			case 1:
				$cek = $this->db->get_where('milestone_sales_marketing',['code_tl_id' => $where['id']])->row_array();
				break;
			case 2:
				$cek = $this->db->get_where('milestone_development',['code_tl_id' => $where['id']])->row_array();
				break;
			case 3:
				$cek = $this->db->get_where('milestone_oprational',['code_tl_id' => $where['id']])->row_array();
				break;
		}
		if($cek){
			$msg = array(
				'type' 	=> 'error',
				'msg' 	=> 'Team Leader masih memiliki data tidak bisa di hapus!.',
			);
		} else {
			$this->db->trans_begin();
			$this->Code_tl_model->delete($where);
	
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				$msg = array(
					'type' => 'error',
					'msg' => 'Team Leader '.$Tl->name.' Gagal di hapus!.',
				);
			}else{
				$this->db->trans_commit();
				$msg = array(
					'type' => 'success',
					'msg' => 'Team Leader '.$Tl->name.' Berhasil di hapus!.',
				);
			}
		}
        echo json_encode($msg);
	}

}
