
@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Pin Request</title>
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
            <li><a href="javascript:;">Pin Request</a></li>
            <li class="active"><a href="javascript:;">New Request</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h4>PIN <strong class="text-warning">REQUEST</strong></h4>
        <a href="{{route('get.members')}}" class="btn btn-md btn-primary pull-right" style="position: relative;top: -20px">Members List</a>
        <br/>
    </div>
    <div class="container-fluid-md">
        <form class="form-horizontal" novalidate action="{{route('user.pin-request')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        
                        <div class="panel-body"> 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Amount <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" id="amount" name="amount" value="{{old('full_name')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4"></label>

                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-primary btn-lg">Request Pin</button>
                                            <button type="reset" class="btn btn-danger btn-lg">Clear</button>
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
    <div class="container-fluid-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Pin Request List</h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div style="overflow-x: auto">
                    <table id="table-basic" class="table table-striped nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th width="50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($pins as $pin)
                            <tr class="odd gradeX">
                                <td>{{$i}}</td>
                                <td>{{$pin->amount}}</td>
                                <td class="center">{{$pin->dated}}</td>
                                <td class="center">@if($pin->status == 'open')<label class="label label-success"> {{$pin->status}}</label> @else <label class="label label-danger"> {{$pin->status}}</label> @endif</td>
                                <td class="center">
                                       
                                        <a class="btn btn-xs btn-danger delete" id="{{$pin->id}}" href="javascript:;" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>

$(document).ready(function(){
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
    @if(Session::has('error'))
        $.notify("{{Session::get('error')}}", "error");
    @endif

    @foreach($errors->all() as $error)
        $.notify("{{$error}}.", "error");
    @endforeach

    $('#amount').on('keypress', function(e){
         var charCode = (e.which) ? e.which : e.keyCode;
         if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

         $(this).removeClass('borderRed');
         return true;
    });
</script>

@stop