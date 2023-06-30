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
    
    <form class="form-horizontal" novalidate action="{{route('admin.message')}}" method="post">
    {{csrf_field()}}
        <div class="container-fluid-md">
            <div class="row">
                <div class="col-md-5">
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
                            <div style="height:480px; overflow-y:auto;">
                                <table id="table-basic" class="table table-striped nowrap">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="allphone" /></th>
                                            <th>Member ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($members as $member)
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" value="{{$member->phone}}" name="phone[]" class="phone"/></td>
                                            <td>{{$member->username}}</td>
                                            <td>{{$member->full_name}}</td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    
                    <div class="panel panel-default">
                            
                        <div class="panel-body"> 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Message <span class="asterisk">*</span></label>
    
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="message" placeholder="Write your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"></label>
    
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-lg">Send</button>
                                            <button type="reset" class="btn btn-danger btn-lg">Clear</button>
                                        </div>
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
    $('#allphone').on('click', function(){
        if($(this).prop('checked')){
            $('.phone').prop('checked', true);
        }else{
            $('.phone').prop('checked', false);
        }
    });
</script>
@stop