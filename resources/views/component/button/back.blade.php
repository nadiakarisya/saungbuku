<a href="{{ $href }}"
   @if(isset($onclick))
    onclick='{{$onclick}}'
   @endif
class="btn {{ config('view.theme') ? 'btn-raised' : '' }} btn-default btn-icon icon-left">@icon(["class" => $class ?? 'fa fa-arrow-left' ])@endicon &nbsp{{ $label ?? 'KEMBALI' }}</a>