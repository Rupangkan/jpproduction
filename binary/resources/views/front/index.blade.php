<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home | JP Production</title>
	@include('front.includes.head')



	<style>
		.product-img{
			width: 23%;
		    -moz-border-radius: 2px;
		    -webkit-border-radius: 2px;
		    border-radius: 2px;
		    padding: 0px;
		    width: 60px;
		    height: 60px;
		    /* background: #406da4; */
		    color: #fff;
		    text-align: center;
		    line-height: 40px;
		    float: left;
		    margin-right: 10px;
		    font-size: 2em;
		}
		
		.leftpart h1{
		    color: white;
            font-weight: 900;
            text-shadow: 2px 2px 1px #000;
		}
		
		.bottompart{
		    position: absolute;
            bottom: 60px;
            /* left: 50%; */
            width: 100%;
            text-align: center;
		}
		
		.bottompart p{
		    font-size: 21px;
            color: #0044cc;
            font-weight: 900;
            text-shadow: 1px 2px 1px #fff;
		}
		
		@media screen and (max-width: 480px) {
          .leftpart h1{
              font-size: 22px;
          }
          .leftpart h1{
		    text-align: center;
		    margin-left: 56px;
		}
        }
	</style>
</head>

<body class="fullscreen-slider">
	<!-- WRAPPER -->
	<div class="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-transparent " role="navigation">
			@include('front.includes.nav')
		</nav>
		<!-- END NAVBAR -->

		<!--Banner part starts-->

        <section>
        	<div class="banner">
                <div class="leftpart">
        	        <a class="signup-btn btn" href="/login" class=""><strong>LOGIN</strong></a>
                    <a class="signup-btn btn" href="/register" class="" style="background: #14ad14;"><strong>MEMBER'S FORM</strong></a>
                    <h1>WELCOME TO<br/>JP PRODUCTION</h1>
                </div>
        		<div class="rightpart">
        			
        			<div class="header-wrapper">
					  <div class="zoominheader">
					    <div class="zoomoutheader">
					      </br></br>
					      </br></br>
					      
					    </div>
					  </div>
					</div>

        		</div>
        		<div class="bottompart">
        		    <p>Service to man, is Service to God</p>
        		</div>
        	</div>
        </section>
		<!--Banner part ends-->

		<!-- HERO SECTION -->
		<!--<section class="hero-unit-fullscreen-slider">
			<div class="slides">
				<div>
					<div class="container slide-content">
						<h2 class="hero-heading">ULTRA RESPONSIVE</h2>
						<p class="lead">Leave it to the theme, it knows how to deal with screen sizes</p>
						<a href="#" class="btn btn-rounded-4x btn-primary btn-hero">LEARN MORE</a>
					</div>
					<img src="{{URL::asset('front/img/sliders/full-slide.jpg')}}" alt="Slide Image">
				</div>
				<div>
					<div class="container slide-content text-right">
						<h2 class="hero-heading">CLEAN &amp; ELEGANT DESIGN</h2>
						<p class="lead">Giving valuable reputation and credibility to your business</p>
						<a href="#" class="btn btn-rounded-4x btn-primary btn-hero">LEARN MORE</a>
					</div>
					<img src="{{URL::asset('front/img/sliders/full-slide2.jpg')}}" alt="Slide Image">
				</div>
				<div>
					<div class="container slide-content text-center">
						<h2 class="hero-heading">EASY TO CUSTOMIZE</h2>
						<p class="lead">Readable code, well documented and FREE support</p>
						<a href="#" class="btn btn-rounded-4x btn-primary btn-hero">LEARN MORE</a>
					</div>
					<img src="{{URL::asset('front/img/sliders/full-slide3.jpg')}}" alt="Slide Image">
				</div>
			</div>
			<div class="arrow-nav">
				<a href="#" id="fullslider-arrow_left" class="arrow-left"><i class="fa fa-angle-left"></i> <span class="sr-only">PREVIOUS</span></a>
				<a href="#" id="fullslider-arrow_right" class="arrow-right"><i class="fa fa-angle-right"></i> <span class="sr-only">NEXT</span></a>
			</div>
			<div id="fullslider-pager" class="pager"></div>
		</section>-->
		<!-- END HERO SECTION -->
		<!-- INTRO -->
		<section>
			<div class="container">
			
				
				<div class="row">
				   <h3>JP Production</h3>
				   <br/><br/>
					<div class="col-md-12">
						<img src="{{URL::asset('front/img/ganesh3.jpg')}}" style="width:100%"  alt="Image Intro"/>
					</div>
				</div>
			</div>
		</section>
		<!-- END INTRO -->
		<!-- BOXED CONTENT -->
		<section id="main-features">
			<div class="container">
				<div class="row">
					<h1 class="section-heading">Our Gifts</h1>
					<div class="col-md-6">
						<div class="boxed-content left-aligned left-boxed-icon">
							<img class="product-img" src="http://jpproductionganesh.in/front/images/gifts/avatar_1536142343.jpg">
							<h2 class="boxed-content-title">5 Sponsor- Wall Clock</h2>
							<p>Get a wall clock by sponsoring 5 member from 1st to 30th of a month.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="boxed-content left-aligned left-boxed-icon">
							<img class="product-img" src="http://jpproductionganesh.in/front/images/gifts/avatar_1536142488.jpg">
							<h2 class="boxed-content-title">10 Sponsor- Charger Light</h2>
							<p>Get a charger light by sponsoring 10 member from 1st to 30th of a month.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="boxed-content left-aligned left-boxed-icon">
							<img class="product-img" src="http://jpproductionganesh.in/front/images/gifts/hawkins.jpeg">
							<h2 class="boxed-content-title">20 Sponsor- Pressure Cooker/Gas Burner</h2>
							<p>Get a Pressure Cooker/Gas Burner by sponsoring 20 member from 1st to 30th of a month.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="boxed-content left-aligned left-boxed-icon">
							<img class="product-img" src="{{URL::asset('front/img/ganesh2.png')}}">
							<h2 class="boxed-content-title">30 Sponsor - Induction Cooker</h2>
							<p>Get a Induction Cooker by Sponsoring 30 Member from 1st to 30th/31st of month.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="boxed-content left-aligned left-boxed-icon">
							<img class="product-img" src="{{URL::asset('front/img/ganesh1.png')}}">
							<h2 class="boxed-content-title">30 Sponser - Mixer Grinder</h2>
							<p>Get a Mixer Grinder by Sponsoring 30 Member from 1st to 30ths/31st of month.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
			<section id="main-features">
			<div class="container">
				<div class="row">
					<h1 class="section-heading">Our Product</h1>
					@foreach(Product::allProducts() as $product)
					<div class="col-md-6">
						<div class="boxed-content left-aligned left-boxed-icon">
							<img class="product-img" src="{{URL::asset($product->image)}}">
							<h2 class="boxed-content-title">{{$product->product}}</h2>
							<p>{{$product->description}}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- END BOXED CONTENT -->
		@include('front.includes.footer')
		<script src="{{URL::asset('front/js/repute-scripts.js')}}"></script>
		<script src="{{URL::asset('front/js/modernizr.custom.72111.js')}}"></script>
	
</body>
</html>
