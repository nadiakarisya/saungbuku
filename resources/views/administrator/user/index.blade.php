@extends('layout.' . config('view.theme') . '.backend.backend')

@section('pagetitle', 'DAFTAR USER')

@section('content')
<a href='{{ url('administrator/user/create') }}' class='btn btn-info btn-raised btn-icon icon-left'>
     @icon(['class' => 'fa fa-plus'])@endicon TAMBAH USER
</a>

<table class="table compact row-border stripe" id="user-table">
    <thead>
        <tr>
            <td>NO</td>
            <td>USERNAME</td>
            <td>FULLNAME</td>
            <td>GROUP</td>
            <td>AKSI</td>
        </tr>
    </thead>
</table>
@endsection

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('script')
<script>
var user = $('#user-table').DataTable({
    columns: [
        { data: null, className: 'dt-right', searchable: false, sortable: false },
        { data: 'user_pickname' },
        { data: 'user_coolname' },
        {
            data: 'grup',
            sortable: true,
            'render': function ( data, type, full, meta ) {
                var datakolom = full.grup;
                return "<button class='btn btn-block btn-danger disabled'>" + datakolom + "</button>";
            }
        },
        {
            searchable: false,
            sortable: false,
            className: 'dt-center',
            'render': function ( data, type, full, meta ) {
                var dataid = full.id;
                return "<a href='{{ url('administrator/user') }}/"+dataid+"/edit' class='btn btn-warning btn-raised' style='margin-right: 8px'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-retweet'></i> RESET PASSWORD</a>"+
                        {{--"<a href='{{ url('administrator/user') }}/"+dataid+"/edit' class='btn btn-warning btn-raised' style='margin-right: 8px'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-pencil'></i> EDIT</a>"--}} "";
            }
        },
    ],
    processing: true,
    serverSide: true,
    ajax: "{{ url('administrator/user/datatabledata')}}",
    order: [[1, 'asc']],
    language: {
        searchPlaceholder: 'Cari ...',
        processing: "<span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-refresh fa-stack-1x fa-inverse fa-spin\"></i></span>"
    }
});
user.on('draw.dt', function () {
    user.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();
</script>
@endsection