<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#Quali').multiselect({
                includeSelectAllOption: true
            });
        });
       $(function () {
            $('#Job_role').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#Job_type').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#Package_type').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#City').multiselect({
                includeSelectAllOption: true
            });
        });

    </script>

<div class="inner-heading">
  <div class="container">
    <h3>Admin Dashboard</h3>
  </div>
</div>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 navigation">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
            <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>images/profile.png" alt="">
                            </a>
                            <figcaption>
                                <h2 style="font-size: 18px;"><?= $this->session->userdata('EMAIL_ID')?></h2>
                            </figcaption>
                        </figure>

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
                          <li class="active">
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
          <form class="careerfy-employer-dasboard" action="<?=base_url('admin/add_job_sub_roles?jr_id='.$this->input->get('jr_id'))?>" method="post">
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                  <h2>Create New Sub Role</h2>
              </div>

              <ul class="careerfy-row careerfy-employer-profile-form">
                                            
                  <li class="col-sm-6 careerfy-column-6">
                      <label>Job Sub Role Name*</label>
                      <input class="form-control input-lg" type="text" name="job_sub_role" placeholder="Enter the unique sub role" onblur="if(this.value == '') { this.value ='Old Password'; }" onfocus="if(this.value =='Old Password') { this.value = ''; }" autocomplete="off" required>
                  </li>
                  <li class="col-sm-6 careerfy-column-6">
                      <input type="submit" name="create_job_sub_role" value="Create Sub Role" class="careerfy-employer-profile-submit" style="margin-top: -62px;font-size: 14px;">
                                   
                  </li>
              </ul>

            </div>

            <div class="row">
                <div class="col-md-12 bg-white padding-2">
                  <h3 style="font-size: 20px; margin-bottom: 10px;">Jobs - Sub Role List</h3>
                      <div class="row margin-top-20">
                          <div class="col-md-12">
                              <div class="box-body table-responsive no-padding">
                                <table id="example2" class="table table-hover">
                                            <thead>
                                              <th>Sub Role Id</th>
                                              <th>Job Role Name</th>
                                              <th>Sub Role Name</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                              foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                  <td>
                                                    <?=$row['sr_id']?>
                                                  </td>
                                                  <td>
                                                    <?=$row['role']?>
                                                  </td>
                                                  <td>
                                                    <?=$row['sub_role_type']?>
                                                  </td>
                                                  <td>
                                                    <a style="padding:3px;" href="<?=base_url('admin/edit_job_sub_role?sr_id=').$row['sr_id']?>" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                                    <a style="padding:3px;" href="<?=base_url('admin/delete_job_sub_role?sr_id='.$row['sr_id'] .'&jr_id='.$row['jr_id']) ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>&nbsp;&nbsp;
                                                            
                                                  </td>
                                                </tr>
                                              <?php
                                              }
                                            ?>
                                            </tbody>                    
                                          </table>
                              </div>
                          </div>
                      </div>
                </div>
            </div>


          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<style type="text/css">
.careerfy-employer-dasboard{
  margin-bottom: 0px;
}
</style>
</head>
<body>
  
    <script type="text/javascript">
        $(function () {
            $('#Quali').multiselect({
                includeSelectAllOption: true
            });
        });
      $(function () {
            $('#Job_role').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#Job_type').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#Package_type').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#City').multiselect({
                includeSelectAllOption: true
            });
        });

    </script>
<div class="careerfy-breadcrumb">
    <ul>
        <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/create_new_job_role')?>">Create New Job</a></li>
        <li><a href="<?php echo base_url('admin/add_job_sub_roles')?>">Add Sub Job Role</a></li>
    </ul>
            </div>
<div class="careerfy-main-content"> 
  <?php 
          if($this->session->flashdata('message')){
            echo $this->session->flashdata('message');  
          } else {
            echo '';  
          }

   ?>
        <!-- Main Section -->
            <div class="careerfy-main-section careerfy-dashboard-full">
                <div class="container">
                    <div class="row">

                        <aside class="careerfy-column-3">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dashboard-nav">
                                    <figure>
                                        <a href="#" class="employer-dashboard-thumb"><img src="<?=base_url()?>assets/img/employer-dashboard-1.png" alt=""></a>
                                        <figcaption>
                                            <h5><?= $this->session->userdata('EMAIL_ID')?></h5>
                                        </figcaption>
                                    </figure>
                                    <ul class="nav nav-sidebar">
                                        <li><a href="<?=base_url('admin')?>"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                        <li><a href="<?=base_url('admin/manage_employer')?>"><i class="fa fa-user"></i>Manage Employer</a></li>
                                        <li><a href="#" data-toggle="dropdown"><i class="fa fa-gift"></i>Packages</a>
                                          <ul class="dropdown-menu">
                                            <li>
                                              <a href="<?=base_url('admin/pending_platinum_pack_emp')?>"><i class="fa fa-trophy"></i>Platinum Pack</a>
                                            </li>
                                            <li>
                                              <a href="<?=base_url('admin/pending_gold_pack_emp')?>"><i class="fa fa-dollar"></i>Gold Pack</a>
                                          </li>
                                        </ul>
                                        </li>
                                        <li class="active"><a href="<?=base_url('admin/create_new_job_role')?>"><i class="fa fa-file-o"></i>Create New job Roles</a></li>
                                        <li><a href="<?=base_url('admin/candidate_section')?>"><i class="fa fa-briefcase"></i> Candidate Section</a></li>
                                        <li><a href="<?=base_url('admin/mailbox')?>"><i class="fa fa-envelope"></i> Mailbox</a></li>

                                        <li><a href="<?=base_url('admin/backupdata')?>"><i class="fa fa-database"></i> Backup Data</a></li>
                                        <li><a href="#"><i class="fa fa-upload"></i> Upload Data</a></li>
                                        <li><a href="<?=base_url('admin/change_password')?>"><i class="fa fa-gear"></i> Change Password</a></li>
                                        <li>
                                          <a href="#" data-toggle="dropdown">
                                            <i class="fa fa-address-card-o"></i>
                                            Blog Posting
                                            <ul class="dropdown-submenu">
                                                      <li>
                                                            <a href="<?=base_url('admin/add_blog')?>"><i class="fa fa-trophy"></i>Add Blog</a>
                                                      </li>
                                                      <li>
                                                            <a href="<?=base_url('admin/manage_blog')?>"><i class="fa fa-dollar"></i>Manage Blog</a>
                                                      </li>
                                                  </ul>
                                          </a>
                                        </li>
                                        <li><a href="<?=base_url('welcome/logout')?>"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                        <div class="careerfy-column-9">
                            <div class="careerfy-typo-wrap">
                                <form class="careerfy-employer-dasboard" action="<?=base_url('admin/add_job_sub_roles?jr_id='.$this->input->get('jr_id'))?>" method="post">
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title">
                                            <h2>Create New Sub Role</h2>
                                        </div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            
                                            <li class="careerfy-column-6">
                                                <label>Job Sub Role Name*</label>
                                                <input class="form-control input-lg" type="text" name="job_sub_role" placeholder="Enter the unique sub role" onblur="if(this.value == '') { this.value ='Old Password'; }" onfocus="if(this.value =='Old Password') { this.value = ''; }" autocomplete="off" required>
                                            </li>
                                            <li class="careerfy-column-6">
                                              <input type="submit" name="create_job_sub_role" value="Create Sub Role" class="careerfy-employer-profile-submit">
                                   
                                            </li>
                                        </ul>
                                    
                                </div>
                                </form>
                                <div class="row">
                                  <div class="col-md-12 bg-white padding-2">
                                    <h3>Jobs - Sub Role List</h3>
                                    <div class="row margin-top-20">
                                      <div class="col-md-12">
                                        <div class="box-body table-responsive no-padding">
                                          <table id="example2" class="table table-hover">
                                            <thead>
                                              <th>Sub Role Id</th>
                                              <th>Job Role Name</th>
                                              <th>Sub Role Name</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                              foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                  <td>
                                                    <?=$row['sr_id']?>
                                                  </td>
                                                  <td>
                                                    <?=$row['role']?>
                                                  </td>
                                                  <td>
                                                    <?=$row['sub_role_type']?>
                                                  </td>
                                                  <td>
                                                    <a style="padding:3px;" href="<?=base_url('admin/edit_job_sub_role?sr_id=').$row['sr_id']?>" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                                    <a style="padding:3px;" href="<?=base_url('admin/delete_job_sub_role?sr_id='.$row['sr_id'] .'&jr_id='.$row['jr_id']) ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>&nbsp;&nbsp;
                                                            
                                                  </td>
                                                </tr>
                                              <?php
                                              }
                                            ?>
                                            </tbody>                    
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                        </div>

                    </div>
                  </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>


  <!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
