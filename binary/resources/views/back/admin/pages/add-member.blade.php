
@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Add Member</title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">
    <style type="text/css">
        input {
          font-family: monospace;
        }
        label {
          display: block;
        }
        div {
          margin: 0 0 1rem 0;
        }
        .progress-back {
          left: 0;
          right: 0;
          top: 0;
          bottom: -100px;
          position: fixed;
          z-index: 9999;
          opacity: 1;
          background: #fff;
          display: none;
          text-align: center;
       }

	.progress-my { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px;    top: 320px;
	    left: 500px;}
	.bar-my { background-color: #38a4d4; width:0%; height:23px; border-radius: 3px;margin:0; }
	.percent-my { position:absolute; display:inline-block; top:3px; left:48%;color:white;}
    </style>
@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">Members</a></li>
            <li class="active"><a href="javascript:;">New Member</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h4>MEMBER <strong class="text-warning">REGISTRATION FORM</strong></h4>
        <a href="{{route('get.members')}}" class="btn btn-md btn-primary pull-right" style="position: relative;top: -20px">Members List</a>
        <br/>
    </div>
    <div class="container-fluid-md">
        <form class="form-horizontal" novalidate action="{{isset($member)?route('member.update'):route('add.member')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Basic Information</h4>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body"> 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <input type="hidden" name="username" value="{{isset($member)?$member->username:''}}">
                                    @if(!isset($member))
                                    <!--<div class="form-group">-->
                                    <!--    <label class="control-label col-sm-4">Pin <span class="asterisk">*</span></label>-->

                                    <!--    <div class="col-sm-8">-->
                                    <!--       <input type="text" name="pin" value="{{old('pin')}}" class="form-control" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Full Name <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="full_name" value="@if(isset($newMember)){{$newMember->full_name}}@endif {{isset($member)?$member->full_name:old('full_name')}}" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Phone <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="phone" value="@if(isset($newMember)){{$newMember->phone}}@endif {{isset($member)?$member->phone:old('phone')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Email</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="email" value="@if(isset($newMember)){{$newMember->email}}@endif {{isset($member)?$member->email:old('email')}}" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">PAN <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" required name="pan" value="{{isset($member)?$member->pan:old('pan')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Address</label>

                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="address" row="5">@if(isset($newMember)){{$newMember->address}}@endif {{isset($member)?$member->address:old('address')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Other Informations</h4>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                       
                        <div class="panel-body">
                        
                            <div class="panel panel-default">
                            @if(!isset($member))
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Sponsor ID <span class="asterisk">*</span></label>

                                    <div class="col-sm-8">
                                       <input type="text" name="referance_code" value="@if(isset($newMember)) {{$newMember->sponser}} @else {{Sentinel::getUser()->username}} @endif" class="form-control" required>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Side</label>

                                        <div class="col-sm-8">
                                            <select class="form-control" name="side" id="side">
                                                <option value="">Select One</option>
                                                <option @if(isset($newMember)) @if($newMember->side == 'left') selected @endif @endif value="left">Left</option>
                                                <option @if(isset($newMember)) @if($newMember->side == 'right') selected @endif @endif value="right">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Join Date</label>

                                    <div class="col-sm-8">
                                        <input type="text" name="join_date" class="form-control" value="{{isset($member)?$member->join_date:old('join_date')}}" data-rel="datepicker">
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Bank Details</h4>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                            
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Account Number</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="account_no" value="{{isset($member)?$member->account_no:old('account_no')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Bank Name</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="bank_name" value="{{isset($member)?$member->bank_name:old('bank_name')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Phone</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="bank_phone" value="{{isset($member)?$member->bank_phone:old('bank_phone')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Nominee Name</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="nominee_name" value="{{isset($member)?$member->nominee_name:old('nominee_name')}}">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!isset($member))
                <div class="col-md-12">
                     <label><input type="checkbox" class="" id="agree"> I here by declare that all the information provided above are complete and true as per my knowledge.</label>
                </div>
                @endif
                <div class="col-md-12 btn-custom" id="subBtn" @if(!isset($member)) style="display:none;" @endif>
                     <button type="submit" class="btn btn-primary btn-lg">{{isset($member)?'Update':'Submit'}}</button>
                     @if(!isset($member))
                     <button type="reset" class="btn btn-danger btn-lg">Clear</button>
                     @else
                    <a href="{{route('add.member')}}" class="btn btn-success btn-lg">Add New</a>
                     @endif
                     <br/>
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
<!-- Progressbar -->
<script src="{{URL::asset('admin/dist/js/jquery.form.js')}}"></script>

<script src="{{URL::asset('admin/demo/js/forms-validation.js')}}"></script>
<script>
$(document).ready(function(){
    @if(Session::has('error'))
        
        $.alert({
            title: 'Oh Snap!',
            theme: 'modern',
            type: 'red',
            content: '{{Session::get("error")}}',
            buttons: {
                Ok: {
                    btnClass: 'btn-danger',
                    action: function(){
                       
                    }
                }
            }
        });
    @endif
    @if(Session::has('message'))
        
        $.alert({
            title: 'Welcome',
            theme: 'modern',
            type: 'green',
            content: '{{Session::get("message")}}',
            buttons: {
                Ok: {
                    btnClass: 'btn-success',
                    action: function(){
                       
                    }
                }
            }
        });
    @endif
});

    @foreach($errors->all() as $error)
        $.notify("{{$error}}.", "error");
    @endforeach
    
    $('[data-rel=datepicker]').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });
</script>

<script>
    $('#agree').on('click', function(){
         if($(this).is(':checked')){
            $('#subBtn').show();
         }else{
            $('#subBtn').hide();
         }
    });
</script>


@stop