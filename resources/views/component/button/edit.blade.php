<button
        type="button"
        @if(isset($href)) onclick="window.location.href='{{ $href }}'" @endif
        class="btn {{ config('view.theme') ? 'btn-raised' : '' }} @if(isset($btnSm)) btn-sm @endif btn-success {{$disabled??''}}"
>
    @icon(["class" => "fa fa-pencil"])@endicon {{ $label ?? '' }}
</button>