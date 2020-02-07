<button type="button" class="btn {{ config('view.theme') ? 'btn-raised' : '' }}  btn-primary btn-icon icon-left"
@if(isset($onclick))
    onclick='{{$onclick}}'
@endif

@if(isset($id))
    id='{{$id}}'
@endif

>@icon(["class" => "fa fa-search"])@endicon
    {{ $label ?? "CARI" }}
</button>
