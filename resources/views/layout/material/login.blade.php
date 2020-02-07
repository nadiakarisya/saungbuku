<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi Pengelolaan Aset Transjakarta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="author" content="PT Akhdani Reka Solusi">

    <!-- App favicon -->
    <!--link rel="shortcut icon" href="images/favicon.ico" -->
    <link rel="shortcut icon" href="{{ url('images/icon.png') }}" type="image/png">

    <!-- App css -->
    <link rel="stylesheet" href="{{ url('logindata/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('logindata/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('logindata/icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('logindata/metismenu.min.css') }}" type="text/css" />
    {{--<link rel="stylesheet" href="{{ url('css/font-icons/entypo/css/entypo.css') }}" type="text/css">--}}
    <link rel="stylesheet" href="{{ url('bower_components/font-awesome/css/font-awesome.min.css') }}">

    <script src="{{ url('logindata/modernizr.min.js') }}"></script>
    <script src="{{ url('logindata/jquery-1.10.2.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('#show').click(function(){
                if (document.querySelector("#password").type === "password") {
                  document.querySelector("#password").type = "text"
                } else {
                  document.querySelector("#password").type = "password";
                }
            });
        });
    </script>
    @yield('style')
</head>


<body class="account-pages">

<!-- Begin page -->
<div class="accountbg" style="background: url('images/bg-0.jpg');background-size: cover;"></div>

<div class="wrapper-page account-page-full">

    <div class="card">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box p-5">
                    <h2 class="text-uppercase text-center pb-4">
                        <a href="#" class="text-success">
                            <span><img src=<?php echo e(asset('images/transjktBG.png')); ?> alt="" height="100"></span>
                        </a>
                    </h2>

                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center">
        <p class="account-copyright">2020 © TRANSJAKARTA. - <a href="http://www.transjakarta.co.id/" target="_blank">www.transjakarta.co.id</a></p>
    </div>

</div>



<!-- jQuery  -->
<script src="{{ url('logindata/jquery.min.js') }}"></script>
<script src="{{ url('logindata/popper.min.js') }}"></script>
<script src="{{ url('logindata/bootstrap.min.js') }}"></script>
<script src="{{ url('logindata/metisMenu.min.js') }}"></script>
<script src="{{ url('logindata/waves.js') }}"></script>
<script src="{{ url('logindata/jquery.slimscroll.js') }}"></script>

<!-- App js -->
<script src="{{ url('logindata/jquery.core.js') }}"></script>
<script src="{{ url('logindata/jquery.app.js') }}"></script>

</body>
</html>
