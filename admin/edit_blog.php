<!-- <div class="inner-heading">
  <div class="container">
    <h3>Admin Dashboard</h3>
  </div>
</div>
 -->
<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Edit Blog</h1>
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
                      </figure>
 -->
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

                              <ul class="dropdown-submenu">
                                        <li>
                                              <a href="<?=base_url('admin/pendingPlatinumPackEmp')?>"><i class="fa fa-trophy"></i>Platinum Pack</a>
                                        </li>
                                        <li>
                                              <a href="<?=base_url('admin/pendingGoldPackEmp')?>"><i class="fa fa-dollar"></i>Gold Pack</a>
                                        </li>
                                    </ul>
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
                              <ul class="dropdown-menu">
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
          <form class="careerfy-employer-dasboard" action="<?= base_url('admin/edit_blog?id='.$this->input->get('id'))?>" method="post" enctype="multipart/form-data">
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Edit Blog</h2>
              </div>

              <ul class="careerfy-row careerfy-employer-profile-form">
                
                <li class="careerfy-column-6 col-sm-6">
                  <label style="font-size: 13px;">Title *</label>
                  <input type="text" name="title" class="form-control" value="<?php echo $blog_data[0]['blog_title']; ?>">
                </li>
                 <li class="careerfy-column-6 col-sm-6">
                  <label style="font-size: 13px;">Description *</label>
                  <textarea cols="35" rows="2" name="description" class="form-control"><?php echo $blog_data[0]['blog_description']; ?></textarea>
                </li>
                <li class="careerfy-column-6 col-sm-6">
                  <?php if($blog_data[0]['blog_pic'] != "") { ?>
                    <img src="<?=base_url()?>assets/uploads/blog_pics/<?php echo $blog_data[0]['blog_pic']; ?>" class="img-responsive" style="max-height: 150px; max-width: 150px;">
                  <?php } ?>
                   <label style="font-size: 13px;">Blog Pic *</label>
                  <input type="file" name="uploads" class="form-control">
                  
                </li>
                <li class="careerfy-column-6 col-sm-6">
                   <label style="font-size: 13px;">Blog Url *</label>
                  <input type="url" name="blog_url" class="form-control" value="<?php echo $blog_data[0]['blog_link']; ?>"> 
                </li>
                </ul>
                <br>
              <button type="submit" name="update" class="careerfy-employer-profile-submit" value="update">update</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>