<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	function __construct() {
		parent::__construct();
		$this->load->model('post');
		$this->load->model('post_1');
		$this->load->library('Ajax_pagination');
		$this->perPage = 10;
	}
	public function index()
	{
	    /*	$this->db->query("UPDATE job_posts SET action = '3' WHERE job_post_expire_date LIKE '%$cur_date%' OR job_post_expire_date < '$cur_date' AND action = '1'");*/

		$data['blog_data'] = $this->db->select('*')->from('blog_posting_tbl')->order_by('id','desc')->limit('3')->get()->result_array();
		$this->load->view('header1');
		$this->load->view('index',$data);
		$this->load->view('footer1');

	}

	public function register()
	{
		$this->load->view('header1');
		$this->load->view('register_candidate');
		$this->load->view('footer1');
	}
/*
* this function is use for employer create profile on site. 
*/
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
			$data['location'] = $this->input->post('location');
			$data['password'] = sha1($this->input->post('password'));//password encryption
			$data['company_name'] = $this->input->post('company_name');
			$data['company_address'] = $this->input->post('company_address');
			$data['company_email_id'] = $this->input->post('company_email_id');
			$data['company_website'] = $this->input->post('company_website');
			$data['company_industry'] = $this->input->post('company_industry');
			$data['about_company'] = $this->input->post('about_company');
			$data['date_created'] = date('Y-m-d h:m:s');//creation of account date
			$data['max_free_job_posts'] = 10;//for free 10 job posts allowed

			if(!empty($_FILES['profile_pic']['name']))
			{
				$image=basename($_FILES['profile_pic']['name']);
				$image=str_replace(' ','|',$image);
				$type = explode(".",$image);
				$type = $type[count($type)-1];
//				$profile_name = "profile_pic_".$sql[0]['e_id'];
				$profile_name = "profile_pic_".uniqid(rand());
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
}
$this->db->insert('employer',$data);

$message = '<div class="alert alert-success">Registeration done.Your Account Approval Is Pending Please Wait for Verification of your account . You will receive a mail.</div>';
$this->session->set_flashdata('message',$message);
redirect(base_url('welcome/register_employer'));
}
else
{
	$this->load->view('header1');
	$this->load->view('register_employer1');
	$this->load->view('footer1');		
}
}
/*
* this function is use to view candidate login page. 
*/
public function login()
{
    if(!empty($this->session->userdata('newjob_id')))
    {
      $newjob_id = $this->session->userdata('newjob_id');
       
      redirect(base_url('candidate/jobDetails?j_id='.$newjob_id));
    }else{
    	$this->load->view('header1');
    	$this->load->view('login1');
    	$this->load->view('footer1');
    }
}
/*
* this function is use to view employer login page. 
*/
public function loginR()
{
	$this->load->view('header1');
	$this->load->view('loginR1');
	$this->load->view('footer1');
}
/*
* this function is use to view admin login page. 
*/
public function login_admin()
{
	$this->load->view('header1');
	$this->load->view('login_admin1');
	$this->load->view('footer1');
}
/*
* this function is use to validate admin profile. 
*/
public function check_admin_login()
{
	$data['email_id'] = $this->input->post('email_id');
	$data['password'] = $this->input->post('password');
	$sql = $this->db->select('*')->from('admin')->where($data)->get()->result_array();

		/*if($sql[0]['email_id'] !== $this->input->post('email_id'))
		{
			$message = '<div class="alert alert-danger">Email Id Not Registered</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login_admin'));
		}
		else if($sql[0]['password'] !== $this->input->post('password')){
 		 
 		 $message = '<div class="alert alert-danger">Password Is Wrong</div>';
		 $this->session->set_flashdata('message',$message);
		 redirect(base_url('welcome/login_admin'));

		}*/
		
		if(!empty($sql))
		{
			$admin['data'] = $this->db->select('*')->from('admin')->where($data)->get()->row();
			$sessionset = $this->SetDataInSession_admin($admin['data']);
			if($sessionset == true){
				$this->session->set_flashdata('request','fromlogin');
				redirect(base_url('admin/adminDashboard'));	
			}
		}
		else
		{
			$message = '<div class="alert alert-danger">Invalid Email Id and Password </div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login_admin'));	
		}
		

	}
/*
* this function is use to validate employer profile. 
*/
	public function check_employer_login()
	{
		$data['email_id'] = $this->input->post('email_id');
		$data['password'] = sha1($this->input->post('password'));

		$data_e['email_id'] = $this->input->post('email_id');
		$data_p['password'] = sha1($this->input->post('password'));
		
		$sql_email = $this->db->select('*')->from('employer')->where($data_e)->get()->result_array();
		if(!empty($sql_email))
		{
    		$sql = $this->db->select('*')->from('employer')->where($data)->get()->result_array();
    		if(!empty($sql))
    		{
    			if($sql[0]['active'] == 0)
    			{
    				$message = '<div class="alert alert-success">Your Account Is Still Pending Approval. Please Wait for Verification of your account . You will receive a mail.</div>';
    				$this->session->set_flashdata('message',$message);
    				redirect(base_url('welcome/loginR'));
    			}
    			if($sql[0]['active'] == 1)
    			{
    				$emp['data'] = $this->db->select('*')->from('employer')->where($data)->get()->row();
    				$sessionset = $this->SetDataInSession($emp['data']);
    				if($sessionset == true){
    					$this->session->set_flashdata('request','fromlogin');
    					redirect(base_url('employer/empDashboard'));	
    				}
    			}
    			if($sql[0]['active'] == 2)
    			{
    				$message = '<div class="alert alert-success">Your Account Is Rejected. Please Contact For More Info.</div>';
    				$this->session->set_flashdata('message',$message);
    				redirect(base_url('welcome/loginR'));	
    			}	
    		}
    		else
    		{
    			$message = '<div class="alert alert-success">InValid Password .</div>';
    			$this->session->set_flashdata('message',$message);
    			redirect(base_url('welcome/loginR'));	
    		}
		}
		else
		{
    			$message = '<div class="alert alert-success">InValid Email Id .</div>';
    			$this->session->set_flashdata('message',$message);
    			redirect(base_url('welcome/loginR'));	
		}
		

	}

	private function SetDataInSession_admin($data){
		$this->session->set_userdata('ADMIN_ID',$data->id);
		$this->session->set_userdata('EMAIL_ID',$data->email_id);
		return true;
	}

	private function SetDataInSession($data){
		$this->session->set_userdata('EMP_ID',$data->e_id);
		$this->session->set_userdata('FIRST_NAME',$data->first_name);
		$this->session->set_userdata('LAST_NAME',$data->last_name);
		$this->session->set_userdata('EMAIL_ID',$data->email_id);
		
		return true;
	}
	public function about(){
		$this->load->view('header');
		$this->load->view('about_us');
		$this->load->view('footer');
	}
	
		public function about_us_new(){
		$this->load->view('header1');
		$this->load->view('about_us_new');
		$this->load->view('footer1');
	}
	public function giving_back()
	{
		$this->load->view('header1');
		$this->load->view('giving_back');
		$this->load->view('footer1');
	}
	
	public function candidate()
	{
		$this->load->view('header1');
		$this->load->view('candidate');
		$this->load->view('footer1');
	}
	
		public function employee()
	{
		$this->load->view('header1');
		$this->load->view('employee');
		$this->load->view('footer1');
	}
	
	public function hr_mgmt()
	{
		$this->load->view('header1');
		$this->load->view('hr_mgmt');
		$this->load->view('footer1');
	}
	
	public function quick_upload()
	{
		$this->load->view('header1');
		$this->load->view('quick_upload');
		$this->load->view('footer1');
	}

	
	
	public function comingsoon()
	{
		$this->load->view('header1');
		$this->load->view('comingsoon');
		$this->load->view('footer1');
	}
	
		public function privacypolicy()
	{
		$this->load->view('header1');
		$this->load->view('privacypolicy');
		$this->load->view('footer1');
	}
	
	public function workwithus()
	{
		$this->load->view('header1');
		$this->load->view('workwithus');
		$this->load->view('footer1');
	}

	public function whyhour()
	{
		$this->load->view('header1');
		$this->load->view('whyhour');
		$this->load->view('footer1');
	}

	public function myjobseeker()
	{
			$this->load->view('header1');
		$this->load->view('jobseeker');
		$this->load->view('footer1');
	}
	
/*
* This function is use to search/find job according to user request.
* This shows search result.
*/
	public function findJob(){
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
			//redirect(base_url('candidates/jobs_list_new'));
		
		$totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'welcome/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
		 //get the posts data
        $data['posts'] = $this->post->getRows(array('limit'=>$this->perPage));
       
			$this->load->view('header1');
			$this->load->view('job_listing',$data);
			$this->load->view('footer1');
		}else
		{
        $data = array();
        
        //total rows count
        $totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'welcome/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->post->getRows(array('limit'=>$this->perPage));
        
        //load the view
        $this->load->view('header1');
        $this->load->view('job_listing', $data);
        $this->load->view('footer1');
    	}
    }
/*
* This function is use to search/find job according to user request.
* This shows search result.
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
        $config['base_url']    = base_url().'welcome/ajaxPaginationData';
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
        $this->load->view('ajax-pagination-data', $data, false);
    }

/*	public function jobListing(){
		$this->load->view('header');
		$this->load->view('job_listing');
		$this->load->view('footer');
	}*/
/*
* This function is use to show job details.
*/
	public function jobDetails(){
		$data['j_id'] = $this->input->get('j_id');
		$data['result'] = $this->db->select('*')->from('job_posts')->where($data)->get()->result_array();
	
		$this->load->view('candidate/header1');
		$this->load->view('job_details',$data);
		$this->load->view('candidate/footer1');
	}

/*
* This function is use to search/find  fetaure job according to user request.
* This shows search result of feature job.
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
        $config['base_url']    = base_url().'welcome/ajaxPaginationData_1';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
		 //get the posts data
        $data['posts'] = $this->post_1->getRows(array('limit'=>$this->perPage));
		
        //load the view
        $this->load->view('header1');
        $this->load->view('featuredJobsList', $data);
        $this->load->view('footer1');
		}
		else
		{
        $data = array();
        
        //total rows count
        $totalRec = count($this->post_1->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'welcome/ajaxPaginationData_1';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->post_1->getRows(array('limit'=>$this->perPage));
		
        //load the view
        $this->load->view('candidate/header1');
        $this->load->view('featuredJobsList', $data);
        $this->load->view('candidate/footer1');
    	}
 
	}

/*
* This function is use to search/find  fetaure job according to user request.
* This shows search result of feature job.
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
       /* if(!empty($quali_new)){
            $conditions['search']['quali_new'] = $quali_new;
        }*/
        if(!empty($job_type_new)){
            $conditions['search']['job_type_new'] = $job_type_new;
        }
        
        //total rows count
        $totalRec = count($this->post_1->getRows($conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'welcome/ajaxPaginationData_1';
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
        $this->load->view('ajax-pagination-data_1', $data, false);
    }
    
	public function contact(){
		$this->load->view('header');
		$this->load->view('contact_us');
		$this->load->view('footer');
	}
	
	public function contact_us_new()
	{
	    $this->load->view('header1');
		$this->load->view('contact_us_new');
		$this->load->view('footer1');
	}
	
	public function ourCompany(){
		$this->load->view('header');
		$this->load->view('our_company');
		$this->load->view('footer');
	}

	public function empServices(){
		$this->load->view('header');
		$this->load->view('employer_services');
		$this->load->view('footer');
	}

	public function ourCommunity(){
		$this->load->view('header');
		$this->load->view('our_community');
		$this->load->view('footer');
	}

	public function jobseeker(){
		$this->load->view('header');
		$this->load->view('jobseeker_services');
		$this->load->view('footer');
	}

	public function faq(){
		$this->load->view('header');
		$this->load->view('faq');
		$this->load->view('footer');
	}

	public function lookingToHire(){
		$this->load->view('header');
		$this->load->view('looking_to_hire');
		$this->load->view('footer');
	}
	public function hire_form(){

		$first_name = $this->input->post('firstName');
		$last_name = $this->input->post('lastName');
		$email = $this->input->post('email');
		$organization_name = $this->input->post('organization');
		$hire_data = array('firstName'=>$first_name,'lastName'=>$last_name,'email'=>$email,'organization'=>$organization_name);

		$this->session->set_flashdata('hire_data',$hire_data);
		redirect(base_url('welcome/looking_to_hire_form?'.http_build_query($hire_data)));
	}
	public function looking_to_hire_form(){
		$first_name = $this->input->get('firstName');
		$last_name = $this->input->get('lastName');
		$email = $this->input->get('email');
		$organization_name = $this->input->get('organization');
		$data['hire_data'] = array('firstName'=>$first_name,'lastName'=>$last_name,'email'=>$email,'organization'=>$organization_name);

		$this->load->view('header');
		$this->load->view('looking_to_hire_form',$data);
		$this->load->view('footer');
	}
/*
* This function is use to send mail to website owner for canidate hiring / job posting.
*/
	public function mail_hire_info(){

		$first_name = $this->input->post('firstName');
		$last_name = $this->input->post('lastName');
		$email = $this->input->post('email');
		$organization = $this->input->post('organization');
		$job_title = $this->input->post('job_title');
		$job_type = $this->input->post('job_type');
		$position = $this->input->post('position');
		$web_url = $this->input->post('web_url');

		$to ="chetankhairnar91@gmail.com";
		$subject = "Hire Requirements";
	    $message = "
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <p>This email is to hire candidates</p>
        <table>
        <tr>
        <th>Name</th>
		<th>Organization Name</th>
		<th>Job Title</th>
		<th>Job Type</th>
        <th>Position</th>
        <th>Website Url</th>
        </tr>
        <tr>
        <td>".$first_name." ".$last_name."</td>
        <td>".$organization."</td>
        <td>".$job_title."</td>
        <td>".$job_type."</td>
        <td>".$position."</td>
        <td>".$web_url."</td>
        </tr>
        </table>
        </body>
        </html>
        ";

		// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: ' .$email. "\r\n";

        mail($to,$subject,$message,$headers);

        $message = '<div class="alert alert-success">Your Requirements Send Successfully. We Will Reach You Soon...</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/lookingToHire'));
	}
	public function whyAlignwithu(){
		$this->load->view('header');
		$this->load->view('why_align_with_you');
		$this->load->view('footer');
	}

	public function article(){
		$data['blog_data'] = $this->db->select('*')->from('blog_posting_tbl')->order_by('id','desc')->limit('8')->get()->result_array();
		$this->load->view('header');
		$this->load->view('articles',$data);
		$this->load->view('footer');
	}
	public function contact_us()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$description = $this->input->post('message');

		$to ="chetan.khairnar91@gmail.com";
		$subject = "Contact";
	    $message = "
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <p>This email is for contacting with you</p>
        <table>
        <tr>
        <th>Name</th>
		<th>Email</th>
		<th>Mobile Number</th>
		<th>Description</th>
        </tr>
        <tr>
        <td>".$name."</td>
        <td>".$email."</td>
        <td>".$phone."</td>
        <td>".$description."</td>
        </tr>
        </table>
        </body>
        </html>
        ";

		// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: ' .$email. "\r\n";

        mail($to,$subject,$message,$headers);

        $message = '<div class="alert alert-success">Your Message Send Successfully. We Will Reach You Soon...</div>';
			$this->session->set_flashdata('message',$message);
			//redirect(base_url('welcome/contact_us'));		
			
			redirect(base_url('welcome/contact_us_new'));

		/*if(isset($_POST['submit'])){

			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['description'] = $this->input->post('message');

			$insert = $this->db->insert('contact_us',$data);

			$message = '<div class="alert alert-success">Your Data Submit Successfully!</div>';
			$this->session->set_flashdata('message',$message);

			redirect(base_url('welcome/contact_us'));

		}else{
			$this->load->view('header');	
			$this->load->view('contact_us');	
			$this->load->view('footer');	
		}*/
	}
/*
* This function is use to send mail to candidate for new password resetting.
*/	
	public function candidate_FP()
	{
		$email = $this->input->post('email');
    
        $check = $this->db->get_where('candidates',array('email_id'=>$email))->result_array();
        if(!empty($check)){
        $url = base_url('welcome/resetPassword?c_id='.$check[0]['c_id']);        
		$to =$email;
		$subject = "Reset Password ";
	    $message = "
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <p>Please Find below link to change Password</p>
        <table>
        <tr>
        <th>Link</th>
		</tr>
        <tr>
        <td>".$url."</td>
        </tr>
        </table>
        </body>
        </html>
        ";

		// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From : chetan.khairnar91@gmail.com'."\r\n";

        if(mail($to,$subject,$message,$headers)){

        $message = '<div class="alert alert-success">Please Check Your Email To Reset Password...</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login'));
            }
        }
        else
        {
            $message = '<div class="alert alert-danger">Email Id Not Registered..Please Signup</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login'));		
        }

	}
	
/*
* This function is use to send mail to employer for new password resetting.
*/
	public function employee_FP()
	{
		$email = $this->input->post('email');
    
        $check = $this->db->get_where('employer',array('email_id'=>$email))->result_array();
        if(!empty($check)){
        $url = base_url('welcome/resetPasswordEmp?e_id='.$check[0]['e_id']);        
		$to =$email;
		$subject = "Reset Password ";
	    $message = "
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <p>Please Find below link to change Password</p>
        <table>
        <tr>
        <th>Link</th>
		</tr>
        <tr>
        <td>".$url."</td>
        </tr>
        </table>
        </body>
        </html>
        ";

		// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From : chetan.khairnar91@gmail.com'."\r\n";

        if(mail($to,$subject,$message,$headers)){

        $message = '<div class="alert alert-success">Please Check Your Email To Reset Password...</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/loginR'));
            }
        }
        else
        {
            $message = '<div class="alert alert-danger">Email Id Not Registered..Please Signup</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/loginR'));		
        }
	}
/*
* This function is use to send mail to admin for new password resetting.
*/
	public function admin_FP()
	{
		$email = $this->input->post('email');
    
        $check = $this->db->get_where('admin',array('email_id'=>$email))->result_array();
        if(!empty($check)){
        $url = base_url('welcome/resetPasswordAdmin?a_id='.$check[0]['id']);        
		$to =$email;
		$subject = "Reset Password ";
	    $message = "
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <p>Please Find below link to change Password</p>
        <table>
        <tr>
        <th>Link</th>
		</tr>
        <tr>
        <td>".$url."</td>
        </tr>
        </table>
        </body>
        </html>
        ";

		// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From : chetan.khairnar91@gmail.com'."\r\n";

        if(mail($to,$subject,$message,$headers)){

        $message = '<div class="alert alert-success">Please Check Your Email To Reset Password...</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login_admin'));
            }
        }
        else
        {
            $message = '<div class="alert alert-danger">Email Id Not Registered..Please Signup</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login_admin'));		
        }
	}
/*
* This function is use to candidate new password resetting.
*/
	public function resetPassword()
	{
	    if(isset($_POST['reset_password'])){
	        
	    $update['password'] = sha1($this->input->post('password'));//password encryption
	    
	    $this->db->where('c_id',$this->input->get('c_id'));
	    $this->db->update('candidates',$update);

            $message = '<div class="alert alert-success">Password Reset Successfully...</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login'));
			
    	}else{
    	    $this->load->view('header');
    		$this->load->view('resetPassword');
    		$this->load->view('footer');	    
	    }
	}
	/*
* This function is use to employer new password resetting.
*/
	public function resetPasswordEmp()
	{
	    if(isset($_POST['reset_password'])){
	        
	    $update['password'] = sha1($this->input->post('password'));//password encryption
	    
	    $this->db->where('e_id',$this->input->get('e_id'));
	    $this->db->update('employer',$update);

            $message = '<div class="alert alert-success">Password Reset Successfully...</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/loginR'));
			
    	}else{
    	    $this->load->view('header');
    		$this->load->view('resetPasswordEmp');
    		$this->load->view('footer');	    
	    }
	}
/*
* This function is use to admin new password resetting.
*/
	public function resetPasswordAdmin()
	{
	    if(isset($_POST['reset_password'])){
	        
	    $update['password'] = $this->input->post('password');//password encryption
	    
	    $this->db->where('id',$this->input->get('a_id'));
	    $this->db->update('admin',$update);

            $message = '<div class="alert alert-success">Password Reset Successfully...</div>';
			$this->session->set_flashdata('message',$message);
			redirect(base_url('welcome/login_admin'));
			
    	}else{
    	    $this->load->view('header');
    		$this->load->view('resetPasswordAdmin');
    		$this->load->view('footer');	    
	    }
	}
	public function check_email_exists()
	{
	    $check = $this->db->get_where('candidates',array('email_id'=>$this->input->post('can_email')))->result_array();
	    $check_emp = $this->db->get_where('employer',array('email_id'=>$this->input->post('can_email')))->result_array();
	    
	    if(empty($check))
	    {
	       if(empty($check_emp))
    	       $arr = array('flag'=>'0');
    	   else
    	       $arr = array('flag'=>'1');
	   }
	   else
    	{
    	       $arr = array('flag'=>'1');
    	}   
	   //add the header here
	    header('Content-Type: application/json');
	    echo json_encode($arr);
	}
	
	public function check_emp_email_exists()
	{
	    $check = $this->db->get_where('employer',array('email_id'=>$this->input->post('can_email')))->result_array();
	    $check_can = $this->db->get_where('candidates',array('email_id'=>$this->input->post('can_email')))->result_array();
	    
	    if(empty($check))
	    {
    	    if(empty($check_can))
    	       $arr = array('flag'=>'0');
    	   else
	           $arr = array('flag'=>'1');
	            
	    }
	   else
	       $arr = array('flag'=>'1');
	        
	   //add the header here
	    header('Content-Type: application/json');
	    echo json_encode($arr);
	}
/*
* This function is use to exits from current session.
*/
	public function logout(){
		
		if($this->session->has_userdata('EMP_ID') != '' || $this->session->has_userdata('ADMIN_ID') != 0 || $this->session->has_userdata('c_id') != 0){
			$this->session->sess_destroy();	
			redirect(base_url('welcome'));
		}
		redirect(base_url('welcome'));
	}
}
