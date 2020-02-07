@extends('layout.' . config('view.theme') . '.backend.backend')

@section('content')

	<br />
	<div class="{{ container("box") }}" data-collapsed="0">
		<div class="{{ container("head") }}">
			<div class="panel-title">
				TAMBAH MENU
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
			<form action="{{url('administrator/menu')}}" method="post" role="form" class="form-horizontal form-groups-bordered" id="createmenu">
				@csrf

				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>NAMA MENU</strong></label>

					<div class="col-sm-5">
						<input name="nama" type="text" class="form-control" id="field-1" placeholder="NAMA MENU" required />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3 "><strong>URL</strong></label>

					<div class="col-sm-5">
						<input name="uri" type="text" class="form-control" id="field-1" placeholder="URL MENU" required />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3">ID MENU INDUK </label>

					<div class="col-sm-5">
						<select name="id_menu_induk" id="pilih_induk" class="form-control" required>
							<option value="0">--Menu Induk--</option>
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
						<input name="class" type="text" class="form-control" id="field-1" placeholder="CLASS" required />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>KETERANGAN</strong></label>

					<div class="col-sm-5">
						<textarea name="keterangan" class="form-control" id="field-1" placeholder="KETERANGAN"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>STATUS</strong></label>

					<div class="col-sm-5">
						<label>
							<input type="radio" name="aktif" value="Y" checked> Aktif
						</label> <p></p>
						<label>
							<input type="radio" name="aktif" value="N"> Non Aktif
						</label>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						@component('component.button.back', ['href' => url("administrator/menu")])@endcomponent
						@component('component.button.submit', ['onclick' => 'return window.validateAndConfirm("#createmenu","Apakah Anda Yakin?")']) @endcomponent
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection