<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');	
	}

	public function index()
	{
        $data['tittle'] = "Users";
        $data['isi'] = "users/index";
		$data['data'] = base_url('users/data');
		$data['save'] = base_url('users/save');
		$data['edit'] = base_url('users/edit');
		$data['delete'] = base_url('users/delete');
		$data['select'] = base_url('users/select');
		$this->load->view('layouts/wrapper',$data);
	}

	public function data()
	{
		$temp_data = [];
		$where = [];
        $no = $this->input->post('start');
        $list = $this->Users_model->lists(
            '   
                users.*, 
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
				$row['name'] = $ls['name'];
				$row['username'] = $ls['username'];
				$row['role_id'] = $ls['role_id'];
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Users_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Users_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
	}

	public function save()
	{
		$savedata['name'] = $this->input->post('name',true);
		$savedata['username'] = $this->input->post('username',true);
		$savedata['password'] = password_hash($this->input->post('password',true),PASSWORD_DEFAULT);
		$savedata['role_id'] = $this->input->post('role_id',true);
		$id = $this->input->post('id',true);
		$where['username'] = $savedata['username'];
		$check_username = $this->Users_model->get($where);

		$this->db->trans_begin();
		if($id) { 
			// edit
			if($check_username->id == $id){
				$this->Users_model->update($savedata, array('id' => $id));
				$message = array(
					'type' => 'success',
					'msg' => "Username ".$savedata['username']." Berhasil di ubah!",
				);
			} else if (isset($check_username)){
				$message =  array(
					'type' => 'error',
					'msg' => 'Username '.$savedata['username'].' sudah ada!',
				);
			}
		} else { 
			//create
			if(isset($check_username)){
				$message =  array(
					'type' => 'error',
					'msg' => 'Username '.$savedata['username'].' sudah ada!',
				);
			} else {
				$this->Users_model->insert($savedata);
				$message = array(
					'type' => 'success',
					'msg' => "Username ".$savedata['username']." Berhasil di simpan!",
				);
			}
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			$msg = array(
				'type' => 'error',
				'msg' => 'Username '.$savedata['username'].' gagal di simpan!',
			);
		}else {
			$this->db->trans_commit();
			$msg = $message;
		}
		echo json_encode($msg);
	}

	public function edit()
	{
		$id = $this->input->post('id',true);
		$user['edit'] = $this->db->get_where('users',['id'=> $id])->row_array();
		
		echo json_encode($user);
	}

	public function delete()
	{
		$where['id'] = $this->input->get('id');
		$name = $this->Users_model->get($where);
		$this->db->trans_begin();
		$this->Users_model->delete($where);

		if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $msg = array(
                'type' => 'error',
                'msg' => 'Username '.$name->username.' Gagal di hapus!.',
            );
        }else{
            $this->db->trans_commit();
            $msg = array(
                'type' => 'success',
                'msg' => 'Username '.$name->username.' Berhasil di hapus!.',
            );
        }
        echo json_encode($msg);
	}

}
