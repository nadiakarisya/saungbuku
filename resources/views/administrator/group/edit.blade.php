@extends('layout.' . config('view.theme') . '.backend.backend')

@section("pagetitle", "EDIT GRUP")

@section('content')

	<br />
	<div class="{{ container("box") }}" data-collapsed="0">
		<div class="{{ container("body") }}">
			<form action="{{url('administrator/group/' . $group->id)}}" method="post" role="form" class="form-horizontal form-groups-bordered" id="usergroup-form">
				@csrf
				@method("PUT")
				<div class="form-group">
					<label for="nama" class="col-sm-3"><strong>NAMA GRUP</strong></label>
					<div class="col-sm-5">
						<input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Grup" required value="{{$group->nama}}"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3"><strong>PERMISSION</strong></label>
					<div class="col-sm-5">
						<table class="table table-bordered table-condensed">
							<thead>
							<tr>
								<td><input type="checkbox" id="checkAll" value="all" onchange="toggleAll(this)"></td>
								<td>MODUL</td>
								<td>SUBMODUL</td>
							</tr>
							</thead>
							<tbody>
							@foreach($allPermissions as $index => $permission)
								<tr>
									<td><input type="checkbox" name="permission[]" class="checkbox-per-item" value="{{$permission["id"]}}" {{ in_array($permission["id"], $groupPermissions)  ? "checked" : ""}}/></td>
									<td>{{ $permission["modul"] }}</td>
									<td>{{ $permission["submodul"] }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						@component("component.button.submit", ["onclick" => "return window.validateAndConfirm('#usergroup-form', 'Apakah data yang diinput sudah benar?')"]) @endcomponent
						@component('component.button.back', ['href' => url("administrator/group")])@endcomponent
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section("script")
	<script>
      let toggleAll = function(checkAll){
        (document.querySelectorAll(".checkbox-per-item")).forEach(item => {
          item.checked = checkAll.checked;
        })
      }
	</script>
@endsection
