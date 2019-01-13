<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {
	public function index()
	{

		//$this->load->view('header');
		$this->load->view('index');
		//$this->load->view('footer');
	}
/*
* This function is use to show active packages with use job post/total job post for that particular pack.
* This function is use to show renew package button after expired active package.
* This function is use to show all job post which employer posts for job recuritement.
*/
	public function empDashboard(){
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		
		$EMP_ID_n = $this->session->userdata('EMP_ID');
		if($EMP_ID !=''){
		/*update flag of employer package to 0-expired by number of posts done or by date*/
			$cur_date = date('Y-m-d');

		$this->db->query("UPDATE employer_packages SET flag = '0' WHERE pack_expire_date LIKE '%$cur_date%' OR pack_expire_date < '$cur_date' OR total_posts = used_job_posts");



			$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

	$data['profile'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

	$data['free_pack_details']=$this->db->select('count(j_id) as total,action')->from('job_posts')->where('job_post_by_emp_id',$sql[0]['e_id'])->where('Package_type','Free')->group_by('action')->order_by('action','ASC')->get()->result_array();
	$data['platinum_pack_details']=$this->db->select('count(j_id) as total,action')->from('job_posts')->where('job_post_by_emp_id',$sql[0]['e_id'])->where('Package_type','Platinum')->group_by('action')->order_by('action','ASC')->get()->result_array();

			$data['result'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
			$data['applications'] = $this->db->select('count(a_id) as total')->from('applied_jobs')->where('e_id',$sql[0]['e_id'])->get()->result_array();
			$data['jobs_approved'] = $this->db->select('*')->from('job_posts')->where('action','1')->where('job_post_by_emp_id',$sql[0]['e_id'])->order_by('j_id','DESC')->get()->result_array();


/*Packages Active */
	$data['active'] = $this->db->select('count(ep_id) as total_pack_active')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('flag','1')->get()->result_array();
		if($data['active'][0]['total_pack_active']>0)
        {
			$data['active_packs'] = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('flag','1')->get()->result_array();                    
        }

/*Packages Expired*/
	$data['expired'] = $this->db->select('count(ep_id) as total_pack_expired')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('flag','0')->get()->result_array();
		if($data['expired'][0]['total_pack_expired']>0)
        {
			$data['expired_packs'] = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('flag','0')->get()->result_array();                    
        }
        	$this->load->view('employer/header1',$data);
        	
			$this->load->view('employer/dashboard',$data);
			$this->load->view('employer/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}
	}
/*
* This function is use to update and show employer profile data.
*/
	public function empProfile(){
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			if(isset($_POST['update_emp']))
			{
				$data['first_name'] = $this->input->post('first_name');
				$data['last_name'] = $this->input->post('last_name');
				$data['middle_name'] = $this->input->post('middle_name');
				$data['phone'] = $this->input->post('phone');
				$data['address'] = $this->input->post('address');
				$data['location'] = $this->input->post('location');
				$data['company_name'] = $this->input->post('company_name');
				$data['company_address'] = $this->input->post('company_address');
				$data['company_email_id'] = $this->input->post('company_email_id');
				$data['company_website'] = $this->input->post('company_website');
				$data['company_industry'] = $this->input->post('company_industry');
			    $data['about_company'] = $this->input->post('about_company');
				/*$data['current_salary'] = $this->input->post('current_salary');
				$data['experience'] = $this->input->post('experience');
				$data['designation'] = $this->input->post('designation');*/

$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

if(!empty($_FILES['profile_pic']['name']))
{
  $image=basename($_FILES['profile_pic']['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  $profile_name = "profile_pic_".$sql[0]['e_id'];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="assets/uploads/profile_pics/".$profile_name.".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES["profile_pic"]["tmp_name"]))
    {
    	$data['profile_pic'] = $profile_name.".".$type;
      move_uploaded_file($_FILES['profile_pic']['tmp_name'],$tmppath);
     // return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {
		$message = '<div class="alert alert-danger">Please Use the Profile Picture as (jpg,png,jpeg,gif) format </div>';
					$this->session->set_flashdata('message',$message);

    redirect(base_url('employer/edit_profile'));
  }
  }


				$this->db->where('e_id',$sql[0]['e_id']);
				$this->db->update('employer',$data);
		$message = '<div class="alert alert-success">Profile Updated Successfully</div>';
					$this->session->set_flashdata('message',$message);

			}
			$data['result'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
	$data['profile'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

			$this->load->view('employer/header1',$data);
			$this->load->view('employer/edit_profile',$data);
			$this->load->view('employer/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}
		
	}
/*
* This function is use to change password of employer profile.
*/
	public function changePassword(){

		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			if(isset($_POST['change_password']))
			{
				$data['password'] = sha1($this->input->post('confirm_password'));

				$this->db->where('email_id',$EMP_ID);
				$this->db->update('employer',$data);	
		        
		        $message = '<div class="alert alert-success">Password Changed Successfully</div>';
					$this->session->set_flashdata('message',$message);

				redirect(base_url('employer/changePassword'));
			}
		$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
			$data['result_pro'] = $sql[0]['profile_pic'];
	
	$data['result'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

			$this->load->view('employer/header1',$data);
			$this->load->view('employer/change_password',$data);
			$this->load->view('employer/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}
	}
/*
* This function is use to show all mail.
*/
	public function mailbox(){
	$emp_id = $this->session->userdata('EMP_ID');

	$sql = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();
	$data['result'] = $sql[0]['profile_pic'];

	$data['profile'] = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();

		$this->load->view('employer/header1',$data);
		$this->load->view('employer/mailbox',$data);
		$this->load->view('employer/footer1');

	}
/*
* This function is use to view  mail ,after clicking on particular mail.
*/
public function read_mail(){
		$emp_id = $this->session->userdata('EMP_ID');

        $sql = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();
		$data['result_pro'] = $sql[0]['profile_pic'];
	$data['profile'] = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();

		$this->load->view('employer/header1',$data);
		$this->load->view('employer/read_mail',$data);
		$this->load->view('employer/footer1');
	}
/*
* This function is use to send mail.
*/
	public function createMail(){
		$emp_id = $this->session->userdata('EMP_ID');

		$data1['jobs_approved'] = $this->db->select('*')->from('job_posts')->where('action','1')->where('job_post_by_emp_id',$emp_id)->get()->result_array();

		if(isset($_POST['submit'])){

			$data['from_userid'] = $emp_id;
			$data['user_type'] = 1;
			$user_type_role = $this->input->post('user_type_role');
			if($user_type_role == "Admin")
    			$data['to_userid'] = "admin";
    		if($user_type_role == "Candidate")
    			$data['to_userid'] = $this->input->post('to');
    			
			$data['subject'] = $this->input->post('subject');
			$data['message'] = $this->input->post('description');
			$data['created_at'] = date('Y-m-d h:m:s');

			$insert = $this->db->insert('mailbox',$data);

			$message = '<div class="alert alert-success">Mail send successfully!</div>';
			$this->session->set_flashdata('message',$message);

			redirect(base_url('employer/createMail'));


		}else{
			$sql = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();
			$data1['result_pro'] = $sql[0]['profile_pic'];
	$data['result'] = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();

		$this->load->view('employer/header1',$data);
		$this->load->view('employer/create_mail',$data1);
		$this->load->view('employer/footer1');
		}
	}
/*
* This function is use to create new job post with packages which is active or free.
*/
	public function createJobPost(){
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			if(isset($_POST['create_free_job_post']) || isset($_POST['platinum_job_post']) || isset($_POST['gold_job_post']))
			{
				$data['job_title'] = $this->input->post('job_title');
				$data['company_name'] = $this->input->post('company_name');
				$data['description'] = $this->input->post('description');
				$data['roles_and_responsibilities']= $this->input->post('roles_and_responsibilities');
				$data['min_sal'] = $this->input->post('min_sal');
				$data['max_sal'] = $this->input->post('max_sal');
				$data['min_exp'] = $this->input->post('min_exp');
				$data['max_exp'] = $this->input->post('max_exp');
				$data['qualification_required'] = implode(",",$this->input->post('qualification'));
				$data['job_role'] = $this->input->post('job_role');
				//$data['sub_roles'] = implode(",", $this->input->post('job_sub_roles'));
				$data['job_type'] = $this->input->post('job_type');
				$data['city'] = $this->input->post('city');
				//$data['localities'] = implode(",", $this->input->post('locality'));
				$data['job_post_date'] = date('Y-m-d h:m:s');
				$request_fj = $this->input->post('req_fj');
				if(isset($request_fj))
					$data['request_fj'] = $this->input->post('req_fj');
				else
					$data['request_fj'] = "0";
					
				$date = new DateTime(); // Y-m-d
				$date->add(new DateInterval('P30D'));
				$expire_date = $date->format('Y-m-d h:m:s') . "\n";

				$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
/*Free jobs posts*/
				if(isset($_POST['create_free_job_post'])){
						$data['job_post_expire_date'] =	$expire_date;

					$total_job_posted = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

					if($total_job_posted[0]['max_free_job_posts']==$total_job_posted[0]['total_free_job_posted'])
					{
						$message = '<div class="alert alert-danger">Maximum 10 Job Posts allowed in free trial ..Please Renew Job Post Pack..</div>';
						$this->session->set_flashdata('message',$message);
						redirect(base_url('employer/createJobPost'));	
					}
					else
					{
					$data_1['total_free_job_posted'] = $total_job_posted[0]['total_free_job_posted']+1;
					/*update total free job post count*/
					$this->db->where('email_id',$EMP_ID);
					$this->db->update('employer',$data_1);

					$data['Package_type'] = "Free";
					$message = '<div class="alert alert-success">Free Job Created Successfully Wait for Approval</div>';
					$this->session->set_flashdata('message',$message);
					}
				}/*Platinum jobs posts*/
				elseif (isset($_POST['platinum_job_post'])) {
					$platinum_expire_date = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('package_name','Platinum')->where('flag','1')->get()->result_array();					
				
					if(empty($platinum_expire_date))
					{
						$message = '<div class="alert alert-danger">Platinum Pack Expired..Please Renew Job Post Pack..</div>';
						$this->session->set_flashdata('message',$message);
						redirect(base_url('employer/createJobPost'));						
					}else{
				$data['job_post_expire_date'] = $platinum_expire_date[0]['pack_expire_date'];

					$total_platinum_job_posted = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('package_name','Platinum')->where('flag','1')->get()->result_array();

					if($total_platinum_job_posted[0]['used_job_posts']==$total_platinum_job_posted[0]['total_posts'])
					{
						$message = '<div class="alert alert-danger">Maximum 20 Job Posts allowed in Platinum Pack ..Please Renew Job Post Pack..</div>';
						$this->session->set_flashdata('message',$message);
						redirect(base_url('employer/createJobPost'));	
					}
					else
					{
					$data_1['used_job_posts'] = $total_platinum_job_posted[0]['used_job_posts']+1;
					/*update total Platinum job post count*/
					$this->db->where('e_id',$sql[0]['e_id']);
					$this->db->update('employer_packages',$data_1);

					$data['Package_type'] = "Platinum";
					$message = '<div class="alert alert-success">Platinum Job Created Successfully Wait for Approval</div>';
					$this->session->set_flashdata('message',$message);
					}
					}
				}/*Gold jobs posts*/
				elseif (isset($_POST['gold_job_post'])) {
					$gold_expire_date = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('package_name','Gold')->where('flag','1')->get()->result_array();			
					if(empty($gold_expire_date))
					{	$message = '<div class="alert alert-danger">Gold Pack Expired..Please Renew Job Post Pack..</div>';
						$this->session->set_flashdata('message',$message);
						redirect(base_url('employer/createJobPost'));						
					}else{
    				$data['job_post_expire_date'] = $gold_expire_date[0]['pack_expire_date'];

					$total_gold_job_posted = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('package_name','Gold')->where('flag','1')->get()->result_array();

					if($total_gold_job_posted[0]['used_job_posts']==$total_gold_job_posted[0]['total_posts'])
					{
						$message = '<div class="alert alert-danger">Maximum 30 Job Posts allowed in Gold Pack ..Please Renew Job Post Pack..</div>';
						$this->session->set_flashdata('message',$message);
						redirect(base_url('employer/createJobPost'));	
					}
					else
					{
					$data_1['used_job_posts'] = $total_gold_job_posted[0]['used_job_posts']+1;
					/*update total Platinum job post count*/
					$this->db->where('e_id',$sql[0]['e_id']);
					$this->db->update('employer_packages',$data_1);

					$data['Package_type'] = "Gold";
					$message = '<div class="alert alert-success">Gold Job Created Successfully Wait for Approval</div>';
					$this->session->set_flashdata('message',$message);
					}
					}

				}
				$data['job_post_by_emp_id'] = $sql[0]['e_id'];
				$data['job_post_by_emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];

				$this->db->insert('job_posts',$data);

			}

				$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
				$data['result1'] = $sql[0]['profile_pic'];
				$data['platinum_pack'] = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('package_name','Platinum')->get()->result_array();
				$data['gold_pack'] = $this->db->select('*')->from('employer_packages')->where('e_id',$sql[0]['e_id'])->where('package_name','Gold')->get()->result_array();

	$data['result'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

			$this->load->view('employer/header1',$data);
			$this->load->view('employer/create_job_post',$data);
			$this->load->view('employer/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}
		
	}
	
/*
* This function is use to view all job posts of employer.
*/
	public function myJobPost(){
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
		$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
			$data['result_pro'] = $sql[0]['profile_pic'];
				
			$data['result'] = $this->db->select('*')->from('job_posts')->where('job_post_by_emp_id',$sql[0]['e_id'])->where('Package_type','Free')->order_by('j_id','DESC')->get()->result_array();
			$data['platinum_result'] = $this->db->select('*')->from('job_posts')->where('job_post_by_emp_id',$sql[0]['e_id'])->where('Package_type','Platinum')->order_by('j_id','DESC')->get()->result_array();
			$data['gold_result'] = $this->db->select('*')->from('job_posts')->where('job_post_by_emp_id',$sql[0]['e_id'])->where('Package_type','Gold')->order_by('j_id','DESC')->get()->result_array();

	$data['profile'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

			$this->load->view('employer/header1',$data);
			$this->load->view('employer/my_job_post',$data);
			$this->load->view('employer/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}	
	}

/*
* This function is use to view list of all job application which is candidate applied for job post.
*/
	public function jobAppl(){
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
			$data['result_pro'] = $sql[0]['profile_pic'];
			$data['result'] = $this->db->select('*')->from('job_posts')->where('job_post_by_emp_id',$sql[0]['e_id'])->order_by('j_id','DESC')->get()->result_array();

	$data['profile'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

			$this->load->view('employer/header1',$data);
			$this->load->view('employer/job_applications',$data);
			$this->load->view('employer/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}	
		
	}

public function edit_job_post()
	{
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		$job_id = $this->input->get('j_id');
		if(isset($_POST['update'])){
			
				$data['job_title'] = $this->input->post('job_title');
				$data['company_name'] = $this->input->post('company_name');
				$data['description'] = $this->input->post('description');
				$data['min_sal'] = $this->input->post('min_sal');
				$data['max_sal'] = $this->input->post('max_sal');
				$data['min_exp'] = $this->input->post('min_exp');
				$data['max_exp'] = $this->input->post('max_exp');
				$data['qualification_required'] = implode(",",$this->input->post('qualification'));
				$data['job_role'] = $this->input->post('job_role');
				$data['sub_roles'] = implode(",", $this->input->post('job_sub_roles'));
				$data['job_type'] = $this->input->post('job_type');
				$data['city'] = $this->input->post('city');
				$data['localities'] = implode(",", $this->input->post('locality'));
				$data['job_post_date'] = date('Y-m-d h:m:s');

				$this->db->where('j_id', $job_id);
				$this->db->update('job_posts', $data);

				$message = '<div class="alert alert-success">Job Post Updated Successfully.... </div>';
		                $this->session->set_flashdata('message',$message);

				redirect(base_url('employer/my_job_post_applications'));
			
				}
				else
				{
					$data['result'] = $this->db->select('*')->from('job_posts')->where('j_id',$job_id)->get()->result_array();
					$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
					$data['result1'] = $sql[0]['profile_pic'];
	$data['profile'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

					$this->load->view('employer/header',$data);
					$this->load->view('employer/edit_job_post',$data);
					$this->load->view('employer/footer');
			}		
	}
/*
* This function is use to view job details which is employer posted.
*/
	public function view_job_post()
	{
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			$job_id = $this->input->get('j_id');

			$data['result'] = $this->db->select('*')->from('job_posts')->where('j_id',$job_id)->get()->result_array();
			$data['profile'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
            
			//redirect(base_url('employer/view_job_post?j_id='.$job_id));
			$this->load->view('employer/header',$data);
			$this->load->view('employer/view_job_post',$data);
			$this->load->view('employer/footer');
		}else
		{
			redirect(base_url('welcome'));
		}		
	}
/*
* This function is use to delete job posts which is employer posted.
*/
	public function delete_job_post()
	{
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			$job_id['j_id'] = $this->input->get('j_id');

				$this->db->delete('job_posts',$job_id);			
             $message = '<div class="alert alert-success">Job Deleted Successfully</div>';
					$this->session->set_flashdata('message',$message);
			
			redirect(base_url('employer/my_job_post'));
		}else
		{
			redirect(base_url('welcome'));
		}		
	}
/*
* This function is use to change password of profile.
*/
	public function settings()
	{
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			if(isset($_POST['change_password']))
			{
				$data['password'] = sha1($this->input->post('confirm_password'));

				$this->db->where('email_id',$EMP_ID);
				$this->db->update('employer',$data);	
		        
		        $message = '<div class="alert alert-success">Password Changed Successfully</div>';
					$this->session->set_flashdata('message',$message);

				redirect(base_url('employer/change_password'));
			}
		$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
			$data['result_pro'] = $sql[0]['profile_pic'];
	
			$this->load->view('employer/header');
			$this->load->view('employer/settings',$data);
			$this->load->view('employer/footer');
		}else
		{
			redirect(base_url('welcome'));
		}		
	}
/*
* This function is use to show sub roles of job role .
*/
	public function get_sub_roles()
	{
		$job_role = $this->input->post('j_r_new');
		$mile = $this->db->select('*')->from('sub_roles')->where('role',$job_role)->get()->result();

		if(count($mile)>0)
		{				
			$mile_box ='';
			$mile_box .='<option value="">Select Sub Roles</option>';
			foreach ($mile as $mv) {
			$mile_box .='<option value="'.$mv->sub_role_type.'">'.$mv->sub_role_type.'</option>';
			}
			echo json_encode($mile_box);
		}
	}

		public function get_localities()
	{
		$city_name = $this->input->post('city_new');
		$localities_new = $this->db->select('*')->from('localities')->where('city_name',$city_name)->get()->result();

		if(count($localities_new)>0)
		{				
			$mile_box1 ='';
			$mile_box1 .='<option value="">Select localities</option>';
			foreach ($localities_new as $mv) {
			$mile_box1 .='<option value="'.$mv->localities_name.'">'.$mv->localities_name.'</option>';
			}
			echo json_encode($mile_box1);
		}
	}

/*
* This function is use to view all applied candidate  details with job name for job posts.
*/
	public function view_applications()
	{
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
			$j_id = $this->input->get('j_id');
			$data['result'] = $this->db->select('c_name,applied_date,action,candidates.*')->from('applied_jobs')->where('j_id',$j_id)->join('candidates','applied_jobs.c_id = candidates.c_id')->order_by('a_id','DESC')->get()->result_array();
			$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();
			$data['result_pro'] = $sql[0]['profile_pic'];
	$data['profile'] = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

			$this->load->view('employer/header1',$data);
			$this->load->view('employer/view_applications',$data);
			$this->load->view('employer/footer1');
		}else
		{
			redirect(base_url('welcome'));
		}	
	}

		public function platinum_pack()
	{
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
				$data['job_title'] = $this->input->post('job_title');
				$data['company_name'] = $this->input->post('company_name');
				$data['description'] = $this->input->post('description');
				$data['min_sal'] = $this->input->post('min_sal');
				$data['max_sal'] = $this->input->post('max_sal');
				$data['min_exp'] = $this->input->post('min_exp');
				$data['max_exp'] = $this->input->post('max_exp');
				$data['qualification_required'] = $this->input->post('qualification');
				$data['job_role'] = $this->input->post('job_role');
				$data['sub_roles'] = $this->input->post('job_sub_roles');
				$data['job_type'] = $this->input->post('job_type');
				$data['city'] = $this->input->post('city');
				$data['localities'] = $this->input->post('locality');
				$data['job_post_date'] = date('Y-m-d h:m:s');
				
				$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

				$data['job_post_by_emp_id'] = $sql[0]['e_id'];
				$data['job_post_by_emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
				$data['Package_type'] = 'Platinum';
				
				$this->db->insert('job_posts',$data);

		$message = '<div class="alert alert-success">Platinum Job Created Successfully Wait for Approval ....Please Pay the Amount</div>';
		$this->session->set_flashdata('message',$message);

		}else
		{
			redirect(base_url('welcome'));
		}	
	}
	public function gold_pack()
	{
		$EMP_ID = $this->session->userdata('EMAIL_ID');
		if($EMP_ID !=''){
				$data['job_title'] = $this->input->post('job_title');
				$data['company_name'] = $this->input->post('company_name');
				$data['description'] = $this->input->post('description');
				$data['min_sal'] = $this->input->post('min_sal');
				$data['max_sal'] = $this->input->post('max_sal');
				$data['min_exp'] = $this->input->post('min_exp');
				$data['max_exp'] = $this->input->post('max_exp');
				$data['qualification_required'] = $this->input->post('qualification');
				$data['job_role'] = $this->input->post('job_role');
				$data['sub_roles'] = $this->input->post('job_sub_roles');
				$data['job_type'] = $this->input->post('job_type');
				$data['city'] = $this->input->post('city');
				$data['localities'] = $this->input->post('locality');
				$data['job_post_date'] = date('Y-m-d h:m:s');
				
				$sql = $this->db->select('*')->from('employer')->where('email_id',$EMP_ID)->get()->result_array();

				$data['job_post_by_emp_id'] = $sql[0]['e_id'];
				$data['job_post_by_emp_name'] = $sql[0]['first_name']." ".$sql[0]['last_name'];
				$data['Package_type'] = 'Gold';
				
				$this->db->insert('job_posts',$data);

		$message = '<div class="alert alert-success">Gold Job Created Successfully Wait for Approval ....Please Pay the Amount</div>';
		$this->session->set_flashdata('message',$message);
		}else
		{
			redirect(base_url('welcome'));
		}	

	}
	
/*
* This function is use to send contact details .
*/
	public function contact_us()
	{

		if(isset($_POST['submit'])){

			$data['name'] = $this->input->post('name');
			$data['subject'] = $this->input->post('subject');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['description'] = $this->input->post('message');

			$insert = $this->db->insert('contact',$data);

			$message = '<div class="alert alert-success">Message send successfully!</div>';
			$this->session->set_flashdata('message',$message);

			redirect(base_url('employer/contact_us'));

		}else{
			$this->load->view('employer/header');	
			$this->load->view('employer/contact_us');
			$this->load->view('employer/footer');	
		}
	}
		
/*
* This function is use to show candiate detalis for applied job.
*/
public function get_candidate()
	{
		$j_id = $this->input->post('j_id_new');
		$mile = $this->db->select('applied_jobs.c_id as cid,first_name,last_name')->from('applied_jobs')->where('j_id',$j_id)->join('candidates','applied_jobs.c_id = candidates.c_id')->get()->result();

		if(count($mile)>0)
		{				
			$mile_box ='';
			$mile_box .='<option value="" disabled="disabled" selected="selected">Select Candidates</option>';
			foreach ($mile as $mv) {
			$mile_box .='<option value="'.$mv->cid.'">'.$mv->first_name." ".$mv->last_name.'</option>';
			}
			echo json_encode($mile_box);
		}
	}
/*
* This function is use to download candidate  table data into csv format .
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

	/*public function download(){

		return $query = $this->db->get('my_table');
	}*/
	
public function get_report(){

    $this->load->model('report');
    $this->load->dbutil();
    $this->load->helper('file');

    /* get the object   */
    $report = $this->report->index();
    /*  pass it to db utility function  */
    $new_report = $this->dbutil->csv_from_result($report);
    /*  Now use it to write file. write_file helper function will do it */
    write_file('csv_file.csv',$new_report);
    /*  Done    */
}

public function backupdata(){

		$emp_id = $this->session->userdata('EMP_ID');

		$sql = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();
		$data['result_pro'] = $sql[0]['profile_pic'];
		
		$data['profile'] = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();

        $this->load->view('employer/header',$data);
		$this->load->view('employer/backupdata',$data);
		$this->load->view('employer/footer');
}
/*
* This function is use to show employer package purchase and activation history .
*/
	public function packageHistory()
	{
		$emp_id = $this->session->userdata('EMP_ID');
	
		$data['package_history'] = $this->db->order_by('ep_id','DESC')->get_where('employer_packages',array('e_id'=>$emp_id))->result_array();	
		$sql = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();
		$data['result_pro'] = $sql[0]['profile_pic'];

		$data['profile'] = $this->db->select('*')->from('employer')->where('e_id',$emp_id)->get()->result_array();

		$this->load->view('employer/header1',$data);
		$this->load->view('employer/package_history',$data);
		$this->load->view('employer/footer1');
	}
/*
* This function is use to request platinum for job pack activation .
*/
	public function platinum_req()
	{
		$emp_id = $this->session->userdata('EMP_ID');
		$update['platinum_req'] = 1;
			$this->db->where('e_id',$emp_id);
			$this->db->update('employer',$update);
			$message = '<div class="alert alert-success">Request Send Successfully!</div>';
			$this->session->set_flashdata('message',$message);

			redirect(base_url('employer/empDashboard'));			
	}
/*
* This function is use to request gold for job pack activation .
*/
	public function gold_req()
	{
		$emp_id = $this->session->userdata('EMP_ID');
		$update['gold_req'] = 1;
			$this->db->where('e_id',$emp_id);
			$this->db->update('employer',$update);
			$message = '<div class="alert alert-success">Request Send Successfully!</div>';
			$this->session->set_flashdata('message',$message);

			redirect(base_url('employer/empDashboard'));			
	}

}