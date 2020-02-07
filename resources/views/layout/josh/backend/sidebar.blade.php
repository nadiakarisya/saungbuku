<div class="page-sidebar  sidebar-nav">
    <div class="nav_icons">
        <ul class="sidebar_threeicons">
            <li>
                <a href="{{ URL::to('deleted_users') }}">
                    <i class="livicon" data-name="user-remove" title="Deleted users" data-loop="true"
                       data-color="#418BCA" data-hc="#418BCA" data-s="25"></i>
                </a>
            </li>
            <li>
                <a href="{{ url('dashboard') }}">
                    <i class="livicon" data-name="dashboard" title="Dashboard" data-loop="true"
                       data-color="#e9573f" data-hc="#e9573f" data-s="25"></i>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('roles') }}">
                    <i class="livicon" data-name="users" title="Roles" data-loop="true"
                       data-color="#F89A14" data-hc="#F89A14" data-s="25"></i>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('users') }}">
                    <i class="livicon" data-name="user" title="Users" data-loop="true"
                       data-color="#6CC66C" data-hc="#6CC66C" data-s="25"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <!-- BEGIN SIDEBAR MENU -->
    @include('layout.josh.backend._left_menu')
<!-- END SIDEBAR MENU -->
</div>