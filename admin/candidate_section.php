<link rel="stylesheet" href="https:/ / maxcdn.bootstrapcdn.com / bootstrap / 3.3.7 / css / bootstrap.min.css ">
  <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" > </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
   <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
   
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
        
<!-- <div class="inner-heading">
  <div class="container">
    <h3>Candidate Section</h3>
  </div>
</div> -->

 <div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Candidate Section</h1>
</div>

<?php $this->load->view('admin/demo'); ?>


<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 navigation">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
           <!--  <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>images/profile.png" alt="">
                            </a>
                            <figcaption>
                                <h2 style="font-size: 18px;"><?= $this->session->userdata('EMAIL_ID')?></h2>
                            </figcaption>
                        </figure> -->

                       <ul>
                          <li >
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
                         <!-- <li>
                            <a href="<?= base_url('admin/featuredJob');?>">
                             <i class="fa fa-user-o"></i>
                             Featured Job<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= count($total_fj)?></span>
                           </a>
                         </li>-->
                          <li>
                            <a href="<?= base_url('admin/createJobRole');?>">
                              <i class="fa fa-briefcase"></i>
                              Add Specialization
                            </a>
                          </li>

                          <li class="active">
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
            <div class="careerfy-employer-box-section">
              <!-- Profile Title -->
                                      <div class="careerfy-profile-title">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#TAB_1">Registered Candidates</a></li>
                                          <li><a data-toggle="tab" href="#TAB_2">Application Received Per Job</a></li>
                                        </ul>
                                      </div>

                                      <!-- tab start -->
                                    <div class="tab-content">
                                    <!-- tab first start -->
                                    <div id="TAB_1" class="tab-pane fade in active">
                                      <div class="row">
                                      <div class="col-md-12 bg-white padding-2">
                                        <h3>Candidate List</h3>Total : <?=count($result)?>
                                        <div class="row margin-top-20">
                                          <div class="col-md-12">
                                            <div class="box-body table-responsive no-padding">
                                             <form method="post" action="<?=base_url('admin/download_csv')?>">
                                             <input type="button" id="export_to_csv" style="margin-right:10px; padding: 5px 5px; font-size: 12px; margin-bottom: 20px;" class="careerfy-employer-profile-submit"  name="submit_c" value="Export to CSV">
                                             <input type="button" id="resume_download_1" style="margin-right:10px; padding: 5px 5px; font-size: 12px;" class="careerfy-employer-profile-submit" name="download_resume" value="Download Resume">
                                             <span style="float:right">
                                             <label>Sort Data</label>
                                             <select name="sort_flag" id="all" onchange="flag_change()">
                                              <option value="all">All Data</option>
                                              <option value="1">Flag Data</option>
                                            </select>
                                            </span>
                                            <div id="show_all">
                                             <table id="example2" class="table table-hover" style="padding-top: 20px;">
                                                <thead style="font-size: 13px;">
                                                  <th class="active">
                                                  <input type="checkbox" class="select-all checkbox" name="select-all" />
                                                  </th>
                                                  <th>Flag</th>
                                                  <th>Candidate Name</th>
                                                  <th>Qualification</th>
                                                  <th>Email Id</th>
                                                  <th>Mobile No.</th>
                                                  <th>Skills</th>
                                                  <th>City</th>
                                                  <th>Download Resume</th>
                                                  <!-- <th>Action</th> -->
                                                </thead>
                                                <tbody style="font-size: 13px;">
                                                <?php
                                                /*
                                                $result = $this->db->select('*')->from('candidates')->order_by('c_id','DESC')->get()->result_array();
*/
                                                  foreach ($result as $row) {
                                                    ?>
                                                    <tr>
                                                      <td>
                                                       <input type="checkbox" class="select-item checkbox" name="select_can[]" value="<?=$row['c_id']?>" title="<?=$row['c_id']?>"/>
                                                      </td>
                                                      <td><?php if($row['flag']=="1"){
                                                        ?>
                                                        <a href="<?php echo base_url('admin/cand_flag_change?c_id='.$row['c_id'].'&flag=0'); ?>"><i class="fa fa-bookmark"></i></a>
                                                        <?php 
                                                      } else{ ?>
                                                      <a href="<?php echo base_url('admin/cand_flag_change?c_id='.$row['c_id'].'&flag=1'); ?>"><i class="fa fa-bookmark-o"></i></a>
                                                    <?php } ?></td>
                                                       <td>
                                                        <?= $row['first_name']?>&nbsp;&nbsp;<?= $row['last_name']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['highest_qualification']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['email_id']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['phone']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['skills']?>
                                                      </td>
                                                      <td>
                                                        <?= $row['city']?>
                                                      </td>
                                                      <?php if($row['resume'] != '') { ?>
                                                    <td><a href="<?=base_url()?>resume/<?php echo $row['resume']; ?>" download="<?php echo $row['resume'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                                    <?php } else { ?>
                                                    <td>No Resume Uploaded</td>
                                                    <?php } ?>
                                                      <!-- <td>
                                                        view delete
                                                      </td> -->
                                                    </tr>
                                                  <?php
                                                  }
                                                ?>
                                                </tbody>
                                                              
                                              </table>
                                            </div>




                                              <div id="show_data" style="display:none;">
                                              <table id="example3" class="table table-hover" style="padding-top: 20px;">
                                                <thead style="font-size: 13px;">
                                                  <th class="active">
                                                  <input type="checkbox" class="select-all checkbox" name="select-all" />
                                                  </th>
                                                  <th>Flag</th>
                                                  <th>Candidate Name</th>
                                                  <th>Qualification</th>
                                                  <th>Email Id</th>
                                                  <th>Mobile No.</th>
                                                  <th>Skills</th>
                                                  <th>City</th>
                                                  <th>Download Resume</th>
                                                  <!-- <th>Action</th> -->
                                                </thead>
                                                <tbody style="font-size: 13px;">
                                                <?php
                                                      $result1 = $this->db->select('*')->from('candidates')->where('flag',"1")->order_by('c_id','DESC')->get()->result_array();

                                                  foreach ($result1 as $row) {
                                                    ?>
                                                    <tr>
                                                      <td>
                                                       <input type="checkbox" class="select-item checkbox" name="select_can[]" value="<?=$row['c_id']?>" title="<?=$row['c_id']?>"/>
                                                      </td>
                                                      <td><?php if($row['flag']=="1"){
                                                        ?>
                                                        <a href="<?php echo base_url('admin/cand_flag_change?c_id='.$row['c_id'].'&flag=0'); ?>"><i class="fa fa-bookmark"></i></a>
                                                        <?php 
                                                      } else{ ?>
                                                      <a href="<?php echo base_url('admin/cand_flag_change?c_id='.$row['c_id'].'&flag=1'); ?>"><i class="fa fa-bookmark-o"></i></a>
                                                    <?php } ?></td>
                                                       <td>
                                                        <?= $row['first_name']?>&nbsp;&nbsp;<?= $row['last_name']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['highest_qualification']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['email_id']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['phone']?>
                                                      </td>
                                                      <td>
                                                        <?=$row['skills']?>
                                                      </td>
                                                      <td>
                                                        <?= $row['city']?>
                                                      </td>
                                                      <?php if($row['resume'] != '') { ?>
                                                    <td><a href="<?=base_url()?>resume/<?php echo $row['resume']; ?>" download="<?php echo $row['resume'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                                    <?php } else { ?>
                                                    <td>No Resume Uploaded</td>
                                                    <?php } ?>
                                                      <!-- <td>
                                                        view delete
                                                      </td> -->
                                                    </tr>
                                                  <?php
                                                  }
                                                ?>
                                                </tbody>
                                                              
                                              </table>
                                            </div>
                                            </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              <!-- tab first end -->
                              <!-- tab second start -->
                                  <div id="TAB_2" class="tab-pane fade">
                                    <div class="row">
                                      <div class="col-md-12 bg-white padding-2">
                                       
                                         <div class="row margin-top-20">
                                          <div class="col-md-12">
                                            <div class="box-body table-responsive no-padding">
                                             <table id="example4" class="table table-hover">
                                                <thead style="font-size: 13px;">
                                                  <th>Employer Name</th>
                                                  <th>Job Title</th>
                                                  <th>Created Date</th>
                                                  <th>Approved Date</th>
                                                  <th>Expire Date</th>
                                                  <th>Location</th>
                                                  <th>Job Role</th>  
                                                  <th>Status</th>
                                                  <th>Applications Received</th>
                                                </thead>
                                                     <tbody>
                                                <?php
                                              foreach ($candidate_applications as $row) {
                                                ?>
                                                  <tr>
                                                    <td><?= $row['first_name']?>&nbsp;&nbsp;<?= $row['last_name']?></td>
                                                    <td><?php echo $row['job_title']; ?></td>
                                                    <td>
                                                      <?= $row['job_post_date']?>
                                                    </td>
                                                    <td>
                                                      <?= $row['approved_job_post_date']?>
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
                                                      <a href="<?=base_url('admin/view_applications?j_id=').$row['j_id']?>"><?= $row['total']?></a>
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
                                    <!-- tab second end -->
                                  </div>
                                    <!-- tab ends -->
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
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
  $(document).ready(function () {
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
$(document).ready(function () {
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
</script>
<script type="text/javascript">
function showUser(str,EID)
{
  var EID_new = EID;
  var emp_action = str;
alert('Status Updated');
  //alert(EID_new+str);
  $.ajax({
        type: "POST",
        url: "<?=base_url('admin/update_emp_status')?>",
        data: {'e_id': EID_new ,'status' :emp_action},
        success: function () {
                 window.location.href = "<?=base_url('admin/pending_employer')?>";     
        }
    });
}

function flag_change(){
var all = $('#all').val();
  //alert(all);
  if(all== "1"){
         $('#show_all').hide();
         $('#show_data').show();       
  }
  else{
        $('#show_data').hide();
         $('#show_all').show();
  }
  
}
</script>
<script>
    $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
            checkSelected();

        });

        //button select invert
        $("#select-invert").click(function () {
            $("input.select-item").each(function (index,item) {
                item.checked = !item.checked;
            });
            checkSelected();
        });

        //button get selected info
        $("#selected").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("no selected items!!!");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
            checkSelected();
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });

        //check is all selected
        function checkSelected() {
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            console.log("total:"+total);
            console.log("len:"+len);
            if(len==0){
                alert("Please Select Candidate");
                $('#resume_download_1').attr('type','button');
                $('#export_to_csv').attr('type','button');
                
            }
            else if(len > 0)
            {
                $('#resume_download_1').attr('type','submit');
                $('#export_to_csv').attr('type','submit');
            }
            all.checked = len===total;
        }
    });
</script>
</body>
</html>



