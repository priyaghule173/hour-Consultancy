<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportExcel extends CI_Controller {

 function __construct()
 {
  parent::__construct();
  $this->load->database();
 }
 

 public function exportExcelData($records)
 {
  $heading = false;
        if (!empty($records))
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
            }
 }
/*
* This function is use for feach data of all job applied candidates.
*/
 public function fetchDataFromTable()
 {

if(isset($_POST['download_data']))
    {
$e_list = $this->input->post('select_can');
  $dataToExports = [];

foreach ($e_list as $value) {
  

$query = $this->db->select('*')->from('applied_jobs')->join('candidates','applied_jobs.c_id=candidates.c_id')->join('job_posts','job_posts.j_id=applied_jobs.j_id')->where('a_id',$value)->get();
// fetch Data from table
  $allData = $query->result_array();  // this will return all data into array
  foreach ($allData as $data) {
   $arrangeData['Job Id'] = $data['j_id'];
   $arrangeData['Candidate Id'] = $data['c_id'];
   $arrangeData['Employee Id'] = $data['e_id'];
   $arrangeData['Job Title'] = $data['job_title'];
   $arrangeData['Company Name'] = $data['company_name'];
   $arrangeData['Qualification Required'] = $data['qualification_required'];
   $arrangeData['Job Post Employee Name'] = $data['job_post_by_emp_name'];
   $arrangeData['Job Role'] = $data['job_role'];
   $arrangeData['Sub Roles'] = $data['sub_roles'];
   $arrangeData['Job Post Date'] = $data['job_post_date'];
   $arrangeData['Job Type'] = $data['job_type'];
   $arrangeData['Minimum Salary'] = $data['min_sal'];
   $arrangeData['Maximum Salary'] = $data['max_sal'];
   $arrangeData['Minimum Experience'] = $data['min_exp'];
   $arrangeData['Maximum Experience'] = $data['max_exp'];
   $arrangeData['City'] = $data['city'];
   $arrangeData['Localities'] = $data['localities'];
   $arrangeData['Description'] = $data['description'];
   $arrangeData['Applied Date'] = $data['applied_date'];
   $arrangeData['Action'] = $data['action'];
   $arrangeData['First Name'] = $data['first_name'];
   $arrangeData['Middle Name'] = $data['middle_name'];
   $arrangeData['Last Name'] = $data['last_name'];
   $arrangeData['Phone'] = $data['phone'];
   $arrangeData['City'] = $data['city'];
   $arrangeData['Address'] = $data['address'];
   $arrangeData['Email Id'] = $data['email_id'];
   $arrangeData['Highest Qualification'] = $data['highest_qualification'];
   $arrangeData['Skills'] = $data['skills'];
   $arrangeData['Resume'] = $data['resume'];
   $arrangeData['Profile Photo'] = $data['profile_photo'];
   $dataToExports[] = $arrangeData;
  }
}  // set header
  $filename = "job_applied_data.xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }
 }
/*
* This function is use for feach data of all candidate who register on this site.
*/
 public function fetchCandidateData()
 {
  $e_list = $this->input->post('select_candi');
  $dataToExports = [];
foreach ($e_list as $value) { 

  $query =$this->db->Select('*')->from('candidates')->where('c_id',$value)->get(); // fetch Data from table
  $allData = $query->result_array();  // this will return all data into array
  foreach ($allData as $data) {
   $arrangeData['Candidate Id'] = $data['c_id'];
   $arrangeData['First Name'] = $data['first_name'];
   $arrangeData['Middle Name'] = $data['middle_name'];
   $arrangeData['Last Name'] = $data['last_name'];
   $arrangeData['Phone'] = $data['phone'];
   $arrangeData['Address'] = $data['address'];
   $arrangeData['Email Id'] = $data['email_id'];
   $arrangeData['Password'] = $data['password'];
   $arrangeData['Highest Qualification'] = $data['highest_qualification'];
   $arrangeData['Skills'] = $data['skills'];
   $arrangeData['Resume'] = $data['resume'];
   $arrangeData['Profile Pic'] = $data['profile_photo'];
   $arrangeData['Active'] = $data['active'];
   $arrangeData['Hash'] = $data['hash'];
   $dataToExports[] = $arrangeData;
  } 
}
  // set header
  $filename = "candidatesdata.xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }
 
/*
* This function is use for feach data of all employers job posted data .
*/
 public function fetch_Job_Post_Data()
 {

  $e_list = $this->input->post('select_job');
  $dataToExports = [];
foreach ($e_list as $value) { 

  $query = $this->db->select('*')->from('job_posts')->where('j_id',$value)->get(); // fetch Data from table
 
  $allData = $query->result_array();  // this will return all data into array
  foreach ($allData as $data) {
   $arrangeData['Job Id'] = $data['j_id'];
   $arrangeData['employee Id'] = $data['job_post_by_emp_id'];
   $arrangeData['Subscription Package Name'] = $data['Package_type'];
   $arrangeData['Employee Name'] = $data['job_post_by_emp_name'];
   $arrangeData['Job Title'] = $data['job_title'];
   $arrangeData['Company Name'] = $data['company_name'];
   $arrangeData['Qualification Required'] = $data['qualification_required'];
   $arrangeData['Job Role'] = $data['job_role'];
   $arrangeData['Sub Role'] = $data['sub_roles'];
   $arrangeData['Job Post Date'] = $data['job_post_date'];
   $arrangeData['Approved Job Post Date'] = $data['approved_job_post_date'];
   $arrangeData['Job Post Expire Date'] = $data['job_post_expire_date'];
   $arrangeData['Job Type'] = $data['job_type'];
   $arrangeData['Minimum Salary'] = $data['min_sal'];
   $arrangeData['Maximum Salary'] = $data['max_sal'];
   $arrangeData['City'] = $data['city'];
   $arrangeData['Localities'] = $data['localities'];
   $arrangeData['Minimum Experience'] = $data['min_exp'];
   $arrangeData['Maximum Experience'] = $data['max_exp'];
   $arrangeData['Description'] = $data['description'];
   $arrangeData['Action'] = $data['action'];
   $dataToExports[] = $arrangeData;
  }
}
  // set header
  $filename = "jobpostdata.xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }
/*
* This function is use for feach data of all employers who is register on site.
*/
 public function fetchEmployeeData()
 {
 $e_list = $this->input->post('select_emp');

  $dataToExports = [];
foreach ($e_list as $value) { 

  /*$query =$this->db->get('applied_jobs');*/
  $query =$this->db->Select('*')->from('employer')->where('e_id',$value)->get(); // fetch Data from table
  $allData = $query->result_array();  // this will return all data into array
  foreach ($allData as $data) {
   $arrangeData['Employer Id'] = $data['e_id'];
   $arrangeData['First Name'] = $data['first_name'];
   $arrangeData['Middle Name'] = $data['middle_name'];
   $arrangeData['Last Name'] = $data['last_name'];
   $arrangeData['Phone'] = $data['phone'];
   $arrangeData['Address'] = $data['address'];
   $arrangeData['Email Id'] = $data['email_id'];
   $arrangeData['Password'] = $data['password'];
   $arrangeData['Company Name'] = $data['company_name'];
   $arrangeData['Company Address'] = $data['company_address'];
   $arrangeData['Comapny Email Id'] = $data['company_email_id'];
   $arrangeData['Company Website'] = $data['company_website'];
   $arrangeData['Current Salary'] = $data['current_salary'];
   $arrangeData['Experience'] = $data['experience'];
   $arrangeData['Designation'] = $data['designation'];
   $arrangeData['Date Created'] = $data['date_created'];
   $arrangeData['Active Date'] = $data['active_date'];
   $arrangeData['Max Free Job Posts'] = $data['max_free_job_posts'];
   $arrangeData['Total Fress Job Posted'] = $data['total_free_job_posted'];
   $arrangeData['Profile Picture'] = $data['profile_pic'];
   $arrangeData['Active'] = $data['active'];
   $dataToExports[] = $arrangeData;
  }
}
  // set header
  $filename = "employersdata.xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }

 
}
