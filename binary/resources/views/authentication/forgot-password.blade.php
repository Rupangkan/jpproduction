<!doctype html>
<html class="no-js">

<head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>JP Production &middot; Sign In </title>
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
                @if(Session::has('message'))
                <div class="alert alert-success">
                  <strong>Well done!</strong> {{Session::get('message')}}.
                </div>
                @endif
               <form class="form-login" id="register_form" action="{{route('forgot.password')}}" method="post">

                    {{csrf_field()}}
                    <h3 class="text-center margin-xl-bottom">Password Recovery!</h3>

                    <div class="form-group text-center">
                        <label class="sr-only" for="email">Email Address</label>
                        
                        <input type="text" name="email" placeholder="Email address" class="form-control input-lg" id="email">

                        <p id="invalidmail" style="display: none; color: red;">Invalid email entered!</p>

                    </div>

                    <button type="submit" id="forgetpasswordbtn" class="btn btn-primary btn-block">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{URL::asset('admin/dist/assets/libs/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">

$(document).ready(function(){
    var button = $('#forgetpasswordbtn');
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

    $('#email').on('keypress', function(){
        $(this).removeClass('borderRed');
    });
  });

</script>
</html>