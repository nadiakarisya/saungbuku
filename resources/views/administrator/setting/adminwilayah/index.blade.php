@extends('layout.' . config('view.theme') . '.backend.backend')

@section('pagetitle', 'SETTING ADMIN WILAYAH')

@section('content')
    <div class="{{container("box")}}">
        <div class="{{container("head")}}">
            Daftar Unit Level Wilayah
        </div>
        <div class="{{container("body")}}">
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
        </div>
    </div>

    <div class="modal fade custom-width" id="modal-admin-wilayah" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 40%;">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('saveUserAsAdminWilayah')}}" method="post" role="form" class="form-horizontal form-groups-bordered" id="form-admin-wilayah" name="form-filter">
                        @csrf
                        <input type="hidden" name="unitid" id="unitid" value="">
                        <input type="hidden" name="unitap" id="unitap" value="">
                        <div class="form-group">
                            <label for="userList" class="col-sm-4">Pilih User</label>
                            <div class="col-sm-8">
                                <select name="userid" class="form-control select2" id="userList" required></select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @component("component.button.submit", ["label" => "SIMPAN"]) @endcomponent
                            @component("component.button.closemodal", ["target" => "modal" ]) @endcomponent
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
      var table= $('#unit-table').DataTable({
        columns: [
          { data: null, className: 'dt-center', searchable: false, sortable: false },
          { data: 'unitap', className: 'dt-center' },
          { data: 'nmwil' },
          { data: 'nmap' },
          { data: null,
            className: 'dt-center',
            searchable: false,
            'render': function ( data, type, full, meta ) {
              return `@component("component.button.openmodal", ["datatarget" => "#modal-admin-wilayah", "icon" => "pencil", 'onclick' => "prepareModalData('\${full.id}','\${full.unitap}')"]) @endcomponent`;
            }
            },
        ],
        processing: true,
        serverSide: true,
        ajax: "{{ url('administrator/unit/datatableinduk')}}",
        order: [[1, 'desc']],
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

      var prepareModalData = function(unitid, unitap) {
        let url = `{!! url('administrator/user/getbyunit/${unitap}') !!}`;
        var userListSelect = $("#userList");
        $.ajax({
          url: url,
          beforeSend: function () {
            $("#unitid").val(unitid);
            $("#unitap").val(unitap);

            userListSelect.addClass('loading');
            userListSelect.find('option').remove();
          },
          complete: function () {
            userListSelect.removeClass('loading');
          },
          success: function (result) {
            result.forEach(function (model) {
              userListSelect.append(`<option value="${model.id}">${model.nama_lengkap}</option>`);
            });
          }
        });
      };
    </script>
@endsection