@extends('back.admin.layout.master')

@section('title')
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <title>Arunprabha International E-Commerce PVT. LTD. &middot; Payout History </title>
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
            <li class="active"><a href="javascript:;">Payout History</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>MEMBER <span class="text-warning"><strong>PAYOUT HISTORY</strong></span></h2>
        <!-- <a href="{{route('add.member')}}" class="btn btn-md btn-primary pull-right" style="position: relative;top: -25px">Add New Member</a> -->
        <br/>
    </div>
    <div class="container-fluid-md">
        <div class="panel panel-default panel-profile-details" style="padding: 25px 0px 100px 25px;">
            <div class="form-group col-sm-5">
                <label>Filter Option:</label>
                   <select class="form-control" id="filter">
                        <option value="100">Filter by date</option>
                        <option value="0">Today</option>
                        <option value="1">This month</option>
                        <option value="3">Last 3 months</option>
                        <option value="6">Last 6 months</option>
                        <option value ="12">Last 12 months</option>
                    </select>
            </div>
        </div>
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
                            <th>Member ID</th>
                            <th>Member Name</th>
                            <th>Last Payout Amount(Including TDS)</th>
                            <th>Last Payout Date</th>
                            <th>Total Payout</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($payouts as $payout)
                        <tr class="odd gradeX">
                            <td>{{$i}}</td>
                            <td>@if(Member::getMemberDtls($payout->member_code)->referance_code=='') Admin @else {{Member::getMemberDtls($payout->member_code)->referance_code}} @endif</td>
                            <td>{{Member::getMemberDtls($payout->member_code)->full_name}}</td>
                            <td>{{$payout->last_payout_amount+$payout->tds}} ({{$payout->last_payout_amount}}+{{$payout->tds}})</td>
                            <td class="center">{{$payout->last_payout_date}}</td>
                            <td class="center">{{$payout->total_payout_amount}}</td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                             <th>#</th>
                            <th>Member ID</th>
                            <th>Member Name</th>
                            <th>Last Payout Amount(Including TDS)</th>
                            <th>Last Payout Date</th>
                            <th>Total Payout
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
<script>
    $('#filter').on('change', function(){
        var optn = $(this).val();

        if(optn == 'prd'){
            $('#period').show();
        }else{
            $('#period').hide();
            $.ajax({
                type: 'post',
                url: '{{route("filter.payout.history.data")}}',
                data: 'id='+$(this).val(),
                beforeSend: function(){
                         $('#loader').show();
                    },
                success:function(response){
                    console.log(response);
                    $('#content').html(response);
                }
            });
        }
    });
</script>
@stop