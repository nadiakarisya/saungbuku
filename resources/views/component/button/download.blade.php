<a href="{{ $href }}" target="_blank"
   class="{{ $disabled ?? ''}} btn {{ config('view.theme') ? 'btn-raised' : '' }} {{ $btn ?? '' }} btn-dark @if(isset($btnSm)) btn-sm @endif {{ $label ?? 'btn icon icon-left' }} ">
    @icon(["class" => "fa fa-" . $icon])@endicon
    &nbsp{{ $label ?? ''}}

</a>
