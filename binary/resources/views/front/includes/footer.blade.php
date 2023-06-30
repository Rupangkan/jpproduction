
<!-- FOOTER -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<!-- COLUMN 1 -->
				<h3 class="sr-only">ABOUT US</h3>
				<img src="{{URL::asset('front/img/logo/repute-logo-light.png')}}" class="logo" alt="Repute">
				<p>Proactively aggregate B2B initiatives before extensive channels. Monotonectally extend interactive methods of empowerment through excellent applications. Rapidiously synergize visionary products with sticky technology.</p>
				<br>
				<address class="margin-bottom-30px">
					<ul class="list-unstyled">
						<li>1234 North Main Street
							<br/> New York, NY 222222</li>
						<li>Phone: (1800) 765 - 4321</li>
						<li>Email: email@yourdomain.com</li>
					</ul>
				</address>
				<!-- END COLUMN 1 -->
			</div>
			<div class="col-md-4">
				<!-- COLUMN 2 -->
				<h3 class="footer-heading">USEFUL LINKS</h3>
				<div class="row margin-bottom-30px">
					<div class="col-xs-6">
						<ul class="list-unstyled footer-nav">
							<li><a href="about-us">About Us</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Community</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
					<div class="col-xs-6">
						<ul class="list-unstyled footer-nav">
							<li><a href="#">Press Kit</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="/contact-us">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<!-- END COLUMN 2 -->
			</div>
			<div class="col-md-4">
				<!-- COLUMN 3 -->
				<div class="newsletter">
					<h3 class="footer-heading">NEWSLETTER</h3>
					<p>Get the latest update from us by subscribing to our newsletter.</p>
					<form class="newsletter-form" method="POST">
						<div class="input-group input-group-lg">
							<input type="email" class="form-control" name="email" placeholder="youremail@domain.com">
							<span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-spinner fa-spin"></i><span>SUBSCRIBE</span></button>
							</span>
						</div>
						<div class="alert"></div>
					</form>
				</div>
				<div class="social-connect">
					<h3 class="footer-heading">GET CONNECTED</h3>
					<ul class="list-inline social-icons">
						<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="googleplus-bg"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
					</ul>
				</div>
				<!-- END COLUMN 3 -->
			</div>
		</div>
	</div>
	<!-- COPYRIGHT -->
	<div class="text-center copyright">
		&copy;2016 The Develovers. All Rights Reserved.
	</div>
	<!-- END COPYRIGHT -->
</footer>
<!-- END FOOTER -->
</div>
<!-- END WRAPPER -->

<!-- JAVASCRIPTS -->
<script src="{{URL::asset('front/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{URL::asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('front/js/plugins/slick/slick.min.js')}}"></script>
<script src="{{URL::asset('front/js/plugins/jquery-cycle/jquery.cycle.all.js')}}"></script>
<script src="{{URL::asset('front/js/plugins/maximage/jquery.maximage.min.js')}}"></script>
<script src="{{URL::asset('front/js/plugins/autohidingnavbar/jquery.bootstrap-autohidingnavbar.min.js')}}"></script>
<!-- DEMO PANEL -->
<!-- for demo purpose only, you should remove it on your project directory -->
<script type="text/javascript">
var toggleDemoPanel = function(e) {
	e.preventDefault();

	var panel = document.getElementById('demo-panel');
	if (panel.className) panel.className = '';
	else panel.className = 'active';
}

// fix each iframe src when back button is clicked
$(function() {
	$('iframe').each(function() {
		this.src = this.src;
	});
});
</script>
<script>
	$(document).ready(function(){
	    setTimeout(function(){
	       $('#loading_wrap').fadeOut("slow");
	    }, 2000);
	});
</script>

<script>
	$(function(){
    $('.repeat').click(function(){
        var classes =  $(this).parent().attr('class');
        $(this).parent().attr('class', 'animate');
        var indicator = $(this);
        setTimeout(function(){ 
            $(indicator).parent().addClass(classes);
        }, 20);
    });
});


</script>
</div>

