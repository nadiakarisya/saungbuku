<button type="button" class="btn {{ config('view.theme') ? 'btn-raised' : '' }} btn-success btn-icon icon-left"
@if(isset($onclick))
    onclick='{{$onclick}}'
@endif

@if(isset($id))
    id='{{$id}}'
@endif

@if(isset($datadismiss))
data-dismiss="{{$datadismiss}}"
@endif

>@icon(["class" => "fa fa-check"])@endicon
    {{ $label ?? "SIMPAN" }}
</button>
