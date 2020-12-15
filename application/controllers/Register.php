<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
	public function register_user()
	{
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required|matches[password]');


		if ($this->form_validation->run() == FALSE)
		{
			// echo "false";
				$this->load->view('register');
		}
		else
		{
			$this->load->model('model_user');
			$response =  $this->model_user->insert_user_data();
			if($response){
				$this->session->set_flashdata('msg','Registed Sucessfully');
				redirect('home/login');
			}else{
				$this->session->set_flashdata('msg','Registed Fail');
				redirect('home/register');
			}
		}



	}
}
