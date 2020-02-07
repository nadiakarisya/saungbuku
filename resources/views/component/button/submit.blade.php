<button type="submit" class="btn {{ config('view.theme') ? 'btn-raised' : '' }} {{ $btn ?? '' }} btn-success btn-icon icon-left"
@if(isset($onclick))
    onclick='{{$onclick}}'
@endif

@if(isset($form))
    form='{{$form}}'
@endif

@if(isset($id))
    id='{{$id}}'
@endif

{{ $disabled ?? "" }}
><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-{{$icon ?? 'check'}}"></i>
    {{ $label ?? "SIMPAN" }}
</button>
