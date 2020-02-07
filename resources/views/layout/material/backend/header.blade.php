<header class="main-header">
    <!-- Logo -->
    <a href="{{url('')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"></span>
        <!-- logo for regular state and mobile devices -->
        <img src="{{ url('images/logo.png') }}" width="140" alt="LOGO APLIKASI" />
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(config("view.tooltips"))
                <li>
                    <a href="#myModal" data-backdrop="false" data-toggle="modal"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-info-circle"></i></a>
                    {{--<a href="#" data-toggle="control-sidebar"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-info"></i></a>--}}
                </li>
                @endif
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="userDropdown">
                        <img src="{{ url('adminltematerial/img/avatar5.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->nama_lengkap}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="height-auto user-header ">
                            <img src="{{ url('adminltematerial/img/avatar5.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {{Auth::user()->nama_lengkap}}
                            </p>
                        </li>
                        <!-- Menu Body -->
                       {{-- <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>--}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="text-center">
                                <form action="{{url("logout")}}" method="post" role="form">
                                    @csrf
                                    <button accesskey="q" type="submit" id="btnLogout" onclick="return confirm('anda akan logout.?')" class="btn btn-danger btn-icon">Log Out <i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-logout right'></i> </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
@if(config("view.tooltips"))
<div id="myModal" class="modal fade bootstrap-dialog-draggable" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" style="width:50%">
            <div class="modal-header all-scroll">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Info Halaman</h4>

            </div>
            <div class="modal-body modal-tooltip-body">
                <div class="comment">
                    <p> {!!  \App\KopiHelper\Common::matchCurrentUrlWithPattern() !!} </p>
                </div>
                <div align="right"><button type="button" class="btn btn-btn-success btn-raised" data-dismiss="modal">OK</button></div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endif

<style>
    .modal-backdrop {
        display:none !important;
    }
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-tooltip-body{
        max-height: calc(100vh - 200px);
        max-width: calc(100vh - 200px);
        overflow-x: auto;
        overflow-y: auto;
    }
    .all-scroll {
        cursor: all-scroll;
    }

</style>

{{--<script type="text/javascript">--}}
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script src="js/jquery-ui-1.8.16.custom.min.js" type="type/javascript"></script>
<script src="js/ui/jquery.ui.draggable.js" type="type/javascript"></script>
<script type="text/javascript">
    $("#myModal").draggable({
        handle: ".modal-header"
    });
</script>
