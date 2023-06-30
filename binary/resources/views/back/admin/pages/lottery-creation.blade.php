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
            <li class="active"><a href="javascript:;">Lottery Creation</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>LOTTERY <span class="text-warning"><strong style="">CREATION FORM</strong></span></h2>
        <br/>
    </div>
    <div class="container-fluid-md">
        <form class="form-horizontal" novalidate action="{{isset($lottery)?route('edit.lottery', $lottery->id):route('add.lottery')}}" method="post">
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
                                        <label class="control-label col-sm-2">Lottery Title</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="title" value="{{isset($lottery)?$lottery->title:old('title')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Issue Date <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="issue_date" data-rel="datepicker" value="{{isset($lottery)?$lottery->issue_date:old('issue_date')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Expiry Date <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="expiry_date" data-rel="datepicker" value="{{isset($lottery)?$lottery->expiry_date:old('expiry_date')}}" required>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2">No of Tickets <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="no_of_tickets" id="no_of_tickets" value="{{isset($lottery)?$lottery->no_of_tickets:old('no_of_tickets')}}" required>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-10 pull-right">
                                            <input type="submit" name="" value="Generate Tickets" id="button" class="btn btn-md btn-success">
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
                <h4 class="panel-title">Available Lotteries</h4>

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
                            <th>Title</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>No of Tickets</th>
                            <th>Status</th>
                            <th width="180px;" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($lotteries as $lott)
                        <tr class="odd gradeX">
                            <td>{{$i}}</td>
                            <td>{{$lott->title}}</td>
                            <td>{{$lott->issue_date}}</td>
                            <td class="center">{{$lott->expiry_date}}</td>
                            <td class="center">{{$lott->no_of_tickets}}</td>
                            <td class="center">{{$lott->status}}</td>
                            <td class="center">
                                    <a class="btn btn-xs btn-primary" href="{{route('get.tickets', $lott->id)}}">View</a>
                                    <a class="btn btn-xs btn-info" href="{{route('edit.lottery', $lott->id)}}">Edit</a>
                                    <a class="btn btn-xs btn-danger delete" id="{{$lott->id}}" href="javascript:;">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>No of Tickets</th>
                            <th>Status</th>
                            <th width="50px;">Action</th>
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
<script src="{{URL::asset('admin/dist/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-select2/select2.min.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/tables-data-tables.js')}}"></script>

<script src="{{URL::asset('admin/dist/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/forms-validation.js')}}"></script>

<script>

    $('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    @if(Session::has('message'))
        $.notify("{{Session::get('message')}}", "success");
    @endif

    @if(Session::has('error'))
        $.notify("{{Session::get('error')}}", "error");
    @endif

    @foreach($errors->all() as $error)
        $.notify("{{$error}}.", "error");
    @endforeach

    $('#no_of_tickets').on('keypress', function(e){
        var a = [];
        var k = e.which;
        for (i = 48; i < 58; i++)
            a.push(i);
        
        if (!(a.indexOf(k)>=0))
            e.preventDefault();

        $(this).removeClass('borderRed');
    });
</script>
<script>
    $('.delete').on('click', function(){
        var id = $(this).attr('id');
        $.confirm({
            title: 'ARE YOU SURE?',
            theme: 'modern',
            type: 'red',
            content: 'Do you really want to delete?',
            buttons: {
                Yes:{
                    btnClass: 'btn-danger',
                    action: function(){
                        document.location.href = "{{env('APP_URL')}}/admin/lottery/delete/"+id;
                    }
                },
                No: function () {
                    
                }
            }
        });
    });
</script>
@stop