
@extends('back.admin.layout.master')

@section('title')
    <title>JP Production &middot; Product</title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">
    <style type="text/css">
        input {
          font-family: monospace;
        }
        label {
          display: block;
        }
        div {
          margin: 0 0 1rem 0;
        }
        .progress-back {
          left: 0;
          right: 0;
          top: 0;
          bottom: -100px;
          position: fixed;
          z-index: 9999;
          opacity: 1;
          background: #fff;
          display: none;
          text-align: center;
       }

	.progress-my { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px;    top: 320px;
	    left: 500px;}
	.bar-my { background-color: #38a4d4; width:0%; height:23px; border-radius: 3px;margin:0; }
	.percent-my { position:absolute; display:inline-block; top:3px; left:48%;color:white;}
    </style>
@stop

@section('content')
<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">Product</a></li>
            <li class="active"><a href="javascript:;">New Product</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h4>NEW <strong class="text-warning">PRODUCT</strong></h4>
        <br/>
    </div>
    <div class="container-fluid-md">
        <form class="form-horizontal" novalidate action="{{isset($product)?route('admin.edit-product', $product->id):route('admin.product')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        
                        <div class="panel-body"> 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Product <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input class="form-control" id="product" name="product" value="{{isset($product)?$product->product:old('product')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Description <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="description" name="description">{{isset($product)?$product->description:old('description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Image <span class="asterisk">*</span></label>

                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="image" name="image" {{isset($product)?'':'required'}}>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4"></label>

                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                            <a href="{{isset($product)?route('admin.product'):'javascript:;'}}" type="reset" class="btn {{isset($product)?'btn-success':'btn-danger'}} btn-lg">{{isset($product)?'Add New':'Clear'}}</a>
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
                <h4 class="panel-title">Product List</h4>

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
                                <th>Product</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th width="50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($products as $pro)
                            <tr class="odd gradeX">
                                <td>{{$i}}</td>
                                <td>{{$pro->product}}</td>
                                <td>{{$pro->description}}</td>
                                <td class="center">{{$pro->created_at}}</td>
                                <td class="center">
                                    <a class="btn btn-xs btn-success" href="{{route('admin.edit-product', $pro->id)}}" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                    <a class="btn btn-xs btn-danger delete" id="{{$pro->id}}" href="javascript:;" title="Delete"><i class="fa fa-trash"></i></a>
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
<script src="{{URL::asset('admin/dist/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/dist/js/main.js')}}"></script>

<!--[if lt IE 9]>
<script src="dist/assets/plugins/flot/excanvas.min.js"></script>
<![endif]-->
<script src="{{URL::asset('admin/dist/assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/demo.js')}}"></script>
<script src="{{URL::asset('admin/demo/js/notify.min.js')}}"></script>

<script src="{{URL::asset('admin/dist/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- Progressbar -->
<script src="{{URL::asset('admin/dist/js/jquery.form.js')}}"></script>

<script src="{{URL::asset('admin/demo/js/forms-validation.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>

$(document).ready(function(){
    @if(Session::has('message'))
        
        $.alert({
            title: 'Welcome',
            theme: 'modern',
            type: 'green',
            content: '{{Session::get("message")}}',
            buttons: {
                Ok: {
                    btnClass: 'btn-success',
                    action: function(){
                       
                    }
                }
            }
        });
    @endif
});
    @if(Session::has('error'))
        $.notify("{{Session::get('error')}}", "error");
    @endif

    @foreach($errors->all() as $error)
        $.notify("{{$error}}.", "error");
    @endforeach

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
                        document.location.href = "{{env('APP_URL')}}/admin/product-delete/"+id;
                    }
                },
                No: function () {
                    
                }
            }
        });
    });
</script>
@stop