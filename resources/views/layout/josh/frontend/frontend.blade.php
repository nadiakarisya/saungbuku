@extends('layout.josh.frontend.default')

{{-- Page title --}}
@section('title')
    Home
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin//css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin//vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin//css/frontend/jquery.circliful.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin//vendors/owl_carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('joshadmin//vendors/owl_carousel/css/owl.theme.css') }}">

    <!--end of page level css-->
@stop

{{-- slider --}}
@section('top')
    <!--Carousel Start -->
    <div id="owl-demo" class="owl-carousel owl-theme">
        <div class="item"><img src="{{ url('joshadmin//images/slide_1.jpg') }}" alt="slider-image">
        </div>
        <div class="item"><img src="{{ url('joshadmin//images/slide_2.jpg') }}" alt="slider-image">
        </div>
        <div class="item"><img src="{{ url('joshadmin//images/slide_4.png') }}" alt="slider-image">
        </div>
    </div>
    <!-- //Carousel End -->
@stop

{{-- content --}}
@section('content')

@stop
{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ url('joshadmin//js/frontend/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ url('joshadmin//vendors/wow/js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ url('joshadmin//vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('joshadmin//js/frontend/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ url('joshadmin//js/frontend/index.js') }}"></script>
    <!--page level js ends-->
@stop
