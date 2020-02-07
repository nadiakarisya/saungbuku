@extends('layout.' . config('view.theme') . '.backend.backend')
@section('pagetitle') TOOLTIPS @endsection
@section('content')


    <div class="panel-body">
        <div><a href="{{url('administrator/tooltips/create')}}" class="btn btn-raised btn-primary" role="button">Add tooltip</a></div>
        <div class="">
            <table class="table table-striped dataTable" id="thegrid" width="100%">
              <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">URL</th>
                    <th class="text-center">URAIAN</th>
                    <th class="text-center"></th>
                </tr>
              </thead>
            </table>
        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">
        /*var theGrid = null;*/

            var theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                /*"ordering": true,
                "responsive": true,*/
                "ajax": "{{url('administrator/tooltips/datatabledata')}}",
                "columns": [
                    {
                        "data" : null,
                        "searchable": false,
                        "orderable": false,
                        "className": "text-center",
                        "render": function ( data, type, full, meta ) {
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "url",
                        "sortable": true,
                        "render": function ( data, type, full, meta ) {
                            var dataid = full.id;
                            var datakolom = full.url;
                            return "<a href='{{ url('administrator/tooltips') }}/"+dataid+"/edit' class='btn btn-raised btn-primary btn-sm btn-table btn-icon icon-left'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-search'></i>&nbsp"+datakolom+"</a>";
                        }
                    },
                    {
                        "data": "text", render: function (data, type, full) {
                            return "<div class='text-trim' title='" + data + "'>" + data + "</div>";
                        }
                    },
                    {
                        "render": function ( data, type, full, row ) {
                            var dataid = full.id;
                            return "<form method='get' action='{{url('administrator/tooltips/destroy')}}/' style='display: unset;' id='deletetooltip'>"+
                            "<input type='hidden' name='id' value='" + dataid + "'>"+
                            "<input type='hidden' name='_token' value='{{ csrf_token() }}'>"+
                            "<input name='_method' type='hidden' value='DELETE'>"+
                            "<button type='submit' class='btn btn-raised btn-danger btn-table btn-sm btn-icon icon-left' onclick='return window.validateAndConfirm(\"#deletetooltip\",\"Apakah Anda yakin menghapus data ini?\")'><i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-trash'></i>&nbspDEL</button>"+
                            "</form>";
                        },
                    },
                ]
            });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/tooltips') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection

@section("style")
    <style>
        .text-trim {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            line-height: 16px;     /* fallback */
            max-height: 32px;      /* fallback */
            -webkit-line-clamp: 2; /* number of lines to show */
            -webkit-box-orient: vertical;
        }
    </style>
@endsection