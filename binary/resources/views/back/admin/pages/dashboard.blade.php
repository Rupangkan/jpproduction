@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Dashboard </title>
@stop
@section('styles')
<link rel="stylesheet" href="{{URL::asset('admin/dist/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css')}}"/>
<link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/rickshaw.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/morris.min.css')}}">
@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li class="active"><a href="javascript:;">Admin's Dashboard- Welcome! <span class="text-danger">{{Sentinel::getUser()->full_name}}</span> No: {{Sentinel::getUser()->sl_no}}.</a></li>
        </ol>
    </div>

    <div class="container-fluid-md">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-metric panel-metric-sm">
                    <div class="panel-body panel-body-primary">
                        <div class="metric-content metric-icon">
                            <div class="value">
                                <i class="fa fa-users"></i> {{count(User::allUsers())}}
                            </div>
                            
                            <header>
                                <h3 class="thin">Total Members</h3>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-metric panel-metric-sm">
                    <div class="panel-body panel-body-success">
                        <div class="metric-content metric-icon">
                            <div class="value">
                               &#8377; {{Payout::getTotalPayout()}}
                            </div>
                            <header>
                                <h3 class="thin">Total Payouts</h3>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-metric panel-metric-sm">
                    <div class="panel-body panel-body-inverse">
                        <div class="metric-content metric-icon">
                            <div class="value">
                                 &#8377; {{Payout::getTodaysPayout()}}
                            </div>
                            <header>
                                <h3 class="thin">Today's Payout</h3>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-metric panel-metric-sm">
                    <div class="panel-body panel-body-danger">
                        <div class="metric-content metric-icon">
                            <div class="value">
                                3:17
                            </div>
                            <header>
                                <h3 class="thin">Avg. Time on Site</h3>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center" style="padding-top: 220px">
        <img src="{{URL::asset('admin/images/foot-pattern.png')}}" style="width: 100%;">
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

<script src="{{URL::asset('admin/dist/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-jvectormap/maps/world_mill_en.js')}}"></script>

<!--[if gte IE 9]>-->
<script src="{{URL::asset('admin/dist/assets/plugins/rickshaw/js/vendor/d3.v3.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/rickshaw/rickshaw.min.js')}}"></script>
<!--<![endif]-->

<script src="{{URL::asset('admin/dist/assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/raphael/raphael-min.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/dashboard.js')}}"></script>
@stop