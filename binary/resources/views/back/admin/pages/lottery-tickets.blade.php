@extends('back.admin.layout.master')

@section('title')
    <title>Arunprabha International E-Commerce PVT. LTD. &middot; Change Password</title>
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
            <li><a href="javascript:;">Lottery</a></li>
            <li class="active"><a href="javascript:;">Lottery Tickets</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>LOTTERY <span class="text-warning"><strong style="">TICKETS</strong></span></h2>
        <a href="{{route('add.lottery')}}" class="btn btn-md btn-primary pull-right" style="position: relative;top: -25px"><i class="fas fa-chevron-circle-left"></i> Back</a>
        <br/>
    </div>
    <div class="container-fluid-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">{{Lottery::getLottery($tickets[0]->ticket_id)->title}} Tickets</h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <table id="table-basic" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ticket Number</th>
                            <th>Booked By</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($tickets as $ticket)
                        <tr class="odd gradeX">
                            <td>{{$i}}</td>
                            <td>{{$ticket->ticket_number}}</td>
                            <td>{{Member::getMemberDtls($ticket->member_code)->first_name}}</td>
                            <td>{{date('Y-m-d')}}</td>
                            <td class="center">{{$ticket->status}}</td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Ticket Number</th>
                            <th>Booked By</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
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

<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-select2/select2.min.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/tables-data-tables.js')}}"></script>

@stop