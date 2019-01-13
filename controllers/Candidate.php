<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

	/**
	 */

	function __construct() {
        parent::__construct();
        $this->load->model('post');
        $this->load->model('post_1');
        $this->load->library('Ajax_pagination');
        $this->perPage = 10;
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
/**
 * This function is use for to insert candidate profile in database
*/
	public function register_candidate(){

		if(isset($_POST['candidate_register'])){
			$data['first_name'] = $this->input->post('fname');
			$data['middle_name'] = $this->input->post('mname');
			$data['last_name'] = $this->input->post('lname');
			$data['phone'] = $this->input->post('phone_no');
			$data['address'] = $this->input->post('address');
			$data['email_id'] = $this->input->post('email');
			$data['password'] = sha1($this->input->post('password'));
			$data['highest_qualification'] = implode(",", $this->input->post('qualification'));
			$data['skills'] = implode(",", $this->input->post('skills'));
			$data['city'] = $this->input->post('city');
			//$data['resume'] = $this->input->post('resume');
			//$data['profile_photo'] = $this->input->post('photo');

			  	  $image=basename($_FILES['profile_photo']['name']);
				  $image=str_replace(' ','|',$image);
				  $type = explode(".",$image);
				  $type = $type[count($type)-1];
				  $profile_name = "profile_photo_".uniqid(rand());
				  if (in_array($type,array('jpg','jpeg','png','gif')))
				  {
				    $tmppath="assets/uploads/images/".$profile_name.".".$type; // uniqid(rand()) function generates unique random number.
				    if(is_uploaded_file($_FILES["profile_photo"]["tmp_name"]))
				    {
				    	$data['profile_photo'] = $profile_name.".".$type;
				      move_uploaded_file($_FILES['profile_photo']['tmp_name'],$tmppath);
				     // return $tmppath; // returns the url of uploaded image.
				    }
				  }
				  else
				  {
						$message = '<div class="alert alert-danger">Please Use the Profile Photo format (jpg,jpeg,png,gif) format </div>';
							$this->session->set_flashdata('message',$message);
				    redirect(base_url('welcome/register'));
				  }
				  
				  $resume=basename($_FILES['resume']['name']);
				  $resume=str_replace(' ','|',$resume);
				  $type = explode(".",$resume);
				  $type = $type[count($type)-1];
				  $resume_name = "resume_".uniqid(rand());
				  if (in_array($type,array('pdf','doc','docx')))
				  {
				    $tmppath="resume/".$resume_name.".".$type; // uniqid(rand()) function generates unique random number.
				    if(is_uploaded_file($_FILES["resume"]["tmp_name"]))
				    {
				    	$data['resume'] = $resume_name.".".$type;
				      move_uploaded_file($_FILES['resume']['tmp_name'],$tmppath);
				     // return $tmppath; // returns the url of uploaded image.
				    }
				  }
				  else
				  {
						$message = '<div class="alert alert-danger">Please Use the Resume format (pdf,doc,docx) format </div>';
							$this->session->set_flashdata('message',$message);
				    redirect(base_url('welcome/register'));
				  }


			$insert = $this->db->insert('candidates',$data);
			$message = '<div class="alert alert-success">Registeration done. Please login.</div>';
							$this->session->set_flashdata('message',$message);

			//$message = '<div class="alert alert-success">Registeration done. Please login.</div>';

			//$this->load->view('login_candidates');
//			redirect(base_url('candidate/login_candidate'));
			redirect(base_url('welcome/login'));
		}
	} 
/**
 * This function is use for to validate register candidate.
*/
	public function login_candidate(){

		if(isset($_POST['submit'])){


			$data['email_id'] = $this->input->post('email');
			$data['password'] = sha1($this->input->post('password'));

			//echo $data['email_id']; exit;
		
		$data_e['email_id'] = $this->input->post('email');
		$data_p['password'] = sha1($this->input->post('password'));

		$sql_email = $this->db->select('*')->from('candidates')->where($data_e)->get()->result_array();
    		if(!empty($sql_email))
    		{
        		$sql = $this->db->select('*')->from('candidates')->where($data)->get()->result_array();
    
    			if(!empty($sql)){
    
    				$this->session->set_userdata('c_id',$sql[0]['c_id']);
    				$this->session->set_userdata('first_name',$sql[0]['first_name']);
    				$this->session->set_userdata('last_name',$sql[0]['last_name']);
    				
                    if(!empty($this->session->userdata('newjob_id')))
                    {
                       $newjob_id = $this->session->userdata('newjob_id');
                       
                       redirect(base_url('candidate/jobDetails?j_id='.$newjob_id));
                    }
                    if(!empty($this->session->userdata('newjob_id_1')))
                    {
                       $newjob_id_1 = $this->session->userdata('newjob_id_1');
                       
                       redirect(base_url('candidate/jobDetails?j_id='.$newjob_id_1));
                    }
    
    				redirect(base_url('candidate/candidateDashboard'));
    
    			}else{
    
    			    $message = '<div class="alert alert-danger">Password Wrong.... </div>';
    				$this->session->set_flashdata('message',$message);
    
    				redirect(base_url('welcome/login'));
    			}
    		}
    		else
    		{
        	    $message = '<div class="alert alert-danger">Email Id Wrong.... </div>';
    			$this->session->set_flashdata('message',$message);
    
    			redirect(base_url('welcome/login'));
    		}
		
		}else{
			$this->load->view('welcome/login');
			
		}

	}
/**
 * This function is use for to show candidate applied jobs list.
*/

	public function candidateDashboard(){

		$candidate_id = $this->session->userdata('c_id');

			if($candidate_id !=0){
				$data['result'] = $this->db->select('*,applied_jobs.action,job_title')->from('applied_jobs')
				->where('c_id',$candidate_id)
				->join('job_posts','applied_jobs.j_id = job_posts.j_id')	
				->order_by('a_id','DESC')->get()->result_array();

			$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

				$this->load->view('candidate/header1',$data);
				$this->load->view('candidate/dashboard',$data);
				$this->load->view('candidate/footer1');
			}
			else
			{
				redirect(base_url('welcome'));
			}
	}
/**
 * This function is use for to show candidate profile details.
 * This function is use for to update candidate profile details.
*/
	public function candidateProfile(){
		$candidate_id = $this->session->userdata('c_id');

			if($candidate_id !=0){
					if(isset($_POST['update'])){

						if(!empty($_FILES['profile_photo']['name'])){

							$path = "assets/uploads/images/";
			            $ename = $_FILES['profile_photo']['name'];
			            $tmp = $_FILES['profile_photo']['tmp_name'];
			            $img_path = $path.$ename;
			            if(move_uploaded_file($tmp, $img_path))
			            {

			            }
							$data['profile_photo']= $ename;
						}
						
					if(!empty($_FILES['resume']['name'])){
					    $path = "resume/";
			            $fname = $_FILES['resume']['name'];
			            $tmp = $_FILES['resume']['tmp_name'];
			            $img_path = $path.$fname;
			            if(move_uploaded_file($tmp, $img_path))
			            {

			            }
			           
					    $data['resume']= $fname;
						}
						
						$data['first_name'] = $this->input->post('fname');
						$data['middle_name'] = $this->input->post('mname');
						$data['last_name'] = $this->input->post('lname');
						$data['email_id'] = $this->input->post('email');
						$data['address'] = $this->input->post('address');
						$data['phone'] = $this->input->post('phone_no');
						$data['highest_qualification'] = implode(",", $this->input->post('qualification'));
						$data['skills'] = implode(",", $this->input->post('skills'));
						$data['city'] = $this->input->post('city');

						$this->db->where('c_id',$candidate_id);
			            $this->db->update('candidates',$data);

					    $message = '<div class="alert alert-success">Profile Updated Successfully.... </div>';
						$this->session->set_flashdata('message_client',$message);

						redirect(base_url('candidate/candidateProfile'));	

					}else{
						$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

							$this->load->view('candidate/header1',$data);
							$this->load->view('candidate/edit_profile',$data);
							$this->load->view('candidate/footer1');
					}
			}
			else{
				redirect(base_url('welcome'));
			}	
	}
/*
* This function is use for to search job according to user filtering selection.
* This function shows result according to user requirement.
*/
	public function findJob(){
	
		$candidate_id = $this->session->userdata('c_id');
			if($candidate_id !=0){

		if(isset($_POST['search_job']) || isset($_POST['search_job_1']) || isset($_POST['search_job_2']) || isset($_POST['search_job_3']))
		{
			$data['job_title'] = $this->input->post('job_title');
			
			if(isset($_POST['search_job']))	
				$data['city_s'] = $this->input->post('city_name');
			if(isset($_POST['search_job_1']))
				$data['city_s'] = $_POST['search_job_1'];
			
			if(isset($_POST['search_job_2']))
				$data['job_type_s'] = $_POST['search_job_2'];
	
			if(isset($_POST['search_job_3']))
				$data['job_role'] = $_POST['search_job_3'];
			if(isset($_POST['search_job']))	
				$data['job_role'] = $this->input->post('job_categories');

			$data['quali'] = $this->input->post('city_name');

			//redirect(base_url('candidates/jobs_list_new'));
		
		$totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'candidate/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
		 //get the posts data
        $data['posts'] = $this->post->getRows(array('limit'=>$this->perPage));
		$candidate_id = $this->session->userdata('c_id');
		$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();
        $this->load->view('candidate/header1',$data);
        $this->load->view('candidate/job_listing', $data);
        $this->load->view('candidate/footer1');
		}
		else
		{
        $data = array();
        
        //total rows count
        $totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'candidate/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->post->getRows(array('limit'=>$this->perPage));
		$candidate_id = $this->session->userdata('c_id');
		$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();
        
        //load the view
        $this->load->view('candidate/header1',$data);
        $this->load->view('candidate/job_listing', $data);
        $this->load->view('candidate/footer1');
    	}
      }
      else
      {
			redirect(base_url('candidate/findJob'));      	
      }



/*		$candidate_id = $this->session->userdata('c_id');
		$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

		$this->load->view('candidate/header',$data);
		$this->load->view('candidate/job_listing');
		$this->load->view('candidate/footer');*/
	}
	
/*
* This function is use for to search job according to user filtering selection.
* This function shows result according to user requirement.
*/

    function ajaxPaginationData(){
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        $sortBy_ca = $this->input->post('sortBy_ca');
        /*$quali_new = $this->input->post('quali_new');*/
        $job_type_new = $this->input->post('job_type_new');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        if(!empty($sortBy_ca)){
            $conditions['search']['sortBy_ca'] = $sortBy_ca;
        }
        /*if(!empty($quali_new)){
            $conditions['search']['quali_new'] = $quali_new;
        }*/
        if(!empty($job_type_new)){
            $conditions['search']['job_type_new'] = $job_type_new;
        }
        
        //total rows count
        $totalRec = count($this->post->getRows($conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'candidate/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->post->getRows($conditions);
        
        //load the view
        $this->load->view('candidate/ajax-pagination-data', $data, false);
    }
/*
* This function is use for to show all mail
*/
	public function mailbox(){
		$candidate_id = $this->session->userdata('c_id');

		$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

		$this->load->view('candidate/header1',$data);
		$this->load->view('candidate/mailbox',$data);
		$this->load->view('candidate/footer1');
	}
/*
* This function is use for to send mail.
*/
	public function createMail(){
		$candidate_id = $this->session->userdata('c_id');
		if(isset($_POST['submit'])){
			$data['from_userid'] = $candidate_id;
			$data['user_type'] = 2;
			$data['to_userid'] = $this->input->post('to');
			$data['subject'] = $this->input->post('subject');
			$data['message'] = $this->input->post('message');
			$data['created_at'] = date('Y-m-d h:m:s');

			$insert = $this->db->insert('mailbox',$data);

			$message = '<div class="alert alert-success">Mail Send Successfully.</div>';
           	$this->session->set_flashdata('message',$message);

			redirect(base_url('candidate/mailbox'));

		}else{
		$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();
		$this->load->view('candidate/header1',$data);
		$this->load->view('candidate/create_mail',$data);
		$this->load->view('candidate/footer1');
		}
	}
/*
* This function is use for to chanage password of candidate.
*/
	public function changePassword(){

		$candidate_id = $this->session->userdata('c_id');

			if($candidate_id !=0){
				if(isset($_POST['update_pass'])){

					$data['password'] = sha1($this->input->post('confirm_password'));

					$this->db->where('c_id', $candidate_id);
					$this->db->update('candidates', $data);

					$message = '<div class="alert alert-success">Password Change Successfully.... </div>';
                	$this->session->set_flashdata('message',$message);

					redirect(base_url('candidate/changePassword'));

				}else{
					$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

						$this->load->view('candidate/header1',$data);
						$this->load->view('candidate/change_password',$data);
						$this->load->view('candidate/footer1');
				}
			}else{
				redirect(base_url('welcome'));
			}	

	}
	

/*
* This function is use for to show job details data when user click on that particular job.
*/
	public function jobDetails(){
	
			$candidate_id = $this->session->userdata('c_id');
			if($candidate_id !=0){
				$data['j_id'] = $this->input->get('j_id');
				$data['result'] = $this->db->select('*')->from('job_posts')->where($data)->get()->result_array();
				$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

				$this->load->view('candidate/header1',$data);
				$this->load->view('candidate/job_details',$data);
				$this->load->view('candidate/footer1');
			}else{
					redirect(base_url('candidate/candidateDashboard'));
				}
	}
	
/*
* This function is use for apply the job when user click on apply button.
*/
	public function apply_job()
	{
			$candidate_id = $this->session->userdata('c_id');
			if($candidate_id !=0){
		            if(!empty($this->session->userdata('newjob_id')))
                    {
                        $this->session->unset_userdata('newjob_id');
                    }
		            if(!empty($this->session->userdata('newjob_id_1')))
                    {
                        $this->session->unset_userdata('newjob_id_1');
                    }
			    
					$job_id = $this->input->get('job_id');
					$job_emp_id = $this->input->get('emp_id');

					$check_already_appiled = $this->db->select('*')->from('applied_jobs')->where('c_id',$candidate_id)->where('j_id',$job_id)->get()->result_array();
					
					if(empty($check_already_appiled))
					{
					$sql = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();
					$data['c_id'] = $candidate_id;
					$data['j_id'] = $job_id;
					$data['e_id'] = $job_emp_id;

						$data['c_name'] = $sql[0]['first_name']." ".$sql[0]['middle_name']." ".$sql[0]['last_name'];
						$data['applied_date'] = date('Y-m-d h:m:s');
						$this->db->insert('applied_jobs',$data);
						$message = '<div class="alert alert-success">Successfully Applied to this job</div>';
						$this->session->set_flashdata('message',$message);

						redirect(base_url('candidate/jobDetails?j_id='.$this->input->get('job_id')));
					}
					else
					{
						$message = '<div class="alert alert-danger">Already Applied to these job</div>';
						$this->session->set_flashdata('message',$message);
						redirect(base_url('candidate/jobDetails?j_id='.$this->input->get('job_id')));
					}
			}else{
				redirect(base_url('welcome'));
			}	
	}
	
/*
* This function is use for to view mail.
*/
	public function readMail(){

		$candidate_id = $this->session->userdata('c_id');
		if($candidate_id !=0){

        $data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

		$this->load->view('candidate/header1',$data);
		$this->load->view('candidate/read_mail');
		$this->load->view('candidate/footer1');
		}
		else
		{
			redirect(base_url('welcome'));
		}
	}
	
 /*
 * This function is use for to refer job to user friends or collegues by inserting their email id.
 */
 	public function referFriend()
	{
		$friend_email = $this->input->post('friend_email');

		$candidate_id = $this->session->userdata('c_id');
        $profile = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

		$data['j_id'] = $this->input->get('j_id');
		$job_detail = $this->db->select('*')->from('job_posts')->where($data)->get()->result_array();
				

        $to = $friend_email;
        $subject = "Job Vacancy...";
        $joblink = base_url('welcome/jobDetails?j_id='.$this->input->get('j_id'));
        $message = "
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <p>This email is refered by your friend for job vacancy</p>
        <table>
        <tr>
        <th>Job Title</th>
		<th>Company</th>
		<th>Location</th>
		<th>Qualification</th>
        <th>Skills</th>
        <th>Refer Link</th>
        </tr>
        <tr>
        <td>".$job_detail[0]['job_title']."</td>
        <td>".$job_detail[0]['company_name']."</td>
        <td>".$job_detail[0]['city']." : ".$job_detail[0]['localities']."</td>
        <td>".$job_detail[0]['qualification_required']."</td>
        <td>".$job_detail[0]['sub_roles']."</td>
        <td>".$joblink."</td>
        </tr>
        </table>
        </body>
        </html>
        ";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: ' .$profile[0]['email_id']. "\r\n";

        mail($to,$subject,$message,$headers);


		$message = '<div class="alert alert-success">Job Refered Successfully...</div>';
		$this->session->set_flashdata('message',$message);
		redirect(base_url('candidate/jobDetails?j_id='.$this->input->get('j_id')));
	}
/*
* This function is use for lisiting all feature jobs which is currently/recently active.
*/
	public function featuredJobsList(){

		if(isset($_POST['search_job']) || isset($_POST['search_job_1']) || isset($_POST['search_job_2']) || isset($_POST['search_job_3']))
		{
			$data['job_title'] = $this->input->post('job_title');
			
			if(isset($_POST['search_job']))	
				$data['city_s'] = $this->input->post('city_name');
			if(isset($_POST['search_job_1']))
				$data['city_s'] = $_POST['search_job_1'];
			
			if(isset($_POST['search_job_2']))
				$data['job_type_s'] = $_POST['search_job_2'];
	
			if(isset($_POST['search_job_3']))
				$data['job_role'] = $_POST['search_job_3'];
			if(isset($_POST['search_job']))	
				$data['job_role'] = $this->input->post('job_categories');

			$data['quali'] = $this->input->post('city_name');

			//redirect(base_url('candidates/jobs_list_new'));
		
		$totalRec = count($this->post_1->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'candidate/ajaxPaginationData_1';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
		 //get the posts data
        $data['posts'] = $this->post_1->getRows(array('limit'=>$this->perPage));
		$candidate_id = $this->session->userdata('c_id');
		$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();
        
        //load the view
        $this->load->view('candidate/header1',$data);
        $this->load->view('candidate/featuredJobsList', $data);
        $this->load->view('candidate/footer1');
		}
		else
		{
        $data = array();
        
        //total rows count
        $totalRec = count($this->post_1->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'candidate/ajaxPaginationData_1';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->post_1->getRows(array('limit'=>$this->perPage));
		$candidate_id = $this->session->userdata('c_id');
		$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();
        
        //load the view
        $this->load->view('candidate/header1',$data);
        $this->load->view('candidate/featuredJobsList', $data);
        $this->load->view('candidate/footer1');
    	}
 
	}
/*
* This function is use for lisiting all feature jobs which is currently/recently active.
*/
    function ajaxPaginationData_1(){
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        $sortBy_ca = $this->input->post('sortBy_ca');
        /*$quali_new = $this->input->post('quali_new');*/
        $job_type_new = $this->input->post('job_type_new');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        if(!empty($sortBy_ca)){
            $conditions['search']['sortBy_ca'] = $sortBy_ca;
        }
        /*if(!empty($quali_new)){
            $conditions['search']['quali_new'] = $quali_new;
        }*/
        if(!empty($job_type_new)){
            $conditions['search']['job_type_new'] = $job_type_new;
        }
        
        //total rows count
        $totalRec = count($this->post_1->getRows($conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'candidate/ajaxPaginationData_1';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->post_1->getRows($conditions);
        
        //load the view
        $this->load->view('candidate/ajax-pagination-data_1', $data, false);
    }
    
/*
* This function is use for exists from current session.
*/
	public function logout(){

		if($this->session->has_userdata('c_id') != ''){
			$this->session->sess_destroy();

			redirect(base_url('welcome'));
		}

		redirect(base_url('welcome'));
	}

	public function applied_jobs(){

		$candidate_id = $this->session->userdata('c_id');

			if($candidate_id !=0){
				$data['result'] = $this->db->select('*,applied_jobs.action,job_title')->from('applied_jobs')
				->where('c_id',$candidate_id)
				->join('job_posts','applied_jobs.j_id = job_posts.j_id')	
				->order_by('a_id','DESC')->get()->result_array();

			$data['profile'] = $this->db->select('*')->from('candidates')->where('c_id',$candidate_id)->get()->result_array();

				$this->load->view('candidate/header1',$data);
				$this->load->view('candidate/applied_jobs',$data);
				$this->load->view('candidate/footer1');
			}
			else
			{
				redirect(base_url('welcome'));
			}
	}

}
