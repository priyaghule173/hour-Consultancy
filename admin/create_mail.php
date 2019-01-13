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
    <h1 style=" " class="myhero">Create Mail</h1>
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
                          <li class="active">
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
            
            <form class="careerfy-employer-dasboard" action="<?= base_url('admin/create_mail');?>" method="post">
              <div class="careerfy-employer-box-section">
                <div class="careerfy-profile-title">
                  <h2>Compose New Message</h2>
                </div>
                 <ul class="careerfy-row careerfy-employer-profile-form">
                                                                                     
                      <li class="col-sm-6 careerfy-column-12">
                          <label>To *</label>
                                                    
                          <select name="to" id="emp_id" class="form-control" required>
                              <option value="">Select Employer</option>
                                                         <?php
                                                             $employer = $this->db->select('*')->from('employer')->get()->result_array();
                                                          ?>
                                                          <?php  foreach ($employer as $row):
                                                           ?>
                              <option value="<?php echo $row['e_id']; ?>"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?></option>
                                                       <?php endforeach; ?>
                          </select>

                      </li>

                      <li class="col-sm-6 careerfy-column-12">
                        <label>Subject *</label>
                        <input class="form-control input-lg"  class="form-control" name="subject" placeholder="Subject:"  onblur="if(this.value == '') { this.value ='Jody Wisternoff'; }" onfocus="if(this.value =='Jody Wisternoff') { this.value = ''; }" type="text" required="">
                      </li>

                      <li class="col-sm-6 careerfy-column-12">
                        <label>Message*</label>
                        <textarea class="form-control input-lg" id="description" name="description" rows="5" placeholder="meassage"></textarea>
                      </li>
                    </ul>
              </div>
              <div class="pull-right">
                                    <input type="submit" name="submit" value="Send" class="careerfy-employer-profile-submit">
                                    </div>
            </form>
            
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
  
$('#jobs_approved').on('change',function(){
    
    var j_id = $(this).val();
//alert(j_id);
        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url()?>employer/get_candidate',
                            data: { 'j_id_new':j_id },
                            dataType:'json',
                            success: function(data) {
                              $("#candidate_id").html(data);
                              },
                            error:function(data) { 
                                        alert(data+"error"); 
                                      }
                  });
    
});

</script>
