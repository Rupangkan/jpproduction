<aside class="sidebar sidebar-default">
    <div class="sidebar-profile">
        <img class="img-rounded" style="width: 100%;" src="{{URL::asset('admin/images/ganesh.jpg')}}">
    </div>
    <nav>
        <h5 class="sidebar-header">Navigation</h5>
        <ul class="nav nav-pills nav-stacked">
            <li {{(Request::is('member/dashboard') ? 'class=active' : '')}}>
                <a href="{{route('member.dashboard')}}" title="Dashboards">
                    <i class="fa fa-lg fa-fw fa-home"></i> Dashboards
                </a>
            </li>
            <li {{(Request::is('members') ? 'class=active' : '')}}>
                <a href="{{route('get.members')}}" title="Sponsored">
                    <i class="fa fa-lg fa-fw fa-users"></i> Sponsored
                </a>
            </li>
            <li {{(Request::is('member/add') ? 'class=active' : '')}}>
                <a href="{{route('add.member')}}" title="Dashboards">
                    <i class="fa fa-lg fa-fw fa-users"></i> Add Member
                </a>
            </li>
            <!--<li {{(Request::is('pin-request') ? 'class=active' : '')}}>-->
            <!--    <a href="{{route('user.pin-request')}}" title="Pin Request">-->
            <!--        <i class="fas fa-lg fa-fw fa-adjust"></i> Pin Request-->
            <!--    </a>-->
            <!--</li>-->
            <!--<li {{(Request::is('pin-list') ? 'class=active' : '')}}>-->
            <!--    <a href="{{route('user.pin-list')}}" title="Pin Request">-->
            <!--        <i class="fas fa-lg fa-fw fa-adjust"></i> Pin-->
            <!--    </a>-->
            <!--</li>-->
            <li {{(Request::is('member/details') ? 'class=active' : '')}}>
                <a href="{{route('member.details', Sentinel::getUser()->id)}}" title="My Details">
                    <i class="fas fa-lg fa-fw fa-child"></i> My Details
                </a>
            </li>
            @if(Sentinel::getUser()->roles()->first()->slug == "director")
            <li {{(Request::is('member/add') ? 'class=active' : '')}} {{(Request::is('members') ? 'class=active' : '')}}>
                <a href="{{route('get.members')}}" title="Dashboards">
                    <i class="fa fa-lg fa-fw fa-users"></i> Members
                </a>
            </li>
            @endif
            <li {{(Request::is('member/tree') ? 'class=open' : '')}} >
                <a href="#" title="Users">
                    <i class="fa fa-lg fa-fw fa-user"></i> Users
                </a>
                <ul class="nav-sub">
                    <li {{(Request::is('member/tree') ? 'class=active' : '')}}>
                        <a href="{{route('member.tree')}}" title="Members">
                            <i class="fa fa-fw fa-caret-right"></i> Members Tree View
                        </a>
                    </li>
                    <li>
                        <a href="{{route('member.profile', Sentinel::getUser()->member_code)}}" title="Profile">
                            <i class="fa fa-fw fa-caret-right"></i> Profile
                        </a>
                    </li>
                </ul>
            </li>
            <li {{(Request::is('member/payouts') ? 'class=active' : '')}}>
                <a href="{{route('member.payouts')}}" title="Dashboards">
                    <i class="fas fa-lg fa-fw fa-money-bill-alt"></i> My Payouts
                </a>
            </li>
        </ul>
    </nav>
</aside>