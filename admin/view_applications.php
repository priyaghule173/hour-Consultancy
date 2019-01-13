<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<?php 
   if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');  
          } else {
            echo '';  
          }
?>
<script type="text/javascript">
   $(function () {
            $('#emp_list').multiselect({
                includeSelectAllOption: true,
                maxHeight: 100
            });
        });
</script>

<!-- <div class="inner-heading">
  <div class="container">
    <h3>Admin Dashboard</h3>
  </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">View Applications</h1>
</div>

<?php $this->load->view('admin/demo'); ?>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3" style="width: 20%;">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
                                    <figure>
                                        <a href="#" class="employer-dashboard-thumb">
                                          <img src="<?= base_url()?>images/profile.png" alt="">
                                        </a>
                                        <figcaption>
                                            <h5><?= $this->session->userdata('EMAIL_ID')?></h5>
                                        </figcaption>
                                    </figure>
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
                        <div class="careerfy-column-9" style="width: 80%; padding-left: 0px;">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section">
                                      <div class="careerfy-profile-title">
                                        <h2>View Application</h2>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="box-body table-responsive no-padding">
                                          <form method="post" action="<?=base_url('admin/download_csv')?>">
                                           <input type="button" id="export_to_csv" style="margin-right:10px; padding: 10px 10px;" class="careerfy-employer-profile-submit" name="submit_c" value="Export to CSV">
                                           <input type="button" id="resume_download_1" style="margin-right:10px; padding: 10px 10px;" class="careerfy-employer-profile-submit" name="download_resume" value="Download Resume">
                                            <span style="float:right">
                                             <label>Sort Data</label>
                                             <select name="sort_flag" id="all" onchange="flag_change()">
                                              <option value="all">All Data</option>
                                              <option value="1">Flag Data</option>
                                            </select>
                                            </span>
                                            <div id="show_all">
                                            <table id="example2" class="table table-hover">
                                              <thead>
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
                                                <th>Applied Date</th>
                                                <th>Download Resume</th>
                                                <!-- <th>Status</th> -->
                                              </thead>
                                              <tbody>
                                              <?php
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
                                                  <td><?php echo $row['c_name']; ?></td>
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
                                                    <td><?=$row['applied_date']?></td>
                                                    <?php if($row['resume'] != '') { ?>
                                                  <td><a href="<?=base_url()?>resume/<?php echo $row['resume']; ?>" download="<?php echo $row['resume'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                                  <?php } else { ?>
                                                  <td>No Resume Uploaded</td>
                                                  <?php } ?>
                                                  <!-- <td><?= $row['action']?></td> --> 
                                                </tr>
                                              <?php
                                            }
                                              ?>
                           
                                               </tbody>                    
                                            </table>
                                          </div>

                                          <div id="show_data" style="display:none;">
                                            <table id="example3" class="table table-hover">
                                              <thead>
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
                                                <th>Applied Date</th>
                                                <th>Download Resume</th>
                                                <!-- <th>Status</th> -->
                                              </thead>
                                              <tbody>
                                              <?php
                                               $j_id = $this->input->get('j_id');
                                             $result1 = $this->db->select('c_name,applied_date,action,candidates.*')->from('applied_jobs')->where('flag',"1")->where('j_id',$j_id)->join('candidates','applied_jobs.c_id = candidates.c_id')->order_by('a_id','DESC')->get()->result_array();
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
                                                  <td><?php echo $row['c_name']; ?></td>
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
                                                    <td><?=$row['applied_date']?></td>
                                                    <?php if($row['resume'] != '') { ?>
                                                  <td><a href="<?=base_url()?>resume/<?php echo $row['resume']; ?>" download="<?php echo $row['resume'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                                  <?php } else { ?>
                                                  <td>No Resume Uploaded</td>
                                                  <?php } ?>
                                                  <!-- <td><?= $row['action']?></td> --> 
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
  $(function () {
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });
  });
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
</body>
</html>