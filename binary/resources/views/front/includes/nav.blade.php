<div id='loading_wrap' style='position:fixed; height:100%; width:100%; overflow:hidden; top:0; left:0;background:#fff;z-index:9999;'>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="text-align: center;">
			<img style="width: 50%; margin-top: 150px;" src="{{URL::asset('front/img/page-loader.gif')}}" alt="Loader">
		</div>
	</div>
</div>
<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
			<span class="sr-only">Toggle Navigation</span>
			<i class="fa fa-bars"></i>
		</button>
		
	</div>
	<!-- MAIN NAVIGATION -->
	<div id="main-nav" class="navbar-collapse collapse navbar-mega-menu">
		<ul class="nav navbar-nav navbar-left">
			<li class="{{ request()->is('') ? 'active' : '' }}">
				<a href="/">HOME</a>
			</li>
			<li class="{{ request()->is('about-us') ? 'active' : '' }}">
				<a href="about-us" class="">About Us</a>
			</li>
			<li class="{{ request()->is('contact-us') ? 'active' : '' }}">
				<a href="contact-us" class="">Contact</a>
			</li>
			<!-- <li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">FEATURES  <span class="label label-danger label-main-nav">NEW</span> <i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="feature-navigation-menu.html">Navigation Menus</a></li>
					<li><a href="feature-hero-unit.html">Hero Units</a></li>
					<li><a href="feature-page-header.html">Page Header</a></li>
					<li><a href="feature-footer.html">Footers</a></li>
					<li class="dropdown ">
						<a href="#">Email Templates <span class="label label-danger label-main-nav">NEW</span> <i class="fa fa-angle-right"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="email-templates/email-template-v1/email-template-v1.html">Email Template v1</a></li>
							<li><a href="email-templates/email-template-v2/email-template-v2.html">Email Template v2</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="page-services.html">Service Page</a></li>
					<li><a href="page-pricing-tables.html">Pricing Tables</a></li>
					<li class="dropdown ">
						<a href="#">Columns <i class="fa fa-angle-right"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="page-left-sidebar.html">Left Sidebar</a></li>
							<li><a href="page-right-sidebar.html">Right Sidebar</a></li>
							<li><a href="page-double-sidebar.html">Double Sidebar</a></li>
						</ul>
					</li>
					<li><a href="page-search-results.html">Search Result</a></li>
					<li><a href="page-support.html">Support</a></li>
					<li><a href="page-faq.html">FAQ</a></li>
					<li><a href="page-about-us.html">About Us</a></li>
					<li><a href="page-contacts.html">Contact</a></li>
					<li><a href="page-privacy.html">Privacy Policy</a></li>
					<li><a href="page-terms.html">Terms</a></li>
					<li><a href="page-error.html">Error Page</a></li>
					<li class="dropdown ">
						<a href="#">Sub Menu Lvl 1 <i class="fa fa-angle-right"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown ">
								<a href="#">Sub Menu Lvl 2 <i class="fa fa-angle-right"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Sub Menu Lvl 3</a></li>
									<li><a href="#">Sub Menu Lvl 3</a></li>
								</ul>
							</li>
							<li><a href="#">Sub Menu Lvl 2</a></li>
							<li><a href="#">Sub Menu Lvl 2</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="dropdown mega-menu">
				<a href="#" data-toggle="dropdown">UI ELEMENTS <i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu mega-menu-container">
					<li>
						<div class="mega-menu-content">
							<div class="row">
								<div class="col-md-3">
									<h5 class="menu-heading">Buttons &amp; Icons</h5>
									<ul class="list-unstyled list-menu">
										<li><a href="ui-buttons.html"><i class="fa fa-square"></i> General Buttons</a></li>
										<li><a href="ui-button-groups.html"><i class="fa fa-clone"></i> Button Groups</a></li>
										<li><a href="ui-icons.html"><i class="fa fa-asterisk"></i> Icons</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h5 class="menu-heading">Forms</h5>
									<ul class="list-unstyled list-menu">
										<li><a href="ui-form-elements-basic.html"><i class="fa fa-check-square"></i> Basic Form Elements</a></li>
										<li><a href="ui-form-elements-advanced.html"><i class="fa fa-plus-square"></i> Advanced Form Elements</a></li>
										<li><a href="ui-form-layouts.html"><i class="fa fa-columns"></i> Form Layouts</a></li>
										<li><a href="ui-form-validation.html"><i class="fa fa-check-circle"></i> Validation</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h5 class="menu-heading">Content Elements</h5>
									<ul class="list-unstyled list-menu">
										<li><a href="ui-tabs-accordion.html"><i class="fa fa-list-alt"></i> Tabs &amp; Accordion</a></li>
										<li><a href="ui-boxed-contents.html"><i class="fa fa-suitcase"></i> Boxed Contents</a></li>
										<li><a href="ui-numbers-charts.html"><i class="fa fa-pie-chart"></i> Numbers &amp; Charts</a></li>
										<li><a href="ui-typography.html"><i class="fa fa-font"></i> Typography</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h5 class="menu-heading">Components</h5>
									<ul class="list-unstyled list-menu">
										<li><a href="ui-testimonials.html"><i class="fa fa-thumbs-up"></i> Testimonials</a></li>
										<li><a href="ui-maps.html"><i class="fa fa-map"></i> Maps</a></li>
										<li><a href="ui-breadcrumbs.html"><i class="fa fa-angle-right"></i> Breadcrumbs</a></li>
										<li><a href="ui-alerts.html"><i class="fa fa-warning"></i> Alerts</a></li>
										<li><a href="ui-pagination.html"><i class="fa fa-ellipsis-h"></i> Pagination</a></li>
									</ul>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">PORTFOLIO <i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="portfolio-4-columns.html">Portfolio 4 Columns</a></li>
					<li><a href="portfolio-3-columns.html">Portfolio 3 Columns</a></li>
					<li><a href="portfolio-2-columns.html">Portfolio 2 Columns</a></li>
					<li><a href="portfolio-single.html">Portfolio Item</a></li>
				</ul>
			</li>
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">SHOP <i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="shop/index.html">Front Page</a></li>
					<li><a href="shop/single-product-page.html">Single Product Page</a></li>
					<li><a href="shop/product-filter-grid.html">Search Result with Filter</a></li>
					<li><a href="shop/checkout.html">Checkout with Validation</a></li>
					<li><a href="shop/shop-login.html">Login</a></li>
					<li><a href="shop/shop-register.html">Register</a></li>
				</ul>
			</li> -->
		</ul>
	</div>
	<!-- END MAIN NAVIGATION -->
</div>