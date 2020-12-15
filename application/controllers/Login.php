<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function login_user()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', 'Login Fail');
			$this->load->view('login');
		} else {
			$this->load->model('model_user');
			$result = $this->model_user->login_user();
			if ($result != false) {
				$user_data = array(
					'id'=>$result->id,
					'fname'=>$result->fname,
					'lname'=>$result->lname,
					'email'=>$result->email,
					'logedin'=>TRUE
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('msg', 'Welcome');
				redirect('admin/index');

				
			} else {
				$this->session->set_flashdata('msg', 'Login Fail');
				$this->load->view('login');
			}
		}
	}


	public function logout_user()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('logedin');
		redirect('home/login');
		
	}
}
