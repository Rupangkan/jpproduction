<!DOCTYPE html>
<head>
	<title>Demo Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="The Develovers">
	<style type="text/css">
		body {
			background: #fff;
			padding: 5px;
			font-family: "Helvetica Neue", sans-serif;
			font-size: 13px;
			color: #4d4d4d;
		}

		a {
			color: #4d4d4d;
			text-decoration: underline;
		}

		a:hover, a:focus {
			text-decoration: none;
		}

		ul {
			margin-top: 0;
			padding: 0;
			list-style: none;
		}

		ul li  {
			list-style-type: none;
			margin-bottom: 8px;
		}
		
		.button-option-list a {
			padding: 3px 10px;
			background-color: #ccc;
			color: #595959;
			text-decoration: none;
		}

		.button-option-list a:hover, .button-option-list a:focus {
			background-color: #bdbdbd;
			text-decoration: none;
		}

		.button-option-list a.active {
			background-color: #5CB85C; 
			color: #fff;
		}

		h2 {
			margin-top: 0;
			margin-bottom: 10px;
			font-size: 16px;
		}

		hr {
			margin-top: 20px;
			margin-bottom: 20px;
			border: 0;
			border-top: 1px solid #ccc;
		}

		.color-list {
			margin-bottom: 0;
		}
		
		.color-list > li {
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
		}

		.color-list > li > a {
			display: block;
			width: 20px;
			height: 20px;
			background-color: #000;
			text-indent: -9999px;
		}

		.color-list a:hover,
		.color-list a:focus {
			position: relative;
			top: -2px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="demo-type">
			<h2>Color</h2>
			<ul class="color-list">
				<li><a href="#" title="Slate Gray" data-skin="slategray" target="_parent" style="background-color: #708090;">Slate Gray</a></li>
				<li><a href="#" title="Sea Green" data-skin="seagreen" style="background-color: #3F7577;">Seagreen</a></li>
				<li><a href="#" title="Orange" data-skin="orange" target="_parent" style="background-color: #FF4500;">Orange</a></li>
				<li><a href="#" title="Light Green" data-skin="lightgreen" target="_parent" style="background-color: #8AA026;">Light Green</a></li>
			</ul>
			<ul class="color-list">
				<li><a href="#" title="Indian Red" data-skin="indianred" target="_parent" style="background-color: #CD5C5C;">Indian Red</a></li>
				<li><a href="#" title="Golden Rod" data-skin="goldenrod" target="_parent" style="background-color: #DAA520;">Golden Rod</a></li>
				<li><a href="#" title="Deep Sky Blue" data-skin="deepskyblue" target="_parent" style="background-color: #00BFFF;">Deep Sky Blue</a></li>
				<li><a href="#" title="Brown" data-skin="brown" target="_parent" style="background-color: #CD853F;">Brown</a></li>
			</ul>
			<a href="#" title="Default Color" class="reset-color" target="_parent">Default Color</a>
			<hr>
						<h2>Layout</h2>
			<ul class="button-option-list layout-list">
				<li><a id="layout-full" href="#" class="active" target="_parent">Full</a></li>
				<li><a id="layout-boxed" href="#" target="_parent">Boxed</a></li>
			</ul>
			<hr>
			
			
				<h2>Navigation Bar</h2>
								<ul class="button-option-list navbar-list">
										<li><a id="default-navbar" href="#" class="active" target="_parent">Default</a></li>
					<li><a id="fixed-navbar" href="#" target="_parent">Fixed</a></li>
					<li><a id="autohiding-navbar" href="#" target="_parent">Auto Hiding</a></li>
										<li>
						<a id="fixed-shrink-navbar" href="../index-v3-fixedshrink21d3.html?nav=fs" class="" target="_parent">Fixed &amp; Shrink</a>
					</li>
				</ul>
				
					</div>
	</div>

	<script src="../assets/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function() {
			$sourceURL = '';

			$attr =  window.parent.$('#demo-panel').attr('data-sourceURL');
			if (typeof $attr !== typeof undefined && $attr !== false) $sourceURL = window.parent.$('#demo-panel').attr('data-sourceURL');

			// COLOR OPTIONS
			$('.color-list a').click( function(e) {
				e.preventDefault();

				var skinName = $(this).attr('data-skin');

				// change color and logo
				if(window.parent.$('#css-skin').length > 0 ) window.parent.$('#css-skin').remove();

				window.parent.$('head').append('<link id="css-skin" rel="stylesheet" href="' + $sourceURL + 'assets/css/skins/' + skinName + '.css" type="text/css" />');

				if(window.parent.$('.navbar').hasClass('navbar-dark')) 
					window.parent.$('.navbar-logo img').attr("src", $sourceURL + "assets/img/logo/repute-logo-light-"+skinName+".png");
				else
					window.parent.$('.navbar-logo img').attr("src", $sourceURL + "assets/img/logo/repute-logo-nav-"+skinName+".png");
				
				if(window.parent.$('footer').hasClass('footer-light'))
					window.parent.$('footer img.logo').attr("src", $sourceURL + "assets/img/logo/repute-logo-nav-"+skinName+".png");
				else
					window.parent.$('footer img.logo').attr("src", $sourceURL + "assets/img/logo/repute-logo-light-"+skinName+".png");
			});

			// RESET COLOR
			$('.reset-color').click( function(e) {
				e.preventDefault();

				if(window.parent.$('#css-skin').length > 0 ) window.parent.$('#css-skin').remove();
				window.parent.$('.navbar-logo img').attr("src", $sourceURL + "assets/img/logo/repute-logo-nav.png");
				window.parent.$('footer img.logo').attr("src", $sourceURL + "assets/img/logo/repute-logo-light.png");
			});

			// LAYOUT OPTIONS
			$('.layout-list a').click( function(e) {
				e.preventDefault();

				$('.layout-list a').removeClass('active');

				if($(this).attr('id') == 'layout-boxed') {
					window.parent.$('body').addClass('layout-boxed');
					$(this).addClass('active');
				} else {
					window.parent.$('body').removeClass('layout-boxed');
					$(this).addClass('active');
				}
			});

			// NAVBAR OPTIONS
			$('.navbar-list a').click( function(e) {
				e.preventDefault();

				$('.navbar-list a').removeClass('active');
				$navbar = window.parent.$('.navbar');
				// $navbar.removeClass('shrinkable');

				if($(this).attr('id') == 'default-navbar') {
					$navbar.removeClass('navbar-fixed-top')
					.parents('.wrapper').css('padding-top', 0);
				}else if($(this).attr('id') == 'fixed-navbar') {
					if($navbar.hasClass('auto-hiding-initialized')) 
						$navbar.autoHidingNavbar('setDisableAutohide', true);

					$navbar.addClass('navbar-fixed-top')
					.removeClass('navbar-hidden')
					.css('top', 0);
					$navbar.parents('.wrapper').css('padding-top', $navbar.outerHeight());
				}else if($(this).attr('id') == 'autohiding-navbar') {
					if($navbar.hasClass('auto-hiding-initialized'))
						$navbar.autoHidingNavbar('setDisableAutohide', false);
					else
						$navbar.addClass('auto-hiding-initialized navbar-fixed-top').autoHidingNavbar();

					$navbar.parents('.wrapper').css('padding-top', $navbar.outerHeight());
				} else if($(this).attr('id') == 'fixed-shrink-navbar') {
					window.parent.location = $(this).attr('href');
				}

				$(this).addClass('active');

			});

		});

	</script>
</body>
</html>