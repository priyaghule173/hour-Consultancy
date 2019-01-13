<!-- <div class="inner-heading">
<div class="container">
<h3>Candidate Dashboard</h3>
</div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
<h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Applied Jobs</h1>
</div>

<!-- <?php //$this->load->view('candidate/demo',$profile); ?>


<?php 
$profile //= $profile[0];
?> -->

<div class="inner-content emp-dashboard">
<div class="container-fluid">
<div class="row">
<div class="col-md-3 navigation">
<div class="careerfy-typo-wrap">
<div class="careerfy-employer-dashboard-nav">
<!-- <figure>
<a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>assets/uploads/images/<?= $profile['profile_photo']?>" alt="">
</a>
<figcaption>
<h2 style="font-size: 18px;"><?= $profile['first_name']?>&nbsp;<?= $profile['last_name']?></h2>
</figcaption>
</figure> -->

<ul>
<li >
<a href="<?= base_url('candidate/candidateDashboard');?>">
<i class="fa fa-dashboard"></i>
Dashboard
</a>
</li>

<li>
<a href="<?= base_url('candidate/candidateProfile');?>">
<i class="fa fa-user-o"></i>
My Profile
</a>
</li>
<li class="active">
<a href="<?= base_url('candidate/applied_jobs');?>">
<i class="fa fa-briefcase"></i>
Applied Jobs
</a>
</li>

<li>
<a href="<?= base_url('candidate/findJob');?>">
<i class="fa fa-search"></i>
Find Jobs
</a>
</li>

<?php
$unreadmails = $this->db->query('SELECT COUNT(mailbox_id) as unread FROM mailbox WHERE user_type = 1 AND to_userid="'.$this->session->userdata('c_id').'" AND flag = 0')->result_array(); 
?>
<li>
<a href="<?= base_url('candidate/mailbox');?>">
<i class="fa fa-envelope"></i>
Mailbox&nbsp;<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $unreadmails[0]['unread']?>
</a>
</li>


<li>
<a href="<?= base_url('candidate/changePassword');?>">
<i class="fa fa-cog"></i>
Change Password
</a>
</li>

<li>
<a href="<?= base_url('candidate/logout');?>">
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
<h2 style="font-size: 18px;">Applied Jobs</h2>
</div>
<?php
if(!empty($result)){
// print_r($result);
?>
<div class="careerfy-applied-jobs">
<div class="careerfy-row">
<ul>
<?php 
foreach ($result as $row) {
$img = $this->db->get_where('employer',array('e_id'=>$row['e_id']))->result_array();
?>
<li class="careerfy-column-12 col-sm-12">
<div class="careerfy-applied-jobs-wrap">
<a href="" class="careerfy-applied-jobs-thumb">
<img src="<?= base_url()?>assets/uploads/profile_pics/<?= $img[0]['profile_pic']?>" >
</a>

<div class="careerfy-applied-jobs-text">
<div class="careerfy-applied-jobs-left">
<a  class="label label-warning" style="
    font-size: 10;
    height:;
    font-size: 25px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    color: white;
    background-color: #f05a22f7;
" href="<?php echo base_url('candidate/jobDetails?j_id=').$row['j_id']?>"><span style="color: white"><?= $row['job_title']?></span></a>
<h2 style="
    font-size: 18px;
    color: white;
    padding-top: 10px;
    "><a href="#" style="color:#a9d86e">
<?= $img[0]['company_name']?></a></h2>
<ul>
<li>
<i class="fa fa-map-marker" style="
    color: red;
    font-size: 20px;
"></i>
<?= $row['city']." : ".$row['localities'] ?>
</li>

<li>
<i class="fa fa-filter" style="
    color: green;
    font-size: 20px;
"></i>
<?= $row['sub_roles'] ?>
</li>

<li>
<i class="fa fa-calendar" style="
    color: deeppink;
    font-size: 20px;
"></i>
<?= $row['applied_date']?>
</li>
</ul>
</div>
</div>
</div>
</li>
<?php } ?>

<!-- <li class="careerfy-column-12 col-sm-12">
<div class="careerfy-applied-jobs-wrap">
<a href="" class="careerfy-applied-jobs-thumb">
<img src="<?= base_url()?>images/candidate-01.jpg" alt="candidate-01">
</a>

<div class="careerfy-applied-jobs-text">
<div class="careerfy-applied-jobs-left">
<a href=""><span>Job 1</span></a>
<h2 style="font-size: 18px;"><a href="">Overdue Accounts Officer for Audit</a></h2>
<ul>
<li>
<i class="fa fa-map-marker"></i>a,b,c
</li>

<li>
<i class="fa fa-filter"></i>
etc
</li>

<li>
<i class="fa fa-calendar"></i>
2018-03-29 11:03:51
</li>
</ul>
</div>

<a href="" class="careerfy-savedjobs-links">
<i class="fa fa-trash-o"></i>
</a>

<a href="" class="careerfy-savedjobs-links">
<i class="fa fa-eye"></i>
</a>


</div>
</div>
</li>
-->
<!-- <li class="careerfy-column-12 col-sm-12">
<div class="careerfy-applied-jobs-wrap">
<a href="" class="careerfy-applied-jobs-thumb">
<img src="<?= base_url()?>images/candidate-01.jpg" alt="candidate-01">
</a>

<div class="careerfy-applied-jobs-text">
<div class="careerfy-applied-jobs-left">
<a href=""><span>Job 1</span></a>
<h2 style="font-size: 18px;"><a href="">Overdue Accounts Officer for Audit</a></h2>
<ul>
<li>
<i class="fa fa-map-marker"></i>a,b,c
</li>

<li>
<i class="fa fa-filter"></i>
etc
</li>

<li>
<i class="fa fa-calendar"></i>
2018-03-29 11:03:51
</li>
</ul>
</div>

<a href="" class="careerfy-savedjobs-links">
<i class="fa fa-trash-o"></i>
</a>

<a href="" class="careerfy-savedjobs-links">
<i class="fa fa-eye"></i>
</a>


</div>
</div>
</li>
-->	</ul>
</div>
</div><?php }
else{
echo "No Jobs Applied Yet....";
} ?>
</div>
</div>
</div>

</div>
</div>
</div>