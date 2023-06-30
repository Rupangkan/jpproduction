<!doctype html>
<html class="no-js">

<head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>JP Production &middot; Password Reset </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!--<link rel="shortcut icon" href="/favicon.ico">-->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="{{URL::asset('admin/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/dist/css/veneto-admin.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/demo/css/demo.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/dist/assets/font-awesome/css/font-awesome.css')}}">


        <!--[if lt IE 9]>
        <script src="dist/assets/libs/html5shiv/html5shiv.min.js"></script>
        <script src="dist/assets/libs/respond/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="body-sign-in">
    <div class="container">
        <div class="panel panel-default form-container">
            <div class="panel-body">
                <form class="form-login" id="register_form" method="post">
                  {{csrf_field()}}
                    <h3 class="text-center margin-xl-bottom">Reset Password!</h3>

                    <div class="form-group text-center">
                        <label class="sr-only" for="email">Email</label>
                       	<input type="text" name="username" placeholder="Username" class="form-control input-sm bounceIn animation-delay2" id="username">
                    </div>
                    <div class="form-group text-center">
                        <label class="sr-only" for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control input-sm bounceIn animation-delay3" id="password">
                    </div>

                     <div class="form-group text-center">
                        <label class="sr-only" for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control input-sm bounceIn animation-delay4" id="password_confirmation">
                    </div>

                    <button type="submit" id="registerbtn" class="btn btn-success btn-sm bounceIn animation-delay7">CHANGE PASSWORD</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{URL::asset('admin/dist/assets/libs/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">

$(document).ready(function(){
    var button = $('#registerbtn');
    var registerform = $('#register_form');
    registerform.on('submit', function(event){
      var username 	= $('#username').val();
      var password 	= $('#password').val();
      var cpassword = $('#password_confirmation').val();

      if(cpassword == ''){
        $('#password_confirmation').addClass('borderRed').focus();
        event.preventDefault();
      }
      if(password == ''){
        $('#password').addClass('borderRed').focus();
        event.preventDefault();
      }
      if(username == ''){
        $('#username').addClass('borderRed').focus();
        event.preventDefault();
      }
    });

    $('#username').on('keypress', function(){
        $(this).removeClass('borderRed');
    });

    $('#password').on('keypress', function(){
        $(this).removeClass('borderRed');
    });

    $('#password_confirmation').on('keypress', function(){
        $(this).removeClass('borderRed');
    });

    $('#password_confirmation').on('keyup', function(){
        if($('#password').val() != $(this).val()){
          $('#passnotmatch').show();
          button.prop('disabled', 'disabled');
          button.css('background', '#ec8282');
        }else{
           $('#passnotmatch').hide();
           button.prop('disabled', false);
           button.css('background', '#d41414');
        }
    });
  });

</script>
</html>