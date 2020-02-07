<form method="POST" action="{{$action}}" style="display: unset;">
    @if(isset($values))
        @foreach($values as $row)
            <input type="hidden" name="{{ $row['name'] }}" value="{{ $row['value'] }}">
        @endforeach
    @endif

    @csrf
    @method("DELETE")

    <button
        type="submit"
        class="btn {{ config('view.theme') ? 'btn-raised' : '' }} @if(isset($btnSm)) btn-sm @endif btn-danger {{$disabled??''}}"
        @if(isset($onclick)) onclick="{{ $onclick }}" @endif
    >
        @icon(["class" => "fa fa-trash"])@endicon {{ $label ?? '' }}
    </button>
</form>