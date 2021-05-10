<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['login'] = base_url('login/do_login');
		$this->load->view('login/index',$data);
	}
	
	public function do_login()
	{
		$username = $this->input->post('user',true);
		$password = $this->input->post('password',true);

		$user = $this->db->get_where('users',['username'=>$username])->row_array();
		if($user){
			if(password_verify($password, $user['password'])){
				$this->session->set_userdata('userdata',$user);
				$msg = [
					'type' 	=> 'link',
					'msg'  	=> base_url('/dashboard')
				];
			} else {
				$msg = [
					'type' 	=> 'msg',
					'msg' 	=> 'Password salah!'
				];
			}
		} else {
			$msg = [
				'type'	=> 'msg',
				'msg' 	=> 'Username belum terdaftar!'
			];
		}
		echo json_encode($msg);
	}

	public function logout()
	{
		$this->session->unset_userdata('userdata');
		header('location:'.base_url('login'));
	}
}
