@extends('layout.' . config('view.theme') . '.backend.backend')

@section('pagetitle', 'DAFTAR MENU AKTIF')

@section('content')
<a href='{{ url('administrator/menu/create') }}' class='btn bg-olive btn-raised margin'>
    @icon(['class' => 'fa fa-plus'])@endicon TAMBAH MENU
</a>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#menu_induk" data-toggle="tab">MENU INDUK</a></li>
        <li><a href="#menu_anak" data-toggle="tab">MENU ANAK</a></li>
        <li><a href="#menu_cucu" data-toggle="tab">MENU CUCU</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="menu_induk">
            <table class="table compact row-border stripe" id="datatable-menu-induk" style="width:100%;">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>MENU</td>
                        <td>URI</td>
                        <td>MENU INDUK</td>
                        <td>CLASS ICON</td>
                        <td>STATUS</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tab-pane" id="menu_anak">
            <table class="table compact row-border stripe" id="datatable-menu-anak" style="width:100%;">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>MENU</td>
                        <td>URI</td>
                        <td>MENU INDUK</td>
                        <td>CLASS ICON</td>
                        <td>STATUS</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tab-pane" id="menu_cucu">
            <table class="table compact row-border stripe" id="datatable-menu-cucu" style="width:100%;">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>MENU</td>
                        <td>URI</td>
                        <td>MENU INDUK</td>
                        <td>CLASS ICON</td>
                        <td>STATUS</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('script')
<script type="text/javascript">
var induk = $("#datatable-menu-induk").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{!! url('administrator/menu/datatabledata/0') !!}'
    },
    columns: [
        { data: null, className: 'dt-right', searchable: false, sortable: false },
        { data: 'nama' },
        { data: 'uri', sortable: false },
        { data: 'id_menu_induk', searchable: false, sortable: false },
        { data: 'class', searchable: false, sortable: false },
        {
            data: 'aktif',
            className: 'dt-center',
            searchable: false,
            'render': function ( data, type, full, meta ) {
                var datakolom = full.aktif;
                var warna = 'btn-success';
                var status = 'AKTIF';

                if(datakolom == 'N') {
                    warna = 'btn-danger';
                    status = 'NON AKTIF';
                }

                return "<button class='btn btn-block " + warna + " disabled'>" + status + "</button>";
            }
        },
        {
            className: 'dt-center',
            searchable: false,
            sortable: false,
            'render': function ( data, type, full, meta ) {
                var dataid = full.id;
                return "<a href='{{ url('administrator/menu') }}/"+dataid+"/edit' class='btn btn-warning btn-raised' style='margin-right: 8px'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-pencil'></i> EDIT</a>";
            }
        },
    ],
    order: [[1, 'asc']],
    language: {
        searchPlaceholder: 'Cari Menu/url ...',
        processing: "<span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-refresh fa-stack-1x fa-inverse fa-spin\"></i></span>"
    }
});
induk.on('draw.dt', function () {
    induk.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();

var anak = $("#datatable-menu-anak").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{!! url('administrator/menu/datatabledata/1') !!}'
    },
    columns: [
        { data: null, className: 'dt-right', searchable: false, sortable: false },
        { data: 'nama' },
        { data: 'uri', sortable: false },
        { data: 'id_menu_induk', searchable: false, sortable: false },
        { data: 'class', searchable: false, sortable: false },
        {
            data: 'aktif',
            className: 'dt-center',
            searchable: false,
            'render': function ( data, type, full, meta ) {
                var datakolom = full.aktif;
                var warna = 'btn-success';
                var status = 'AKTIF';

                if(datakolom == 'N') {
                    warna = 'btn-danger';
                    status = 'NON AKTIF';
                }

                return "<button class='btn btn-block " + warna + " disabled'>" + status + "</button>";
            }
        },
        {
            className: 'dt-center',
            searchable: false,
            sortable: false,
            'render': function ( data, type, full, meta ) {
                var dataid = full.id;
                return "<a href='{{ url('administrator/menu') }}/"+dataid+"/edit' class='btn btn-warning btn-raised' style='margin-right: 8px'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-pencil'></i> EDIT</a>";
            }
        },
    ],
    order: [[1, 'asc']],
    language: {
        searchPlaceholder: 'Cari Menu/url ...',
        processing: "<span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-refresh fa-stack-1x fa-inverse fa-spin\"></i></span>"
    }
});
anak.on('draw.dt', function () {
    anak.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();

var cucu = $("#datatable-menu-cucu").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{!! url('administrator/menu/datatabledata/2') !!}'
    },
    columns: [
        { data: null, className: 'dt-right', searchable: false, sortable: false },
        { data: 'nama' },
        { data: 'uri', sortable: false },
        { data: 'id_menu_induk', searchable: false, sortable: false },
        { data: 'class', searchable: false, sortable: false },
        {
            data: 'aktif',
            className: 'dt-center',
            searchable: false,
            'render': function ( data, type, full, meta ) {
                var datakolom = full.aktif;
                var warna = 'btn-success';
                var status = 'AKTIF';

                if(datakolom == 'N') {
                    warna = 'btn-danger';
                    status = 'NON AKTIF';
                }

                return "<button class='btn btn-block " + warna + " disabled'>" + status + "</button>";
            }
        },
        {
            className: 'dt-center',
            searchable: false,
            sortable: false,
            'render': function ( data, type, full, meta ) {
                var dataid = full.id;
                return "<a href='{{ url('administrator/menu') }}/"+dataid+"/edit' class='btn btn-warning btn-raised' style='margin-right: 8px'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-pencil'></i> EDIT</a>";
            }
        },
    ],
    order: [[1, 'asc']],
    language: {
        searchPlaceholder: 'Cari Menu/url ...',
        processing: "<span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-refresh fa-stack-1x fa-inverse fa-spin\"></i></span>"
    }
});
cucu.on('draw.dt', function () {
    cucu.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();
</script>
@endsection