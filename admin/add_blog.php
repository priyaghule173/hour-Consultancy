<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>

<!-- header css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url()?>images/favicon.ico">

  <meta name="description" content="&lt;p&gt;Job Portal is a comprehensive, powerful and feature-rich Job board HTML template. It is ...">
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="<?= base_url()?>assets/css/font-awesome.min.css">
  
     <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
     <link rel="stylesheet" href="<?= base_url()?>assets/css/animate.css">
     <link rel="stylesheet" href="<?= base_url()?>assets/css/icomoon.css">
     <link rel="stylesheet" href="<?= base_url()?>assets/css/simple-line-icons.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css">
       <link rel="stylesheet" href="<?= base_url()?>assets/css/owl.carousel.min.css">
       <link rel="stylesheet" href="<?= base_url()?>assets/css/owl.theme.default.min.css">
        <link rel="shortcut icon" href="<?= base_url()?>images/favicon.ico">

  <meta name="description" content="&lt;p&gt;Job Portal is a comprehensive, powerful and feature-rich Job board HTML template. It is ...">
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

  
  <link rel="stylesheet" href="<?= base_url()?>css/style.css">
    
    <!--<link rel="stylesheet" href="<?= base_url()?>css/style.css">

  <script type="text/javascript" src="<?= base_url()?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url()?>js/jquery-3.3.1.js"></script>-->

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>

        <link rel="stylesheet" href="<?= base_url()?>css/style.css">
    
    <!--<link rel="stylesheet" href="<?= base_url()?>css/style.css">

  <script type="text/javascript" src="<?= base_url()?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url()?>js/jquery-3.3.1.js"></script>-->

  
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>

<!-- header css ends -->




<!-- <div class="inner-heading">
  <div class="container">
    <h3>Admin Dashboard</h3>
  </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Add Blog</h1>
</div>

<?php $this->load->view('admin/demo'); ?>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
          <!--   <figure>
                <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>images/profile.png" alt="">
                  </a>
                      <figcaption>
                          <h2 style="font-size: 18px;"><?= $this->session->userdata('EMAIL_ID')?></h2>
                      </figcaption>
                      </figure> -->

                        <ul>
                          <li>
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
                          <li>
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

                          <li class="active">
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

      <div class="col-md-9 col-sm-12 col-xs-12" style="padding-left: 0px;">
        <div class="careerfy-typo-wrap">
          <form class="careerfy-employer-dasboard" action="<?= base_url('admin/add_blog');?>" method="post" enctype="multipart/form-data">
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Add Blog</h2>
              </div>

              <ul class="careerfy-row careerfy-employer-profile-form">
                
                <li class="careerfy-column-6 col-sm-6">
                  <label style="font-size: 13px;">Title *</label>
                  <input type="text" name="title" class="form-control">
                </li>
                 <li class="careerfy-column-6 col-sm-6">
                  <label style="font-size: 13px;">Description *</label>
                  <textarea cols="35" rows="2" name="description" class="form-control"></textarea>
                </li>
                <li class="careerfy-column-6 col-sm-6">
                   <label style="font-size: 13px;">Blog Pic *</label>
                  <input type="file" name="uploads" class="form-control">
                </li>
                <li class="careerfy-column-6 col-sm-6">
                   <label style="font-size: 13px;">Blog Url *</label>
                  <input type="url" name="blog_url" class="form-control"> 
                </li>
                </ul>
                <br>
              <button type="submit" name="submit" class="careerfy-employer-profile-submit" value="Submit">Submit</button>
              
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>