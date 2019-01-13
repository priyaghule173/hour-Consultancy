<style>
    ul.jobs-list {
    font-size: 12px;
    padding-left: 110px;
    margin-top: -75px;
    margin-left:10px;
}


/*.myoverlay {
  //position: relative;
   opacity: .5;
   background-color: black;
}

.black:after
{
     background-color: black;
}*/

/*.myoverlay {
  content: "";
  //position: absolute;
 
  background: rgba(0,0,0,.5);
}*/




</style>
<!-- <div class="inner-heading">
    <div class="container">
        <h3>Employer Dashboard</h3>
    </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Dashboard</h1>
</div>

<!-- <?php //$this->load->view('employer/demo',$result); ?> -->

<div class="inner-content emp-dashboard">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 navigation">
                <div class="careerfy-typo-wrap">
                    <div class="careerfy-employer-dashboard-nav">
                       

                        <ul>

                            <li class="active">
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
                    <div class="careerfy-employer-box-section">
                        
                        <?php 
                              if($this->session->flashdata('message')){
                                echo $this->session->flashdata('message');  
                              } else {
                                echo '';  
                              }
                            ?>
                            <div class="careerfy-profile-title">
                            <h2 style="">My Dashboard</h2>
                        </div>

                        <ul class="careerfy-row careerfy-employer-profile-form">
                            <li class="careerfy-column-3 col-md-3 col-sm-6 col-xs-12" >
                               <!--  <div class="package-free">
                                    <h4>Free</h4>
                                    <p style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 100px 0 rgba(0, 0, 0, 0.19);">
                                        <a href="<?=base_url('employer/myJobPost')?>" style="color: #fff; font-size: 16px"><?= $result[0]['total_free_job_posted']?>/10</a>
                                    </p>
                                </div>
 -->
 <button class="btn btn-lg " style="width: 100%;background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);"> Free <br>  <a href="<?=base_url('employer/myJobPost')?>" style="color: #fff; font-size: 16px;"><?= $result[0]['total_free_job_posted']?>/10</a></button>
                            </li>

                            <li class="careerfy-column-3 col-md-3 col-sm-6 col-xs-12">
                                <!-- <div class="package-active">
                                    <h4>Active Packages</h4>
                                    <p style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 100px 0 rgba(0, 0, 0, 0.19);">
                                        <a href="#" style="color: #fff; font-size: 16px"><?= $active[0]['total_pack_active']?></a>
                                    </p>
                                </div> -->

                                <button class="btn btn-lg" style="width: 100%;background-image: -webkit-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);"> Active Packages <br>  <a href="#" style="color: #fff; font-size: 16px"><?= $active[0]['total_pack_active']?></a></button>
                            </li>
                             <?php if(!empty($active_packs)){
                                 foreach ($active_packs as $row) {
                                if($row['package_name'] == 'Platinum'){
                             ?>
                            <li class="careerfy-column-3 col-md-3 col-sm-6 col-xs-12">
                                <button class="btn btn-info btn-lg" style="width: 100%;background-image: -webkit-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);">
                                    <h4><?= $row['package_name'] ?></h4>
                                    <p style="box-shadow: 0 4px 8px 0 rgba(0, 0**, 0, 0.2), 0 6px 100px 0 rgba(0, 0, 0, 0.19);">
                                        <a href="<?=base_url('employer/myJobPost')?>" style="color: #fff; font-size:16px;"><?= $row['used_job_posts']?>/<?= $row['total_posts']?></a>
                                    </p>

                                </button>
                                </div>
                            </li>
                            <?php 
                                }else
                                {
                            ?>
                            <li class="careerfy-column-3 col-md-3 col-sm-6 col-xs-12">
                              
                                     <button class="btn btn-info btn-lg" style="width: 100%; background-color:#ffc107 !important;
    border-color: #ffc107 !important;">

                                    <h4><?= $row['package_name'] ?></h4>
                                   
                                        <a href="<?=base_url('employer/myJobPost')?>" style="color: #fff; font-size:16px;"><?= $row['used_job_posts']?>/<?= $row['total_posts']?></a>
                                    

                                </button>
                               
                            </li>
                        
                         <?php
                            }
                           }
                         } ?>
                            
                        
                        <?php if(!empty($expired_packs)){
                            $pflag = $gflag = 1;
                                 foreach ($expired_packs as $row) {
                                 if($row['package_name'] == 'Platinum'){
                            
                $active_platinum = $this->db->get_where('employer_packages',array('e_id'=>$this->session->userdata('EMP_ID'),'package_name'=>'Platinum','flag'=>'1'))->result_array();
                                    if(empty($active_platinum))
                                    {
                                        if($pflag == 1){
                                        $pflag = 0;
                             ?>
                            <li class="careerfy-column-3 col-md-3 col-sm-6 col-xs-12" style="list-style:none">
                                <div class="package-silver">
                                    <h4><?= $row['package_name'] ?></h4>
                                    <p style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 100px 0 rgba(0, 0, 0, 0.19);">
                                        <a href="<?= base_url('employer/platinum_req')?>" style="color: #fff; font-size:16px;">Renew Pack Now</a>
                                    </p>
                                </div>
                            </li>
                            <?php 
                                }
                                    }
                                }else
                                {
               $active_gold = $this->db->get_where('employer_packages',array('e_id'=>$this->session->userdata('EMP_ID'),'package_name'=>'Gold','flag'=>'1'))->result_array();
                            
                                    if(empty($active_gold))
                                    {
                                        if($gflag == 1){
                                            $gflag = 0;
            
                            ?>
                            <li class="careerfy-column-3 col-md-3 col-sm-6 col-xs-12" style="list-style:none">
                                <div class="package-gold">
                                    <h4><?= $row['package_name'] ?></h4>
                                    <p style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 100px 0 rgba(0, 0, 0, 0.19);">
                                        <a href="<?= base_url('employer/gold_req')?>" style="color: #fff; font-size:16px;">Renew Pack Now</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                         <?php 
                                }
                                }
                            }
                           } 
                         } ?>
                         
                        <div class="careerfy-managejobs-list-wrap">
                            <div class="careerfy-managejobs-list">
                                <!--<?php 
                                    if($this->session->flashdata('message')){
                                            echo $this->session->flashdata('message');  
                                          } else {
                                            echo '';  
                                          }
                                ?>-->
                                <div class="careerfy-table-layer careerfy-managejobs-thead">
                                    <div class="careerfy-table-row col-md-12 col-sm-12 col-xs-12">
                                        <div class="careerfy-table-cell col-md-6 col-sm-12 col-xs-12">
                                            Posted Jobs
                                        </div>

                                        <div class="careerfy-table-cell col-md-6 col-sm-12 col-xs-12">
                                            Applications
                                        </div>
                                        <!--<div class="careerfy-table-cell"></div>
                                        <div class="careerfy-table-cell"></div>
                                        <div class="careerfy-table-cell"></div>-->
                                    </div>
                                </div>
                                <!-- Manage Jobs Body -->
                                                <div class="careerfy-table-layer careerfy-managejobs-tbody">

                                                    <?php
                                                  foreach ($jobs_approved as $row) {
                                                  $emp_data =$this->db->select('*')->from('employer')->get()->result_array();
                                                    $count = $this->db->select('count(a_id) as total')->from('applied_jobs')->where('j_id',$row['j_id'])->get()->result_array();
                                                    ?>
                                                    <div class="careerfy-table-row col-md-12 col-sm-12 col-xs-12">
                                                        <div class="careerfy-table-cell col-md-6 col-sm-12 col-xs-12">
                                                         <img src="<?php echo base_url()?>assets/uploads/profile_pics/<?php echo $emp_data[0]['profile_pic']; ?>" height="80" width="100"> 
                                                            <ul class="jobs-list col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
                                                                <li class="col-md-12 col-sm-12 col-xs-12">
                                                                 <span><a href="<?=base_url('employer/view_job_post?j_id=').$row['j_id']?>" style="font-weight: bold; margin-bottom: 10px; font-size:16px;"><?php echo $row['job_title'];?></a></span>

                                                                </li>
                                                                <li class="col-md-12 col-sm-12 col-xs-12">
                                                                    <i class="fa fa-calendar"></i> <span style="color: #777;font-weight: bold;">Created:</span> <span><?php echo $row['job_post_date'];?></span>&nbsp;&nbsp;
                                                                </li>
                                                                <li class="col-md-12 col-sm-12 col-xs-12">
                                                                    <i class="fa fa-calendar"></i> <span style="color: #777;font-weight: bold;">Expiry:</span> <span><?php echo $row['job_post_expire_date'];?></span>
                                                                </li>
                                                                
                                                                <li class="col-md-12 col-sm-12 col-xs-12">
                                                                    <i class="fa fa-map-marker"></i>&nbsp;<?php echo $row['city']."-".$row['localities'];?>&nbsp;&nbsp;
                                                                    <i class="fa fa-briefcase"></i>&nbsp;<?php echo $row['job_role']."-".$row['sub_roles'];?>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <div class="careerfy-table-cell col-md-6 col-sm-12 col-xs-12"><a href="<?=base_url('employer/view_applications?j_id=').$row['j_id']?>" class="careerfy-managejobs-appli"><?php echo $count[0]['total'];?> Applications</a></div>
                                                                                                      
                                                    </div>

                                                <?php
                                             }
                                         ?>
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
    