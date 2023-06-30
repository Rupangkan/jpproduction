@extends('back.admin.layout.master')

@section('title')
    <title>Arunprabha International E-Commerce PVT. LTD. &middot; Members </title>
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
            <li><a href="javascript:;">Members</a></li>
            <li class="active"><a href="javascript:;">Member List</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>MY <strong class="text-warning">PROFILE</strong></h2>
        <br/>
    </div>

    <div class="container-fluid-md">
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <div class="panel panel-default panel-profile-details">
                    <div class="panel-body">
                        <div class="col-sm-5 text-center">
                            <img alt="image" class="img-circle img-profile" src="{{URL::asset($member->photo)}}" style="width: 100%">
                        </div>
                        <div class="col-sm-7 profile-details">
                            <h3>{{$member->full_name}}</h3>
                            <h4 class="thin">Admin</h4>
                            <p>
                                <a href="javascript:;" class="text-gray text-no-decoration">
                                    <i class="fa fa-fw fa-envelope"></i>
                                    Send Email
                                </a>
                            </p>
                            <p>
                                <a href="javascript:;" class="text-gray text-no-decoration">
                                    <i class="fa fa-fw fa-phone"></i>
                                    Call Timmy
                                </a>
                            </p>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                    	<h3>ID Proof:</h3>
                    	<div class="col-sm-12">
                    		<img src="{{URL::asset($member->sign)}}" alt="signature" class="img-rounded" style="width: 100%;" />
                    	</div>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-5">
                            <dl>
                                <dt>Email</dt>
                                <dd>{{$member->email}}</dd>
                            </dl>
                            <dl class="margin-sm-bottom">
                                <dt>Mobile</dt>
                                <dd>+91-{{$member->phone}}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-7">
                            <dl>
                                <dt>Skype</dt>
                                <dd>timmy.radclyffe</dd>
                            </dl>
                            <dl class="margin-sm-bottom">
                                <dt>Location</dt>
                                <dd>{{$member->address}}.</dd>
                            </dl>
                        </div>
                    </div>
              
                </div>
            </div>

            <div class="col-md-5 col-lg-4">
                <div class="panel panel-metric panel-metric-sm">
                    <div class="panel-body panel-body-warning">
                        <div class="metric-content metric-icon">
                            <div class="value">
                                2,315
                            </div>
                            <div class="trend">
                                <p class="text-success">
                                    <i class="fa fa-chevron-up"></i> 5.1%
                                </p>
                                <strong>Previous 30 Days</strong>
                            </div>
                            <div id="metric-sales" class="chart"></div>
                            <header>
                                <h3 class="thin">Monthly Sales</h3>
                            </header>
                        </div>
                    </div>
                </div>
                <div class="panel panel-metric panel-metric-sm">
                    <div class="panel-body panel-body-info">
                        <div class="metric-content metric-icon">
                            <div class="value">
                                1,430
                            </div>
                            <div class="trend">
                                <p class="text-danger">
                                    <i class="fa fa-chevron-down"></i> 2.3%
                                </p>
                                <strong>Previous 30 Days</strong>
                            </div>
                            <div id="metric-orders" class="chart"></div>
                            <header>
                                <h3 class="thin">Monthly Orders</h3>
                            </header>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <table class="table">
                        <tr>
                            <td>
                                Storage Quota
                            </td>
                            <td class="valign-middle" style="min-width: 50%;">
                                <div class="progress progress-xs">
                                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar"
                                         class="progress-bar progress-bar-info">
                                        <span class="sr-only">60 MB / 100 MB</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Contacts Quota
                            </td>
                            <td class="valign-middle">
                                <div class="progress progress-xs">
                                    <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar"
                                         class="progress-bar progress-bar-warning">
                                        <span class="sr-only">90 / 100</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Deals Quota
                            </td>
                            <td class="valign-middle">
                                <div class="progress progress-xs">
                                    <div style="width: 30%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" role="progressbar"
                                         class="progress-bar progress-bar-success">
                                        <span class="sr-only">30 / 100</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4 class="page-header no-margin semi-bold">Total Income</h4>
                                <h1 class="semi-bold text-primary-dark no-margin-bottom">$25,460 <span class="text-success pull-right"><i class="fa fa-caret-up margin-sm-right"></i>12%</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <h4 class="semi-bold margin-sm-vertical">Deals <span class="text-muted normal">(30 days)</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    WON
                                </th>
                                <td>
                                    24
                                </td>
                                <td class="text-right text-success">
                                    <i class="fa fa-caret-up margin-sm-right"></i>20%
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    LOST
                                </th>
                                <td>
                                    10
                                </td>
                                <td class="text-right text-danger">
                                    <i class="fa fa-caret-up margin-sm-right"></i>5%
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    UNQUALIFIED
                                </th>
                                <td>
                                    6
                                </td>
                                <td class="text-right text-muted">
                                    <i class="fa fa-sort margin-sm-right"></i>0%
                                </td>
                            </tr>
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
<script src="{{URL::asset('admin/dist/js/main.js')}}"></script>

<!--[if lt IE 9]>
<script src="dist/assets/plugins/flot/excanvas.min.js"></script>
<![endif]-->
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/demo.js')}}"></script>

<script src="{{URL::asset('admin/dist/assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/pages-profile.js')}}"></script>
@stop