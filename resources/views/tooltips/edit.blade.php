@extends('layout.' . config('view.theme') . '.backend.backend')
@section('pagetitle', 'EDIT TOOLTIP')
@section('content')


        <div class="panel-body">

            <form action="{{url('administrator/tooltips/update/' . $tooltips->id)}}"  role="form" method="POST" class="form-horizontal" id="updatetooltip">
                @csrf

                <div class="form-group">
                    <label for="field-1" class="col-sm-3  ">URL</label>

                    <div class="col-sm-5">
                        <input name="url" type="text" class="form-control " id="field-1" value="{{ $tooltips -> url }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3  ">URAIAN TOOLTIP</label>

                    <div class="col-sm-5">
                        <textarea name="text" rows="10" type="text" class="form-control " id="field-1"  value="">{{ $tooltips -> text }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        @component("component.button.submit", ["label" => "SIMPAN", "onclick" => "return window.validateAndConfirm('#updatetooltip','Apakah Anda Yakin?')"])@endcomponent
                        @component("component.button.back", ["href" => url('administrator/tooltips'), "class" => 'fa fa-times']) @endcomponent
                            {{--<a class="btn btn-default" href="{{ url('/tooltips') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>--}}
                    </div>
                </div>
            </form>

        </div>



@endsection
