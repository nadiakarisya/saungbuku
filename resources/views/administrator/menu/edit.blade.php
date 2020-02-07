@extends('layout.' . config('view.theme') . '.backend.backend')

@section('content')

	<br />
	<div class="{{ container("box") }}" data-collapsed="0">
		<div class="{{ container("head") }}">
			<div class="panel-title">
				UPDATE MENU
			</div>

			<div class="panel-options">
				<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-cog"></i></a>
				<a href="#" data-rel="collapse"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-down-open"></i></a>
				<a href="#" data-rel="reload"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-arrows-ccw"></i></a>
				<a href="#" data-rel="close"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-cancel"></i></a>
			</div>
		</div>

		<div class="{{ container("body") }}">
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span>
						Apabila field ID Menu tidak diisi (dikosongkan), maka Nama Menu akan menjadi Menu Utama (Menu Induk) <br />
						Apabila field ID Menu diisi, maka Nama Menu akan menjadi Anak Menu berdasarkan Nama Menu yang dipilih
					</span>
			</div>
			<form action="{{url('administrator/menu/' . $menu->id)}}" method="post" role="form" class="form-horizontal form-groups-bordered">
				@csrf
				@method('PUT')

				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>NAMA MENU</strong></label>

					<div class="col-sm-5">
						<input name="nama" type="text" class="form-control" id="field-1" value="{{ $menu->nama }}" required />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>URL</strong></label>

					<div class="col-sm-5">
						<input name="uri" type="text" class="form-control" id="field-1" value="{{ $menu->uri }}" required />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3">ID MENU INDUK </label>

					<div class="col-sm-5">
						<select name="id_menu_induk" id="pilih_induk" class="form-control" required>
							<option value="{{ ($menu->id_menu_induk > 0)?$menu->id_menu_induk:'0' }}">
								{{ ($menu->id_menu_induk > 0)? $menu->nama:"-Menu Induk-" }}
							</option>

							@foreach($rowMenu as $row)
								<option value='{{ $row->id }}'>{{ $row->nama }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3">ID MENU ANAK </label>

					<div class="col-sm-5">
						<select name="id_menu_anak" id="pilih_anak" class="form-control">
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>CLASS (UNTUK ICON)</strong></label>

					<div class="col-sm-5">
						<input name="class" type="text" class="form-control" id="field-1" value="{{ $menu->class }}" required />
						<input name="id" type="hidden" value="{{ $menu->id }}" />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3 "><strong>KETERANGAN</strong></label>

					<div class="col-sm-5">
						<textarea name="keterangan" class="form-control" id="field-1">{{ $menu->keterangan }}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3 "><strong>STATUS</strong></label>

					<div class="col-sm-5">
                        <label>
							<input type="radio" name="aktif" value="Y" {{ ($menu->aktif == "Y")?"checked":"" }}> Aktif
						</label> <p></p>
						<label>
							<input type="radio" name="aktif" value="N" {{ ($menu->aktif == "N")?"checked":"" }}> Non Aktif
						</label>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<a href="{{ url("administrator/menu") }}" class="btn btn-danger btn-icon" data-dismiss="modal"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-cancel"></i>BATAL</a>
						<button type="submit" class="btn btn-success btn-icon">@icon(["class" => "fa fa-check"])@endicon SIMPAN</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('style')
	<!-- 
		Style only for this page. If there is no added style on 
		this view, leave it or delete the section.
	-->
@endsection

@section('script')
	<!-- 
		Script only for this page. If there is no added script on 
		this view, leave it or delete the section.
	-->
@endsection