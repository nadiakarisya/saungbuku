<header class="header">
    <a href="{{ url('admin.dashboard') }}" class="logo">
        <img src="{{ url('joshadmin/img/logo.png') }}" alt="logo">
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu rtl_list">
                    <a href="#" class="dropdown-toggle profile_user" data-toggle="dropdown">
                        <img src="{{ url('joshadmin/images/authors/no_avatar.jpg') }}" alt="img" height="35px" width="35px"
                             class="img-circle img-responsive pull-left"/>
                        <div class="riot">
                            <div>
                                <p class="user_name_max">{{Auth::user()->user_coolname}}</p>
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu profile1">
                        <!-- User image -->
                        <li class="user-header bg-light-blue ">
                            <img src="{{ url('joshadmin/images/authors/no_avatar.jpg') }}" alt="img" height="35px" width="35px"
                                 class="img-circle img-responsive pull-left"/>
                            <p class="topprofiletext">{{Auth::user()->user_coolname}}</p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="{{ url('admin.users.show',Auth::user()->id) }}">
                                <i class="livicon" data-name="user" data-s="18"></i>
                                My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="{{ url('admin.users.edit', Auth::user()->id) }}">
                                <i class="livicon" data-name="gears" data-s="18"></i>
                                Account Settings
                            </a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left animate_rtl">
                                <a href="{{ url('lockscreen',Auth::user()->id) }}">
                                    <i class="livicon" data-name="lock" data-size="16" data-c="#555555" data-hc="#555555" data-loop="true"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="pull-right logout">
                                <form action="{{url("logout")}}" method="post" role="form">
                                    @csrf
                                    <button accesskey="q" type="submit" id="btnLogout" onclick="return confirm('anda akan logout.?')" class="btn btn-danger btn-icon"><i class="livicon" data-name="sign-out" data-s="15"></i> Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>