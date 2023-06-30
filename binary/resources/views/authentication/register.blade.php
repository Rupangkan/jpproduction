<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | Repute Shop - Responsive Multipurpose Bootstrap Theme</title>
    <meta charset="utf-8">
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
    <style>
      .borderRed{
        border-bottom: 1px solid red;
      }
    </style>
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
        <div class="shop-main register">
          <div class="container">
           
            <!-- REGISTER BOX -->
            <div class="account-box register-box">
              <h1>Create an account</h1>
              @foreach($errors->all() as $error)
                <p>{{$error}}</p>
              @endforeach
              <form id="register_form" class="form-horizontal" role="form" method="post" action="{{route('user.register')}}">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="username" class="control-label sr-only">Full Name</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" name="full_name" id="name" placeholder="Full Name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="control-label sr-only">Address</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label sr-only">Email</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label sr-only">Phone</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label sr-only">Sponser ID</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" name="sponser" id="sponser" placeholder="Sponser ID" onchange="GetSponsor();">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label id="SponsorName"></label>  
                    </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label sr-only">Side</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>
                      <select class="form-control" name="side" id="side">
                          <option value="">Choose Side</option>
                          <option value="left">Left</option>
                          <option value="right">Right</option>
                      </select>
                    </div>
                  </div>
                </div>
                <h3>Account Details</h3>
                <div class="form-group">
                  <label for="email" class="control-label sr-only">Account Number</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Account Number" name="account_number">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label sr-only">Bank Name</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Bank Name" name="bank_name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label sr-only">Phone</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Phone" name="bank_phone">
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="email" class="control-label sr-only">Nominee</label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Nominee" name="nominee">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label class="fancy-checkbox">
                      <input type="checkbox">
                      <span>I accept the <a href="#">Terms &amp; Agreement</a></span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button type="submit" id="registerbtn" class="btn btn-primary btn-block"><i class="fa fa-check-circle"></i> Create Account</button>
                  </div>
                </div>
              </form>
              <p><em>Already have an account?</em> <a href="login"><strong>Login</strong></a></p>
            </div>
            <!-- END REGISTER BOX -->
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
                        <br>
                        <div class="payment-method-accepted">
                            <h3 class="footer-heading">WE ACCEPT</h3>
                            <ul class="list-inline payment-method-list">
                                <li>
                                    <a href="#"><img src="assets/img/cards/visa.png" alt="Visa"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/cards/mastercard.png" alt="Mastercard"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/cards/maestro.png" alt="Maestro"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/cards/amex.png" alt="American Express"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/cards/discover.png" alt="Discover"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/cards/paypal.png" alt="Paypal"></a>
                                </li>
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

    $(document).ready(function(){
        var button = $('#registerbtn');
        var registerform = $('#register_form');
        registerform.on('submit', function(event){
          var name      = $('#name').val();
          var email     = $('#email').val();
          var address   = $('#address').val();
          var phone     = $('#phone').val();
         
          var sponser   = $('#sponser').val();          
          var side      = $('#side').val();

          if(side == ''){
            $('#side').addClass('borderRed').focus();
            event.preventDefault();
          }
          if(sponser == ''){
            $('#sponser').addClass('borderRed').focus();
            event.preventDefault();
          }
          if(phone == ''){
            $('#phone').addClass('borderRed').focus();
            event.preventDefault();
          }
          if(name == ''){
            $('#name').addClass('borderRed').focus();
            event.preventDefault();
          }
        });


        $('#name').on('keypress', function(){
            $(this).removeClass('borderRed');
        });

        $('#phone').on('keypress', function(){
            $(this).removeClass('borderRed');
        });

        $('#sponser').on('keypress', function(){
            $(this).removeClass('borderRed');
        });

        $('#side').on('change', function(){
            $(this).removeClass('borderRed');
        });

        $('#email').on('keyup', function(){
          var email = $(this).val();
          var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
          if(!filter.test(email)){
            $('#invalidmail').show();
            button.prop('disabled', 'disabled');
            button.css('background', '#ec8282');
          }else{
            $('#invalidmail').hide();
            button.prop('disabled', false);
            button.css('background', '#d41414');
          }
        });

        $('#email').on('focusout', function(){
          var email = $(this).val();
          var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
          if(!filter.test(email)){
            $('#invalidmail').show();
            button.prop('disabled', 'disabled');
            button.css('background', '#ec8282');
          }else{
            $('#invalidmail').hide();
            button.prop('disabled', false);
            button.css('background', '#d41414');
          }
        });
      });

  </script>
  <script>
      function GetSponsor()
      {
        $.ajax({
            url:"http://jpproductionganesh.in/api/MemberDetail?username="+document.getElementById("sponser").value,
            dataType:"json",
            success:function(data){
                if(data!=null){
                    document.getElementById("SponsorName").innerHTML=data.full_name;
                }
                else
                {
                    document.getElementById("SponsorName").innerHTML="";
                }
            },
            error:function(){
                document.getElementById("SponsorName").innerHTML="";
            }
        })   
      }
  </script>
</body>
</html>
