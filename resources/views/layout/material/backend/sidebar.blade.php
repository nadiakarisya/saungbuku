<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="padding-bottom:5px !important;padding-top:10px !important;">
            <div class="pull-left image">
                <img src="{{ url('adminltematerial/img/avatar5.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->nama_lengkap}}</p>
                {{--<a href="#"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-circle text-success"></i> Online</a>--}}
            </div>
        </div>
        <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-search"></i>
                </button>
              </span>
            </div>
        </form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree" style="text-transform: capitalize">
            {!! $sidebar !!}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>