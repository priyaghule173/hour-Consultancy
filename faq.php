<!--Revolutio slider starts-->
		<div class="job-listing-wrap">
			<div class="container">
				<!--<img src="<?= base_url()?>images/Job-Seekers-Header3.jpg">-->
				<!--<div class="sliderTxt">
					<p></p>
					<h1>Our Company</h1>
				</div>-->
			</div>
		</div>
<!--Revolution slider ends-->

<div class="page-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-4 about">
				<h3>Faq</h3>
			</div>
		</div>
	</div>
</div>

<div class="faq">
	<div class="container">
		<div class="row">
			
			<div class="col-md-9 col-sm-12 col-xs-12 faq-info">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					
					  <div id="accordion" class="panel-group">
					    <div class="panel">
					      <div class="panel-heading">
					      <h4 class="panel-title">
					        <a href="#panelBodyOne" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Content One</a>
					        </h4>
					      </div>
					      <div id="panelBodyOne" class="panel-collapse collapse">
					      <div class="panel-body">
					          <p>Energistically drive standardized communities through user friendly results. Phosfluorescently initiate superior technologies vis-a-vis low-risk high-yield solutions. Objectively facilitate clicks-and-mortar partnerships vis-a-vis superior partnerships. Continually generate long-term high-impact methodologies via wireless leadership. Holisticly seize resource maximizing solutions via user friendly outsourcing.</p>
					        </div>
					      </div>
					    </div>

					    <div class="panel">
					      <div class="panel-heading">
					      <h4 class="panel-title">
					        <a href="#panelBodyTwo" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Content Two</a>
					        </h4>
					      </div>
					      <div id="panelBodyTwo" class="panel-collapse collapse">
					      <div class="panel-body">
					          <p>Energistically drive standardized communities through user friendly results. Phosfluorescently initiate superior technologies vis-a-vis low-risk high-yield solutions. Objectively facilitate clicks-and-mortar partnerships vis-a-vis superior partnerships. Continually generate long-term high-impact methodologies via wireless leadership. Holisticly seize resource maximizing solutions via user friendly outsourcing.</p>
					        </div>
					      </div>
					    </div>

					    <div class="panel">
					      <div class="panel-heading">
					      <h4 class="panel-title">
					        <a href="#panelBodyThree" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Content Three</a>
					        </h4>
					      </div>
					      <div id="panelBodyThree" class="panel-collapse collapse">
					      <div class="panel-body">
					          <p>Energistically drive standardized communities through user friendly results. Phosfluorescently initiate superior technologies vis-a-vis low-risk high-yield solutions. Objectively facilitate clicks-and-mortar partnerships vis-a-vis superior partnerships. Continually generate long-term high-impact methodologies via wireless leadership. Holisticly seize resource maximizing solutions via user friendly outsourcing.</p>
					        </div>
					      </div>
					    </div>

					  </div>

				
			</div>

		</div>
	</div>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>