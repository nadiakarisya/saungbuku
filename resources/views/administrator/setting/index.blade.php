@extends('layout.' . config('view.theme') . '.backend.backend')

@section('pagetitle', 'DAFTAR UNIT')

@section('content')
    <table class="table compact row-border stripe" id="unit-table">
        <thead>
        <tr>
            <td>NO</td>
            <td>KODE UNIT</td>
            <td>NAMA WILAYAH</td>
            <td>NAMA UNIT</td>
            <td>EDIT</td>
        </tr>
        </thead>
    </table>
@endsection

@section('script')
    <script>
      var table= $('#unit-table').DataTable({
        columns: [
          { data: null, className: 'dt-center', searchable: false, sortable: false },
          { data: 'kdwil', className: 'dt-center' },
          { data: 'nmwil' },
          { data: 'nmap' },
          { data: 'unitap' },
        ],
        processing: true,
        serverSide: true,
        ajax: "{{ url('administrator/unit/datatableinduk')}}",
        order: [[1, 'asc']],
        pageLength: 50,
        language: {
          searchPlaceholder: 'Cari ...',
          processing: "<span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-refresh fa-stack-1x fa-inverse fa-spin\"></i></span>"
        }
      });
      table.on('draw.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();
    </script>
@endsection