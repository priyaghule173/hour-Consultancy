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

<!-- <div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Mailbox</h1>
</div> -->

 <div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Mailbox</h1>
</div>

<?php $this->load->view('admin/demo'); ?>




<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 navigation">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
         <!--    <figure>
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
                          <li class="active">
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
          <div class="careerfy-employer-box-section">
            
            <div class="careerfy-profile-title">
              <h2>Mailbox</h2>
              <div class="pull-right">
                  <a href="<?= base_url('admin/create_mail');?>" class="careerfy-classic-btn careerfy-bgcolor"><i class="fa fa-envelope"></i> Create</a>
              </div>
            </div>

                  <div class="careerfy-profile-title">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#TAB_1">Inbox&nbsp;(<?=$unreadmails[0]['unread']?>)</a></li>
                          <?php
                          ?>
                        <li><a data-toggle="tab" href="#TAB_2">Send&nbsp;</a></li>

                    </ul>
                  </div>
                  <!-- tab start -->
                <div class="tab-content">
                    <!-- tab first start -->
                <div id="TAB_1" class="tab-pane fade in active">
                  
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">

                            <table id="example1" class="table table-hover">
                                                   
                                              <thead>
                                                <tr>
                                                  <th>Subject</th>
                                                  <th>Date</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php

                                              $admin_id = $this->session->userdata('ADMIN_ID');

                                                  if($admin_id !=0){

                                                      $mails = $this->db->select('*')->from('mailbox')->where('to_userid','admin')->where('user_type','2')->order_by('mailbox_id','DESC')->get()->result_array();
                                                    
                                                  //print_r($mails);

                                                      foreach ($mails as $mail) {
                                                if($mail['flag']==0){    
                                              ?>
                                              <tr style="background-color:orange;">
                                               <td class="mailbox-subject"><a href="<?= base_url('admin/read_mail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>
                                              <?php
                                                }
                                                else{
                                                    ?>
                                              <tr>
                                               <td class="mailbox-subject"><a href="<?= base_url('admin/read_mail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>    
                                                    <?php
                                                }
                                                  }
                                                }
                                              ?>
                                              </tbody>
                                              
                                            </table>
                    </div>
                </div>
            </div>
            </div>
    <!-- tab send start -->
                <div id="TAB_2" class="tab-pane fade">
                  
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">

                            <table id="example2" class="table table-hover">
                                                   
                                              <thead>
                                                <tr>
                                                  <th>Subject</th>
                                                  <th>Date</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php

                                              $admin_id = $this->session->userdata('ADMIN_ID');

                                                  if($admin_id !=0){

                                                      $mails = $this->db->select('*')->from('mailbox')->where('from_userid',$admin_id)->where('user_type','0')->order_by('mailbox_id','DESC')->get()->result_array();
                                                    
                                                  //print_r($mails);

                                                      foreach ($mails as $mail) {
                                                        # code...
                                                      
                                              ?>
                                              <tr>
                                               <td class="mailbox-subject"><a href="<?= base_url('admin/read_mail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>
                                              <?php
                                                  }
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
</div>


<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable();
    $('#example2').DataTable();
  })
</script>