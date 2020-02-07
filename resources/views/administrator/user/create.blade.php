@extends('layout.' . config('view.theme') . '.backend.backend')

@section('pagetitle', 'TAMBAH USER')

@section('content')
	<div class="{{ container("box") }}" data-collapsed="0">
		<div class="{{ container("head") }}"><div class="panel-title"></div></div>
		<div class="{{ container("body") }}">
			<form action="{{ url("administrator/user") }}" method="post" role="form" class="form-horizontal form-groups-bordered" id="formuser">
				@csrf
				<div class="form-group">
					<label for="field-1" class="col-sm-3">USER PICKNAME</label>

					<div class="col-sm-3">
						<input name="user_pickname" type="text" class="form-control" id="field-1" placeholder="USERNAME" required style="text-transform: uppercase;"/>
					</div>
				</div>

				<div class="form-group">
					<label for="field-1" class="col-sm-3">USER COOLNAME</label>

					<div class="col-sm-6">
						<input name="user_coolname" type="text" class="form-control" id="field-1" placeholder="COOL NAME" required />
					</div>
				</div>

				<div class="form-group">
					<label for="field-1" class="col-sm-3  input-lg">EMAIL</label>

					<div class="col-sm-6">
						<input name="user_email" type="text" class="form-control input-lg" data-validate="email" placeholder="DIREKOMENDASIKAN MENGGUNAKAN EMAIL COORPORATE">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3">GRUP </label>
					<div class="col-sm-6">
						<select name="level" id="pilih_level" class="select2 form-control" required>
							<option selected disabled> -- PILIH GROUP -- </option>
							@foreach($group as $a)
								<option value="{{$a->id}}">{{ $a->nama }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="text-center">
					</br>
					@component('component.button.back', ['href' => url("administrator/user")])@endcomponent
					@component('component.button.submit', ["onclick" => "return window.validateAndConfirm('#formuser','Apakah Anda Yakin?')"]) @endcomponent
					{{--<button type="submit" class="btn btn-success btn-icon">@icon(["class" => "fa fa-check"])@endicon SIMPAN</button>--}}
				</div>
			</form>
		</div>
	</div>
@endsection