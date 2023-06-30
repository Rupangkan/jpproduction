<aside class="sidebar sidebar-default">
    <div class="sidebar-profile">
        <img class="img-rounded" style="width:100%" src="{{URL::asset('admin/images/ganesh.jpg')}}">

        <div class="profile-body">
            <h4>{{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}</h4>

            
        </div>
    </div>
    <nav>
        <h5 class="sidebar-header">Navigation</h5>
        <ul class="nav nav-pills nav-stacked">
            <li {{(Request::is('admin/dashboard') ? 'class=active' : '')}}>
                <a href="{{route('admin.dashboard')}}" title="Dashboards">
                    <i class="fa fa-lg fa-fw fa-home"></i> Dashboards
                </a>
            </li>
            <li {{(Request::is('member/add') ? 'class=active' : '')}} {{(Request::is('members') ? 'class=active' : '')}}>
                <a href="{{route('get.members')}}" title="Members">
                    <i class="fa fa-lg fa-fw fa-users"></i> Members
                </a>
            </li>
            <li {{(Request::is('admin/new-registration') ? 'class=active' : '')}}>
                <a href="{{route('admin.new-registration')}}" title="New Registration">
                    <i class="fa fa-lg fa-fw fa-users"></i> New Registration
                </a>
            </li>
            <li {{(Request::is('admin/tree') ? 'class=open' : '')}}>
                <a href="#" title="Users">
                    <i class="fa fa-lg fa-fw fa-user"></i> Users
                </a>
                <ul class="nav-sub">
                    <li {{(Request::is('admin/tree') ? 'class=active' : '')}}>
                        <a href="{{route('admin.tree')}}" title="Member Tree">
                            <i class="fa fa-fw fa-caret-right"></i> Members Tree View
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.profile', Sentinel::getUser()->email)}}" title="Profile">
                            <i class="fa fa-fw fa-caret-right"></i> Profile
                        </a>
                    </li>
                </ul>
            </li>
            <li {{(Request::is('admin/payouts') ? 'class=open' : '')}} {{(Request::is('admin/payouts/history') ? 'class=open' : '')}} {{(Request::is('admin/payouts/history/') ? 'class=open' : '')}}>
                <a href="#" title="Users">
                    <i class="fas fa-lg fa-fw fa-money-bill-alt"></i> Income
                </a>
                <ul class="nav-sub">
                    <li {{(Request::is('admin/payouts') ? 'class=active' : '')}}>
                        <a href="{{route('admin.payouts')}}" title="Payouts">
                            <i class="fa fa-fw fa-caret-right"></i> Payouts
                        </a>
                    </li>
                    <li {{(Request::is('admin/payouts/history') ? 'class=active' : '')}}>
                        <a href="{{route('admin.payout.history')}}" title="Payout History">
                            <i class="fa fa-fw fa-caret-right"></i> Payout History

                        </a>
                    </li>
                </ul>
            </li>

            <!--<li {{(Request::is('admin/pin-request/list') ? 'class=active' : '')}}>-->
            <!--    <a href="{{route('admin.pin-request-list')}}" title="Pin Request">-->
            <!--        <i class="fas fa-lg fa-fw fa-adjust"></i> Pin Request List-->
            <!--    </a>-->
            <!--</li>-->

            <li {{(Request::is('admin/product') ? 'class=active' : '')}}>
                <a href="{{route('admin.product')}}" title="Product">
                    <i class="fas fa-lg fa-fw fa-adjust"></i> Add Product
                </a>
            </li>
            <li {{(Request::is('admin/message') ? 'class=active' : '')}}>
                <a href="{{route('admin.message')}}" title="Product">
                    <i class="fas fa-lg fa-fw fa-adjust"></i> Message Panel
                </a>
            </li>

            <li><a class="logout" href="javascript:;" title="Logout"><i class="fas fa-lg fa-fw fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
    </nav>
</aside>