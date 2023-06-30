@extends('back.user.layout.master')

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
            <li class="active"><a href="javascript:;">Member's Dashboard- Welcome to JP Production! <span class="text-danger">{{Sentinel::getUser()->full_name}}</span> No: {{Sentinel::getUser()->sl_no}}.</a></li>
        </ol>
    </div>

    <div class="container-fluid-md">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <a href="javascript:void(0)">
                    <div class="panel panel-metric panel-metric-sm">
                        <div class="panel-body panel-body-info">
                            <div class="metric-content metric-icon">
                                <div class="value">
                                    Left: {{Member::tree_data(Sentinel::getUser()->username)->leftcount}}
                                </div>
                                <div class="" style="position:  absolute;top: 0;right: 10px;margin: 25px 0 0 20px;color: white;font-weight: 700;font-size: 26px;line-height: 1em;">
                                    Right: {{Member::tree_data(Sentinel::getUser()->username)->rightcount}}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{route('add.member')}}">
                    <div class="panel panel-metric panel-metric-sm">
                        <div class="panel-body panel-body-inverse">
                            <div class="metric-content metric-icon">
                                <div class="value">
                                    BINARY INCOME<br/>
                                     {{Member::getMemberIncome(Sentinel::getUser()->username)->day_bal}}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{route('member.payouts')}}">
                    <div class="panel panel-metric panel-metric-sm">
                        <div class="panel-body panel-body-danger">
                            <div class="metric-content metric-icon">
                                <div class="value" style="font-size: 24px;">
                                    SPONSOR INCOME<br/>{{Member::getMemberIncome(Sentinel::getUser()->username)->sponsor_balance}}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{route('member.details', Sentinel::getUser()->id)}}">
                    <div class="panel panel-metric panel-metric-sm">
                        <div class="panel-body panel-body-primary">
                            <div class="metric-content metric-icon">
                                <div class="value">
                                    MY DETAILS
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{route('get.members')}}">
                    <div class="panel panel-metric panel-metric-sm">
                        <div class="panel-body panel-body-warning">
                            <div class="metric-content metric-icon">
                                <div class="value">
                                    SPONSORED
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{route('member.tree')}}">
                    <div class="panel panel-metric panel-metric-sm">
                        <div class="panel-body panel-body-success">
                            <div class="metric-content metric-icon">
                                <div class="value">
                                   TREE VIEW
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{route('add.member')}}">
                    <div class="panel panel-metric panel-metric-sm">
                        <div class="panel-body panel-body-inverse">
                            <div class="metric-content metric-icon">
                                <div class="value">
                                     MEMBER FORM
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
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