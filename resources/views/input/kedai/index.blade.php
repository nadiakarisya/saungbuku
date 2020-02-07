@extends('layout.' . config('view.theme') . '.backend.backend')

@section('pagetitle', 'DAFTAR GEDUNG KANTOR')

@section('content')
<a href='{{ url('input/gedungkantor/create') }}' class='btn bg-olive btn-raised margin'>
    @icon(['class' => 'fa fa-plus'])@endicon TAMBAH GEDUNG KANTOR
</a>

<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="menu_induk">
            <table class="table compact row-border stripe" id="datatable-gedung" style="width:100%;">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>NAMA</td>
                        <td>KONSTRUKSI</td>
                        <td>LUAS LANTAI (m2)</td>
                        <td>LOKASI / ALAMAT</td>
                        <td>GMAPS</td>
                        <td>STATUS TANAH</td>
                        <td>KETERANGAN</td>
                        <td>KONDISI</td>
                        <td>NILAI SEWA</td>
                        <td>FOTO</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div id="app">
    <div class="modal fade custom-width" id="modal-add">
        <div class="modal-dialog" style="width: 50%;">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="col-md-3">FOTO / GAMBAR</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div id="mdb-lightbox-ui"></div>

                            <div class="mdb-lightbox">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('script')
<script type="text/javascript">
var datagedung = $("#datatable-gedung").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{!! url('input/gedungkantor-datatable') !!}'
    },
    columns: [
        { data: null, className: 'dt-right', searchable: false, sortable: false },
        { data: 'nama' },
        { data: 'konstruksi', sortable: false },
        { data: 'luas_m2', sortable: false },
        { data: 'lokasi_alamat', sortable: false },
        {
            className: 'dt-nowrap',
            searchable: false,
            sortable: false,
            'render': function ( data, type, full, meta ) {
                var check = full.lokasi_koordinat !== null;
                if (check) {
                    return "<a target='_blank' href='https://www.google.com/maps/search/?api=1&query="+full.lokasi_koordinat+"' class='btn btn-raised btn-success btn-sm'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-map-marker'></i></a>";
                }
                return "";
            }
        },
        { data: 'status_tanah', searchable: false, sortable: false },
        { data: 'keterangan', searchable: false, sortable: false },
        { data: 'kondisi', searchable: false, sortable: false },
        {
            data: "nilaisewa",
            className: "text-right",
            render: function (data, type, row) {
                return commaSeparateNumber(data);
            }
        },
        {
            className: 'dt-nowrap',
            searchable: false,
            sortable: false,
            'render': function ( data, type, full, meta ) {
                var check = full.files_count !== null;
                if (check){
                    var res = "<a href='javascript:;' data-toggle='modal' data-target='#modal-add' class='btn btn-sm btn-dark btn-raised btn-icon " +
                        "' " +
                        "data-id='"+full.id+"' " +
                        "onclick='getDetail(this)'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-eye' ></i></a>";
                    return res;
                }
                return "";
            }
        },
        {
            className: 'dt-nowrap',
            searchable: false,
            sortable: false,
            'render': function ( data, type, full, meta ) {
                var dataid = full.id;
                var editdelete = `@component('component.button.edit', ['href' => url('input/gedungkantor' . "/\${dataid}" . '/edit'), "btnSm" => "true"]) @endcomponent` +
                    `@component("component.button.delete", ["action" => url("input/gedungkantor")."/\${dataid}", 'onclick' => "return confirm('Anda yakin menghapus data tersebut?')", "btnSm" => "true"]) @endcomponent`;
                return editdelete;
            }
        }
    ],
    order: [[1, 'asc']],
    language: {
        searchPlaceholder: 'Cari Nama / alamat ...',
        processing: "<span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-refresh fa-stack-1x fa-inverse fa-spin\"></i></span>"
    }
});
datagedung.on('draw.dt', function () {
    var PageInfo = $('#datatable-gedung').DataTable().page.info();
    datagedung.column(0, { page: 'current', search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
    });
}).draw();

function getDetail(ini) {
    var id = $(ini).attr('data-id');
    $.ajax({
        url: 'gedungkantor/getfiles/'+id,
        type: 'get',
        dataType: 'json',
        success: function(response){
            // MDB Lightbox Init
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
            var len = 0;
            $('.mdb-lightbox').empty(); // Empty <tbody>
            if(response != null){
                len = response.length;
            }

            if(len > 0){
                for(var i=0; i<len; i++){
                    var dl = `@component("component.button.download", ["href" => "`+response[i].filename+`", "btnSm" => "true", "icon" => "download", "label"=>"Download"])@endcomponent`;
                    var img_download = '<figure class="col-md-4"><img src="' + response[i].filename + '" width="200px" class="img-fluid" /><h3 class="text-center my-3">'+ dl +'</h3></figure>';
                    $(img_download).appendTo('.mdb-lightbox');
                }

            }

        }
    });

}
</script>
@endsection