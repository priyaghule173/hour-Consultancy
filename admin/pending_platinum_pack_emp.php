<link rel="stylesheet" href="https:/ / maxcdn.bootstrapcdn.com / bootstrap / 3.3.7 / css / bootstrap.min.css ">
  <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" > </script>

   <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
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
    <h3>Platinum Packages</h3>
  </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Platinum Packages</h1>
</div>

<?php $this->load->view('admin/demo'); ?>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-3 col-sm-12 col-xs-12 navigation">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
            <!-- <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>images/profile.png" alt="Profile img">
                            </a>
                            <figcaption>
                                <h2  style="font-size: 18px;"><?= $this->session->userdata('EMAIL_ID')?></h2>
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
                         
                          <li class="active">
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

      <div class="col-md-9 col-sm-12 col-xs-12 main-page">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dasboard">
            <div class="careerfy-employer-box-section">

              <!-- Profile Title -->
                <div class="careerfy-profile-title">
                                        
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#TAB_1">Pending Request`s</a></li>
                            <li><a data-toggle="tab" href="#TAB_2">Active Employers Packs</a></li>
                            <li><a data-toggle="tab" href="#TAB_3">Custom Packages</a></li>
                            </ul>
                    </div>
                                    <!-- tab start -->
                                    <div class="tab-content">
                                    <!-- tab first start -->
                                    <div id="TAB_1" class="tab-pane fade in active">
                                      <form method="post" action="<?=base_url('admin/pendingPlatinumPackEmp')?>">
                                        <!-- <div class="row"> -->
                                          <div class="careerfy-employer-box-section">
                                          <div class="careerfy-profile-title">
                                            <h2 style="font-size: 16px;">Update Amount</h2>
                                           </div>
                                           <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Enter Amount*</label>
                                                <input class="form-control input-lg" type="number" name="amount_paid" min="0"  onblur="if(this.value == '') { this.value ='Old Password'; }" onfocus="if(this.value =='Old Password') { this.value = ''; }" autocomplete="off" required>
                                                </li>
                                                <li class="careerfy-column-6">

                                                 <input type="submit" name="paid_platinum" class="careerfy-employer-profile-submit" value="Paid" style="margin-top: -62px; font-size: 14px;">
                                                </li>
                                             
                                           </ul>
                                          
                                        </div>
                                          
                                          <!-- <div class="col-md-12 col-sm-12 bg-white padding-2"> -->
                                            <div class="careerfy-profile-title">
                                            <h2 style="font-size: 18px;">Pending Employers Platinum Package Approval</h2>
                                           </div>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="box-body table-responsive no-padding">
                                                 <table id="example2" class="table table-hover">
                                                    <thead style="font-size: 13px;">
                                                      <th class="active">
                                                      <input type="checkbox" class="select-all checkbox" name="select-all" />
                                                      </th>
                                                      <th>Employer Name</th>
                                                      <th>Phone No.</th>
                                                      <th>Request Date</th>
                                                      <th>Status</th>
                                                   </thead>
                                                    <tbody>
                                                    <?php
                                                      foreach ($result as $row) {
                                                        ?>
                                                        <tr>
                                                           <td>
                                                           <input type="checkbox" required="required" class="select-item checkbox" name="select_emp[]" value="<?=$row['job_post_by_emp_id']?>" title="<?=$row['job_post_by_emp_id']?>"/>
                                                          </td>
                                                           <td>
                                                            <?= $row['job_post_by_emp_name']?>
                                                          </td>
                                                          <td>
                                                            <?= $row['phone']?>
                                                          </td>
                                                          <td>
                                                            <?= $row['job_post_date']?>
                                                          </td>
                                                          <td>Unpaid</td>
                                                        </tr>
                                                      <?php
                                                      }
                                                    ?>
                                                    </tbody>                
                                                  </table>
                                                </div>
                                              </div>
                                            <!-- </div>
                                          </div> -->
                                         
                                        </div>
                                      </form> 
                                  </div>
                              <!-- tab first end -->
                              <!-- tab second start -->
                                  <div id="TAB_2" class="tab-pane fade">
                                   <!--  <div class="row">
                                        <div class="col-md-12 bg-white padding-2"> -->
                                          <div class="careerfy-profile-title">
                                            <h2 style="font-size: 18px;">Active Employers Platinum Package List</h2>
                                           </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="box-body table-responsive no-padding">
                                               <table id="example3" class="table table-hover">
                                                  <thead style="font-size: 13px;">
                                                    <th>Employer Name</th>
                                                    <th>Package Name</th>
                                                    <th>Package Price</th>
                                                    <th>Amount Paid</th>
                                                    <th>Package Validities</th>
                                                    <th>Total Posts</th>
                                                    <th>Used Job Posts</th>
                                                    <th>Active Date</th>
                                                    <th>Pack Expire Date</th>
                                                  </thead>
                                                        <tbody>
                                                  <?php
                                                    foreach ($active_packages_list as $row) {
                                                      ?>
                                                      <tr>
                                                                            <td>
                                                          <?= $row['emp_name']?>
                                                        </td>
                                                        <td>
                                                          <?= $row['package_name']?>
                                                        </td>
                                                        <td>
                                                          <?= $row['package_price']?>
                                                        </td>
                                                        <td>
                                                          <?= $row['amount_paid']?>
                                                        </td>
                                                        <td>
                                                          <?= $row['package_validities']?>
                                                        </td>
                                                        <td>
                                                          <?= $row['total_posts']?>
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
                                                  </tr>
                                                    <?php
                                                    }
                                                  ?>
                                                  </tbody>        
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        <!-- </div>
                                       </div> -->
                                      </div>
                                    <!-- tab second end -->
                                    <!-- tab third start -->
                                    <div id="TAB_3" class="tab-pane fade">
                                      <!-- <div class="row">
                                          <div class="col-md-12 bg-white padding-2"> -->
                                            <!-- <div class="careerfy-profile-title">
                                            <h2>Active Custom Employers Platinum Package</h2>
                                           </div> -->
                                            <div class="row">
                                              <div class="col-md-12">
                                                <form class="careerfy-employer-dasboard" action="<?=base_url('admin/custom_platinum_emp_pack')?>" method="post">
                                                  <div class="careerfy-employer-box-section">
                                                      <div class="careerfy-profile-title">
                                                          <h2 style="font-size: 18px;">Active Custom Employers Platinum Package</h2>
                                                      </div>
                                                      <ul class="careerfy-row careerfy-employer-profile-form">
                                                           <?php
                                                       $emp_list = $this->db->select('distinct(employer.e_id),first_name,last_name')->from('employer')->join('job_posts','employer.e_id != job_posts.job_post_by_emp_id')
                                                          ->where('Package_type!=','Platinum')->where('active','1')->where('employer.e_id NOT IN (select employer_packages.e_id from employer_packages where package_name ="Platinum")')->order_by('first_name','ASC')->get()->result_array();
                                                        ?>
                                                          <li class="careerfy-column-12 col-sm-12" style="margin-bottom: 10px;">
                                                              <label style="font-size: 13px;">Employer List</label>
                                                              <select id="emp_list" multiple="multiple" name="emp_list[]">
                                                              <?php
                                                          foreach ($emp_list as $row) {
                                                             ?>
                                                             <option value="<?=$row['e_id']?>"><?=$row['first_name']." ".$row['last_name']?></option>
                                                             <?php
                                                           } 
                                                          ?>
                                                         </select>
                                                        </li>
                                                        <li class="careerfy-column-6 col-sm-6">
                                                          <label style="font-size: 13px;">Package Name*</label>
                                                          <input class="form-control input-lg" value="Platinum" readonly="readonly" type="text"  onblur="if(this.value == '') { this.value ='Old Password'; }" onfocus="if(this.value =='Old Password') { this.value = ''; }" autocomplete="off" required>
                                                      </li>
                                                      <li class="careerfy-column-6 col-sm-6">
                                                          <label style="font-size: 13px;">Enter the Amount*</label>
                                                          <input type="number" class="form-control  input-lg"  name="amount" min="0" onblur="if(this.value == '') { this.value ='Old Password'; }" onfocus="if(this.value =='Old Password') { this.value = ''; }" autocomplete="off" required>
                                                      </li>
                                                      </ul>
                                                    <input type="submit" name="Activate" value="Activate" class="careerfy-employer-profile-submit">
                                                 
                                                  </div>
                                                 </form>
                                              </div>
                                            </div>
                                          </div>
                                        <!-- </div>
                                        </div> -->
                                      <!-- tab third end -->
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
<!-- Bootstrap 3.3.7 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- DataTables -->
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollY": 350,
      "scrollX": true
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
</script>
<!-- <script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 --><script>
    $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
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
            all.checked = len===total;
        }
    });
</script>
</body>
</html>



