@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Registration </title>
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
            <li><a href="javascript:;">Registration</a></li>
            <li class="active"><a href="javascript:;">New Registration</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h4>ALL <strong class="text-warning">MEMBERS</strong></h4>
    </div>

    <div class="container-fluid-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">New Registrations</h4>

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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Sponsr ID</th>
                                <th>Side</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($members as $member)
                            <tr class="odd gradeX">
                                <td>{{$i}}</td>
                                <td>{{$member->full_name}}</td>
                                <td class="center">{{$member->phone}}</td>
                                <td class="center">{{$member->email}}</td>
                                <td class="center">{{$member->address}}</td>
                                <td class="center">{{$member->sponser}}</td>
                                <td class="center">{{$member->side}}</td>
                                <td class="center">
                                        <a class="btn btn-xs btn-info" href="{{route('add.new-member', $member->id)}}" title="Add Member"><i class="fa fa-paper-plane"></i></a>
                                        <!--<a class="btn btn-xs btn-danger delete" id="{{$member->id}}" href="javascript:;">Delete</a>-->
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
<script>
    @if(Session::has('delete'))
        $.notify("{{Session::get('delete')}}", "error");
    @endif
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
                Yes: {
                    btnClass: 'btn-danger',
                    action: function(){
                        document.location.href = "{{env('APP_URL')}}/member/delete/"+id;
                    }
                },
                No: function () {
                    
                }
            }
        });
    });
</script>
@stop