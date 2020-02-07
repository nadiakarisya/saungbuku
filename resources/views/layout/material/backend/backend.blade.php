<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>.: ASET TRANSJAKARTA :.</title>

    <link rel="shortcut icon" href="{{ url('images/icon.png') }}" type="image/png">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ url('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminltematerial/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminltematerial/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminltematerial/css/ripples.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminltematerial/css/MaterialAdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminltematerial/css/skins/all-md-skins.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/morris.js/morris.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminltematerial/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src=https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js></script>
    <script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script>-->
    {{--<![endif]-->--}}

    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/sweetalert2@8.8.7/dist/sweetalert2.min.css>

    <link rel="stylesheet" href="{{ url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/datatables.net/css/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ url('ibmplex/regular/stylesheet.css') }}">
    <style>
        * { font-family: 'IBMPlexSans-Regular','Helvetica Neue', Arial, sans-serif; !important; }
        textarea:invalid { border: 1px solid red !important; }
        input:invalid { border: 1px solid red !important; }
        select:invalid { border: 1px solid red !important; }
        textarea { padding: 5px 5px !important; }
        input { padding: 5px 5px !important; }
        input:read-only, textarea:read-only { cursor: default; }
        input:read-only:active, input:focus:read-only:focus, textarea:read-only:active, textarea:focus:read-only:focus { background-image:linear-gradient(#D2D2D2,#D2D2D2) !important; }
        select { padding: 5px 5px !important; }
        .dataTables_wrapper .dataTables_processing { background:none;box-shadow:none; }
        .btn.btn-dark { color:#fff;background-color:#343a40;border-color:#343a40; }
        .longText { width: 100%; max-width: 200px; display:block; /*word-wrap: break-word; word-break: break-all;*/ text-overflow: ellipsis; white-space: nowrap; overflow: hidden;}
        .text-left { text-align:left !important; }
        .btn.btn-up { margin: 0 1px !important;}
        .form-group-modal { margin: 0 -15px 0 -15px  !important; }
        .btn.btn-table {     margin-top: 0; margin-right: 1px; margin-bottom: 10px; margin-left: 1px; !important;}
        .form-control.loading { background-color: #FFF;background-image: url("../images/24.gif")!important;background-size: 15px 15px;background-position:right center;background-repeat: no-repeat; }
        .content-header { margin-top:10px; }
        .text-wrap { word-wrap:break-word;white-space:normal; }
        /*.width-spc { width:150px; }
        .navbar-nav>.user-menu>.dropdown-menu>li.user-header { height:auto;padding:10px;text-align:center; }*/
        .dataTables_scroll { overflow: auto; clear: both;}
        table .btn { margin:0; }
        .form-control.form-up{ height: 22px; font-size: 14px; }
        .form-control.form-font{ font-size: 14px; }
        .form-group.form-upper{ margin: 0 0 0 0 !important;}
        .label-upper { margin-top: 0 !important; }
        [class*='col-md'] .btn { margin:0; }
        [class*='col-md'] .checkbox { padding-top:0; }
        [class*='col-md'] label { margin:0; }

        #loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: block;
            opacity: 0.5;
            background-color: #fff;
            text-align: center;
            z-index: 9999;
        }

        #spinner{
            position: fixed;
            top: 45%;
            left: 45%;
            transform: translate(-45%, -45%);
        }

        .fitcontentmoney{
            width: fit-content;
        }
    </style>

    @yield('style')
</head>

<body class="hold-transition skin-blue-light sidebar-mini fixed">
<div id="loading" style="display: none">
    <i id="spinner" class="fa fa-cog fa-spin fa-5x fa-fw"></i>
</div>
    <div class="wrapper">
        @include('layout.material.backend.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('layout.material.backend.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield("pagetitle")
                    <small>@yield("pagedescription")</small>
                </h1>
                {{--<ol class="breadcrumb">
                    <li><a href="#"><i class="{{ config('view.theme') ? 'fa fa' : 'entypo' }}-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>--}}
            </section>

            @yield("freezone")

            <!-- Main content -->
            <section class="content">
                <div class="{{ container("box") }}">
                    <div class="{{ container("body") }}">
                        @yield('content')
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layout.material.backend.footer')

        <!-- Control Sidebar -->
        @include('layout.material.backend.controlsidebar')
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Material Design -->
<script src="{{ url('adminltematerial/js/material.min.js') }}"></script>
<script src="{{ url('adminltematerial/js/ripples.min.js') }}"></script>
<script>
  $.material.init();
</script>
<!-- DataTables -->
<script src="{{ url('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ url('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ url('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ url('bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ url('adminltematerial/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('adminltematerial/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
{{--<script src="{{ url('adminltematerial/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>--}}
<!-- Slimscroll -->
<script src="{{ url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Inputmask -->
<script src="{{ url('bower_components/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('bower_components/chart.js/Chart.bundle.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminltematerial/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.7/dist/sweetalert2.all.min.js"></script>

{{--<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>--}}
{{--<link rel="stylesheet" href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}

<script src="{{ url('js/toastr.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ url('adminltematerial/js/pages/dashboard.js') }}"></script>--}}

<!-- AdminLTE for demo purposes -->
<script src="{{ url('adminltematerial/js/demo.js') }}"></script>
<script>
    //todo component untuk inputan standar

  $('document').ready(function(){
    /*var disableds = document.querySelectorAll('button[disabled][onclick]');
    disableds.forEach(button => {
      button.removeAttribute("onclick");
    });
      console.log(disableds);*/

    $('.select2').select2({
          width: '100%',
      });
    $('.select2').css("margin-top", "7px");

    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
      todayHighlight: true,
    });

    /*window.addDaysToAnotherDatepicker = function(sourceDatepickerObject, targetSelector, numDays){
      var srcDateObject = new Date(sourceDatepickerObject.date);
      srcDateObject.setDate(srcDateObject.getDate() + +numDays);

      srcDateObject =  ('0' + srcDateObject.getDate()).slice(-2) + '-'
        + ('0' + (srcDateObject.getMonth()+1)).slice(-2) + '-'
        + srcDateObject.getFullYear();

      $(targetSelector).val(srcDateObject);
    };*/

    let opts = {
      allowNegative: false,
      radixPoint: ',',
      digits: 0,
      groupSeparator: '.',
      autoUnmask: true,
      prefix: "",
      rightAlign: false,
      unmaskAsNumber: true,
      removeMaskOnSubmit: true,
      onBeforeMask : function (value, opts){
        let result = "0";
        if(value){
          if(typeof value !== "string"){
            value = value.toString();
          }
          let split = value ? value.split(/[.,]/) : ["0"];
          result = split[0];
        }
        return result;
      }
    };

    var zeroHandler = function() {
      if($(this).val() == 0){
        $(this).select();
      }
    };

    $(".currency")
      .on({
        focus: zeroHandler,
        keyup: zeroHandler
      })
      .inputmask('currency', opts);
    $(".currency-dec").inputmask('currency', opts);

    processMenuState();

  });

  processMenuState = function(){

    var a = (document.querySelectorAll(`[href="${window.location.href}"]`)[0]) ||
     (document.querySelectorAll(`[href="${localStorage.getItem("sipat-last-menu-href")}"]`)[0]);

    if(!a) return;

    localStorage.setItem("sipat-last-menu-href", window.location.href);

    a.parentNode.classList.add("active");
    var els = [];
    while (a) {
      if(a.className && a.className === "treeview"){
        els.unshift(a);
      }
      a = a.parentNode;
    }
    els.forEach(function(li){
      li.classList.add("menu-open");
      li.classList.add("active");

      let ul = li.childNodes[1];
      ul.style.display = "block";
    });
  };

    window.commaSeparateNumber = function (val) {
    if(val){
      while (/(\d+)(\d{3})/.test(val.toString())) {
          var parts = (+val).toFixed(2).split(".");
          val = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".") + (+parts[1] ? "," + parts[1] : "");
        // val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
      }
    }else{
      val = 0;
    }

    return val;
  };

  window.unitName = function (code, name) {
    var unit = '';
    if(code && name) {
      unit = code + ' - ' + name;
    }
    return unit;
  };

  window.confirm2 = function(message, callback){
    Swal.fire("", message, "question")
      .then((confirmed) => {
        if(confirmed){
          callback();
        }
      });
  };

  window.alert2 = function(message){
    Swal.fire("", message, "warning");
  };


    $(".file-upload").change(function(){
        if(this.files[0].size > 4048000){
            $(".file-upload").val("");
            $(".file-name").empty();
            window.alert2("UKURAN FILE TIDAK BOLEH LEBIH DARI 2MB");
        }
    });

  window.validateAndConfirm = function(selectorForm, message) {
    var form = $(selectorForm)[0];

    /*if(form.reportValidity() && confirm(message)){
      var datepickerEls = form.querySelectorAll(".datepicker");

      datepickerEls.forEach(function(element){
        if(element.value && moment(element.value,"DD/MM/YYYY").isValid())
          element.value = moment(element.value,"DD/MM/YYYY").format("YYYY-MM-DD");
      });

      return true;
    }*/

    if(form.reportValidity()){

      Swal.fire({
        text: message,
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        customClass: {
          confirmButton: 'btn btn-success btn-raised',
          cancelButton: 'btn btn-default btn-raised'
        }
      })
      /*swal({
        // title: "Apakah Anda Yakin?",
        text: message,
        icon: "warning",
        buttons: {
          tidak: null,
          ya: ""
        }
      })*/
        .then((result) => {
          if(result.value){
            var datepickerEls = form.querySelectorAll(".datepicker");

            datepickerEls.forEach(function(element){
              if(element.value && moment(element.value,"DD/MM/YYYY").isValid())
                element.value = moment(element.value,"DD/MM/YYYY").format("YYYY-MM-DD");
            });

            var currencyEls = form.querySelectorAll(".currency");

            currencyEls.forEach(function (element) {
              if(element.inputmask) element.inputmask.remove();
              if (element.value && element.value.indexOf(".") > -1)
                element.value = element.value.replace(".", "").replace(",", ".");
            });

              form.submit();
          }

        });
    }

    return false;
  };
    window.currency = function () {
        let opts = {
            radixPoint: ',',
            digits: 0,
            groupSeparator: '.',
            autoUnmask: true,
            prefix: "",
            rightAlign: false,
            unmaskAsNumber: true,
            removeMaskOnSubmit: true
        };
        $(".currency").inputmask('currency', opts);
            opts.digits = 2;
            opts.onBeforeMask = function (value, opts){
                //if(+value < 0) value = "0";
                return value.replace(".", ",");
            };

        $(".currency-dec").inputmask('currency', opts);
        processMenuState();
    };

    @if(Session::get("errormessage"))
    toastr.options = {
      closeButton: true,
      timeOut: 0,
      extendedTimeOut: 0,
    };

    @php $text = str_replace("\n", '', Session::get("errormessage")); @endphp
    toastr.error("{{$text}}", "Error", {});

    @elseif(Session::get("successmessage"))

    toastr.success("{{Session::get("successmessage")}}", "Berhasil", {});

    @endif


  $(document).ready(function(){
      $(".file-upload").on('change', function(e) {
          elem = $(this);

          file = elem.closest(".file-name");
          elem.parent().next().css({'display': 'block'});
          elem.parent().next().text(e.target.files[0].name);
      });
  });

    function showLoading(){
      $('#loading').show();
    }
    function hideLoading(){
      $('#loading').hide();
    }

    hideLoading();

    window.onbeforeunload = function ( e ) {
      showLoading();
    };
    $( document ).ajaxStart(function() {
      showLoading();
    });
    $( document ).ajaxStop(function() {
      hideLoading();
    });


function getMonthName(monthNumber){
    var month = "";
    switch (monthNumber) {
        case 1: month = "Januari";
            break;
        case 2: month = "Februari";
            break;
        case 3: month = "Maret";
            break;
        case 4: month = "April";
            break;
        case 5: month = "Mei";
            break;
        case 6: month = "Juni";
            break;
        case 7: month = "Juli";
            break;
        case 8: month = "Agustus";
            break;
        case 9: month = "September";
            break;
        case 10: month = "Oktober";
            break;
        case 11: month = "November";
            break;
        case 12: month = "Desember";
            break;
        default:
            break;
    }

    return month;
}
</script>

@yield('script')
</body>
</html>
