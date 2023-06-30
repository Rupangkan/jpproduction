<!doctype html>
<html>

<head>
    @yield('title')
    <link href="{{URL::asset('admin/images/GaneshLogo.ico')}}" rel="shortcut icon">
    @include('back.admin.common.includes.head')
    
</head>
<body class="">
    @include('back.admin.common.includes.nav')
    <div class="page-wrapper">
        @include('back.admin.common.includes.aside')

        @yield('content')
        
    </div>
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script>
    	$('.logout').on('click', function(){
    		$.confirm({
			    title: 'ARE YOU SURE?',
			    theme: 'supervan',
			    content: 'Do you really want to logout of the system?',
			    buttons: {
			        OK: function () {
			            document.location.href="{{route('logout')}}";
			        },
			        Cancel: function () {
			            
			        }
			    }
			});
    	});
    </script>
</body>
</html>
