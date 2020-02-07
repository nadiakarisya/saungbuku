<div class="form-group">
    <label for="{{$id}}" class="col-sm-{{explode("/", $size)[0]}}  input-lg">{{$label}}</label>

    <div class="col-sm-{{explode("/", $size)[1]}}">
        <input name="{{$id}}" type="text" class="form-control input-lg" id="{{$id}}"/>
    </div>
</div>