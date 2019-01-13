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

<!-- <div class="inner-heading">
  <div class="container">
    <h3>Admin Dashboard</h3>
  </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Admin Dashboard</h1>
</div>

<?php $this->load->view('admin/demo'); ?>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 navigation">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
            <!-- <figure>
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
          <div class="careerfy-employer-dasboard">
              <form class="careerfy-employer-dasboard" action="<?=base_url('admin/createJobRole')?>" method="post">
                <div class="careerfy-employer-box-section">
                  <div class="careerfy-profile-title">
                    <h2 style="font-size: 18px;">Add New Specialization</h2>
                  </div>

                  <ul class="careerfy-row careerfy-employer-profile-form">
                    <li class="careerfy-column-6 col-sm-6">
                      <label style="font-size: 13px;">Specialization *</label>
                      <input type="text" name="job_role" class="form-control input-lg" placeholder="Enter the unique job role">
                    </li>

                    <li class="careerfy-column-6 col-sm-6">
                      <input type="submit" name="create_job_role" class="careerfy-employer-profile-submit" value="Add Specialization" style="margin-top: -62px; font-size: 13px;">
                    </li>
                  </ul>
                </div>
            </form>

            <div class="row col-sm-12 job-role">
              <div class="col-md-12 bg-white padding-2">
                <h3 style="font-size: 18px;">Specialization List</h3>
                <div class="row col-sm-12">
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <thead style="font-size: 13px;">
                                              <tr>
                                                <th>Id</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                              </tr>
                                            </thead>

                                            <tbody style="font-size: 13px; color: #999;">
                                            <?php $i=1;
                                              foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                  <td>
                                                    <?= $i++; ?>
                                                  </td>
                                                  <td>
                                                    <?=$row['role']?>
                                                  </td>
                                                  <td>
                                                     <a style="padding:3px;" href="<?=base_url('admin/add_job_sub_roles?jr_id=').$row['jr_id']?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add Sub-roles</a> 
                                                  </td>
                                                  <td>
                                                    <a style="padding:3px;" href="<?=base_url('admin/edit_job_role?jr_id=').$row['jr_id']?>" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                    <a style="padding:3px;" href="<?=base_url('admin/delete_job_role?jr_id=').$row['jr_id'] ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;
                                                            
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


<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
