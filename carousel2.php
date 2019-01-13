<style type="text/css">
    /*!
 * Start Bootstrap - Modern Business HTML Template (https://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

/* Global Styles */
.carousel-caption
{
    padding-bottom: 30px !important;
}
.caption1
{
  background: rgba(0,0,0,0.21);
    padding: 10px;
}

input[type=text],  {
    width: 100%;
    padding:  20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #0071bb;;
    border-radius: 4px;
}

h1
{
  //font-size: 50px ;
  color:#0071bb;
  //text-shadow:   1px 1px 2px black, 0 0 25px blue, 0 0 5px  #29ABE2;
  //background: rgba(0,0,0,0.5);
}

html,
body {
    height: 100%;
}
.img-portfolio {
    margin-bottom: 30px;
}

.img-hover:hover {
    opacity: 0.8;
}

/* Home Page Carousel */

header.carousel {
    height: 100%;
}

header.carousel .item,
header.carousel .item.active,
header.carousel .carousel-inner {
    height: 100%;
}

header.carousel .fill {
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: cover;
}

@media screen and (min-width: 980px){
    .carousel-caption {
   bottom: 180px;
}   
h1{
    font-size: 57px;
}
.mytext{
    height: 55px;
}
#job_title
{
   width: 500px;
}
}


@media screen and (min-width: 320px)
{
.caption2
{
    bottom: 164px;
}
.caption1
{
    //bottom:50px;
}
}




/* 404 Page Styles */

.error-404 {
    font-size: 100px;
}

/* Pricing Page Styles */

.price {
    display: block;
    font-size: 50px;
    line-height: 50px;
}

.price sup {
    top: -20px;
    left: 2px;
    font-size: 20px;
}

.period {
    display: block;
    font-style: italic;
}

/* Footer Styles */

footer {
    margin: 50px 0;
}

/* Responsive Styles */

@media(max-width:991px) {
    .customer-img,
    .img-related {
        margin-bottom: 30px;
    }
}

@media(max-width:767px) {
    .img-portfolio {
        margin-bottom: 15px;
    }

    header.carousel .carousel {
        height: 70%;
    }
}



</style>
<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">


                <div class="fill" style="background-image:url(' <?php echo base_url('images/background1.jpg'); ?>');"></div>
                <div class="carousel-caption caption1" >
                    <h1 style="color: #0071bb;">The door to new possibilities</h1>
          <h3 style="color: #0000008c;">We are here to help you every step of the way</h3>
           <form class="form-inline" action="<?=base_url('welcome/findJob')?>" style="padding-top: 15px;">

    <div class="form-group" >
     
      <input type="text" class="form-control mytext " id="job_title" placeholder="Job Title"  name="job title"  style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.17), 0 6px 30px 0 rgba(0, 0, 0, 0.34);">
    </div>
    <div class="form-group">
      <?php
                                  $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
      ?>
     
      <select class="form-control mytext" id="sel1" name="city_name"  style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.17), 0 6px 30px 0 rgba(0, 0, 0, 0.34); " >
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
                <div class="fill" style="background-image:url('<?php echo base_url('images/background2.jpg'); ?>');"></div>
                <div class="carousel-caption caption2" style="background: rgba(0,0,0,0.21); padding: 10px;">
                  <h1 style="color: #0071bb;">Looking to Hire ?</h1>
          <h3 style="color: #0000008c;">Make data-driven hiring decisions</h3>
         <!--  <button class="letsstart"><span>Get Started </span></button> -->
            
        <a  href="<?= base_url('welcome/lookingToHire');?>" > <button class="button button2" style="width: 187;  padding: 16px 32px;">Get Started</button></a>
                </div>
            </div>
          
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>