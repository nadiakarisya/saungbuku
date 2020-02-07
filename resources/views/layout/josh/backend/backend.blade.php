<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('pagetitle')
            | {{ config('view.apptitle') }}
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- global css -->

    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin/css/app.css') }}"/>
    <link rel="stylesheet" href="{{ url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/datatables.net/css/jquery.dataTables.min.css') }}">
    <!-- font Awesome -->

    <!-- end of global css -->
    <!--page level css-->
@yield('header_styles')
<!--end of page level css-->

<body class="skin-josh">
@include('layout.josh.backend.header')
<div class="wrapper ">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side ">
        <section class="sidebar ">
            @include('layout.josh.backend.sidebar')
        </section>
    </aside>
    <aside class="right-side">

        <!-- Notifications -->
        <div id="notific">

        </div>

        <!-- Content -->
        <section class="content-header">
            <h1>@yield('pagetitle')</h1>
            @yield('breadcrumb')
        </section>
        <section class="content">
            @yield('content')
        </section>
        @include('layout.josh.backend.footer')
    </aside>
    <!-- right-side -->

</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- global js -->

<script src="{{ url('joshadmin/js/app.js') }}" type="text/javascript"></script>
<!-- DataTables -->
<script src="{{ url('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ url('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Inputmask -->
<script src="{{ url('bower_components/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('bower_components/chart.js/Chart.bundle.js') }}"></script>
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
<!-- end of global js -->
<!-- begin page level js -->
@yield('script')
<!-- end page level js -->
</body>
</html>
