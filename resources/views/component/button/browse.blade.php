<div style="display:inline;max-width:172px;">
    <div class="btn btn-raised btn-dark btn-file {{ $disabled ?? '' }}">
        <span class="file-placeholder"><i class='fa fa-arrow-circle-o-up'></i>&nbsp;Browse Files</span>
        <input type="file" name="{{ $name ?? 'file' }}" class="file-upload" accept={{ $accept ?? '' }} />
    </div>
    <div class="file-name" style="display:unset;white-space:wrap;overflow:hidden;">
        <a href="{{ $url ?? '' }}" target="_blank"
           class="btn btn-raised btn-dark btn-sm {{ $label ?? 'btn icon icon-left' }} " style="{{ $url ?? 'display:none;'  }}">
            @icon(["class" => "fa fa-download"])@endicon
            &nbsp{{ $label ?? ''}}

        </a>
    </div>
</div>
