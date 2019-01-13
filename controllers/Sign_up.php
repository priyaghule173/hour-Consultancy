<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_up extends CI_Controller {

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
	public function index()
	{
		$this->load->view('register_employer');		
	}
/* Employer  registeration into database*/
	public function register_employer()
	{
		if(isset($_POST['register_emp']))
		{	
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['middle_name'] = $this->input->post('middle_name');
			$data['email_id'] = $this->input->post('email_id');
			$data['phone'] = $this->input->post('phone');
			$data['address'] = $this->input->post('address');
			$data['password'] = sha1($this->input->post('password'));//password encryption
			$data['company_name'] = $this->input->post('company_name');
			$data['company_address'] = $this->input->post('company_address');
			$data['company_email_id'] = $this->input->post('company_email_id');
			$data['company_website'] = $this->input->post('company_website');
			$data['current_salary'] = $this->input->post('current_salary');
			$data['experience'] = $this->input->post('experience_year');
			$data['experi_month'] = $this->input->post('experience_month');
			$data['designation'] = $this->input->post('designation');
			$data['date_created'] = date('Y-m-d h:m:s');//creation of account date
			$data['max_free_job_posts'] = 10;//for free 10 job posts allowed
			$this->db->insert('employer',$data);
			
	$message = '<div class="alert alert-success">Registeration done.Your Account Approval Is Pending Please Wait for Verification of your account . You will receive a mail.</div>';
				$this->session->set_flashdata('message',$message);
			redirect(base_url('sign_up/register_employer'));
		}
		else
		{
			$this->load->view('register_employer');			
		}
	}
}
