<!-- DataTables -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

<!-- <div class="inner-heading">
  <div class="container">
    <h3></h3>
  </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Manage Posts</h1>
</div>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
     <div class="col-md-3 navigation">
                <div class="careerfy-typo-wrap">
                    <div class="careerfy-employer-dashboard-nav">
                       

                        <ul>

                            <li>
                                <a href="<?= base_url('employer/empDashboard');?>">
                                    <i class="fa fa-dashboard"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('employer/empProfile');?>">
                                    <i class="fa fa-user-o"></i>
                                    Company Profile
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('employer/createJobPost');?>">
                                    <i class="fa fa-address-card-o"></i>
                                    Post a new job
                                </a>
                            </li>

                            <li class="active">
                                <a href="<?= base_url('employer/myJobPost');?>">
                                    <i class="fa fa-briefcase"></i>
                                    Manage posts
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('employer/jobAppl');?>">
                                    <i class="fa fa-search"></i>
                                     Applications
                                </a>
                            </li>

                     <?php
 $unreadmails_admin = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid',$this->session->userdata('EMP_ID'))->where('user_type','0')->where('flag','0')->get()->result_array();
 $unreadmails_can = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid',$this->session->userdata('EMP_ID'))->where('user_type','2')->where('flag','0')->get()->result_array();
                        ?>

                              <li>
                                    <a href="<?= base_url('employer/mailbox');?>">
                                          <i class="fa fa-envelope"></i>
                                          Mailbox&nbsp;<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $unreadmails_admin[0]['unread'] + $unreadmails_can[0]['unread']?></span>
                                    </a>
                              </li>
                            <li>
                                <a href="<?= base_url('employer/packageHistory');?>">
                                    <i class="fa fa-envelope"></i>
                                    Packages
                                </a>
                            </li>
                        
                            <li>
                                <a href="<?= base_url('employer/changePassword');?>">
                                    <i class="fa fa-cog"></i>
                                    Change Password
                                </a>
                            </li>
                            <!--<li>
                                <a href="<?=base_url('employer/backupdata')?>">
                                <i class="fa fa-user"></i>Backup Data</a>
                            </li>-->

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
        <?php 
                if($this->session->flashdata('message')){
                  echo $this->session->flashdata('message');  
                } else {
                  echo '';  
                }
              ?>
        <div class="careerfy-typo-wrap">
          
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">My Job Post</h2>
              </div>
              
              <?php
              if(!empty($gold_result))
              {
              ?>
              <div class="col-sm-12" style="margin-bottom: 20px;">
                <h4 style="font-size: 16px;">My Gold Job Posts</h4>
                
                  <div class="box-body table-responsive no-padding">
                    <table id="example2_gold" class="table table-hover" style="margin-top: 10px;">
                      <thead style="font-size: 12px;">
                                  <th>#</th>
                                  <th>Job Title</th>
                                  <th>Created Date</th>
                                  <th>Approved Date</th>
                                  <th>Expire Date</th>
                                  <th>Location</th>
                                  <th>Job Role</th>  
                                  <th>Status</th>
                                  <th>Action</th>
                                </thead>

                                <tbody style="font-size: 12px; color: #777;">
                                  <?php
                                    foreach ($gold_result as $row) {
                                  ?>
                                  <tr>
                                    <td>
                              <?php
                                if($row['featured_job']=='1'){
                              ?>
                              <i class="fa fa-battery-full" aria-hidden="true"></i>
                              <?php }else{?>
                              <i class="fa fa-battery-empty" aria-hidden="true"></i>
                            <?php }?></td>
                        <td><?php echo $row['job_title']; ?></td>
                        <td>
                          <?= $row['job_post_date']?>
                        </td>
                        <td>
                          <?= $row['approved_job_post_date'] ?>
                        </td>
                        <td>
                          <?= $row['job_post_expire_date']?>
                        </td>
                        <td>
                          <?= $row['city']?>-<?= $row['localities']?>
                        </td>
                        <td>
                          <?= $row['job_role']?>
                        </td>
                        <td>
                        <?php if($row['action']==0)
                            echo "<p style='color:orange;'>Approval Pending</p>";
                            elseif ($row['action']==1) 
                             echo "<p style='color:green;'>Approved</p>";
                            elseif ($row['action']==2)
                              echo "<p style='color:red;'>Rejected</p>";
                            else
                              echo "<p style='color:blue;'>Expired</p>";    
                        ?>
                          
                        </td>
                        <td>
                        <a href="<?=base_url('employer/view_job_post?j_id=').$row['j_id']?>"><i class="fa fa-address-card-o"></i></a>&nbsp;&nbsp;
                        <a href="<?=base_url('employer/delete_job_post?j_id=').$row['j_id']?>"><i class="fa fa-trash"></i></a></td>
                      </tr>
                    <?php
                       }
                    ?>
                       </tbody>
                    </table>
                  </div>
                
              </div>
                <?php }?>
               <?php
              if(!empty($platinum_result))
              {
              ?>
              <div class="col-sm-12" style="margin-bottom: 20px;">
                          <h4 style="font-size: 16px;">My Platinum Job Posts</h4>
                          <div class="box-body table-responsive no-padding">
                            <table id="example2_platinum" class="table table-hover" style="padding-top: 10px">
                    <thead style="font-size: 12px;">
                      <th>#</th>
                      <th>Job Title</th>
                      <th>Created Date</th>
                      <th>Approved Date</th>
                      <th>Expire Date</th>
                      <th>Location</th>
                      <th>Job Role</th>  
                      <th>Status</th>
                      <th>Action</th>
                    </thead>
                    <tbody style="font-size: 12px;">
                    <?php
                  foreach ($platinum_result as $row) {
                    ?>
                      <tr>
                        <td>
                              <?php
                                if($row['featured_job']=='1'){
                              ?>
                              <i class="fa fa-battery-full" aria-hidden="true"></i>
                              <?php }else{?>
                              <i class="fa fa-battery-empty" aria-hidden="true"></i>
                            <?php }?></td>
                        <td><?php echo $row['job_title']; ?></td>
                        <td>
                          <?= $row['job_post_date']?>
                        </td>
                        <td>
                          <?= $row['approved_job_post_date'] ?>
                          
                        </td>
                        <td>
                          <?= $row['job_post_expire_date']?>
                        </td>
                        <td>
                          <?= $row['city']?>-<?= $row['localities']?>
                        </td>
                        <td>
                          <?= $row['job_role']?>
                        </td>
                        <td>
                        <?php if($row['action']==0)
                            echo "<p style='color:orange;'>Approval Pending</p>";
                            elseif ($row['action']==1) 
                             echo "<p style='color:green;'>Approved</p>";
                            elseif ($row['action']==2)
                              echo "<p style='color:red;'>Rejected</p>";
                            else
                              echo "<p style='color:blue;'>Expired</p>";    
                        ?>
                          
                        </td>
                        <td>
                        <a href="<?=base_url('employer/view_job_post?j_id=').$row['j_id']?>"><i class="fa fa-address-card-o"></i></a>&nbsp;&nbsp;
                        <a href="<?=base_url('employer/delete_job_post?j_id=').$row['j_id']?>"><i class="fa fa-trash"></i></a></td>
                      </tr>
                    <?php
                  }
                    ?>
 
                     </tbody>                    
                  </table>
                          </div>
              
            </div>
            <?php }?>

            
                          
              <div class="col-sm-12" style="margin-bottom: 20px">
                <h4 style="font-size: 16px">My Free Job Posts</h4>
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover" style="padding-top: 10px;">
                    <thead style="font-size: 12px;">
                      <th>#</th>
                      <th>Job Title</th>
                      <th>Created Date</th>
                      <th>Expire Date</th>
                      <th>Location</th>
                      <th>Job Role</th>  
                      <th>Status</th>
                      <th>Action</th>
                    </thead>
                    <tbody style="font-size: 12px;">
                    <?php
//print_r($result);
                  foreach ($result as $row) {
                    ?>
                      <tr>
                        <td>
                              <?php
                                if($row['featured_job']=='1'){
                              ?>
                              <i class="fa fa-battery-full" aria-hidden="true"></i>
                              <?php }else{?>
                              <i class="fa fa-battery-empty" aria-hidden="true"></i>
                            <?php }?></td>
                        <td><?php echo $row['job_title']; ?></td>
                        <td>
                          <?= $row['job_post_date']?>
                        </td>
                        <td>
                          <?= $row['job_post_expire_date']?>
                        </td>
                        <td>
                          <?= $row['city']?>-<?= $row['localities']?>
                        </td>
                        <td>
                          <?= $row['job_role']?>
                        </td>
                        <td>
                        <?php if($row['action']==0)
                            echo "<p style='color:orange;'>Approval Pending</p>";
                            elseif ($row['action']==1) 
                             echo "<p style='color:green;'>Approved</p>";
                            elseif ($row['action']==2)
                              echo "<p style='color:red;'>Rejected</p>";
                            else
                              echo "<p style='color:blue;'>Expired</p>";    
                        ?>
                          
                        </td>
                        <td>
                        <a href="<?=base_url('employer/view_job_post?j_id=').$row['j_id']?>"><i class="fa fa-address-card-o"></i></a>&nbsp;&nbsp;
                        <a href="<?=base_url('employer/delete_job_post?j_id=').$row['j_id']?>"><i class="fa fa-trash"></i></a></td>
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
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    });
  });
  $(function () {
    $('#example2_gold').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    });
  });$(function () {
    $('#example2_platinum').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>