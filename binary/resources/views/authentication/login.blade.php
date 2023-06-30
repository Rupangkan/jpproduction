<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Repute Shop - Responsive Multipurpose Bootstrap Theme</title>
    <meta charset="utf-8">
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Multipurpose Bootstrap Theme">
    <meta name="author" content="The Develovers">
    <!-- CSS -->
    <link href="{{URL::asset('front/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('front/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('front/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('front/css/shop-main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('front/css/my-custom-styles.css')}}" rel="stylesheet" type="text/css">
    <!-- for demo purpose only, you should remove it on your project directory -->
    <link href="{{URL::asset('frontanel/demo-panel-style.css')}}" rel="stylesheet" type="text/css">
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,400italic,700,400,300' rel='stylesheet' type='text/css'>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('front/ico/repute144x144.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('front/ico/repute114x114.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('front/ico/repute72x72.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('front/ico/repute57x57.pn')}}g">
    <link rel="shortcut icon" href="{{URL::asset('front/ico/favicon.png')}}">
</head>

<body>
    <!-- WRAPPER -->
    <div class="wrapper">
        <!-- HEADER -->
        <div class="shop-header minimal-header">
            <div class="top-header clearfix">
                <div class="container">
                    <ul class="list-unstyled list-inline pull-right top-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="about-us">About</a></li>
                        <li><a href="contact-us">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="" style="background: url({{URL::asset('front/images/jp_banner.jpg')}}) no-repeat;height:77px; ">
                <div class="container">
                    <a href="/"><img class="respon-img" src="{{URL::asset('front/img/logo/repute-logo-light.png')}}" alt="Repute Shop"><span class="sr-only">Repute Shop</span></a>
                </div>
            </div>
        </div>
        <!-- MAIN -->
        <div class="shop-main login">
            <div class="container">
               
                <!-- LOGIN BOX -->
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 col-lg-4 col-lg-offset-2">
                        <div class="account-box login-box box-with-help">
                            <h1>Log in to your account</h1>
                            <div class="alert alert-danger" id="danger-msg" style="display: none;"> </div> 
                            @if (Session::has('message'))
                                <div class="alert alert-success"> <strong>Well done!</strong> {{Session::get('message')}} </div>
                            @endif
                            <form id="login-form" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label sr-only">Email</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Member ID">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="control-label sr-only">Password</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" name="remember_me" value="1">
                                            <span>Remember me</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-7">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Sign in</button>
                                    </div>
                                    <div class="col-xs-5 text-right">
                                        <a href="{{route('forgot.password')}}"><em>forgot password?</em></a>
                                    </div>
                                </div>
                            </form>
                            <p><em>Don't have an account yet?</em> <a href="/register"><strong>Sign Up</strong></a></p>
                            <button type="button" class="btn btn-link btn-login-help"><i class="fa fa-question-circle" title="Click for help"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-4">
                        <div class="login-copytext">
                            <h2><i class="fa fa-lock"></i> Secure Login</h2>
                            <p>Completely strategize mission-critical human capital before installed base intellectual capital. Proactively fashion ubiquitous architectures and value-added solutions.</p>
                            <h2><i class="fa fa-user"></i> We protect your privacy</h2>
                            <p>Appropriately customize enabled process improvements via resource maximizing methods of empowerment. Dramatically maintain interactive e-commerce before process-centric resources.</p>
                        </div>
                    </div>
                </div>
                <!-- END LOGIN BOX -->
            </div>
        </div>
        <!-- END MAIN -->
        <!-- FOOTER -->
        <footer class="shop-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- COLUMN 1 -->
                        <h3 class="footer-heading">USEFUL LINKS</h3>
                        <div class="row margin-bottom-30px">
                            <div class="col-xs-6">
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="#">About Us</a></li>
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
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- END COLUMN 1 -->
                    </div>
                    <div class="col-md-4">
                        <!-- COLUMN 2 -->
                        <div class="social-connect">
                            <h3 class="footer-heading">GET CONNECTED</h3>
                            <ul class="list-inline social-icons">
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="googleplus-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            </ul>
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
    <script src="{{URL::asset('front/js/repute-shop.js')}}"></script>
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

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#login-form').submit(function(event) {
        console.log($('input[name=remember_me]').is(':checked'));
        event.preventDefault();
        var postData = {
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
            'remember_me': $('input[name=remember_me]').is(':checked')
        }
        $.ajax({
            type: 'POST',
            url: '{{ route("user.login") }}',
            data: postData,
            beforeSend: function() {
                $("#login-button").html('<i class="fa fa-spinner"></i> Processing...').prop('disabled', 'disabled');
            },
            success: function(response) {
                window.location.href = response.redirect;
            },
            error: function(response) {
                $("#login-button").html('<i class="fa fa-sign-in"></i> Sign in').prop('disabled', false);
                $('#danger-msg').show().text(response.responseJSON.error_message);
                $('input[name=email]').val('').addClass('borderRed');
                $('input[name=password]').val('').addClass('borderRed');
                $('input[name=remember_me]').prop("checked", false)
            },
        });
    });
    $('#email').on('keypress', function() {
        $(this).removeClass('borderRed');
        $('#password').removeClass('borderRed');
    })
    $('#password').on('keypress', function() {
        $(this).removeClass('borderRed');
        $('#email').removeClass('borderRed');
    })
</script>
</body>
</html>
