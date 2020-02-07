@extends('layout.' . config('view.theme') . '.backend.backend')
@section('pagetitle') CONTACT HELPDESK @endsection
@section('content')
    <form action="proses/email_helpdesk.php" id="rootwizard-2" enctype="multipart/form-data" method="post" action="" class="form-wizard validate">

        <div class="steps-progress">
            <div class="progress-indicator"></div>
        </div>

        <ul>
            <li class="active">
                <a href="#tab2-1" data-toggle="tab"><span>1</span>DATA ANDA</a>
            </li>
            <li>
                <a href="#tab2-2" data-toggle="tab"><span>2</span>SARAN/KELUHAN</a>
            </li>
            <li>
                <a href="#tab2-3" data-toggle="tab"><span>3</span>SELESAI</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="tab2-1">

                <div class="form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-5">FULLNAME</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="field-1" value="*DB*" readonly />
                                <div class="input-group-addon">
                                    <a href="#"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-user"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="text" name="USERNAME" class="form-control" id="field-1" value="*DB*" readonly />
                                <div class="input-group-addon">
                                    <a href="#">@icon(["class" => "fa fa-plus-circle"])@endicon </a>
                                </div>
                            </div>
                        </diV>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-5">EMAIL</label>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="EMAIL" class="form-control" value="*DB*" required />
                                <div class="input-group-addon">
                                    <a href="#">@icon(["class" => "fa fa-envelope"])@endicon </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-5  input-lg">NO TLP</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" name="NOTLP" data-mask="decimal" class="form-control" id="field-1" placeholder="+62" required />
                                <div class="input-group-addon">
                                    <a href="#">@icon(["class" => "fa fa-phone"])@endicon </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab2-2">

                <div class="row">
                    <div class="form-horizontal form-groups-bordered">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-5">URAIAN</label>
                            <div class="col-sm-5">
                                <textarea name="URAIAN" class="form-control" maxlength="500" placeholder="max 500 karakter" data-validate="required"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5">JENIS PELAPORAN</label>
                            <div class="col-sm-5">
                                <select name="JNSLAPOR" class="form-control" required>
                                    <option value=''>JENIS PELAPORAN</option>
                                    <option value='KELUHAN'>KELUHAN</option>
                                    <option value='SARAN'>SARAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5">ALAMAT KELUHAN (ERROR)</label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="text" name="LINK" class="form-control" placeholder="jika ada link error"/>
                                    <div class="input-group-addon">
                                        <a href="#">@icon(["class" => "fa fa-link"])@endicon</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab2-3">
                <div class="row">
                    <div class="form-horizontal form-groups-bordered">

                        <div class="text-center">
                            <div class="col-sm-12">
                                <a href="#" align="center" onclick="return confirm('FITUR BELUM AKTIF')" class="btn btn-raised btn-blue"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-submit"></i>SIMPAN</a>
                            </div>
                        </div>
                        <p></p>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="alert alert-warning"><strong>Warning!</strong> Setelah data disimpan, saran/keluhan akan dikirim ke email helpesk SIPAT PLN ACEH.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pager wizard">
                <li class="previous">
                    @component('component.button.back', ['href' => ''])@endcomponent
                </li>

                <li class="next">
                    <a href="#" class="btn btn-raised">LANJUT @icon(["class" => "fa fa-arrow-right"])@endicon </a>
                </li>
            </ul>
        </div>
    </form>
@endsection