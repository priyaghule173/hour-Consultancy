
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">

/*input[type=text],  {
    width: 100%;
    padding:  20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #0071bb;;
    border-radius: 4px;
}*/

.button {
    background-color: #0071bb; /* Green */
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    background-color: #29ABE2;
}

  html, 
body, 
.carousel, 
.carousel-inner, 
.carousel-inner .item {
  
}

h1
{
  font-size: 57px ;
  color:#0071bb;
  //text-shadow:   1px 1px 2px black, 0 0 25px blue, 0 0 5px  #29ABE2;
  //background: rgba(0,0,0,0.5);
}
.font27
{
  font-size:27px;
}

.carousel img {
  
    margin: 0 auto;
  /* background:black;
    opacity:0;*/
}
  body
  {
    overflow-x: hidden;
  }


#job_title
{
   width: 500px;
}

  .carousel-caption {
    top: 30%;
    bottom: auto;
    
    background-color: rgba(0,0,0,0.21);
    color: white;
    //box-shadow: 5px 5px 5px 5px #524e4ead;
}

}
@media screen and (min-width: 980px){
    .carousel-caption {
    top: 30%;
    bottom: auto;
}   
#job_title
{
  width: 100%;
}
}
@media screen and (max-width: 640px){
  h1
{
  
  color:#0071bb;
  //text-shadow:   1px 1px 2px black, 0 0 25px blue, 0 0 5px  #29ABE2;
  //background: rgba(0,0,0,0.5);
}


   .carousel-caption {
    top: 0%;
    bottom: auto;
}   
#job_title
{
  width: 100%;
}
}

  .container-fluid
  {
     margin: 0px !important;
    padding: 0px !important;
  }
 /* .container-margin {
    margin-left: -15px;
    margin-right: -15px;
}*/

.carousel .item {
  height: 590px;
}

.item img {
    position: absolute;
    top: 0;
    left: 0;
   height: 590px;
}
</style>


<div class="container-fluid container-margin">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
     
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="<?php echo base_url('images/background1.jpg'); ?>" alt="Los Angeles" style="width:100%; ">
        <div class="carousel-caption " >



          <h1 style="color: #0071bb;">The door to new possibilities</h1>
          <h3 style="color: #0000008c;">We are here to help you every step of the way</h3>
  <form class="form-inline" action="<?=base_url('welcome/findJob')?>" style="padding-top: 15px;">
    <div class="form-group" >
     
      <input type="text" class="form-control " id="job_title" placeholder="Job Title"  name="job title"  style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.17), 0 6px 30px 0 rgba(0, 0, 0, 0.34);height: 55px;">
    </div>
    <div class="form-group">
      <?php
                                  $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
      ?>
     
      <select class="form-control mytext" id="sel1" name="city_name"  style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.17), 0 6px 30px 0 rgba(0, 0, 0, 0.34);  height: 55px;" >
     <option value="">Location</option>
                                      <?php
                                          foreach ($city as $row) {
                                      ?>
                                  <option value="<?=$row['city_name']?>"><?=$row['city_name']?></option>
                                  <?php
                                   }
                                   ?>  
      </select>
      <br>
     
    </div>
    
    
    <button type="submit"  class="btn" style="height: 55px;background-color: #0071bb;"><span class="glyphicon glyphicon-search" ></span></button>
  </form>

        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url('images/background2.jpg'); ?>" alt="Chicago" style="width:100%; opacity: 0.8;">
        <div class="carousel-caption">
           <h1 style="color: #0071bb;">Looking to Hire ?</h1>
          <h3 style="color: #0000008c;">Make data-driven hiring decisions</h3>
         <!--  <button class="letsstart"><span>Get Started </span></button> -->
            
        <a  href="<?= base_url('welcome/lookingToHire');?>" > <button class="button button2" style="width: 187;  padding: 16px 32px;">Get Started</button></a>
        </div> 
      </div>
    
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<script type="text/javascript">
  $('.carousel').carousel({
   // interval: false

}); 
</script>