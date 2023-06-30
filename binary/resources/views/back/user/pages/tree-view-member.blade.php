@extends('back.user.layout.master')

@section('title')
    <title>JP Production &middot; Member Tree View</title>
@stop
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/dist/css/plugins/jquery-dataTables.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/tooltip/tooltip.css')}}">
    <style type="text/css">
    	.half-circle {
		    width: 50%;
		    height: 20px;
		    border-top-left-radius: 50px;
		    border-top-right-radius: 50px;
		    border: 3px solid #3570AF;
		    border-bottom: 0;
		}
		#tooltable table tr th, #tooltable table tr td{
			border:1px solid #5D5858;
			padding:5px;text-align: center;
		}
    </style>

@stop

@section('content')

<div class="page-content">
    <div class="page-subheading page-subheading-md">
        <ol class="breadcrumb">
            <li><a href="javascript:;">Dashboard</a></li>
            <li><a href="javascript:;">Members</a></li>
            <li class="active"><a href="javascript:;">New Member</a></li>
        </ol>
    </div>
    <div class="page-heading page-heading-md">
        <h2>MEMBER <strong class="text-warning">TREE VIEW</strong></h2>
        <br/>
    </div>
    <div class="container-fluid-md table-responsive">
   
		<?php
			$mem_code = Sentinel::getUser()->username;

		?>
        <table style="width: 100%; margin-left:0px; border:none;" cellpadding="0" cellspacing="0" border="0" id="yahoo">
			<tbody>
		    	<tr>
		            <td colspan="8" align="center" style="height: 23px;"" valign="middle">
		            	<a href="javascript:;" onmouseover="tooltip.pop(this, '#sub0', {offsetY:-10, smartPosition:false})">
			            	<code class="text-white" style="font-weight:900; @if(isset($mem_code)) background: #449d44 @else background: red; @endif" >{{isset(User::byUsername($mem_code)->full_name)?User::byUsername($mem_code)->full_name:'NULL'}}</code><br>
			            	<code class="text-white" style="font-weight:900; @if(isset($mem_code)) background: #449d44 @else background: red; @endif" >{{isset(User::byUsername($mem_code)->full_name)?User::byUsername($mem_code)->username:'NULL'}}</code><br>
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
		            </td>
		        </tr>
			    <tr>
			    	<td colspan="8" align="center" valign="middle">
			        	<div class="half-circle" style="width:50%"></div>
			        </td>
			    </tr>
		        <tr>
		        	<?php
		        		if(isset(Member::tree_data($mem_code)->left))
		        			$first_left_user = Member::tree_data($mem_code)->left;
		        		else
		        			$first_left_user = null;

		        		if(isset(Member::tree_data($mem_code)->right))
		        			$first_right_user = Member::tree_data($mem_code)->right;
		        		else
		        			$first_right_user = null;
		        	?>
		            <td colspan="4" align="center" valign="middle" style="height: 61px;  text-align: center;">
		            	<code class="text-white" style="font-weight:900; @if(isset($first_left_user)) background: #449d44 @else background: red; @endif" >{{isset(User::byUsername($first_left_user)->full_name)?User::byUsername($first_left_user)->full_name:'NULL'}}</code><br>
		            	<code class="text-white" style="font-weight:900; @if(isset($first_left_user)) background: #449d44 @else background: red; @endif" >{{isset(User::byUsername($first_left_user)->full_name)?User::byUsername($first_left_user)->username:'NULL'}}</code><br>
	                    <a style="color:;" href="{{route('admin.tree.par', $first_left_user)}}" onmouseover="tooltip.pop(this, '#sub1', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
	                    </a>
		            </td>
		            <td colspan="4" align="center" style="height: 61px; text-align: center;" valign="middle">
		            	<code class="text-white" style="font-weight:900; @if(isset($first_right_user)) background: #449d44 @else background: red; @endif" >{{isset(User::byUsername($first_right_user)->full_name)?User::byUsername($first_right_user)->full_name:"NULL"}}</code><br>
		            	<code class="text-white" style="font-weight:900; @if(isset($first_right_user)) background: #449d44 @else background: red; @endif" >{{isset(User::byUsername($first_right_user)->full_name)?User::byUsername($first_right_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $first_right_user)}}" onmouseover="tooltip.pop(this, '#sub2', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
		            </td>
			    </tr>
				<tr>
				    <td colspan="4" align="center" valign="middle">
					    <div class="half-circle"></div>
					</td>
					<td align="center" valign="middle" colspan="4">
					    <div class="half-circle"></div>
					</td>
				</tr> 
		       	<tr>
		       		<?php
		       			$data_first_left_user 	= Member::tree_data($first_left_user);
		       			if(isset($data_first_left_user)){
			        		$second_left_user 		= $data_first_left_user->left;
			        		$second_right_user 		= $data_first_left_user->right;
			        	}else{
			        		$second_left_user 		= null;
			        		$second_right_user 		= null;
			        	}
		        		$data_first_right_user 	= Member::tree_data($first_right_user);
		        		if(isset($data_first_right_user)){
			        		$third_left_user 		= $data_first_right_user->left;
			        		$third_right_user 		= $data_first_right_user->right;
			        	}else{
			        		$third_left_user 		= null;
			        		$third_right_user 		= null;
			        	}
		        	?>
		       		<td align="center" valign="middle" colspan="2">
						<code class="text-white" style="font-weight:900; @if(isset($second_left_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($second_left_user)->full_name)?User::byUsername($second_left_user)->full_name:'NULL'}}</code><br>
						<code class="text-white" style="font-weight:900; @if(isset($second_left_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($second_left_user)->full_name)?User::byUsername($second_left_user)->username:'NULL'}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $second_left_user)}}" onmouseover="tooltip.pop(this, '#sub3', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}} ">
						</a>
		            </td>
		            <td align="center" valign="middle" colspan="2">
						<code class="text-white" style="font-weight:900; @if(isset($second_right_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($second_right_user)->full_name)?User::byUsername($second_right_user)->full_name:"NULL"}}</code><br>
						<code class="text-white" style="font-weight:900; @if(isset($second_right_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($second_right_user)->full_name)?User::byUsername($second_right_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $second_right_user)}}" onmouseover="tooltip.pop(this, '#sub4', {offsetY:-10, smartPosition:false})">
								<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle" colspan="2">
						<code class="text-white" style="font-weight:900; @if(isset($third_left_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($third_left_user)->full_name)?User::byUsername($third_left_user)->full_name:"NULL"}}</code><br>
						<code class="text-white" style="font-weight:900; @if(isset($third_left_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($third_left_user)->full_name)?User::byUsername($third_left_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $third_left_user)}}" onmouseover="tooltip.pop(this, '#sub5', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle" colspan="2">
		            	<code class="text-white" style="font-weight:900; @if(isset($third_right_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($third_right_user)->full_name)?User::byUsername($third_right_user)->full_name:"NULL"}}</code><br>
		            	<code class="text-white" style="font-weight:900; @if(isset($third_right_user)) background: #449d44; @else background: red; @endif" >{{isset(User::byUsername($third_right_user)->full_name)?User::byUsername($third_right_user)->username:"NULL"}}</code><br>
		            	<a style="color:;" href="{{route('admin.tree.par', $third_right_user)}}" onmouseover="tooltip.pop(this, '#sub6', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		        </tr>
		        <tr>
		        	<td align="center" valign="middle" colspan="2">
		            	<div class="half-circle"></div>
		            </td>
		            <td align="center" valign="middle" colspan="2">
		                <div class="half-circle"></div>
		            </td>
		            <td align="center" valign="middle" colspan="2">
		                <div class="half-circle"></div>
		            </td>
		            <td align="center" valign="middle" colspan="2">
		                <div class="half-circle"></div>
		            </td>
		        </tr>
		        <tr>

		        	<?php
		       			$data_second_left_user 	= Member::tree_data($second_left_user);
		       			if(isset($data_second_left_user)){
			        		$fourth_left_user 		= $data_second_left_user->left;
			        		$fourth_right_user 		= $data_second_left_user->right;
			        	}else{
			        		$fourth_left_user 		= null;
			        		$fourth_right_user 		= null;
			        	}

		        		$data_second_right_user = Member::tree_data($second_right_user);
		        		if(isset($data_second_right_user)){
			        		$fifth_left_user 		= $data_second_right_user->left;
			        		$fifth_right_user 		= $data_second_right_user->right;
			        	}else{
			        		$fifth_left_user 		= null;
			        		$fifth_right_user 		= null;
			        	}

		        		$data_third_left_user 	= Member::tree_data($third_left_user);
		        		if(isset($data_third_left_user)){
			        		$sixth_left_user 		= $data_third_left_user->left;
			        		$sixth_right_user 		= $data_third_left_user->right;
			        	}else{
			        		$sixth_left_user 		= null;
			        		$sixth_right_user 		= null;
			        	}

		        		$data_third_right_user 	= Member::tree_data($third_right_user);
		        		if(isset($data_third_right_user)){
			        		$seventh_left_user 		= $data_third_right_user->left;
			        		$seventh_right_user 	= $data_third_right_user->right;
			        	}else{
			        		$seventh_left_user 		= null;
			        		$seventh_right_user 	= null;
			        	}
		        	?>
		            <td align="center" valign="middle">
		            	<code class="text-white" style="font-weight:900; @if(isset($fourth_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fourth_left_user)->full_name)?User::byUsername($fourth_left_user)->full_name:"NULL"}}</code><br>
		            	<code class="text-white" style="font-weight:900; @if(isset($fourth_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fourth_left_user)->full_name)?User::byUsername($fourth_left_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $fourth_left_user)}}" onmouseover="tooltip.pop(this, '#sub7', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle">
						<code class="text-white" style="font-weight:900; @if(isset($fourth_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fourth_right_user)->full_name)?User::byUsername($fourth_right_user)->full_name:"NULL"}}</code><br>
						<code class="text-white" style="font-weight:900; @if(isset($fourth_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fourth_right_user)->full_name)?User::byUsername($fourth_right_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $fourth_right_user)}}" onmouseover="tooltip.pop(this, '#sub8', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle">
		            	<code class="text-white" style="font-weight:900; @if(isset($fifth_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fifth_left_user)->full_name)?User::byUsername($fifth_left_user)->full_name:"NULL"}}</code><br>
		            	<code class="text-white" style="font-weight:900; @if(isset($fifth_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fifth_left_user)->full_name)?User::byUsername($fifth_left_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $fifth_left_user)}}" onmouseover="tooltip.pop(this, '#sub9', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle">
						<code class="text-white" style="font-weight:900; @if(isset($fifth_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fifth_right_user)->full_name)?User::byUsername($fifth_right_user)->full_name:"NULL"}}</code><br>
						<code class="text-white" style="font-weight:900; @if(isset($fifth_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($fifth_right_user)->full_name)?User::byUsername($fifth_right_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $fifth_right_user)}}" onmouseover="tooltip.pop(this, '#sub10', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle">
		            	<code class="text-white" style="font-weight:900; @if(isset($sixth_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($sixth_left_user)->full_name)?User::byUsername($sixth_left_user)->full_name:"NULL"}}</code><br>
		            	<code class="text-white" style="font-weight:900; @if(isset($sixth_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($sixth_left_user)->full_name)?User::byUsername($sixth_left_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $sixth_left_user)}}" onmouseover="tooltip.pop(this, '#sub11', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle">
						<code class="text-white" style="font-weight:900; @if(isset($sixth_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($sixth_right_user)->full_name)?User::byUsername($sixth_right_user)->full_name:"NULL"}}</code><br>
						<code class="text-white" style="font-weight:900; @if(isset($sixth_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($sixth_right_user)->full_name)?User::byUsername($sixth_right_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $sixth_right_user)}}" onmouseover="tooltip.pop(this, '#sub12', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>						
					</td>
		            <td align="center" valign="middle">
		            	<code class="text-white" style="font-weight:900; @if(isset($seventh_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($seventh_left_user)->full_name)?User::byUsername($seventh_left_user)->full_name:"NULL"}}</code><br>
		            	<code class="text-white" style="font-weight:900; @if(isset($seventh_left_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($seventh_left_user)->full_name)?User::byUsername($seventh_left_user)->username:"NULL"}}</code><br>
		            	<a style="color:;" href="{{route('admin.tree.par', $seventh_left_user)}}" onmouseover="tooltip.pop(this, '#sub13', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		            <td align="center" valign="middle">
						<code class="text-white" style="font-weight:900; @if(isset($seventh_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($seventh_right_user)->full_name)?User::byUsername($seventh_right_user)->full_name:"NULL"}}</code><br>
						<code class="text-white" style="font-weight:900; @if(isset($seventh_right_user)) background: green; @else background: red; @endif" >{{isset(User::byUsername($seventh_right_user)->full_name)?User::byUsername($seventh_right_user)->username:"NULL"}}</code><br>
						<a style="color:;" href="{{route('admin.tree.par', $seventh_right_user)}}" onmouseover="tooltip.pop(this, '#sub14', {offsetY:-10, smartPosition:false})">
							<img class="img-circle" src="{{URL::asset('admin/images/tree.jpg')}}">
						</a>
					</td>
		         </tr>
	        </tbody>
	    </table>
    </div>
</div>
<div style="display:none;">
    <div id="sub0">
    	<?php
    		$username = Sentinel::getUser()->username;
    	?>
    	<span id='tooltable'>
    		<table>
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{!empty(User::byUsername($username)->sponsoror_id)?User::getUser(User::byUsername($username)->sponsoror_id)->username:'NA'}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{Member::tree_data($username)->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{Member::tree_data($username)->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($username)->username}}
    				</td>
    			</tr>
    		</table>
    	</span>
    </div>
    
    <div id="sub1">
    	<?php
    		$first_left_user 		= Member::tree_data($username)->left;
   			$data_first_left_user 	= Member::tree_data($first_left_user);

    	?>
    	<span id='tooltable'>
    		<table>
    			@if(isset($first_left_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_first_left_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_first_left_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_first_left_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_first_left_user->member_code)->username}}
    				</td>
    			</tr>
    			@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    			@endif
    		</table>
    	</span>
    </div>
	<div id="sub2">
		<?php
			$first_right_user 	= Member::tree_data($username)->right;
			$data_first_right_user 	= Member::tree_data($first_right_user);
		?>
    	<span id='tooltable'>
    		<table>
    		@if(isset($first_right_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_first_right_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_first_right_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_first_right_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_first_right_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>
	<div id="sub3">
		<?php
			if(isset($first_left_user)){
				$second_left_user = Member::tree_data($first_left_user)->left;
				$data_second_left_user = Member::tree_data($second_left_user);
			}else{
				$second_left_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($second_left_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_second_left_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_second_left_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_second_left_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_second_left_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub4">
 		<?php
 			if(isset($first_left_user)){
	 			$second_right_user = Member::tree_data($first_left_user)->right;
				$data_second_right_user = Member::tree_data($second_right_user);
			}else{
				$second_right_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($second_right_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_second_right_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_second_right_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_second_right_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_second_right_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>
	<div id="sub5">
		<?php
			if(isset($first_right_user)){
	 			$third_left_user = Member::tree_data($first_right_user)->left;
				$data_third_left_user = Member::tree_data($third_left_user);
			}else{
				$third_left_user =null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($third_left_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_third_left_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    		
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_third_left_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_third_left_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_third_left_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub6">
		<?php
		    if(isset($first_right_user)){
	 			$third_right_user = Member::tree_data($first_right_user)->right;
				$data_third_right_user = Member::tree_data($third_right_user);
			}else{
				$third_right_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($third_right_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_third_right_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_third_right_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_third_right_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_third_right_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub7">
	 	<?php
	 		if(isset($second_left_user)){
	 			$fourth_left_user = Member::tree_data($second_left_user)->left;
				$data_fourth_left_user = Member::tree_data($fourth_left_user);
			}else{
				$fourth_left_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($fourth_left_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_fourth_left_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_fourth_left_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_fourth_left_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_fourth_left_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub8">
		<?php
			if(isset($second_left_user)){
	 			$fourth_right_user = Member::tree_data($second_left_user)->right;
				$data_fourth_right_user = Member::tree_data($fourth_right_user);
			}else{
				$fourth_right_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($fourth_right_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_fourth_right_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_fourth_right_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_fourth_right_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_fourth_right_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub9">
		<?php
			if(isset($second_right_user)){
	 			$fift_left_user = Member::tree_data($second_right_user)->left;
				$data_fift_left_user = Member::tree_data($fift_left_user);
			}else{
				$fift_left_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($fift_left_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_fift_left_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    		
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_fift_left_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_fift_left_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_fift_left_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub10">
		<?php
			if(isset($second_right_user)){
	 			$fift_right_user = Member::tree_data($second_right_user)->right;
				$data_fift_right_user = Member::tree_data($fift_right_user);
			}else{
				$fift_right_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($fift_right_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_fift_right_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_fift_right_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_fift_right_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_fift_right_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub11">
		<?php
			if(isset($third_left_user)){
	 			$sixth_left_user = Member::tree_data($third_left_user)->left;
				$data_sixth_left_user = Member::tree_data($sixth_left_user);
			}else{
				$sixth_left_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($sixth_left_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_sixth_left_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_sixth_left_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_sixth_left_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_sixth_left_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub12">
		<?php
			if(isset($third_left_user)){
	 			$sixth_right_user = Member::tree_data($third_left_user)->right;
				$data_sixth_right_user = Member::tree_data($sixth_right_user);
			}else{
				$sixth_right_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($sixth_right_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_sixth_right_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_sixth_right_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_sixth_right_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_sixth_right_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub13">
		<?php
			if(isset($third_right_user)){
	 			$seventh_left_user = Member::tree_data($third_right_user)->left;
				$data_seventh_left_user = Member::tree_data($seventh_left_user);
			}else{
				$seventh_left_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($seventh_left_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_seventh_left_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_seventh_left_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_seventh_left_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_seventh_left_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
	</div>		
	<div id="sub14">
		<?php
			if(isset($third_right_user)){
	 			$seventh_right_user = Member::tree_data($third_right_user)->right;
				$data_seventh_right_user = Member::tree_data($seventh_right_user);
			}else{
				$seventh_left_user = null;
			}
		?>
		<span id='tooltable'>
    		<table>
    		@if(isset($seventh_right_user))
    			<tr>
    				<th>Sponsor ID</th>
    				<td>
    					{{User::getUser(User::byUsername($data_seventh_right_user->member_code)->sponsoror_id)->username}}
    				</td>
    			</tr>
    			<tr>
    				<th>Left</th>
    				<td>
    					{{$data_seventh_right_user->leftcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Right</th>
    				<td>
    					{{$data_seventh_right_user->rightcount}}
    				</td>
    			</tr>
    			<tr>
    				<th>Login ID</th>
    				<td>
    					{{User::byUsername($data_seventh_right_user->member_code)->username}}
    				</td>
    			</tr>
    		@else
    			<tr>
    				<th>Empty</th>
    			</tr>
    		@endif
    		</table>
    	</span>
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
<script src="{{URL::asset('admin/demo/js/forms-validation.js')}}"></script>
<script src="{{URL::asset('admin/tooltip/tooltip.js')}}"></script>
 
<script>
    @if(Session::has('message'))
        $.notify("{{Session::get('message')}}", "success");
    @endif

    @foreach($errors->all() as $error)
        $.notify("{{$error}}.", "error");
    @endforeach
</script>
@stop