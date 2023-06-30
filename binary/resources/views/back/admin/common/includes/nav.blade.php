<header>
    <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
        <div class="navbar-brand-group">
            <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                <i class="fa fa-lg fa-fw fa-bars"></i>
            </a>
            <a class="navbar-brand hidden-xxs" href="{{route('admin.dashboard')}}">
                <span class="sc-visible">
                    JP
                </span>
                <span class="sc-hidden">
                    <span class="bold">JP PRODUCTION</span>
                    ADMIN
                </span>
            </a>
        </div>
        <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
            
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                    <img class="img-circle" src="{{URL::asset('admin/images/ganesh.jpg')}}">
                    <span class="hidden-xs">{{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu pull-right-xs">
                    <li class="arrow"></li>
                    <li><a href="{{route('change.password')}}">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a class="logout" href="javascript:;">Log Out</a></li>
                </ul>
            </li>
        </ul>
        
    </nav>
</header>

    