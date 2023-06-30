@extends('back.user.layout.master')

@section('title')
    <title>Arunprabha International E-Commerce PVT. LTD. &middot; Add Member</title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">

@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">User</a></li>
            <li class="active"><a href="javascript:;">User</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>Registration Details</h2>
        
        <br/>
    </div>
    <div class="container-fluid-md">
        <form class="form-horizontal" novalidate action="{{route('member.update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Basic Information</h4>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body"> 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <input type="hidden" name="member_code" value="{{$data->mem_code}}">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Full Name <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="full_name" required value="{{$data->full_name}}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Guardian Name <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="guadian_name" required value="{{$data->guadian_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Date of Birth <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="dob" required value="{{$data->dob}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Gender <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" required="" name="gender" @if($data->gender == 'm') checked @endif value="m">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" required="" name="gender" @if($data->gender == 'f') checked @endif value="f">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Nationality <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="nationality" required value="{{$data->nationality}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Phone <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="phone" readonly="true" required value="{{$data->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Email</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="email" type="email" value="{{$data->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">PAN</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="pan" value="{{$data->pan}}">
                                        </div>
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
                                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                            
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Account Number</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" readonly="true" name="account_no" value="{{$data->account_no}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Bank Name</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" readonly="true" name="bank_name" value="{{$data->bank_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">IFSC</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" readonly="true" name="ifsc" value="{{$data->ifsc}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Nominee Name</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" readonly="true" name="nominee_name" value="{{$data->nominee_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Relation</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" readonly="true" name="relation" value="{{$data->relation}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Address Details</h4>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                            
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">House No</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="house_no" value="{{$data->house_no}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Lane Name</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="lane_no" value="{{$data->lane_no}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Vill/City</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="vill" value="{{$data->vill_city}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Post Office</label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="po" value="{{$data->po}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Dist <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="dist" required value="{{$data->dist}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">State <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="state" required value="{{$data->state}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Pin <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" name="pin" required value="{{$data->pin}}">
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Identity Details</h4>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                            
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Photo </label>

                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="photo">
                                        </div>
                                        <a href="{{URL::asset($data->photo)}}" target="_blank" class="control-label col-sm-3">file </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Sign</label>

                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="sign">
                                        </div>
                                         <a href="{{URL::asset($data->sign)}}" target="_blank" class="control-label col-sm-3">file </a>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Package Details</h4>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                            
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Package Type </label>

                                        <div class="col-sm-8">
                                           <select class="form-control" name="package_type" required>
                                                @if($data->package_type == '1')
                                                    <option value="1">Book Package</option>
                                                    <option value="2">Purchase Package</option>
                                                @elseif($data->package_type == '2')
                                                    <option value="2">Purchase Package</option>
                                                    <option value="1">Book Package</option>
                                                @endif
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Package Pickup <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                           <select class="form-control" name="pick_up" required>
                                            @if(isset(data))
                                                @if(data->pick_up == 'self')
                                                    <option value="self">Self</option>
                                                    <option value="home">Delivered to home</option>
                                                @elseif(data->pick_up == 'home')
                                                    <option value="home">Delivered to home</option>
                                                    <option value="self">Self</option>
                                                @endif
                                            @else
                                               
                                               <option value="self">Self</option>
                                               <option value="home">Delivered to home</option>
                                               <!--<option value="director">Director</option>-->
                                            @endif
                                           </select>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Referance Code</h4>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                            
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Register Code <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                           <input type="text" name="referance_code" class="form-control" required value="{{$data->referance_code}}" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Left Code<span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                           <input type="text" name="placement" class="form-control" required value="{{$data->lcode}}" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Right Code<span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                           <input type="text" name="placement" class="form-control" required value="{{$data->rcode}}" readonly="true">
                                        </div>
                                    </div>
                                </div>
                              
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 btn-custom">
                     <button type="submit" class="btn btn-primary btn-lg">Update</button>
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

    @foreach($errors->all() as $error)
        $.notify("{{$error}}.", "error");
    @endforeach
</script>
@stop