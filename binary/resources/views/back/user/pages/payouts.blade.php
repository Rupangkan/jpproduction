@extends('back.user.layout.master')

@section('title')
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <title>JP Production &middot; Payout History </title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">Members</a></li>
            <li class="active"><a href="javascript:;">Payout Details</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>{{Sentinel::getUser()->full_name}} <span class="text-warning"><strong>PAYOUT DETAILS</strong></span></h2>
        <!-- <a href="{{route('add.member')}}" class="btn btn-md btn-primary pull-right" style="position: relative;top: -25px">Add New Member</a> -->
        <br/>
    </div>
    <div class="container-fluid-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Payout History</h4>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body" id="content">
                <table id="table-basic" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payout Amount</th>
                            <th>Payout Date</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($payouts as $payout)
                        <tr class="odd gradeX">
                            <td>{{$i}}</td>
                            <td>&#8377; {{$payout->payout_amount}}</td>
                            <td class="center">{{$payout->payout_date}}</td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                    
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
<script src="{{URL::asset('admin/dist/js/main.js')}}"></script>

<!--[if lt IE 9]>
<script src="dist/assets/plugins/flot/excanvas.min.js"></script>
<![endif]-->
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/demo.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/notify.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-select2/select2.min.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/tables-data-tables.js')}}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

<script>
    @if(Session::has('message'))
        $.notify("{{Session::get('message')}}", "success");
    @endif
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stop