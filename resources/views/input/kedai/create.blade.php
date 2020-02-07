@extends('layout.' . config('view.theme') . '.backend.backend')

@section('content')

	<br />
	<div class="{{ container("box") }}" data-collapsed="0">
		<div class="{{ container("head") }}">
			<div class="panel-title">
				TAMBAH GEDUNG KANTOR
			</div>

			<div class="panel-options">
				<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-cog"></i></a>
				<a href="#" data-rel="collapse"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-down-open"></i></a>
				<a href="#" data-rel="reload"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-arrows-ccw"></i></a>
				<a href="#" data-rel="close"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-cancel"></i></a>
			</div>
		</div>

		<div class="{{ container("body") }}">
			<form action="{{url('input/gedungkantor')}}" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data" id="createbus">
				@csrf

				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>NAMA</strong></label>

					<div class="col-sm-5">
						<input name="nama" type="text" class="form-control" id="field-1" placeholder="NAMA" required />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>KONSTRUKSI</strong></label>

					<div class="col-sm-5">
						<input name="konstruksi" type="text" class="form-control" id="field-1" placeholder="KONSTRUKSI" required />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>LUAS (m2)</strong></label>

					<div class="col-sm-5">
						<input name="luas_m2" type="text" class="form-control" id="field-1" placeholder="LUAS (m2)" />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>LOKASI/ALAMAT</strong></label>

					<div class="col-sm-5">
						<input name="lokasi_alamat" type="text" class="form-control" id="field-1" placeholder="LOKASI/ALAMAT" />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>STATUS TANAH</strong></label>

					<div class="col-sm-5">
						<input name="status_tanah" type="text" class="form-control" id="field-1" placeholder="STATUS TANAH" />
					</div>
				</div>

				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>KETERANGAN</strong></label>

					<div class="col-sm-5">
						<input name="keterangan" type="text" class="form-control" id="field-1" placeholder="KETERANGAN" />
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>LOKASI KOORDINAT</strong></label>

					<div class="col-sm-5">
						<input name="lokasi_koordinat" type="text" class="form-control" id="field-1" placeholder="LOKASI KOORDINAT" />
					</div>
				</div>

				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>KONDISI</strong></label>

					<div class="col-sm-5">
						@foreach(\App\KopiHelper\Registry::KONDISI as $key => $value)
							<label>
								<input type="radio" name="kondisi" value="{{ $key  }}" {{ $key === 'BAIK' ? "checked" : ""  }}> {{ $value  }}
							</label> <p></p>
						@endforeach
					</div>
				</div>
				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>NILAI SEWA</strong></label>

					<div class="col-sm-3">
						<input name="nilaisewa" style="text-align:right;" type="text" maxlength="15" autocomplete="off" class="currency form-control " id="nilaisewa"/>
					</div>
				</div>

				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>NILAI SEWA 5 TAHUN KE DEPAN</strong></label>

					<div class="col-sm-3">
						<input name="nilaisewa5thndpn" style="text-align:right;" type="text" maxlength="15" autocomplete="off" class="currency form-control " id="nilaisewa5thndpn"/>
					</div>
				</div>

				<div class="form-group">
					<label for="field-1" class="col-sm-3"><strong>NILAI SEWA 4 TAHUN KE BELAKANG</strong></label>

					<div class="col-sm-3">
						<input name="nilaisewa4thnblkg" style="text-align:right;" type="text" maxlength="15" autocomplete="off" class="currency form-control " id="nilaisewa4thnblkg"/>
					</div>
				</div>

				@for($i=1; $i < 6; $i++)
					<div class="form-group">
						<label for="field-1" class="col-sm-3"><strong>FOTO KE-{{ $i  }}</strong></label>

						<div class="col-sm-6">
							@if( config('view.theme')!='')
								@component("component.button.browse", ["name" => "file".$i]) @endcomponent
							@else
								<input type="file" name="file{{$i}}" class="form-control file2 inline btn btn-raised btn-primary " data-label="<i class='fa fa-arrow-circle-o-up'></i> &nbsp;Browse Files" accept="application/pdf" />
							@endif
						</div>
					</div>
				@endfor

				<div class="form-group">
					<div class="col-sm-12">
						@component('component.button.back', ['href' => url("input/gedungkantor")])@endcomponent
						@component('component.button.submit', ['onclick' => 'return window.validateAndConfirm("#createbus","Apakah Anda Yakin?")']) @endcomponent
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection