@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Receipt </title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <style></style>
@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">Payout</a></li>
            <li class="active"><a href="javascript:;">Receipt</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>PAYOUT <strong class="text-warning">RECEIPT</strong></h2>
        <br/>
    </div>

    <div class="container-fluid-md">
        <div id="print-it" style="border: 1px solid #ccc;">
            <h5 class="text-center">Receipt</h5>
            <table class="table" border='0'>
                <tr>
                    <td class="text-left">Receipt Number: {{$id}}</td>
                    <td></td>
                    <td class="text-right">Date/Time: {{Payout::getPayoutDetails($id)->payout_date}}</td>
                </tr>
                 <tr>
                    <td>
                        Member Id: <strong>{{Payout::getPayoutDetails($id)->member_code}}</strong>
                    </td>
                    <td></td>
                    <td class="text-right">
                       Sponsor id: {{Payout::getPayoutDetails($id)->member_code}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Name: {{User::byMemberCode(Payout::getPayoutDetails($id)->member_code)->full_name}}
                    </td>
                    <td>
                    </td>
                    <td class="text-right">
                        
                    </td>
                </tr>
                 <tr>
                    <td>
                        Phone: {{User::byMemberCode(Payout::getPayoutDetails($id)->member_code)->phone}}
                    </td>
                    <td>
                    </td>
                    <td class="text-right">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        Address: {{User::byMemberCode(Payout::getPayoutDetails($id)->member_code)->address}}
                    </td>
                    <td></td>
                    <td class="text-right">
                        
                    </td>
                </tr>
                <tr style="height:50px;"></tr>
                <tr>
                    <td>
                        Authorized Signature
                    </td>
                    <td class="text-right" colspan="2">
                        <table class="table table-striped">
                            <tr>
                                <td>Binary Income:</td><td>&#8377; {{number_format(Payout::getPayoutDetails($id)->payout_amount - Payout::getPayoutDetails($id)->sponsor_amount, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Sponsor Income:</td><td>&#8377; {{number_format(Payout::getPayoutDetails($id)->sponsor_amount, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Total:</td><td>&#8377; {{number_format(Payout::getPayoutDetails($id)->payout_amount, 2)}}</td>
                            </tr>
                        </table>                             
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                    
                    </td>
                </tr>
                <tr><td colspan="3"></td></tr>
            </table>
        </div>
        <br/>
        <div class="text-center">
                <a href="#" onclick="return xepOnline.Formatter.Format('print-it',{render:'download'});">
                    <img style="width:50px" src="http://www.northernwinorml.org/wp-content/uploads/2011/07/button-print-green.png">
                </a>
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
<script src="http://www.cloudformatter.com/Resources/Pages/CSS2Pdf/Script/xepOnline.jqPlugin.js"></script>

@stop