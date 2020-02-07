@extends('layout.' . config('view.theme') . '.backend.backend')
@section('pagetitle', 'ADD TOOLTIP')
@section('content')



    <div class="panel-body">

        <form action="{{ url('administrator/tooltips/store') }}" method="POST" class="form-horizontal" id="formtooltip">
            @csrf

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif

            <div class="form-group">
                <label for="field-1" class="col-sm-3  ">URL</label>
                <div class="col-sm-5">
                    <select name="url" class="form-control select2" onchange="">
                        <option>Pilih URL</option>
                        @foreach ($routes as $row)
                            @if(substr( $row->uri, 0, 3 ) !== "api" && strpos($row->uri, 'datatable') === FALSE)
                            <option value="{{ $row->uri }}">{{$row->uri}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3  ">URAIAN TOOLTIP</label>

                <div class="col-sm-5">
                    <textarea name="text" rows="5" type="text" class="form-control " id="field-1"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    @component("component.button.submit", ["label" => "SIMPAN", "onclick" => "return window.validateAndConfirm('#formtooltip','Apakah Anda Yakin?')"])@endcomponent
                    @component("component.button.back", ["href" => url('administrator/tooltips') ]) @endcomponent
                </div>
            </div>
        </form>

    </div>







@endsection
