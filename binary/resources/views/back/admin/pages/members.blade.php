@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Members </title>
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
        <h4>ALL <strong class="text-warning">MEMBERS</strong></h4>
        <a href="{{route('add.member')}}" class="btn btn-md btn-primary pull-right" style="position: relative;top: -20px">Add New Member</a>
        <br/>
    </div>

    <div class="container-fluid-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Members List</h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="text-right" style="margin-bottom: 20px;">
                    <!--<a href="{{route('send.sms-all')}}" class="btn btn-danger btn-md">SEND SMS TO ALL</a>-->
                </div>
                <div style="overflow-x: auto; height:500px; overflow-y:auto;">
                    <table id="table-basic" class="table table-striped nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Stars</th>
                                <th>Member ID</th>
                                <th>Name</th>
                                <th>Sponsor ID</th>
                                <th>Sponsor Name</th>
                                <th>Left Count</th>
                                <th>Right Count</th>
                                <th>Total Sponsored</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Pan</th>
                                <th>Address</th>
                                <th>Bank Name</th>                                
                                <th>Account No</th>
                                <th>Nominee</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($members as $member)
                            <tr class="odd gradeX">
                                <td>{{$i}}</td>
                                <td>@if(User::getThisMonthCount($member->id)>=5 && User::getThisMonthCount($member->id)< 10) <img src="{{URL::asset('admin/images/star.png')}}"> @elseif(User::getThisMonthCount($member->id)>=10 && User::getThisMonthCount($member->id)< 20) <img src="{{URL::asset('admin/images/star.png')}}"><img src="{{URL::asset('admin/images/star.png')}}"> @elseif(User::getThisMonthCount($member->id)>= 20) <img src="{{URL::asset('admin/images/star.png')}}"><img src="{{URL::asset('admin/images/star.png')}}"><img src="{{URL::asset('admin/images/star.png')}}"> @endif</td>
                                <td>{{$member->username}}</td>
                                <td>{{$member->full_name}} @if($member->side == 'left')<span style="color:red;"> L </span>@elseif($member->side == 'right') <span style="color:red;"> R </span> @endif</td>
                                <td>{{isset(User::getUser($member->sponsoror_id)->username)?User::getUser($member->sponsoror_id)->username:''}}</td>
                                <td>@if($member->sponsoror_id != '') {{User::getUser($member->sponsoror_id)->full_name}} @else NILL @endif</td>
                                <td>{{Member::tree_data($member->username)->leftcount}}</td>
                                <td>{{Member::tree_data($member->username)->rightcount}}</td>
                                <td><span style="color:red;">L</span>: {{$member->total_sponsored_l}} | <span style="color:green">R</span>: {{$member->total_sponsored_r}}</td>
                                <td class="center">{{$member->phone}}</td>
                                <td class="center">{{$member->email}}</td>
                                <td class="center">{{$member->pan}}</td>
                                <td class="center">{{$member->address}}</td>
                                
                                <td class="center">{{$member->bank_name}}</td>
                                <td class="center">{{$member->account_no}}</td>
                                <td class="center">{{$member->nominee_name}}</td>
                                <td>{{$member->join_date}}</td>
                                <td class="center">
                                        <a class="btn btn-xs btn-info" href="{{route('edit.member', $member->id)}}" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-xs btn-primary" href="{{route('send.sms', $member->id)}}" title="Send Sms"><i class="fa fa-paper-plane"></i></a>
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
    
    @if(Session::has('message'))
        $.notify("{{Session::get('message')}}", "success", {position:"center"});
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