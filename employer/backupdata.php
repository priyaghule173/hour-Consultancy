<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Custom -->  
  <link rel="stylesheet" href="<?=base_url()?>assets/css/responsive1.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/candidate.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/plugin.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/color.css">
  
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">
.btn{
padding:10px;
}
</style>
</head>
<body>
<!--     <div class="careerfy-breadcrumb">
      <ul>
          <li><a href="<?php echo base_url('candidate/candidate_dash')?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li><a href="<?php echo base_url('employer/backupdata')?>">Backup Data</a></li>
      </ul>
  </div> -->
    <div class="careerfy-main-content">
        <div class="careerfy-main-section careerfy-dashboard-fulltwo">
            <div class="container">
                <div class="row">
                        <aside class="careerfy-column-3">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dashboard-nav">
                                    <figure>
                                        <a href="#" class="employer-dashboard-thumb">
                                            <img src="<?= base_url()?>assets/uploads/profile_pics/<?php echo $result_pro;?>" alt="">
                                        </a>

                                        <figcaption>
                                            <h2><?= $this->session->userdata('FIRST_NAME')?>&nbsp;<?=$this->session->userdata('LAST_NAME')?></h2>
                                        </figcaption>
                                    </figure>
                                    <ul>

                                      <li><a href="<?=base_url('employer/empDashboard')?>"><i class="fa fa-dashboard"></i></i>Dashboard</a></li>

                                      <li><a href="<?=base_url('employer/empProfile')?>"><i class="fa fa-tv"></i> My Profile</a></li>

                                      <li><a href="<?=base_url('employer/createJobPost')?>"><i class="fa fa-file-o"></i> Create Job Post</a></li>

                                      <li><a href="<?=base_url('employer/myJobPost')?>"><i class="fa fa-file-text-o"></i> My Job Post</a></li>

                                      <li><a href="<?=base_url('employer/jobAppl')?>"><i class="fa fa-briefcase"></i> Job Application</a></li>

                                      <li><a href="<?=base_url('employer/mailbox')?>"><i class="fa fa-envelope"></i> Mailbox</a></li>

                                      <li><a href="<?=base_url('employer/changePassword')?>"><i class="fa fa-gear"></i>Change Password</a></li>

<!--                                       <li class="active"><a href="<?=base_url('employer/backupdata')?>"><i class="fa fa-user"></i>Backup Data</a></li> -->

                                      <li><a href="<?=base_url('welcome/logout')?>"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>

                                    </ul>
                                </div>
                            </div>
                        </aside>



                        <div class="careerfy-column-9">
                          <div class="careerfy-typo-wrap">
                            <div class="careerfy-employer-dasboard">
                              <div class="careerfy-employer-box-section">
                                <div class="careerfy-profile-title">
                                      <h2>Backup Data</h2>
                                </div>
                                <ul class="careerfy-row careerfy-employer-profile-form">
                                            
                                            <li class="careerfy-column-6">
                                               <a class="btn btn-primary" href="<?=base_url('ExportExcel/fetchDataFromTable')?>"><i class="fa fa-download"></i>&nbsp;&nbsp;Download Candidate Applied Job Data</a> 
                                            </li>
                                            <li class="careerfy-column-6">
                                             <a class="btn btn-primary" href="#"><i class="fa fa-download"></i>&nbsp;&nbsp;Data</a> 
                                   
                                            </li>
                                        </ul>
                                      
                              </div>
                            </div>
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
    
</body>
</html>