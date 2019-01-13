<style type="text/css">
	.m-t-25 {
    margin-top: 25px;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.overview-item--c1 {
    background-image: -moz-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    background-image: -ms-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    padding-bottom: 20px !important;

}
@media (max-width: 1519px) and (min-width: 992px)
.overview-item {
    padding-left: 15px;
    padding-right: 15px;
}
.overview-item {
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    padding: 30px;
    padding-bottom: 0;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}
* {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.overview-box .icon {
    display: inline-block;
    vertical-align: top;
    margin-right: 15px;
}
.overview-box .icon i {
    font-size: 35px;
    color: #fff;
}
.zmdi {
    display: inline-block;
    font: normal normal normal 14px/1 'Material-Design-Iconic-Font';
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.zmdi-account-o:before {
    content: '\f206';
}
.overview-box .text {
    font-weight: 300;
    display: inline-block;
}
.overview-box .text h2 {
    font-weight: 300;
    color: #fff;
    font-size: 36px;
    line-height: 1;
    margin-bottom: 5px;
}
.overview-box .text span {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.6);
}
.clearfix::after {
    display: block;
    clear: both;
    content: "";
}
.overview-chart {
     height: 115px;
    position: relative;
}
.overview-item--c2 {
    background-image: -moz-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
    background-image: -webkit-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
    background-image: -ms-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
padding-bottom: 20px !important;
}
.overview-item {
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    padding: 30px;
    padding-bottom: 0;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}
.overview-box .text span {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.6);
}
.overview-item--c3 {
    background-image: -moz-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
    background-image: -webkit-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
    background-image: -ms-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
    padding-bottom: 20px !important;
}
.overview-item--c4 {
    background-image: -moz-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
    background-image: -webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
    background-image: -ms-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
}
</style>


<!-- <div class="inner-heading">
	<div class="container">
		<h3>Candidate Dashboard</h3>
	</div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
   <!--  <h1 style=" " class="myhero">Candidate Dashboard</h1> -->
    <h4 class="myhero" style="
    margin: auto; position: relative;
   top:50%;
">Welcome <?= $this->session->userdata('first_name')?>&nbsp;<?=$this->session->userdata('last_name')?></a></h4>
 							

</div>

<!-- <?php //$this->load->view('candidate/demo',$profile); ?> -->


<?php 
// $profile = $profile[0];
?>

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
                        	<li class="active">
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
                        	<li>
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

			<!-- newcode -->
<div class="row m-t-25" style="
    width: 81%;
    /* height: 9px; */
">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">

                                            	<!-- <i class="fa fa-heart"></i> -->
                                            		<i class="fa fa-bars"></i>
                                                <!-- <i class="zmdi zmdi-account-o"></i> -->
                                            </div>
                                            <div class="text">
                                                <h2>10368</h2>
                                                <span>All Jobs</span>

                                            </div>
                                        </div>
                                       <!--  <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                            <canvas id="widgetChart1" height="123" style="display: block; width: 178px; height: 123px;" width="178" class="chartjs-render-monitor"></canvas>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                               <i class="fa fa-briefcase"></i>
                                                <!-- <i class="zmdi zmdi-shopping-cart"></i> -->
                                            </div>
                                            <div class="text">
                                                <h2>388,688</h2>
                                                <span>Applied Jobs</span>
                                            </div>
                                        </div>
                                       <!--  <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                          <canvas id="widgetChart2" height="115" width="178" class="chartjs-render-monitor" style="display: block; width: 178px; height: 115px;"></canvas>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            	<i class="fa fa-heart"></i>
                                            	<!-- <i class="fa fa-briefcase"></i> -->
                                                <!-- <i class="zmdi zmdi-calendar-note"></i> -->
                                            </div>
                                            <div class="text">
                                                <h2>1,086</h2>
                                                <span>Favorite Jobs</span>
                                            </div>
                                        </div>
                                       <!--  <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                            <canvas id="widgetChart3" height="115" width="178" class="chartjs-render-monitor" style="display: block; width: 178px; height: 115px;"></canvas>
                                        </div> -->
                                    </div>
                                </div>*
                            </div>
                            <!-- <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$1,060,386</h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                            <canvas id="widgetChart4" height="109" width="178" class="chartjs-render-monitor" style="display: block; width: 178px; height: 109px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
			<!-- new code ends -->

		</div>
	</div>
</div>