@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Payouts </title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <style>

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 5px 0 30px 0;
            position: relative;
            border-bottom: 1px solid #04040424;
            padding-bottom: 10px;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 30%; /* Could be more or less, depending on screen size */
            padding: 16px;
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0px;
            color: #000;
            font-size: 25px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)} 
            to {-webkit-transform: scale(1)}
        }
            
        @keyframes animatezoom {
            from {transform: scale(0)} 
            to {transform: scale(1)}
        }

        /* Style for mobile devices */
        @media screen and (max-width: 480px) {
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 70%; /* Could be more or less, depending on screen size */
                padding: 16px;
            }
            h3{
                font-size: 17px;
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 70%; /* Could be more or less, depending on screen size */
                padding: 16px;
            }
            span.psw {
               display: block;
               float: none;
            }
            .cancelbtn {
               width: 100%;
            }
        }
        </style>
@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">Members</a></li>
            <li class="active"><a href="javascript:;">Payouts</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>MEMBER <strong class="text-warning">PAYOUTS</strong></h2>
        <br/>
    </div>

    <div class="container-fluid-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Payout Details</h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <a href="#" id="makeMultiPayouts" class="btn btn-md btn-success">Make Multiple Payouts</a> <a href="#" id="makeAllPayouts" class="btn btn-md btn-danger">Make All Payouts</a><br/>
                <div class="table-responsive">
                    <table id="table-basic" class="table table-striped nowrap">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="allphone" /></th>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Binary Balance</th>
                                <th>Sponsor Balance</th>
                                <th>Current Balance</th>
                                <th>Total Balance</th>
                                <th class="no-print" width="200px" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach($payouts as $payout)
                            <tr class="odd gradeX">
                                <td><input type="checkbox" value="{{$payout->member_code}}" name="payout" class="multiPayout"/></td>
                                <td>{{$payout->member_code}}</td>
                                <td>
                                    @if(User::byUsername($payout->member_code)!=null)
                                    {{User::byUsername($payout->member_code)->full_name}}
                                    @else
                                    User Removed By You
                                    @endif
                                    </td>
                                <td>{{$payout->day_bal}}</td>
                                <td class="center">{{$payout->sponsor_balance}}</td>
                                <td class="center">{{$payout->current_bal}}</td>
                                <td class="center">{{$payout->total_bal}}</td>
                                <td class="center no-print" style="text-align:  center;">
                                    <form class="payout" action="{{route('make.payment')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" id="amount" name="amount" value="{{$payout->current_bal}}">
                                         <input id="payout_id" type="hidden" name="payout_id" value="{{$payout->member_code}}">
                                        <button type="button" class="btn btn-md btn-primary make_payment">MAKE PAYMENT</button>
                                    </form>
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

<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-select2/select2.min.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/tables-data-tables.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
    
    $('.make_payment').on('click', function(){
        var id = $(this).attr('id');
        $.confirm({
            title: 'ARE YOU SURE?',
            theme: 'modern',
            type: 'orange',
            content: 'Do you really want to make payment?',
            buttons: {
                Yes: {
                    btnClass: 'btn-warning',
                    action: function(){
                        $('.payout').submit();
                    }
                },
                No: function () {
                    
                }
            }
        });
    });
</script>

<script>
    $('#allphone').on('click', function(){
        if($(this).prop('checked')){
            $('.multiPayout').prop('checked', true);
        }else{
            $('.multiPayout').prop('checked', false);
        }
    });
    
    $('#makeMultiPayouts').on('click', function(){
        var arr = [];
        
        $("input:checkbox[name=payout]:checked").each(function(){
            arr.push($(this).val());
        });
        
        if(arr.length == 0){
            alert('No field selected!');
        }else{
            console.log(arr);
            $.ajax({
                type: 'get',
                url: '{{route("make.multi-payments")}}',
                data: 'member_code='+arr,
                success: function(response){
                    console.log(response);
                }
            });
        }
    });
    
    $('#makeAllPayouts').on('click', function(){
        var arr = [];
        console.log(arr);
        $.ajax({
            type: 'get',
            url: '{{route("make.multi-payments")}}',
            data: 'member_code='+arr,
            success: function(response){
                console.log(response);
            }
        });
    });
</script>

<script>
    @if(Session::has('error'))
        $.notify("", "error");
        $.alert({
                title: 'Alert!',
                content: "{{Session::get('error')}}",
                type: 'red',
                theme: 'material'
            });
    @endif

    @if(Session::has('message'))
        $.notify("{{Session::get('message')}}", "success");
    @endif
</script>
@stop