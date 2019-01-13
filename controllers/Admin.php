<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
		$cur_date = date('Y-m-d');
			$data['action'] = "3";


			$data['total_candidate'] = $this->db->select('count(c_id) as total_candidate')->from('candidates')->get()->result_array();

			$data['total_applications'] = $this->db->select('count(a_id) as total_applications')->from('applied_jobs')->get()->result_array();

			$this->load->view('admin/header1');
			$this->load->view('admin/admin_dashboard',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
/*
* These function is called when admin open dashboard.
* These function shows notification of all jobs , platinum , gold and feature jobs.
* In next section it shows active ,pending ,rejected , expire job counting.
* It also shows count of total register candidate and overall job apllication
*/
	public function adminDashboard(){
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
		$cur_date = date('Y-m-d');
			$data['action'] = "3";


			$data['total_candidate'] = $this->db->select('count(c_id) as total_candidate')->from('candidates')->get()->result_array();

			$data['total_applications'] = $this->db->select('count(a_id) as total_applications')->from('applied_jobs')->get()->result_array();

			$this->load->view('admin/header1');
			$this->load->view('admin/dashboard',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}
		
	}
	
/*
* These function is called when admin changed candidate flag for identifying candidate.
*/	
public function cand_flag_change(){
$c_id = $this->input->get('c_id');
$update['flag'] = $this->input->get('flag');
$this->db->where('c_id',$c_id);
$this->db->update('candidates',$update);

$message = '<div class="alert alert-success">Flag Has Been Changed</div>';
						$this->session->set_flashdata('message',$message);

redirect(base_url('admin/candidate_section'));
}

/*
* These function is use for employer profile aprroval.
* To shows active total employers.
* To shows rejected  total employers.
*/
	public function manageEmp(){
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
		
			$data['result'] = $this->db->select('*')->from('employer')->where('active','0')->order_by('e_id','DESC')->get()->result_array();
			$data['result1'] = $this->db->select('*')->from('employer')->where('active','1')->order_by('e_id','DESC')->get()->result_array();
			$data['result2'] = $this->db->select('*')->from('employer')->where('active','2')->order_by('e_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/manage_employer',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}

		
	}
/*
* These function is use for change password of admin
*/
	public function changePassword(){

	    $ADMIN_ID = $this->session->userdata('ADMIN_ID');
			if($ADMIN_ID !=0){
				if(isset($_POST['update_pass'])){

					$data['password'] = $this->input->post('confirm_password');

					$this->db->where('id', $ADMIN_ID);
					$this->db->update('admin', $data);

					$message = '<div class="alert alert-success">Password Change Successfully.... </div>';
                	$this->session->set_flashdata('message',$message);

					redirect(base_url('admin/changePassword'));

				}
				else{
						$this->load->view('admin/header1');
						$this->load->view('admin/change_password');
						$this->load->view('admin/footer1');
				}
			}else{
				redirect(base_url('welcome'));
			}	
	}
	
/*
* These function is use for showing all pending job posts request of employers(all job packages requests).
*/
	public function all_pending_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['Job_Approved']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "1";

				foreach ($selected as $value) {
					$pack_type = $this->db->select('*')->from('job_posts')->where('j_id',$value)->get()->result_array();

					if($pack_type[0]['Package_type'] =="Platinum")
					{
						$package_details = $this->db->select('*')->from('packages')->where('p_id','1')->get()->result_array();
						$package_validities = $package_details[0]['package_validities'];
			
						$data['approved_job_post_date'] = date('Y-m-d h:m:s');

						$date = new DateTime(); // Y-m-d
						$date->add(new DateInterval('P'.$package_validities.'D'));
						$expire_date = $date->format('Y-m-d h:m:s') . "\n";
						$data['job_post_expire_date'] = $expire_date;

					}elseif ($pack_type[0]['Package_type'] =="Gold") {
						$package_details = $this->db->select('*')->from('packages')->where('p_id','2')->get()->result_array();
						$package_validities = $package_details[0]['package_validities'];
			
						$data['approved_job_post_date'] = date('Y-m-d h:m:s');

						$date = new DateTime(); // Y-m-d
						$date->add(new DateInterval('P'.$package_validities.'D'));
						$expire_date = $date->format('Y-m-d h:m:s') . "\n";
						$data['job_post_expire_date'] = $expire_date;

					}else
					{
						$data['approved_job_post_date'] = date('Y-m-d h:m:s');

						$date = new DateTime(); // Y-m-d
						$date->add(new DateInterval('P30D'));
						$expire_date = $date->format('Y-m-d h:m:s') . "\n";
						$data['job_post_expire_date'] = $expire_date;

					}

					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}
		$message = '<div class="alert alert-success">Status Updated</div>';
					$this->session->set_flashdata('message',$message);
				redirect(base_url('admin/all_pending_job_posts'));		
			}
			if(isset($_POST['Job_Rejected']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "2";
				foreach ($selected as $value) {
					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}
		$message = '<div class="alert alert-success">Status Updated</div>';
					$this->session->set_flashdata('message',$message);
				redirect(base_url('admin/all_pending_job_posts'));		

//				redirect(base_url('admin/rejected_job_posts'));	
			}			

			$free_pending = $this->db->select('*')->from('job_posts')->where('Package_type','Free')->where('action','0')->get()->result_array();
			$platinum_pending = $this->db->select('*')->from('job_posts')->where('action','0')->where('Package_type','Platinum')->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Platinum")')->order_by('j_id','DESC')->get()->result_array();
			$gold_pending = $this->db->select('*')->from('job_posts')->where('action','0')->where('Package_type','Gold')->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Gold")')->order_by('j_id','DESC')->get()->result_array();
	      $data['result'] = array_merge($gold_pending,$platinum_pending,$free_pending);

/*		$data['result'] = $this->db->select('*')->from('job_posts')->where('action','0')->where('job_post_by_emp_id IN (select e_id from employer_packages)')->order_by('j_id','DESC')->get()->result_array();
*/
			$this->load->view('admin/header1');
			$this->load->view('admin/all_pending_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
	
/*
* These function is use to show all platinum pending requests of employers.
* To show activated empoyers list with package name.
* To add custom gold package for employers which employers are not in pending list or which employers are new.
*/
	public function pending_platinum_pack_emp()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['paid_platinum']))
			{
				$data['amount_paid'] = $this->input->post('amount_paid');
				$selected = $this->input->post('select_emp');

				foreach ($selected as $value) {
					$data['e_id'] = $value;
					$sql = $this->db->select('*')->from('employer')->where('e_id',$value)->get()->result_array();
					$data['emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
					$data['package_id'] = '1';
					$data['package_name'] = 'Platinum';

					$package_details = $this->db->select('*')->from('packages')->where('p_id','1')->get()->result_array();
					$data['package_price'] = $package_details[0]['package_price'];
					$data['package_validities'] = $package_details[0]['package_validities'];
					$data['total_posts'] = $package_details[0]['total_posts'];
					$data['active_date'] = date('Y-m-d h:m:s');

					$date = new DateTime(); // Y-m-d
					$date->add(new DateInterval('P'.$data['package_validities'].'D'));
					$expire_date = $date->format('Y-m-d h:m:s') . "\n";
					$data['pack_expire_date'] = $expire_date;
					
					$sql_1 = $this->db->select('count(j_id) as used_posts')->from('job_posts')->where('job_post_by_emp_id',$value)->where('Package_type','Platinum')->get()->result_array();
					$data['used_job_posts'] = $sql_1[0]['used_posts'];

					$this->db->insert('employer_packages',$data);
					$message = '<div class="alert alert-success">Employer Data Pack Actived </div>';
						$this->session->set_flashdata('message',$message);
				}
				redirect(base_url('admin/pending_platinum_pack_emp'));
			}
			else
			{
			$data['result'] = $this->db->select('distinct(job_post_by_emp_id),job_post_by_emp_name,job_post_date,phone')->from('job_posts')->where('Package_type','Platinum')
			->join('employer','job_posts.job_post_by_emp_id = employer.e_id')
			->where('job_post_by_emp_id NOT IN (select e_id from employer_packages where package_name ="Platinum")')->get()->result_array();

			$data['active_packages_list'] = $this->db->select('*')->from('employer_packages')->where('package_name','Platinum')->order_by('ep_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_platinum_pack_emp',$data);
			$this->load->view('admin/footer1');
			}
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
/*
* These function is use to show all gold pending requests of employers.
* To show activated empoyers list with package name.
* To add custom gold package for employers which employers are not in pending list or which employers are new.
*/	
	public function pending_gold_pack_emp()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['paid_gold']))
			{
				$data['amount_paid'] = $this->input->post('amount_paid');
				$selected = $this->input->post('select_emp');

				foreach ($selected as $value) {
					$data['e_id'] = $value;
					$sql = $this->db->select('*')->from('employer')->where('e_id',$value)->get()->result_array();
					$data['emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
					$data['package_id'] = '2';
					$data['package_name'] = 'Gold';

					$package_details = $this->db->select('*')->from('packages')->where('p_id','2')->get()->result_array();
					$data['package_price'] = $package_details[0]['package_price'];
					$data['package_validities'] = $package_details[0]['package_validities'];
					$data['total_posts'] = $package_details[0]['total_posts'];
					$data['active_date'] = date('Y-m-d h:m:s');

					$date = new DateTime(); // Y-m-d
					$date->add(new DateInterval('P'.$data['package_validities'].'D'));
					$expire_date = $date->format('Y-m-d h:m:s') . "\n";
					$data['pack_expire_date'] = $expire_date;
					
					$sql_1 = $this->db->select('count(j_id) as used_posts')->from('job_posts')->where('job_post_by_emp_id',$value)->where('Package_type','Gold')->get()->result_array();
					$data['used_job_posts'] = $sql_1[0]['used_posts'];

					$this->db->insert('employer_packages',$data);
					$message = '<div class="alert alert-success">Employer Gold Data Pack Actived </div>';
						$this->session->set_flashdata('message',$message);
				}
				redirect(base_url('admin/pending_gold_pack_emp'));
			}
			else
			{
			$data['result'] = $this->db->select('distinct(job_post_by_emp_id),job_post_by_emp_name,job_post_date,phone')->from('job_posts')->where('Package_type','Gold')
			->join('employer','job_posts.job_post_by_emp_id = employer.e_id')
			->where('job_post_by_emp_id NOT IN (select e_id from employer_packages where package_name ="Gold")')->get()->result_array();

			$data['active_packages_list'] = $this->db->select('*')->from('employer_packages')->where('package_name','Gold')->order_by('ep_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_gold_pack_emp',$data);
			$this->load->view('admin/footer1');
			}
		}else
		{
			redirect(base_url('welcome'));
		}	
	}
/*
* This function is use for forgot password of admin.
*/	
public function forgot(){

if(isset($_POST['FP'])){

	$email = $this->input->post('email_id');
	$query = $this->db->select('*')->from('admin')->where('email_id',$email)->get()->result_array();
	if(!empty($query['email_id'] == $email)){

				$this->load->library('email');
			    $this->email->from($this->config->item('email_id'), $this->config->item('email_id'));
			    $this->email->to($email);
			    $this->email->subject('Account Recovery Details');
			    $message     =  "Hi ".$userDetails['firstname']." ".$userDetails['lastname'].",<br />";
			    $message    .=  "Click here ".base_url()." and login with the following credentials.<br/><br/>";
			    $message    .=  "Email - ".$email."<br/>";
			    $message    .=  "Password - ".$query['password']."<br/><br/>";
			    $message    .=  "In case any queries or problems with Logging-In, please contact your manager<br /><br />";
			    $message    .=  "Thank you,<br/>";
			    $message    .=  $this->config->item('company_name');
			    $this->email->message($message);

			    if($this->email->send()) {
			        $this->session->set_flashdata('status','Recovery password has been successfully sent to your Email');
			        redirect('auth/success');
			    }else {
			        $this->session->set_flashdata('error', 'Error in recovering your password. Please try again');
			        redirect('auth/forgotPassword');
			    }
			}else {
			    $this->session->set_flashdata('error', 'Error in recovering your password. Please try again');
			    redirect('auth/forgotPassword');
			}
				$message = '<div class="alert alert-danger">Please Use the Resume format (pdf,doc,docx) format </div>';
				$this->session->set_flashdata('message',$message);
	}
	else{
		$message = '<div class="alert alert-danger">Please enter Valid email id </div>';
				$this->session->set_flashdata('message',$message);
	}

}

/*
* This function is called when admin active custom platinum package for employers.
* which employers are not in pending list or which employers are new.
*/
	public function custom_platinum_emp_pack()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
				if(isset($_POST['Activate']))
				{
					$data['amount_paid'] = $this->input->post('amount');
					$selected = $this->input->post('emp_list');
					foreach ($selected as $value) {
					$data['e_id'] = $value;
					$sql = $this->db->select('*')->from('employer')->where('e_id',$value)->get()->result_array();
					$data['emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
					$data['package_id'] = '1';
					$data['package_name'] = 'Platinum';

					$package_details = $this->db->select('*')->from('packages')->where('p_id','1')->get()->result_array();
					$data['package_price'] = $package_details[0]['package_price'];
					$data['package_validities'] = $package_details[0]['package_validities'];
					$data['total_posts'] = $package_details[0]['total_posts'];
					$data['active_date'] = date('Y-m-d h:m:s');

					$date = new DateTime(); // Y-m-d
					$date->add(new DateInterval('P'.$data['package_validities'].'D'));
					$expire_date = $date->format('Y-m-d h:m:s') . "\n";
					$data['pack_expire_date'] = $expire_date;
					
					$sql_1 = $this->db->select('count(j_id) as used_posts')->from('job_posts')->where('job_post_by_emp_id',$value)->where('Package_type','Platinum')->get()->result_array();
					$data['used_job_posts'] = $sql_1[0]['used_posts'];

					$this->db->insert('employer_packages',$data);
					$message = '<div class="alert alert-success">Employer Platinum Data Pack Actived </div>';
						$this->session->set_flashdata('message',$message);
					}
				}
			redirect(base_url('admin/pending_platinum_pack_emp'));
		}else
		{
			redirect(base_url('welcome'));
		}	
	}
	
	/*
* This function is called when admin active custom glod package for employers.
* which employers are not in pending list or which employers are new.
*/
	public function custom_gold_emp_pack()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
				if(isset($_POST['Activate']))
				{
					$data['amount_paid'] = $this->input->post('amount');
					$selected = $this->input->post('emp_list');
					foreach ($selected as $value) {
					$data['e_id'] = $value;
					$sql = $this->db->select('*')->from('employer')->where('e_id',$value)->get()->result_array();
					$data['emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
					$data['package_id'] = '2';
					$data['package_name'] = 'Gold';

					$package_details = $this->db->select('*')->from('packages')->where('p_id','2')->get()->result_array();
					$data['package_price'] = $package_details[0]['package_price'];
					$data['package_validities'] = $package_details[0]['package_validities'];
					$data['total_posts'] = $package_details[0]['total_posts'];
					$data['active_date'] = date('Y-m-d h:m:s');

					$date = new DateTime(); // Y-m-d
					$date->add(new DateInterval('P'.$data['package_validities'].'D'));
					$expire_date = $date->format('Y-m-d h:m:s') . "\n";
					$data['pack_expire_date'] = $expire_date;
					
					$sql_1 = $this->db->select('count(j_id) as used_posts')->from('job_posts')->where('job_post_by_emp_id',$value)->where('Package_type','Gold')->get()->result_array();
					$data['used_job_posts'] = $sql_1[0]['used_posts'];

					$this->db->insert('employer_packages',$data);
					$message = '<div class="alert alert-success">Employer Gold Data Pack Actived </div>';
						$this->session->set_flashdata('message',$message);
					}
				}
			redirect(base_url('admin/pending_gold_pack_emp'));
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
	
/*
* This function is use for to shows all pending employer request for platinum job with employer name and package name.
*/
	public function pending_platinum_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['Job_Approved']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "1";
				$package_details = $this->db->select('*')->from('packages')->where('p_id','1')->get()->result_array();
				$package_validities = $package_details[0]['package_validities'];
	
				$data['approved_job_post_date'] = date('Y-m-d h:m:s');

				$date = new DateTime(); // Y-m-d
				$date->add(new DateInterval('P'.$package_validities.'D'));
				$expire_date = $date->format('Y-m-d h:m:s') . "\n";
				$data['job_post_expire_date'] = $expire_date;

				foreach ($selected as $value) {
					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}
		$message = '<div class="alert alert-success">Status Updated</div>';
					$this->session->set_flashdata('message',$message);
				redirect(base_url('admin/pending_platinum_job_posts'));		
			}
			if(isset($_POST['Job_Rejected']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "2";
				foreach ($selected as $value) {
					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}
		$message = '<div class="alert alert-success">Status Updated</div>';
					$this->session->set_flashdata('message',$message);
				redirect(base_url('admin/rejected_platinum_job_posts'));		

//				redirect(base_url('admin/rejected_job_posts'));	
			}
		$data['result'] = $this->db->select('*')->from('job_posts')->where('action','0')->where('Package_type','Platinum')->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Platinum")')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_platinum_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}

	}
/*
* This function is use for to shows all approved employer request for platinum job with employer name and package name ,date etc.
*/
	public function approved_platinum_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){

			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','1')->where('Package_type','Platinum')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/approved_platinum_job_posts',$data);
			$this->load->view('admin/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}
	}
	
/*
* This function is use for to shows all rejected employer request for platinum job with employer name and package name ,date etc.
*/
	public function rejected_platinum_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','2')->where('Package_type','Platinum')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/rejected_platinum_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
/*
* This function is use for to shows all expired  platinum job post with employer name and package name ,date etc.
*/
	public function expired_platinum_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','3')->where('Package_type','Platinum')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/expired_platinum_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
/*
* This function is use for to shows all pending employer request for gold job with employer name and package name.
*/
	public function pending_gold_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['Job_Approved']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "1";
				$package_details = $this->db->select('*')->from('packages')->where('p_id','2')->get()->result_array();
				$package_validities = $package_details[0]['package_validities'];
	
				$data['approved_job_post_date'] = date('Y-m-d h:m:s');

				$date = new DateTime(); // Y-m-d
				$date->add(new DateInterval('P'.$package_validities.'D'));
				$expire_date = $date->format('Y-m-d h:m:s') . "\n";
				$data['job_post_expire_date'] = $expire_date;
	
				foreach ($selected as $value) {
					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}
		$message = '<div class="alert alert-success">Status Updated</div>';
					$this->session->set_flashdata('message',$message);
				redirect(base_url('admin/pending_gold_job_posts'));		
			}
			if(isset($_POST['Job_Rejected']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "2";
				foreach ($selected as $value) {
					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}
		$message = '<div class="alert alert-success">Status Updated</div>';
					$this->session->set_flashdata('message',$message);
				redirect(base_url('admin/rejected_gold_job_posts'));		

//				redirect(base_url('admin/rejected_job_posts'));	
			}
		$data['result'] = $this->db->select('*')->from('job_posts')->where('action','0')->where('Package_type','Gold')->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Gold")')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_gold_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
	/*
* This function is use for to shows all approved employer request for gold job with employer name and package name.
*/
	public function approved_gold_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){

			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','1')->where('Package_type','Gold')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/approved_gold_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
	
/*
* This function is use for to shows all rejected employer request for gold job with employer name and package name.
*/
	public function rejected_gold_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','2')->where('Package_type','Gold')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/rejected_gold_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	/*
* This function is use for to shows all expired  gold job  posts with employer name and package name.
*/
	public function expired_gold_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','3')->where('Package_type','Gold')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/expired_gold_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
/*
* This function is use for to show all registerd candidate data with list.
* This function is called from admin dashboard.
*/
	public function candidate_section()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('candidates')->order_by('c_id','DESC')->get()->result_array();
			$data['candidate_applications'] = $this->db->select('count(c_id) as total,applied_jobs.j_id,first_name,last_name,job_posts.*')->from('applied_jobs')->join('employer','applied_jobs.e_id = employer.e_id')->
			join('job_posts','applied_jobs.j_id = job_posts.j_id','left')->group_by('applied_jobs.j_id')->order_by('applied_jobs.j_id','DESC')->get()->result_array();
	
			$this->load->view('admin/header1');
			$this->load->view('admin/candidate_section',$data);
			$this->load->view('admin/footer1');
		
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
	
/*
* This function is called from backup data.
* This function is  use for to show list of all candidate who is applied for applied for job.
* To show all job posted data.
* To show all employers data.
* To show all candidate data.
*/
	public function backupdata(){

     $admin_id = $this->session->userdata('ADMIN_ID');

	   $data['result'] = $this->db->select('*')->from('applied_jobs')->join('candidates','applied_jobs.c_id=candidates.c_id')->join('job_posts','job_posts.j_id=applied_jobs.j_id')->order_by('a_id','desc')->get()->result_array();
	   $data['result1'] = $this->db->select('*')->from('job_posts')->order_by('j_id','desc')->where('action','1')->or_where('action','3')->get()->result_array();
	   $data['result2'] = $this->db->select('*')->from('employer')->order_by('e_id','desc')->get()->result_array();
	   $data['result3'] = $this->db->select('*')->from('candidates')->order_by('c_id','desc')->get()->result_array();

        $this->load->view('admin/header1');
		$this->load->view('admin/backupdata',$data);
		$this->load->view('admin/footer1');
}
/*
* This function is use for to show all employers which employers request have already approved to access dashboard. 
*/	
public function active_employer()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('employer')->where('active','1')->order_by('e_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/active_employers',$data);
			$this->load->view('admin/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}	
	}
/*
* This function is use for to show all pending employers. 
*/	
	public function pending_employer()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('employer')->where('active','0')->order_by('e_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_employers',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
/*
* This function is use for change employers request status like approved , reject etc. 
*/
	public function update_emp_status()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$e_id = $this->input->post('e_id');
			$data['active'] = $this->input->post('status');
			$data['active_date'] = date('Y-m-d h:m:s');
			$this->db->where('e_id',$e_id);
			$this->db->update('employer',$data);
		$message = '<div class="alert alert-success">Status Updated</div>';
					$this->session->set_flashdata('message',$message);

    redirect(base_url('admin/pending_employer'));

		}else
		{
			redirect(base_url('welcome'));
		}	
	}
/*
* This function is use for to show all rejected employer. 
*/
	public function rejected_employer()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('employer')->where('active','2')->order_by('e_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/rejected_employers',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
	/*
	* This function is use for status approve and reject of all free pending job posts
	*/
	
	public function pending_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['Job_Approved']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "1";
				foreach ($selected as $value) {
					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}

			}
			if(isset($_POST['Job_Rejected']))
			{
				$selected = $this->input->post('select_item');
				$data['action'] = "2";
				foreach ($selected as $value) {
					$this->db->where('j_id',$value);
					$this->db->update('job_posts',$data);	
				}
				redirect(base_url('admin/rejected_job_posts'));	
			}
		$data['result'] = $this->db->select('*')->from('job_posts')->where('action','0')->where('Package_type','Free')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
	
	/*
	* This function is use for to show all  free approved job posts.
	*/
	public function approved_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){

			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','1')->where('Package_type','Free')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/approved_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
	/*
	* This function is use for to show all free rejected job posts.
	*/
	public function rejected_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','2')->where('Package_type','Free')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/rejected_job_posts',$data);
			$this->load->view('admin/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
	/*
	* This function is use for to show all  free expired job posts.
	*/
	public function expired_job_posts()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('job_posts')->where('action','3')->where('Package_type','Free')->order_by('j_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/expired_job_posts',$data);
			$this->load->view('admin/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}	
	}

	/*
	* This function is use for to show all registerd candidate and all jobs posts which is candidate already applied.
	*/
	public function candidateSection(){
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['result'] = $this->db->select('*')->from('candidates')->order_by('c_id','DESC')->get()->result_array();
			$data['candidate_applications'] = $this->db->select('count(c_id) as total,applied_jobs.j_id,first_name,last_name,job_posts.*')->from('applied_jobs')->join('employer','applied_jobs.e_id = employer.e_id')->
			join('job_posts','applied_jobs.j_id = job_posts.j_id','left')->group_by('applied_jobs.j_id')->order_by('applied_jobs.j_id','DESC')->get()->result_array();
	
			$this->load->view('admin/header1');
			$this->load->view('admin/candidate_section',$data);
			$this->load->view('admin/footer1');
		
		}
		else
		{
			redirect(base_url('welcome'));
		}	
		
	}
	
	/*
	* This function is use to add custom platinum packages for employers.
	* To show all platinum pack active employer list with details.
	* To show all pending request for platinum pack.
	*/
	public function pendingPlatinumPackEmp(){
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['paid_platinum']))
			{
				$data['amount_paid'] = $this->input->post('amount_paid');
				$selected = $this->input->post('select_emp');

				foreach ($selected as $value) {
					$data['e_id'] = $value;
					$sql = $this->db->select('*')->from('employer')->where('e_id',$value)->get()->result_array();
					$data['emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
					$data['package_id'] = '1';
					$data['package_name'] = 'Platinum';

					$package_details = $this->db->select('*')->from('packages')->where('p_id','1')->get()->result_array();
					$data['package_price'] = $package_details[0]['package_price'];
					$data['package_validities'] = $package_details[0]['package_validities'];
					$data['total_posts'] = $package_details[0]['total_posts'];
					$data['active_date'] = date('Y-m-d h:m:s');

					$date = new DateTime(); // Y-m-d
					$date->add(new DateInterval('P'.$data['package_validities'].'D'));
					$expire_date = $date->format('Y-m-d h:m:s') . "\n";
					$data['pack_expire_date'] = $expire_date;
					
					$sql_1 = $this->db->select('count(j_id) as used_posts')->from('job_posts')->where('job_post_by_emp_id',$value)->where('Package_type','Platinum')->get()->result_array();
					$data['used_job_posts'] = $sql_1[0]['used_posts'];

					$this->db->insert('employer_packages',$data);
					$message = '<div class="alert alert-success">Employer Data Pack Actived </div>';
						$this->session->set_flashdata('message',$message);
				}
				redirect(base_url('admin/pending_platinum_pack_emp'));
			}
			else
			{
			$data['result'] = $this->db->select('distinct(job_post_by_emp_id),job_post_by_emp_name,job_post_date,phone')->from('job_posts')->where('Package_type','Platinum')
			->join('employer','job_posts.job_post_by_emp_id = employer.e_id')
			->where('job_post_by_emp_id NOT IN (select e_id from employer_packages where package_name ="Platinum")')->get()->result_array();

			$data['active_packages_list'] = $this->db->select('*')->from('employer_packages')->where('package_name','Platinum')->order_by('ep_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_platinum_pack_emp',$data);
			$this->load->view('admin/footer1');
			}
		}
		else
		{
			redirect(base_url('welcome'));
		}

		
	}
	/*
	* This function is use to add custom gold packages for employers.
	* To show all gold pack active employer list with details.
	* To show all pending request for gold pack.
	*/
	public function pendingGoldPackEmp(){
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['paid_gold']))
			{
				$data['amount_paid'] = $this->input->post('amount_paid');
				$selected = $this->input->post('select_emp');

				foreach ($selected as $value) {
					$data['e_id'] = $value;
					$sql = $this->db->select('*')->from('employer')->where('e_id',$value)->get()->result_array();
					$data['emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
					$data['package_id'] = '2';
					$data['package_name'] = 'Gold';

					$package_details = $this->db->select('*')->from('packages')->where('p_id','2')->get()->result_array();
					$data['package_price'] = $package_details[0]['package_price'];
					$data['package_validities'] = $package_details[0]['package_validities'];
					$data['total_posts'] = $package_details[0]['total_posts'];
					$data['active_date'] = date('Y-m-d h:m:s');

					$date = new DateTime(); // Y-m-d
					$date->add(new DateInterval('P'.$data['package_validities'].'D'));
					$expire_date = $date->format('Y-m-d h:m:s') . "\n";
					$data['pack_expire_date'] = $expire_date;
					
					$sql_1 = $this->db->select('count(j_id) as used_posts')->from('job_posts')->where('job_post_by_emp_id',$value)->where('Package_type','Gold')->get()->result_array();
					$data['used_job_posts'] = $sql_1[0]['used_posts'];

					$this->db->insert('employer_packages',$data);
					$message = '<div class="alert alert-success">Employer Gold Data Pack Actived </div>';
						$this->session->set_flashdata('message',$message);
				}
				redirect(base_url('admin/pending_gold_pack_emp'));
			}
			else
			{
			$data['result'] = $this->db->select('distinct(job_post_by_emp_id),job_post_by_emp_name,job_post_date,phone')->from('job_posts')->where('Package_type','Gold')
			->join('employer','job_posts.job_post_by_emp_id = employer.e_id')
			->where('job_post_by_emp_id NOT IN (select e_id from employer_packages where package_name ="Gold")')->get()->result_array();

			$data['active_packages_list'] = $this->db->select('*')->from('employer_packages')->where('package_name','Gold')->order_by('ep_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/pending_gold_pack_emp',$data);
			$this->load->view('admin/footer1');
			}
		}
		else
		{
			redirect(base_url('welcome'));
		}

		
	}
	
	/*
	* This function is use for to show all job applied candidate list.
	*/
	public function view_applications()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$j_id = $this->input->get('j_id');
		   	$data['result'] = $this->db->select('c_name,applied_date,action,candidates.*')->from('applied_jobs')->where('j_id',$j_id)->join('candidates','applied_jobs.c_id = candidates.c_id')->order_by('a_id','DESC')->get()->result_array();
			$this->load->view('admin/header1');
			$this->load->view('admin/view_applications',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
	
	/*
	* This function is use for to download table data in csv format.
	*/
		public function download_csv()
	{
		if(isset($_POST['submit_c']))
		{
		$filename = "Candidate_data.csv";
		$fp = fopen('php://output', 'w');
		$c_list = $this->input->post('select_can');

		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);

$header = array("ID","First Name","Middle Name","Last Name","Qualification","Skills","Email","Mobile No","City","Address"); 
   fputcsv($fp, $header);
		foreach ($c_list as $row) {
			$c_details = $this->db->select('c_id,first_name,middle_name,last_name,highest_qualification,skills,email_id,phone,city,address')->from('candidates')->where('c_id',$row)->get()->result_array();
			fputcsv($fp, $c_details[0]);
		}
		fclose($fp);
		}
		if(isset($_POST['download_resume']))
		{
			$c_list = $this->input->post('select_can');
			$this->load->library('zip');
			$this->load->helper('file');
			
			$path = './resume/';
			$files = get_filenames($path);
			//print_r($files);
				foreach ($files as $f) {
					foreach ($c_list as $row) {
						$resume = $this->db->select('*')->from('candidates')->where('c_id',$row)->get()->result_array();
						if($resume[0]['resume'] == $f)
						{
							$this->zip->read_file($path.$f,true);
						}
					}
				}
			$this->zip->download('Candidate_Resume');
		}
	}
	/*
	* This function is use for to download table data in csv format.
	*/
	public function download_emp_csv()
	{
		if(isset($_POST['submit_emp']))
		{
		$filename = "Employer_data.csv";
		$fp = fopen('php://output', 'w');
		$e_list = $this->input->post('select_emp');

		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);

$header = array("ID","First Name","Middle Name","Last Name","Phone","Address","Email Id","Company Name","Company Address","Date Created","Active Date"); 
   fputcsv($fp, $header);
		foreach ($e_list as $row) {
			$e_details = $this->db->select('e_id,first_name,middle_name,last_name,phone,address,email_id,company_name,company_address,date_created,active_date')->from('employer')->where('e_id',$row)->get()->result_array();
			fputcsv($fp, $e_details[0]);
		}
		fclose($fp);
		}
	}
	
	/*
	* This function is use to create job role.
	*/
	public function createJobRole(){

		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			if(isset($_POST['create_job_role']))
			{
				$data['role'] = $this->input->post('job_role');
				$this->db->insert('job_role',$data);
	$message = '<div class="alert alert-success">New Job Role Inserted</div>';
					$this->session->set_flashdata('message',$message);
	
				redirect(base_url('admin/create_new_job_role'));
			}else{
				$data['result'] = $this->db->select('*')->from('job_role')->get()->result_array();
				$this->load->view('admin/header1');
				$this->load->view('admin/create_job_role',$data);
				$this->load->view('admin/footer1');
			}
		}else
		{
			redirect(base_url('welcome'));
		}	
		
	}
/*
* This function is use to create sub job role.
*/
public function add_job_sub_roles()
	{
		$ADMIN_ID = $this->session->userdata('ADMIN_ID');
		if($ADMIN_ID != 0){
			$data['jr_id'] = $this->input->get('jr_id');
			$job_role_name = $this->db->select('*')->from('job_role')->where($data)->get()->result_array();
			if(isset($_POST['create_job_sub_role']))
			{
			$data['jr_id'] = $this->input->get('jr_id');
			$job_role_name = $this->db->select('*')->from('job_role')->where($data)->get()->result_array();

				$data['role'] = $job_role_name[0]['role'];
				$data['sub_role_type'] = $this->input->post('job_sub_role');

				$this->db->insert('sub_roles',$data);
	$message = '<div class="alert alert-success">New Sub Role Inserted</div>';
					$this->session->set_flashdata('message',$message);
	
				redirect(base_url('admin/add_job_sub_roles?jr_id='.$this->input->get('jr_id')));
			}else{
				$data['result'] = $this->db->select('*')->from('sub_roles')->where($data)->get()->result_array();
				$this->load->view('admin/header1');
				$this->load->view('admin/add_job_sub_roles',$data);
				$this->load->view('admin/footer1');
			}
		}
		else
		{
			redirect(base_url('welcome'));
		}	
	}
/*
* This function is use to update job role.
*/
	public function edit_job_role(){
		$var = $this->input->get('jr_id');
			if(isset($_POST['update'])){
				$insert['role'] = $this->input->post('job_role');

				$this->db->where('jr_id', $var);
				$this->db->update('job_role', $insert);

				$message = '<div class="alert alert-success">Job Role Updated Successfully.... </div>';
                $this->session->set_flashdata('message',$message);

				redirect(base_url('admin/createJobRole'));

			}

	    else
	    {
		    $data['result'] = $this->db->select('*')->from('job_role')->where('jr_id',$var)->get()->result_array();

			$this->load->view('admin/header1');
			$this->load->view('admin/edit_job_role',$data);
			$this->load->view('admin/footer1');
     }
	}
/*
* This function is use to create blog.
*/
public function add_blog(){

if(isset($_POST['submit'])){
	
	if(!empty($_FILES['uploads']['name'])){
	        $path = "assets/uploads/blog_pics/";

            $ename = $_FILES['uploads']['name'];
            $tmp = $_FILES['uploads']['tmp_name'];
            $img_path = $path.$ename;
            if(move_uploaded_file($tmp, $img_path))
            {

            }
        $insert['blog_pic'] = $ename;
        }

		$insert['blog_title']= $this->input->post('title');
		$insert['blog_description']= $this->input->post('description');
		$insert['blog_link']= $this->input->post('blog_url');

		$this->db->insert('blog_posting_tbl',$insert);

		$message = '<div class="alert alert-success">Blog Added Successfully.... </div>';
                $this->session->set_flashdata('message',$message);

				redirect(base_url('admin/add_blog'));
	}
	else
	{

	$this->load->view('header1');
	$this->load->view('admin/add_blog');
	$this->load->view('footer1');
	}

}

/*
* This function is use to show all blog data with details.
*/

public function manage_blog(){

		    $data['blog_data'] = $this->db->select('*')->from('blog_posting_tbl')->get()->result_array();

			$this->load->view('admin/header1');
			$this->load->view('admin/manage_blog',$data);
			$this->load->view('admin/footer1');
}

/*
* This function is use to update blog data.
*/
public function edit_blog(){

$b_id = $this->input->get('id');
if(isset($_POST['update'])){
	if(!empty($_FILES['uploads']['name'])){
	        $path = "assets/uploads/blog_pics/";

            $ename = $_FILES['uploads']['name'];
            $tmp = $_FILES['uploads']['tmp_name'];
            $img_path = $path.$ename;
            if(move_uploaded_file($tmp, $img_path))
            {

            }
        $insert['blog_pic'] = $ename;
        }

		$insert['blog_title']= $this->input->post('title');
		$insert['blog_description']= $this->input->post('description');
		$insert['blog_link']= $this->input->post('blog_url');
       $b_id = $this->input->get('id');

        $this->db->where('id', $b_id);
		$this->db->update('blog_posting_tbl',$insert);

		$message = '<div class="alert alert-success"> Blog Updated Successfully.... </div>';
        $this->session->set_flashdata('message',$message);

		redirect(base_url('admin/manage_blog'));

}
else
{
             $data['blog_data'] = $this->db->select('*')->from('blog_posting_tbl')->where('id',$b_id)->get()->result_array();

			$this->load->view('admin/header1');
			$this->load->view('admin/edit_blog',$data);
			$this->load->view('admin/footer1');
}

}
/*
* This function is use to delete blog data.
*/
public function delete_blog(){
 	$b_id = $this->input->get('id');

 	$this->db->where('id', $b_id);
	$this->db->delete('blog_posting_tbl');

	$message = '<div class="alert alert-success">Blog Data Deleted Successfully.... </div>';
                $this->session->set_flashdata('message',$message);

 	redirect(base_url('admin/manage_blog'));
 }
/*
* This function is use to delete job role.
*/
	public function delete_job_role(){
		$j_id = $this->input->get('jr_id');
			
				$this->db->where('jr_id', $j_id);
				$this->db->delete('job_role');

				$message = '<div class="alert alert-success">Job Role Deleted Successfully.... </div>';
                $this->session->set_flashdata('message',$message);

				redirect(base_url('admin/createJobRole'));

    }
    /*
* This function is use to update sub role data.
*/

   public function edit_job_Sub_role(){

   	$var = $this->input->get('sr_id');

			if(isset($_POST['update'])){

				$insert['sub_role_type'] = $this->input->post('job_sub_role');

				$this->db->where('sr_id', $var);
				$this->db->update('sub_roles', $insert);

				$message = '<div class="alert alert-success">Sub Job Role Updated Successfully.... </div>';
                $this->session->set_flashdata('message',$message);

				redirect(base_url('admin/add_job_sub_roles?jr_id='.$this->input->get('jr_id')));

			}

	    else{

		    $data['sub_role'] = $this->db->select('*')->from('sub_roles')->where('sr_id',$var)->get()->result_array();

			$this->load->view('admin/header1');
			$this->load->view('admin/edit_job_sub_role',$data);
			$this->load->view('admin/footer1');
     }
   } 
/*
* This function is use to delete sub role data.
*/
   public function delete_job_sub_role(){

		$j_id = $this->input->get('sr_id');
			
				$this->db->where('sr_id', $j_id);
				$this->db->delete('sub_roles');

				$message = '<div class="alert alert-success">Job Sub Role Deleted Successfully.... </div>';
                $this->session->set_flashdata('message',$message);

				redirect(base_url('admin/add_job_sub_roles?jr_id='.$this->input->get('jr_id')));

    }
/*
* This function is use to send mail.
*/
 public function create_mail()
	{
		$admin_id = $this->session->userdata('ADMIN_ID');


		if(isset($_POST['submit'])){

			$data['from_userid'] = $this->session->userdata('ADMIN_ID');
			$data['user_type'] = 0;
			$data['to_userid'] = $this->input->post('to');
			$data['subject'] = $this->input->post('subject');
			$data['message'] = $this->input->post('description');
			$data['created_at'] = date('Y-m-d h:m:s');

			$insert = $this->db->insert('mailbox',$data);
			$message = '<div class="alert alert-success">Mail Send Successfully.... </div>';
                $this->session->set_flashdata('message',$message);

			redirect(base_url('admin/create_mail'));


		}
		else
		{
		$data1 = $this->db->select('*')->from('admin')->where('id',$admin_id)->get()->result_array();
		/*$data1['result_pro'] = $sql[0]['profile_pic'];*/
		$this->load->view('admin/header1');
		$this->load->view('admin/create_mail',$data1);
		$this->load->view('admin/footer1');
		}
		
	}
/*
* This function is use to view mail.
*/
	public function read_mail(){

		$admin_id = $this->session->userdata('ADMIN_ID');

    $data = $this->db->select('*')->from('admin')->where('id',$admin_id)->get()->result_array();
		$this->load->view('admin/header1');
		$this->load->view('admin/read_mail',$data);
		$this->load->view('admin/footer1');
	}
/*
* This function is use to list all mail data.
*/
	public function mailbox(){

		$admin_id = $this->session->userdata('ADMIN_ID');

	   $data = $this->db->select('*')->from('admin')->where('id',$admin_id)->get()->result_array();
		$this->load->view('admin/header1');
		$this->load->view('admin/mailbox',$data);
		$this->load->view('admin/footer1');
	}
/*
* This function is use to sort data of one month.
*/
public function sortdata(){
$var = $this->input->get('e_id');

if($var==1){
$this->db->select('*');
$this->db->from('applied_jobs');
$this->db->join('candidates','applied_jobs.c_id=candidates.c_id');
$this->db->join('job_posts','job_posts.j_id=applied_jobs.j_id');
$this->db->where('applied_date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
$this->db->order_by('applied_date','desc');
$query = $this->db->get()->result_array();

/*$data['result'] = $this->db->select('*')->from('applied_jobs')->join('candidates','applied_jobs.c_id=candidates.c_id')->join('job_posts','job_posts.j_id=applied_jobs.j_id')->order_by('a_id','desc')->get()->result_array();
*/
}
header('Content-Type: application/json');
echo json_encode($query);
}

/*
* This function is use to show all feature job list.
* This function is use to show all active job list.
* This function is use to show all feature pending job list.
* This function is use to show all feature rejected job list.
*/
	public function featuredJob()
	{
		$this->load->view('admin/header1');
		$this->load->view('admin/featured_job');
		$this->load->view('admin/footer1');	

	}
/*
* This function is use to change feature job to normal job.
*/
	public function change_feature_job()
	{
		$j_id = $this->input->get('j_id');
		$update['featured_job'] = $this->input->get('f_j');
		$update['sequence_featured_job'] = 0;

		$this->db->where('j_id',$this->input->get('j_id'));
		$this->db->update('job_posts',$update);

		$message = '<div class="alert alert-success">Featured Job Updated Successfully.... </div>';
		$this->session->set_flashdata('message',$message);

		redirect(base_url('admin/featuredJob'));
	}
	
/*
* This function is use for reject feature job .
*/
	public function add_reject_fj()
	{
		if(isset($_POST['mark_fj']))
		{
			$job_list = $this->input->post('select_mark');
			$update['featured_job'] = "1";
			foreach ($job_list as $JL) {
				$this->db->where('j_id',$JL);
				$this->db->update('job_posts',$update);
			}
			$message = '<div class="alert alert-success">Featured Job Added Successfully.... </div>';
			$this->session->set_flashdata('message',$message);

			redirect(base_url('admin/featuredJob'));
		}
		if(isset($_POST['reject_fj']))
		{
			$job_list = $this->input->post('select_mark');
			$update['request_fj'] = "2";
			foreach ($job_list as $JL) {
				$this->db->where('j_id',$JL);
				$this->db->update('job_posts',$update);
			}
			$message = '<div class="alert alert-success">Featured Job Rejected Successfully.... </div>';
			$this->session->set_flashdata('message',$message);

			redirect(base_url('admin/featuredJob'));
		}
	}
	
/*
* This function is use for to show renewal pack request of employers.
* This function is use for to show employer pack history with details.
*/	
	public function empPackages(){

		$admin_id = $this->session->userdata('ADMIN_ID');


		$this->load->view('admin/header1');
		$this->load->view('admin/empPackages');
		$this->load->view('admin/footer1');
	}
	
	/*
	* This function is use for activate the platinum package.
	*/
	
	public function activate_platinumpack()
	{
		$insert['e_id'] = $this->input->get('e_id');
		$insert['package_id'] = '1';
		$insert['package_name'] = 'Platinum';
		$insert['package_price'] = $this->input->post('package_price');
		$insert['amount_paid'] = $this->input->post('amount_paid');
		$insert['package_validities'] = $this->input->post('package_validities');
		$insert['total_posts'] = $this->input->post('total_posts');
		$insert['used_job_posts'] = '0';
		$insert['active_date'] = date('Y-m-d h:m:s');

		$date = new DateTime(); // Y-m-d
		$date->add(new DateInterval('P'.$insert['package_validities'].'D'));
		$expire_date = $date->format('Y-m-d h:m:s') . "\n";
		$insert['pack_expire_date'] = $expire_date;

		$insert = $this->db->insert('employer_packages',$insert);

		$update['platinum_req'] = '0';

		$this->db->where('e_id',$this->input->get('e_id'));
		$this->db->update('employer',$update);

		$message = '<div class="alert alert-success">Platinum Pack Activated Successfully.... </div>';
		$this->session->set_flashdata('message',$message);

		redirect(base_url('admin/empPackages'));

	}
	
	/*
	* This function is use for activate the gold package.
	*/
	public function activate_goldpack()
	{
		$insert['e_id'] = $this->input->get('e_id');
		$insert['package_id'] = '2';
		$insert['package_name'] = 'Gold';
		$insert['package_price'] = $this->input->post('package_price');
		$insert['amount_paid'] = $this->input->post('amount_paid');
		$insert['package_validities'] = $this->input->post('package_validities');
		$insert['total_posts'] = $this->input->post('total_posts');
		$insert['used_job_posts'] = '0';
		$insert['active_date'] = date('Y-m-d h:m:s');

		$date = new DateTime(); // Y-m-d
		$date->add(new DateInterval('P'.$insert['package_validities'].'D'));
		$expire_date = $date->format('Y-m-d h:m:s') . "\n";
		$insert['pack_expire_date'] = $expire_date;

		$insert = $this->db->insert('employer_packages',$insert);

		$update['gold_req'] = '0';

		$this->db->where('e_id',$this->input->get('e_id'));
		$this->db->update('employer',$update);

		$message = '<div class="alert alert-success">Gold Pack Activated Successfully.... </div>';
		$this->session->set_flashdata('message',$message);

		redirect(base_url('admin/empPackages'));
		
	}
    
}