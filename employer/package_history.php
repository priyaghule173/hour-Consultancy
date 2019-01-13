<!-- <div class="inner-heading">
  <div class="container">
    <h3>Package History</h3>
  </div>
</div>
 -->
<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Packages</h1>
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

                            <li>
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
                            <li class="active">
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



      <div class="col-md-9 col-sm-12 col-xs-12" style="padding-left: 0px;">
        <div class="careerfy-typo-wrap">
          <form>
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Packages</h2>
              </div>

              <?php
              if(!empty($package_history))
              {
              ?>
              <div class="col-sm-12" style="margin-bottom: 20px;">
                               
                  <div class="box-body table-responsive no-padding">
                    <table id="example2_gold" class="table table-hover" style="margin-top: 10px;">
                      <thead style="font-size: 13px;">
                                  <th>#</th>
                                  <th>Package Name</th>
                                  <th>Package Validity</th>
                                  <th>Total Posts</th>
                                  <th>Used Posts</th>
                                  <th>Active date</th>
                                  <th>Expired Date</th>  
                                  <th>Status</th>
                                  
                                </thead>

                                <tbody style="font-size: 13px; color: #777;">
                                  <?php
                                    foreach ($package_history as $row) {
                                  ?>
                                  <tr>
                                    <td></td>
                                    <td><?= $row['package_name']; ?></td>
                                    <td>
                                      <?= $row['package_validities']?>
                                    </td>
                                    <td>
                                      <?= $row['total_posts'] ?>
                                    </td>
                                    <td>
                                      <?= $row['used_job_posts']?>
                                    </td>
                                    <td>
                                      <?= $row['active_date']?>
                                    </td>
                                    <td>
                                      <?= $row['pack_expire_date']?>
                                    </td>
                                    <td>
                                        <?php if($row['flag']==1)
                                        {
                                            echo "Active";
                                        }else
                                        echo "Expired";
                                      ?>
                                    </td>

                      </tr>
                    <?php
                       }
                    ?>
                       </tbody>
                    </table>
                  </div>
                
              </div>
                <?php }?>


              
            </div>
          </form>
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>