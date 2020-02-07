@extends('layout.' . config('view.theme') . '.backend.backend')

@section('pagetitle', "DAFTAR GROUP AKSES")

@section('content')
    <a href='{{ url('administrator/group/create') }}' class='btn btn-primary btn-icon btn-raised icon-left'>
        @icon(['class' => 'fa fa-plus'])@endicon TAMBAH GROUP
    </a>

    <table class="table compact row-border stripe" id="grup-table">
        <thead>
            <tr>
                <td width="20px">NO.</td>
                <td>GROUP LEVEL</td>
                <th width="110px">AKSI</th>
            </tr>
        </thead>
    </table>
@endsection

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('script')
    <script>
    var group= $('#grup-table').DataTable({
        columns: [
            { "data": null,
                "searchable": false,
                "orderable": false,
                "className": "dt-right",
            },
            { "data": "nama"},
            {
                "sortable": false,
                "className": "dt-center",
                "render": function ( data, type, full, meta ) {
                    var dataid = full.id;
                    return "<a href='{{ url('administrator/group') }}/"+dataid+"/edit' class='btn btn-warning btn-raised btn-icon icon-left' style='margin-right: 8px'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-pencil'></i>EDIT</a>";
                }
            },
        ],
        processing: true,
        serverSide: true,
        ajax: "{{ url('administrator/group/datatabledata')}}",
        order: [[1, 'asc']],
        language: {
            seachPlaceholder: "Cari Group ...",
            processing: "<span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-refresh fa-stack-1x fa-inverse fa-spin\"></i></span>"
        }
    });

    group.on('draw.dt', function () {
        group.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    </script>
@endsection