@extends('back.user.layout.master')

@section('title')
    <title>JP Production &middot; Change Password</title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/bootstrap-switch.min.css')}}">
    <style type="text/css">
        .datepicker{
            right: 662px;
        }
    </style>
@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">Change Password</a></li>
            <li class="active"><a href="javascript:;">Change Password</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>CHANGE <span class="text-warning"><strong style="">PASSWORD FORM</strong></span></h2>
        <br/>
    </div>
    <div class="container-fluid-md">
        <form class="form-horizontal" novalidate action="{{route('change.password')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <br/>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body"> 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Current Password <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="current_password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">New Password <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="new_password" id="new_password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Confirm Password <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                                             <p id="passnotmatch" style="display: none;color: red;">* Password mismatch!</p>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-10 pull-right">
                                            <input type="submit" name="" value="Change" id="button" class="btn btn-md btn-success">
                                        </div>
                                    </div>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('scripts')
<script src="{{URL::asset('admin/dist/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/bs3/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-navgoco/jquery.navgoco.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/dist/js/main.js')}}"></script>

<!--[if lt IE 9]>
<script src="dist/assets/plugins/flot/excanvas.min.js"></script>
<![endif]-->
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/demo.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/notify.min.js')}}"></script>

<script src="{{URL::asset('admin/dist/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/forms-validation.js')}}"></script>

<script>

    @if(Session::has('message'))
        $.notify("{{Session::get('message')}}", "success");
    @endif

    @if(Session::has('error'))
        $.notify("{{Session::get('error')}}", "error");
    @endif

    @foreach($errors->all() as $error)
        $.notify("{{$error}}.", "error");
    @endforeach

    $(document).ready(function(){

        $('#confirm_password').on('keyup', function(){
            if($('#new_password').val() != $(this).val()){
                $('#passnotmatch').show();
                $('#button').prop('disabled', 'disabled');
                $('#button').css('background', '#ec8282');
            }else{
                $('#passnotmatch').hide();
                $('#button').prop('disabled', false);
                $('#button').css('background', '#d41414');
            }
        });
    });
</script>
@stop