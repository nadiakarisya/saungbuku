<a href="{{ $href ?? "javascript:;" }}" data-toggle="modal" data-target="{{ $datatarget }}"
    class="{{ $disabled ?? ''}} btn {{ config('view.theme') ? 'btn-raised' : '' }} btn-{{ $color ?? "primary" }} btn-icon icon-left {{ $btn ?? '' }}"
   @if(isset($onclick))onclick='{{$onclick}}'@endif
>
    <i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-{{$icon ?? 'plus'}}"></i> {{ $label ?? '' }}
</a>