   <link rel="stylesheet" href="https:/ / maxcdn.bootstrapcdn.com / bootstrap / 3.3.7 / css / bootstrap.min.css ">
  <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" > </script>

   <!-- DataTables -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
   <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
<!--   <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
   <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
 -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.tablednd/0.8/jquery.tablednd.0.8.min.js"></script>


<script>
$(function() {
    $( ".row_position" ).sortable();
  });
  
  function saveOrder() {
  var data = new Array();
  $('.row_position tr').each(function() {
  data.push($(this).attr("id"));
  });
  document.getElementById("row_order").value = data;
alert("Featured Job Saved Successfully");
  }

</script>
  <style>
  .row_position{
  cursor:move
  }
  </style>

  <!--  <div class="inner-heading">
     <div class="container">
      <h3>Featured Jobs Section</h3>
    </div> -->

    <div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Featured Jobs Section</h1>
</div>

<?php $this->load->view('admin/demo'); ?>

  </div>
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
     <li class="active">
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
      <?php 
      if($this->session->flashdata('message')){
            echo $this->session->flashdata('message');  
          } else {
            echo '';  
          }

      ?>
<div class="col-md-9 main-page">
  <div class="careerfy-typo-wrap">
    <div class="careerfy-employer-dasboard">
      <div class="careerfy-employer-box-section">
        <!-- Profile Title -->
        <div class="careerfy-profile-title">
          <ul class="nav nav-tabs">
            <li class="active">
              <a data-toggle="tab" href="#TAB_1">All Featured Jobs</a>
            </li>
            <li>
              <a data-toggle="tab" href="#TAB_2">All Active Jobs</a>
            </li>
            <li>
              <a data-toggle="tab" href="#TAB_3">Request`s Featured Jobs <span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= count($total_fj)?></span></a>
            </li>
            <li>
              <a data-toggle="tab" href="#TAB_4">Rejected Featured Jobs</a>
            </li>
          </ul>
        </div>

        <!-- tab start -->
        <div class="tab-content">
          <!-- tab first start -->
          <div id="TAB_1" class="tab-pane fade in active">
            <div class="row">
              <div class="col-md-12 bg-white padding-2">
                <h3 style="font-size: 18px; margin-bottom: 10px;">Featured Job List</h3>
                <div class="row margin-top-20">
                  <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">
       <form name="frmQA" method="POST"/>       

<!--                      <form method="post" action="<?=base_url('admin/download_csv')?>">
 -->            <input type = "hidden" name="row_order" id="row_order" /> 
<input type="submit" class="btn btn-primary" name="submit" value="Save Changes" style="font-size: 13px; margin-bottom: 10px;" onClick="saveOrder();" />
                       <table id="sortable-row" class="table table-hover" style="padding-top: 20px;">
                        <thead style="font-size: 13px;">
                          <th>#</th>
                          <th>Package Type</th>
                          <th>Employer Name</th>
                          <th>Job Title</th>
                          <th>Job Type</th>
                        </thead>
                        <tbody class="row_position" style="font-size: 13px;">
                          <?php 
                          $FJ = $this->db->order_by('sequence_featured_job','ASC')->join('employer','job_posts.job_post_by_emp_id=employer.e_id')->get_where('job_posts',array('featured_job'=>'1','action'=>'1'))->result_array();
                          if(!empty($FJ)){
                          foreach ($FJ as $FJL) {
                            ?>
                            <tr id="<?= $FJL['j_id']?>">
<!--                        <th scope="row"><?= $FJL['j_id']?></th>-->                                
                            <td><i class="fa fa-battery-full" aria-hidden="true"></i></td>
                            <td><?= $FJL['Package_type']?></td>                          
                            <td><?= $FJL['first_name']." ".$FJL['middle_name']." ".$FJL['last_name']?></td>                          
                            <td><?= $FJL['job_title']?></td>                          
                            <td><?= $FJL['job_type']?></td> 
                            </tr>                         
                          <?php } } ?>
                      </tbody>

                    </table>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- tab first end -->

      <?php
if(isset($_POST["submit"])) {
$id_ary = explode(",",$_POST["row_order"]);
 
  for($i=0;$i<count($id_ary);$i++) {
  $this->db->query("UPDATE job_posts SET sequence_featured_job='" . $i . "' WHERE j_id='". $id_ary[$i]."' AND featured_job =1" );
  }
  redirect(base_url('admin/featuredJob'));
}
      ?>
      <!-- tab second start -->
      <div id="TAB_2" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12 bg-white padding-2">

           <div class="row margin-top-20">
            <div class="col-md-12">
              <div class="box-body table-responsive no-padding">
               <table id="example3" class="table table-hover">
                <thead style="font-size: 13px;">
                  <th>#</th>
                  <th>Package Type</th>
                  <th>Employer Name</th>
                  <th>Job Title</th>
                  <th>Job Type</th>
                </thead>
                <tbody>
                         <?php 
                          $FJ = $this->db->order_by('j_id','DESC')->join('employer','job_posts.job_post_by_emp_id=employer.e_id')->get_where('job_posts',array('action'=>'1','request_fj !='=>'2'))->result_array();
                          if(!empty($FJ)){
                          foreach ($FJ as $FJL) {
                            ?>
                            <tr>
                            <td>
                              <?php
                                if($FJL['featured_job']=='1'){
                              ?>
                              <a href="<?= base_url('admin/change_feature_job?j_id='.$FJL['j_id'].'&f_j=0')?>"><i class="fa fa-battery-full" aria-hidden="true"></i></a>
                              
                              <?php }else{?>
                              <a href="<?= base_url('admin/change_feature_job?j_id='.$FJL['j_id'].'&f_j=1')?>"><i class="fa fa-battery-empty" aria-hidden="true"></i></a>
                              
                              <?php }?></td>
                            <td><?= $FJL['Package_type']?></td>                          
                            <td><?= $FJL['first_name']." ".$FJL['middle_name']." ".$FJL['last_name']?></td>                          
                            <td><?= $FJL['job_title']?></td>                          
                            <td><?= $FJL['job_type']?></td> 
                            </tr>                         
                          <?php } } ?>
              </tbody>          
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- tab second end -->

      <!-- tab third start -->
      <div id="TAB_3" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12 bg-white padding-2">

           <div class="row margin-top-20">
            <div class="col-md-12">
              <div class="box-body table-responsive no-padding">
               <form method="post" action="<?=base_url('admin/add_reject_fj')?>">
                <input type="button" id="mark_fj" style="margin-right:10px; padding: 10px 10px; font-size: 14px;" class="careerfy-employer-profile-submit" name="mark_fj" value="Add Featured Job">
                <input type="button" id="reject_fj" style="margin-right:10px; padding: 10px 10px; font-size: 14px;" class="careerfy-employer-profile-submit" name="reject_fj" value="Reject Featured Job">

               <table id="example4" class="table table-hover">
                <thead style="font-size: 13px;">
                  <th class="active">
                    <input type="checkbox" class="select-all checkbox" name="select-all" />
                  </th>
                  <th>Package Type</th>
                  <th>Employer Name</th>
                  <th>Job Title</th>
                  <th>Job Type</th>
                </thead>
                <tbody>
                         <?php 
                          $FJ = $this->db->order_by('j_id','DESC')->join('employer','job_posts.job_post_by_emp_id=employer.e_id')->get_where('job_posts',array('action'=>'1','request_fj'=>'1','featured_job'=>'0'))->result_array();
                          if(!empty($FJ)){
                          foreach ($FJ as $FJL) {
                            ?>
                            <tr>
                            <td>
                              <input type="checkbox" class="select-item checkbox" name="select_mark[]" value="<?=$FJL['j_id']?>" title="<?=$FJL['j_id']?>"/>
                            </td>
                            <td><?= $FJL['Package_type']?></td>                          
                            <td><?= $FJL['first_name']." ".$FJL['middle_name']." ".$FJL['last_name']?></td>                          
                            <td><?= $FJL['job_title']?></td>                          
                            <td><?= $FJL['job_type']?></td> 
                            </tr>                         
                          <?php } } ?>
              </tbody>          
            </table>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- tab third end -->

      <!-- tab four start -->
      <div id="TAB_4" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12 bg-white padding-2">

           <div class="row margin-top-20">
            <div class="col-md-12">
              <div class="box-body table-responsive no-padding">
               <table id="example5" class="table table-hover">
                <thead style="font-size: 13px;">
                  
                  <th>Package Type</th>
                  <th>Employer Name</th>
                  <th>Job Title</th>
                  <th>Job Type</th>
                </thead>
                <tbody>
                         <?php 
                          $FJ = $this->db->order_by('j_id','DESC')->join('employer','job_posts.job_post_by_emp_id=employer.e_id')->get_where('job_posts',array('action'=>'1','request_fj ='=>'2'))->result_array();
                          if(!empty($FJ)){
                          foreach ($FJ as $FJL) {
                            ?>
                            <tr>
                            <td><?= $FJL['Package_type']?></td>                          
                            <td><?= $FJL['first_name']." ".$FJL['middle_name']." ".$FJL['last_name']?></td>                          
                            <td><?= $FJL['job_title']?></td>                          
                            <td><?= $FJL['job_type']?></td> 
                            </tr>                         
                          <?php } } ?>
              </tbody>          
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- tab four end -->

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
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
 <!-- Bootstrap 3.3.7 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!-- DataTables -->
 <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!--<script>
  $(function () {
    $('#sortable-row').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
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

</script>
 -->
<script type="text/javascript">
    $(document).ready(function () {
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });

    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });

    $('#example5').DataTable({
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
                alert("Please Select Job");
                $('#mark_fj').attr('type','button');
                $('#reject_fj').attr('type','button');
                
            }
            else if(len > 0)
            {
                $('#mark_fj').attr('type','submit');
                $('#reject_fj').attr('type','submit');
            }
            all.checked = len===total;
        }
    });
</script>

</body>
</html>



