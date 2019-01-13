<!-- <div class="inner-heading">
    <div class="container">
        <h3>Job Applications</h3>
    </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Job Applications</h1>
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

                            <li class="active">
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
                <div class="careerfy-typo-wrap">
                    <form>
                        <div class="careerfy-employer-box-section">
                            <div class="careerfy-profile-title">
                                <h2 style="font-size: 18px;">Job Applications</h2>
                                <a style="float:right; padding:5px;" href="<?=base_url('employer/create_job_post') ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Create Job Post</a>
                            </div>

                            <div class="careerfy-managejobs-list-wrap">
                                <div class="careerfy-managejobs-list">
                                    <div class="careerfy-table-layer careerfy-managejobs-thead">
                                        <div class="careerfy-table-row">
                                            <div class="table-cell">
                                                <b>Job Title</b>
                                            </div>

                                            <div class="table-cell">
                                                <b>Status</b>
                                            </div>

                                            <div class="table-cell">
                                                <b>Action</b>
                                            </div>

                                            <div class="table-cell">
                                                <b>Received Applications</b>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                        foreach ($result as $row) {
                                        $count = $this->db->select('count(a_id) as total')->from('applied_jobs')->where('j_id',$row['j_id'])->get()->result_array();
                                    ?>
                                    <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                        <div class="careerfy-table-row">
                                                        <div class="table-cell">
                                                           <?php echo $row['job_title']; ?>
                                                        </div>

                                                        <div class="table-cell">
                                                            <?php if($row['action']==0)
                                                                echo "Approval Pending";
                                                                elseif ($row['action']==1) 
                                                                 echo "Approved";
                                                                elseif ($row['action']==2)
                                                                  echo "Rejected";
                                                                else
                                                                  echo "Expired";    
                                                            ?>
                                                        </div>

                                                        <div class="table-cell">                                                 
<!--                                                            <a href="<?=base_url('employer/edit_job_post?j_id=').$row['j_id']?>"><i class="fa fa-address-card-o"></i></a>&nbsp;&nbsp;
-->                                                            <a href="<?=base_url('employer/view_job_post?j_id=').$row['j_id'] ?>" title="View"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                            <a href="<?=base_url('employer/delete_job_post?j_id=').$row['j_id'] ?>" title="delete"><i class="fa fa-trash-o"></i></a>
                                                        </div>

                                                        <div class="table-cell">
                                                            <a href="<?=base_url('employer/view_applications?j_id=').$row['j_id']?>"><?=$count[0]['total']?></a>
                                                        </div>
                                            </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
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