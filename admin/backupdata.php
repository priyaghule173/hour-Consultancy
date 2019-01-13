<link rel="stylesheet" href="https:/ / maxcdn.bootstrapcdn.com / bootstrap / 3.3.7 / css / bootstrap.min.css ">
  <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" > </script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<!-- <div class="inner-heading">
  <div class="container">
    <h3>Admin Dashboard</h3>
  </div>
</div> -->

 <div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Backup Data</h1>
</div>

<?php $this->load->view('admin/demo'); ?>


<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 navigation">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
           <!--  <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>images/profile.png" alt="">
                            </a>
                            <figcaption>
                                <h2 style="font-size: 18px;"><?= $this->session->userdata('EMAIL_ID')?></h2>
                            </figcaption>
                        </figure> -->

                       <ul>
                          <li >
                            <a href="<?= base_url('admin/adminDashboard');?>">
                              <i class="fa fa-dashboard"></i>
                              Dashboard
                            </a>
                          </li>

                                          <?php
                        $Pending = $this->db->select('count(e_id) as total')->from('employer')->where('active','0')->get()->result_array();
                         ?>
                        <li>
                        		<a href="<?= base_url('admin/manageEmp');?>">
                        			<i class="fa fa-users"></i>
                              Manage Employer <span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $Pending[0]['total']?></span>
                        		</a>
                        	</li>
                          <?php 
                          $total_fj = $this->db->get_where('job_posts',array('action'=>'1','request_fj'=>'1','featured_job'=>'0'))->result_array();
                          ?>
                          <li>
                            <a href="<?= base_url('admin/featuredJob');?>">
                             <i class="fa fa-user-o"></i>
                             Featured Job<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= count($total_fj)?></span>
                           </a>
                         </li>
                          <li>
                            <a href="#" data-toggle="dropdown">
                              <i class="fa fa-address-card-o"></i>
                              Packages
                              <ul class="dropdown-menu">
                                        <li>
                                              <a href="<?=base_url('admin/pendingPlatinumPackEmp')?>"><i class="fa fa-trophy"></i>Platinum Pack</a>
                                        </li>
                                        <li>
                                              <a href="<?=base_url('admin/pendingGoldPackEmp')?>"><i class="fa fa-dollar"></i>Gold Pack</a>
                                        </li>
                                    </ul>
                            </a>
                          </li>
                             <?php 
                          $total_fj = $this->db->get_where('job_posts',array('action'=>'1','request_fj'=>'1','featured_job'=>'0'))->result_array();
                          ?>
                          <li>
                            <a href="<?= base_url('admin/featuredJob');?>">
                             <i class="fa fa-user-o"></i>
                             Featured Job<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= count($total_fj)?></span>
                           </a>
                         </li>
                          <li>
                            <a href="<?= base_url('admin/createJobRole');?>">
                              <i class="fa fa-briefcase"></i>
                              Add Specialization
                            </a>
                          </li>

                          <li>
                            <a href="<?= base_url('admin/candidateSection');?>">
                              <i class="fa fa-search"></i>
                              Candidate Section
                            </a>
                          </li>
                        <li>
                      <?php
                  $unreadmails = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid','admin')->where('user_type','2')->where('flag','0')->get()->result_array();
                         ?>
                              <a href="<?=base_url('admin/mailbox')?>"><i class="fa fa-envelope"></i> Mailbox <span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $unreadmails[0]['unread']?></span></a>
                        </li>
                          <li class="active">
                            <a href="<?=base_url('admin/backupdata')?>">
                              <i class="fa fa-database"></i>
                              Backup Data
                            </a>
                          </li>

                          <li>
                            <a href="<?= base_url('admin/changePassword');?>">
                              <i class="fa fa-cog"></i>
                              Change Password
                            </a>
                          </li>

                          <li>
                            <a href="#" data-toggle="dropdown">
                              <i class="fa fa-address-card-o"></i>
                                  Blog Posting
                              <ul id="subclass" class="dropdown-menu">
                                        <li>
                                              <a href="<?=base_url('admin/add_blog')?>"><i class="fa fa-trophy"></i>Add Blog</a>
                                        </li>
                                      <li>
                                              <a href="<?=base_url('admin/manage_blog')?>"><i class="fa fa-dollar"></i>Manage Blog</a>
                                      </li>
                                </ul>
                            </a>
                          </li>
                          <li>
                            <a href="<?=base_url('welcome/logout')?>">
                              <i class="fa fa-sign-out"></i>
                              Logout
                            </a>
                        </li>
                 </ul>
          </div>
        </div>
      </div>

      <div class="col-md-9 main-page">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-box-section">
            <div class="careerfy-profile-title">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#TAB_1">Applied Jobs Data</a></li>
                <li><a data-toggle="tab" href="#TAB_2">Job Post Data</a></li>
                <li><a data-toggle="tab" href="#TAB_3">Employee Data</a></li>
                <li><a data-toggle="tab" href="#TAB_4">Candidate Data</a></li>
              </ul>
            </div>

             <!-- tab start -->
                <div class="tab-content">
                  <!-- tab first start -->
                    <div id="TAB_1" class="tab-pane fade in active">
                      <div class="row">
                        <div class="col-md-12 bg-white padding-2">
                          <h3 style="font-size: 20px; margin-bottom: 10px;">Job List</h3> 
                          <div class="row margin-top-20">
                            <div class="col-md-12">
                              <div class="box-body table-responsive no-padding">
                                <form method="post" action="<?=base_url('ExportExcel/fetchDataFromTable')?>">
                                  <input type="button" id="download_data" style="margin-right:10px; padding: 10px 10px;" class="careerfy-employer-profile-submit" name="download_data" value="Download Data">
                                      <span style="float:right;">
                                        <label>Sort</label>
                                        <select class="form-control" name="empdata" id="empdata">
                                            <option value="">Select Data to Sort</option>
                                            <option value="1">Recent 1 Month Data</option>
                                            <option value="2">Recent 2 Month Data</option>
                                            <option value="3">Recent 3 Month Data</option>
                                            <option value="4">All Data</option>
                                        </select>
                                      </span>

                                      <table id="example2" class="table table-hover">
                                                <thead>
                                                  <th class="active">
                                                  <input type="checkbox" class="select-all checkbox" name="select-all" />
                                                  </th>
                                                  <th>Details</th>
                                                </thead>
                                                <tbody>
                                                  <?php 
                                                      if(!empty($result)){
                                                        
                                                      foreach ($result as $row) {
                                                  ?>
                                                    <tr>
                                                      <td>
                                                       <input type="checkbox" class="select-item checkbox" name="select_can[]" value="<?=$row['a_id']?>" title="<?=$row['a_id']?>"/>
                                                       </td>
                                                  
                                                       <td>
                                                        
                                                        <div class="careerfy-applied-jobs">
                                                          <div class="row">
                                                            <div class="col-sm-12">
                                                              <div class="careerfy-candidate-default-wrap">
                                                               <!-- <figure><a href="#"><img style="width: 50px; height: 50px;" src="<?= base_url() ?>assets/uploads/images/<?php echo $row['profile_photo'] ?>" alt=""></a></figure>-->

                                                                <div class="row">
                                                                  <div class="col-sm-12" style="background: #ddd;padding: 10px;margin-top: -8px;margin-bottom: 10px;">
                                                                    <div class="col-sm-3">
                                                                      <h5 style="font-weight: bold;">Candidate</h5>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                      <h5 style="font-weight: bold;">Job Details</h5>
                                                                    </div>
                                                                  </div>
                                                                </div>

                                                                <div class="careerfy-candidate-default-text">

                                                                  <div class="col-sm-3 applied candidate-name">
                                                                    <h5><a href="#"><?=$row['first_name']." ".$row['middle_name']." ".$row['last_name']?></a> </h5>
                                                                  </div>

                                                                  <div class="col-sm-6 candidate-job-list">
                                                                    
                                                                    <ul>
                                                                      <li>
                                                                         <h4 style="font-size: 16px; font-weight: bold;"><a href="#">Job Title: <?=$row['job_title'];?></a> <i class="careerfy-icon careerfy-check-mark"></i></h4>
                                                                      </li>

                                                                      <li>
                                                                        <i class="careerfy-icon careerfy-envelope"></i> <a href="#" style="color: #333;">Company: <?php echo $row['company_name']; ?></a>
                                                                      </li>

                                                                      <li>
                                                                          <i class="fa fa-calendar" style="color: #13b5ea;"></i><span style="color: #777;"> Applied Date:</span> <?php echo $row['applied_date']; ?>
                                                                        </li>

                                                                        <li>  <i class="fa fa-calendar" style="color: #13b5ea;"></i><span style="color: #777;"> Job Post Date:</span> <?php echo $row['job_post_date']; ?>
                                                                      </li>
                                                                    </ul>
                                                                
                                                                  </div>

                                                                  <div class="col-sm-3">
                                                                    <ul>
                                                                      <li>
                                                                        <i class="fa fa-briefcase" style="color: #13b5ea;"></i> <span style="color: #777;">Job Role:</span> <?php echo $row['job_role']; ?>
                                                                      </li>
                                                                      <li>
                                                                        <i class="fa fa-briefcase" style="color: #13b5ea;"></i> <span style="color: #777;">Sub Role:</span> <?php echo $row['sub_roles']; ?>
                                                                      </li>
                                                                    </ul>

                                                                  </div>
                                                                  
                                                                </div>

                                                                <div class="row">
                                                                  <div class="col-sm-12" style="margin-top: 10px;">
                                                                    <div class="col-sm-4">
                                                                      <i class="fa fa-graduation-cap" style="font-size: 25px; color: #13b5ea"></i> Qualification: <?php echo $row['qualification_required']; ?> 
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                      <i class="fa fa-money" style="font-size: 25px; color: #13b5ea"></i> Salary: <?php echo $row['min_sal'] ."-".$row['max_sal']; ?>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                      <i class="fa fa-briefcase" style="font-size: 25px; color: #13b5ea"></i>
                                                                      Experience: <?php echo $row['min_exp'] ."-".$row['max_exp']; ?>year
                                                                    </div>

                                                                  </div>
                                                                </div>

                                                              </div>
                                                            </div>
                                                          </div>

                                                            
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                        
                                                      </td>
                                                     
                                                    </tr>
                                                  <?php
                                                            }}else
                                                            {
                                                                echo "No Jobs Applied Yet....";
                                                            }
                                                        ?>
                                                </tbody>                    
                                              </table>
                                </form>
                              </div>
                            </div>
                          </div>


                        </div>
                      </div>
                    </div>
                  <!--tab first ends-->

                  <!--tab second starts-->
                  <div id="TAB_2" class="tab-pane fade in ">
                    <div class="row">
                      <div class="col-md-12 bg-white padding-2">
                        <h3 style="font-size: 20px; margin-bottom: 10px;">Job Post List</h3>
                       
                        <div class="row margin-top-20">
                          <div class="col-md-12">
                            <div class="box-body table-responsive no-padding">
                              <form method="post" action="<?=base_url('ExportExcel/fetch_Job_Post_Data')?>">
                                <input type="button" id="download_data" style="margin-right:10px; padding: 10px 10px;" class="careerfy-employer-profile-submit" name="download_data" value="Download Data">
                                    <span style="float:right;">
                                      <label>Sort</label>
                                      <select class="form-control" name="empdata" id="empdata">
                                          <option value="">Select Data to Sort</option>
                                          <option value="1">Recent 1 Month Data</option>
                                          <option value="2">Recent 2 Month Data</option>
                                          <option value="3">Recent 3 Month Data</option>
                                          <option value="4">All Data</option>
                                      </select>
                                    </span>

                                     <table id="example3" class="table table-hover">
                                                <thead>
                                                  <th class="active">
                                                  <input type="checkbox" class="select-all checkbox" name="select-all" />
                                                  </th>
                                                  <th>Details</th>
                                                </thead>
                                                <tbody>
                                                  <?php 
                                                      if(!empty($result1)){
                                                        
                                                      foreach ($result1 as $value) {
                                                  ?>
                                                    <tr>
                                                      <td>
                                                       <input type="checkbox" class="select-item checkbox" name="select_job[]" value="<?=$value['j_id']?>" title="<?=$value['j_id']?>"/>
                                                       </td>
                                                  
                                                       <td>
                                                        <div class="careerfy-applied-jobs">
                                                            <ul class="careerfy-row">
                                                              
                                                                <li class="careerfy-column-12">
                                                                  <div class="careerfy-candidate-default-wrap">
                                                                    <div class="careerfy-candidate-default-text">
                                                                        <div class="careerfy-candidate-default-left">
                                                                            <h4>Job Title: <?=$value['job_title'];?> <i class="careerfy-icon careerfy-check-mark"></i></h4>
                                                                            <div class="row">
                                                                            <ul>
                                                                                <div class="row">
                                                                                <div class="col-sm-3 col-md-3 name-list">
                                                                              <li><i class="fa fa-envelope"></i> Company Name : <?php echo $value['company_name']; ?></li>
                                                                                </div><div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-calendar"></i>Job Post Expired Date: <?php echo $value['job_post_expire_date']; ?></li>
                                                                                </div><div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-graduation-cap"></i>Qualification Required: <?php echo $value['qualification_required']; ?></li>
                                                                                </div><div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-briefcase"></i> Job Role: <?php echo $value['job_role']; ?></li>
                                                                                </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-briefcase"></i> Sub Role: <?php echo $value['sub_roles']; ?></li>
                                                                                </div><div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-calendar"></i> Job Post Date: <?php echo $value['job_post_date']; ?></li>
                                                                                </div><div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-home"></i> Job Type: <?php echo $value['job_type']; ?></li>
                                                                                </div><div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-money"></i> Salary: <?php echo $value['min_sal'] ."-".$value['max_sal']; ?></li>
                                                                                </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-3 col-md-3 name-list">
                                                                                <li><i class="fa fa-black-tie"></i> Experience :<?php echo $value['min_exp'] ."-".$value['max_exp']; ?>year</li>
                                                                                </div></div>
                                                                            </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                        
                                                      </td>
                                                     
                                                    </tr>
                                                  <?php
                                                            }}else
                                                            {
                                                                echo "No Jobs Post Yet....";
                                                            }
                                                        ?>
                                                </tbody>                    
                                              </table>
                              </form>
                            </div>
                          </div>
                        </div>

                      </div> 
                    </div>
                  </div>
                  <!--tab second ends-->

                  <!--tab third starts-->
                  <div id="TAB_3" class="tab-pane fade in">
                      <div class="row">
                        <div class="col-md-12 bg-white padding-2">
                          <h3 style="font-size: 20px; margin-bottom: 10px;">Employer List</h3> 
                              <div class="row margin-top-20">
                                  <div class="col-md-12">
                                      <div class="box-body table-responsive no-padding">
                                        <form method="post" action="<?=base_url('ExportExcel/fetchEmployeeData')?>">
                                          <input type="button" id="download_data" style="margin-right:10px; padding: 10px 10px;" class="careerfy-employer-profile-submit" name="download_data" value="Download Data">
                                          <span style="float:right;">
                                            <label>Sort</label>
                                              <select class="form-control" name="empdata" id="empdata">
                                                <option value="">Select Data to Sort</option>
                                                <option value="1">Recent 1 Month Data</option>
                                                <option value="2">Recent 2 Month Data</option>
                                                <option value="3">Recent 3 Month Data</option>
                                                <option value="4">All Data</option>
                                              </select>
                                          </span>

                                          <table id="example4" class="table table-hover">
                                                <thead>
                                                  <th class="active">
                                                  <input type="checkbox" class="select-all checkbox" name="select-all" />
                                                  </th>
                                                  <th>Details</th>
                                                </thead>
                                                <tbody>
                                                  <?php 
                                                      if(!empty($result2)){
                                                        
                                                      foreach ($result2 as $val) {
                                                  ?>
                                                    <tr>
                                                      <td>
                                                       <input type="checkbox" class="select-item checkbox" name="select_emp[]" value="<?=$val['e_id']?>" title="<?=$val['e_id']?>"/>
                                                       </td>
                                                       <td>
                                                        <div class="careerfy-applied-jobs">
                                                            <ul class="careerfy-row">
                                                              
                                                                <li class="careerfy-column-12">
                                                                  <div class="careerfy-candidate-default-wrap">
                                                                    <div class="careerfy-candidate-default-text">
                                                                        <div class="careerfy-candidate-default-left">
                                                                            <ul>
                                                                              <li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">Employer Name : <?php echo $val['first_name']." ".$val['middle_name']." ".$val['last_name']; ?></a></li>
                                                                                <li><i class="fa fa-graduate"></i>Employer Status: <?php if($val['active'] == "1"){ echo "Active"; } else  echo "Deactive"; ?></li>
                                                                                <li><i class="fa fa-graduate"></i>Company Name: <?php echo $val['company_name']; ?></li>
                                                                                <li><i class="fa fa-map-marker"></i> Email Id: <?php echo $val['email_id']; ?></li>
                                                                                
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                        
                                                      </td>
                                                     
                                                    </tr>
                                                  <?php
                                                   }
                                                 }else
                                                            {
                                                                echo "No Employers Data Yet....";
                                                            }
                                                        ?>
                                                </tbody>                    
                                              </table>
                                        </form>
                                      </div>
                                  </div>
                              </div>
                        </div>
                      </div>
                  </div>
                  <!--tab third ends-->

                  <!--tab fourth starts-->
                  <div id="TAB_4" class="tab-pane fade in">
                      <div class="row">
                          <div class="col-md-12 bg-white padding-2">
                            <h3 style="font-size: 20px; margin-bottom: 10px;">Candidate List</h3> 
                              <div class="row margin-top-20">
                                <div class="col-md-12">
                                    <div class="box-body table-responsive no-padding">
                                      <form method="post" action="<?=base_url('ExportExcel/fetchCandidateData')?>">
                                        <input type="button" id="download_data" style="margin-right:10px; padding: 10px 10px;" class="careerfy-employer-profile-submit" name="download_data" value="Download Data">
                                          <span style="float:right;">
                                            <label>Sort</label>
                                              <select class="form-control" name="empdata" id="empdata">
                                                  <option value="">Select Data to Sort</option>
                                                  <option value="1">Recent 1 Month Data</option>
                                                  <option value="2">Recent 2 Month Data</option>
                                                  <option value="3">Recent 3 Month Data</option>
                                                  <option value="4">All Data</option>
                                              </select>
                                          </span>

                                           <table id="example5" class="table table-hover">
                                                <thead>
                                                  <th class="active">
                                                  <input type="checkbox" class="select-all checkbox" name="select-all" />
                                                  </th>
                                                  <th>Details</th>
                                                </thead>
                                                <tbody>
                                                  <?php 
                                                      if(!empty($result3)){
                                                        
                                                      foreach ($result3 as $val) {
                                                  ?>
                                                    <tr>
                                                      <td>
                                                       <input type="checkbox" class="select-item checkbox" name="select_candi[]" value="<?=$val['c_id']?>" title="<?=$val['c_id']?>"/>
                                                       </td>
                                                       <td>
                                                        <div class="careerfy-applied-jobs">
                                                            <ul class="careerfy-row">
                                                              
                                                                <li class="careerfy-column-12">
                                                                  <div class="careerfy-candidate-default-wrap">
                                                                    <div class="careerfy-candidate-default-text">
                                                                        <div class="careerfy-candidate-default-left">
                                                                            <ul>
                                                                              <li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">Candidate Name : <?php echo $val['first_name']." ".$val['middle_name']." ".$val['last_name']; ?></a></li>
                                                                                <li><i class="fa fa-graduate"></i>Mobile Number: <?php echo $val['phone']; ?></li>
                                                                                <li><i class="fa fa-graduate"></i>Qualification: <?php echo $val['highest_qualification']; ?></li>
                                                                                <li><i class="fa fa-map-marker"></i> Email Id: <?php echo $val['email_id']; ?></li>
                                                                                
                                                                                
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                        
                                                      </td>
                                                     
                                                    </tr>
                                                  <?php
                                                   }
                                                 }else
                                                 {
                                                      echo "No Candidate Data Yet....";
                                                            }
                                                        ?>
                                                </tbody>                    
                                              </table>
                                      </form>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--tab fourth ends-->
                </div>
              <!--tab ends-->
            
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$('#empdata').on('change',function(){
  var empdata = $(this).val();
   //alert(empdata);
/*window.location.href = "<?=base_url('ExportExcel/fetchDataFromTable?e_id=')?>"+empdata;*/

$.ajax({
              type: 'POST',
              url: '<?php echo base_url('admin/sortdata/'); ?>',
              data: { e_id : empdata},
              success: function(data) {
                //$('#list_new').hide();
                $('#example2').text('').append(data);
                
              }
  }); 


});
</script>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
  $(document).ready(function () {
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
  $(document).ready(function () {
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
$(document).ready(function () {
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
</script>
<script type="text/javascript">
function showUser(str,EID)
{
  var EID_new = EID;
  var emp_action = str;
alert('Status Updated');
  //alert(EID_new+str);
  $.ajax({
        type: "POST",
        url: "<?=base_url('admin/update_emp_status')?>",
        data: {'e_id': EID_new ,'status' :emp_action},
        success: function () {
                 window.location.href = "<?=base_url('admin/pending_employer')?>";     
        }
    });
}
</script>

<script>
    $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
            checkSelected();

        });

        //button select invert
        $("#select-invert").click(function () {
            $("input.select-item").each(function (index,item) {
                item.checked = !item.checked;
            });
            checkSelected();
        });

        //button get selected info
        $("#selected").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("no selected items!!!");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
            checkSelected();
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });

        //check is all selected
        function checkSelected() {
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            console.log("total:"+total);
            console.log("len:"+len);
            if(len==0){
                alert("Please Select Data");
                $('#download_data').attr('type','button');
                
            }
            else if(len > 0)
            {
                $('#download_data').attr('type','submit');
            }
            all.checked = len===total;
        }
    });
</script>