<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_marketing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Code_tl_model');
		$this->load->model('Milestone_sales_model');
		$this->load->model('Detail_sales_marketing_model');
	}

	public function index()
	{
        $data['tittle'] = "Milestone Sales & Marketing";
        $data['isi'] 	= "v_milestone/sales/sales_marketing";
		$data['data']	= base_url('c_milestone/sales_marketing/data');
		$data['detail']	= base_url('c_milestone/sales_marketing/detail');
		$data['show']	= base_url('c_milestone/sales_marketing/show_detail');
		$this->load->view('layouts/wrapper',$data);
	}

	public function data()
	{
		$temp_data = [];
		$where['division_id'] = 1;
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

	public function detail()
	{	
		$tahun = $this->db->get_where('tahun_milestone',['tahun' => date('Y')])->row_array();

		if(!isset($tahun)){
			$data = [ 'tahun' => date('Y')];
			$this->db->insert('tahun_milestone',$data);
		};

		$id = $this->input->get('sales',true);
		$where['id'] = $id;
		$tl = $this->Code_tl_model->get($where);
		if($tl){
			$data['tittle']	= 'Milestone Team '.$tl->code_tl.' '.$tl->name;
			$data['isi']	= "v_milestone/sales/add_sales";
			$data['team']	= $tl;
			$data['table']	= base_url('c_milestone/sales_marketing/table/');
			$data['tahun']	= base_url('c_milestone/sales_marketing/tahun');
			$data['save']	= base_url('c_milestone/sales_marketing/save');
			$data['edit']	= base_url('c_milestone/sales_marketing/edit');
			$data['delete']	= base_url('c_milestone/sales_marketing/delete');
			$this->load->view('layouts/wrapper',$data);
		} else {
			redirect(base_url('c_milestone/sales_marketing'));
		}
	}

	public function table($id,$tahun)
	{
		$data['data'] = base_url('c_milestone/sales_marketing/table_add/'.$id.'/'.$tahun);
		$this->load->view('v_milestone/sales/table_sales',$data);
	}

	public function table_add($id,$tahun)
	{
		$temp_data = [];
		$where['code_tl_id'] = $id;
		$where['tahun_milestone'] = $tahun;
        $no = $this->input->post('start');
        $list = $this->Milestone_sales_model->lists(
            '   
                milestone_sales_marketing.*,
				name_code_tl.id as tl_id,
				name_code_tl.name as tl_name,
				name_code_tl.code_tl as code_tl,
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
				$row['tl_name'] = $ls['tl_name'];
				$row['project'] = $ls['project'];
				$row['milestone'] = $ls['milestone'];
				$row['tahun_milestone'] = $ls['tahun_milestone'];
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Milestone_sales_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Milestone_sales_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);

	}
	
	public function save()
	{
		$id = $this->input->post('id',true);
		if($id){
			$savedata['tahun_milestone'] = $this->input->post('tahun_edit',true);
		} else {
			$savedata['tahun_milestone'] = $this->input->post('tahun_milestone',true);
		}
		$savedata['code_tl_id'] = $this->input->post('code_tl_id',true);
		$savedata['project'] = $this->input->post('project',true);
		$savedata['milestone'] = $this->input->post('milestone',true);

		$this->db->trans_begin();
		if($id) { 
			// edit
			$this->Milestone_sales_model->update($savedata, array('id' => $id));
			$message = array(
				'type' => 'success',
				'msg' => "Milestone Berhasil di ubah!",
			);

		} else { 
			//create
			$this->Milestone_sales_model->insert($savedata);
			$message = array(
				'type' => 'success',
				'msg' => "Milestone Berhasil di tambah!",
			);
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			$msg = array(
				'type' => 'error',
				'msg' => 'Milestone Gagal di tambah!',
			);
		}else {
			$this->db->trans_commit();
			$msg = $message;
		}
		echo json_encode($msg);
	}

	public function tahun()
	{
		$data['tahun'] = $this->db->select('*')->order_by('id',"DESC")->get('tahun_milestone')->result_array();
		echo json_encode($data);	
	}

	public function edit()
	{
		$where['id'] = $this->input->post('id',true);
		$data['data'] = $this->Milestone_sales_model->get($where);
		echo json_encode($data);
	}

	public function delete()
	{
		$where['id'] = $this->input->get('id');
		$cek = $this->db->get_where('detail_sales_marketing',['milestone_id' => $where['id']])->row_array();
		if($cek){
			$msg = array(
				'type' 	=> 'error',
				'msg' 	=> 'Milestone masih memiliki data tidak bisa di hapus!.',
			);
		} else {
			$this->db->trans_begin();
			$this->Milestone_sales_model->delete($where);
	
			if ($this->db->trans_status() === FALSE){
			    $this->db->trans_rollback();
			    $msg = array(
			        'type' 	=> 'error',
			        'msg' 	=> 'Milestone Gagal di hapus!.',
			    );
			}else{
			    $this->db->trans_commit();
			    $msg = array(
			        'type' 	=> 'success',
			        'msg' 	=> 'Milestone Berhasil di hapus!.',
			    );
			}
		}
        echo json_encode($msg);
	}

	public function show_detail()
	{
		$tahun = $this->db->get_where('tahun_milestone',['tahun' => date('Y')])->row_array();

		if(!isset($tahun)){
			$data = [ 'tahun' => date('Y')];
			$this->db->insert('tahun_milestone',$data);
		};

		$id = $this->input->get('sales',true);
		$where['id'] = $id;
		$tl = $this->Code_tl_model->get($where);
		$data['team']	= $tl;
		$data['tittle']	= "Detail Milestone Sales & Marketing team ".$tl->code_tl." ".$tl->name;
		$data['isi']	= "v_milestone/sales/sales_show";
		$data['tahun']	= base_url('c_milestone/sales_marketing/tahun');
		$data['table']	= base_url('c_milestone/sales_marketing/table_show/');
		$this->load->view('layouts/wrapper',$data);
	}

	public function table_show($id,$tahun)
	{
		$data['data'] = base_url('c_milestone/sales_marketing/data_show/'.$id.'/'.$tahun);
		$this->load->view('v_milestone/sales/table_sales_show',$data);
	}

	public function data_show($id,$tahun)
	{
		$temp_data = [];
		$where['milestone_sales_marketing.code_tl_id'] = $id;
		$where['milestone_sales_marketing.tahun_milestone'] = $tahun;
        $no = $this->input->post('start');
        $list = $this->Milestone_sales_model->lists(
            '   
				milestone_sales_marketing.*,

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
				$row['project'] = $ls['project'];
				$row['milestone'] = $ls['milestone'];
				$row['tahun_milestone'] = $ls['tahun_milestone'];
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Milestone_sales_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Milestone_sales_model->list_count($where, true);
        $data['data'] = $temp_data;

        echo json_encode($data);
	}

	public function check_detail()
	{
		$id = $this->input->post('id',true);
		$this->db->select_max('week');
		$cek = $this->db->get_where('detail_sales_marketing',['milestone_id' => $id])->row_object();
		if($cek){
			$this->db->select('
							ds.id as id,
							ds.week as week,
							ds.keterangan_update as ket_update,
							ds.kendala_pencapaian_milestone as kendala,
							ds.status_id as status_id,
							sc.code as status_code,
							sc.name as status_name,
							us.name as name_user,
						');
			$this->db->from('detail_sales_marketing ds');
			$this->db->join('users us',' ds.users_id = us.id');
			$this->db->join('status_code sc','ds.status_id = sc.id');
			$this->db->where('milestone_id',$id)->where('week',$cek->week);
			$this->db->group_by('ds.id , ds.week, ds.keterangan_update, ds.kendala_pencapaian_milestone, ds.status_id, sc.code, sc.name, us.name');
			$data['data'] = $this->db->get()->row_array();
		}
		echo json_encode($data);		
	}

	public function all_detail_sales()
	{
		$where['milestone_id'] = $this->input->post('id',true);
		$data['data'] = $this->Detail_sales_marketing_model->get_all($where);
		
		echo json_encode($data);
	}

	public function check_detail_week()
	{
		$id_milestone 	= $this->input->post('id',true);
		$week 			= $this->input->post('week',true);
		
		$this->db->select('
				ds.id as id,
				ds.week as week,
				ds.keterangan_update as ket_update,
				ds.kendala_pencapaian_milestone as kendala,
				ds.status_id as status_id,
				sc.code as status_code,
				sc.name as status_name,
				us.id as user_id,
				us.name as name_user,
			');
		$this->db->from('detail_sales_marketing ds');
		$this->db->join('users us',' ds.users_id = us.id');
		$this->db->join('status_code sc','ds.status_id = sc.id');
		$this->db->where('milestone_id',$id_milestone)->where('week',$week);
		$this->db->group_by('ds.id , ds.week, ds.keterangan_update, ds.kendala_pencapaian_milestone, ds.status_id, sc.code, sc.name,us.id, us.name');
		$data['data'] = $this->db->get()->row_array();

		echo json_encode($data);
	}

	public function cek_milestone_id()
	{
		$id = $this->input->post('id',true);
		$id_detail = $this->input->post('id_detail',true);
		if($id_detail){
			$milestone['data_detail'] = $this->db->get_where('detail_sales_marketing',['id' => $id_detail])->row_array();
		}
		$milestone['data'] = $this->db->get_where('milestone_sales_marketing',['id' => $id])->row_array();
		
		echo json_encode($milestone);
	}

	public function save_detail()
	{
		$id	= $this->input->post('detail',true);
		$savedata['milestone_id'] = $this->input->post('milestone',true);
		$savedata['users_id'] = $this->input->post('user',true);
		$savedata['week'] = $this->input->post('week',true);
		$savedata['status_id'] = $this->input->post('status',true);
		$savedata['keterangan_update'] = $this->input->post('update',true);
		$savedata['kendala_pencapaian_milestone'] = $this->input->post('kendala',true);

		$this->db->trans_begin();
		if($id) { 
			// edit
			$this->Detail_sales_marketing_model->update($savedata, array('id' => $id));
			$message = array(
				'type' => 'success',
				'msg' => "Detail Milestone Sales & Marketing Berhasil di ubah!",
			);

		} else { 
			//create
			$this->Detail_sales_marketing_model->insert($savedata);
			$message = array(
				'type' => 'success',
				'msg' => "Detail Milestone Sales & Marketing Berhasil di tambah!",
			);
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			$msg = array(
				'type' => 'error',
				'msg' => 'Detail Milestone Gagal di tambah!',
			);
		}else {
			$this->db->trans_commit();
			$msg = $message;
		}

		echo json_encode($msg);
	}
}
