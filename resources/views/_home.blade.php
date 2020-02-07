@extends('layout.' . config('view.theme') . '.backend.backend')
@section('pagetitle','DASHBOARD')
@section('style')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');
        .status-panel{
            padding: 20px;
        }
        .status-row{
            margin-top: 15px;
        }
        .input-group > .input-group-addon{
            vertical-align: top;
        }
        .calendar-icon{
            color: #ffffff;
        }
        .daterangepicker .input-mini{
            padding: 0 6px 0 28px !important;
        }
        .applyBtn {
            background: #4caf50;
        }
        .cancelBtn {
            background: #f44336;
        }
        .btn:not(.btn-raised).btn-success, .input-group-btn .btn:not(.btn-raised).btn-success,
        .btn:not(.btn-raised), .input-group-btn .btn:not(.btn-raised), .btn:not(.btn-raised).btn-default, .input-group-btn .btn:not(.btn-raised).btn-default{
            color: #ffffff;
        }
        .title > h3{
            font-size: 35px;
            font-family: 'Roboto Condensed', sans-serif;
            font-weight: 700;
        }
        .title > p{
            font-family: 'Roboto Condensed', sans-serif;
            font-weight: 400;
        }
        .small-box {
            padding-bottom: 10px;
        }
        .small-box .icon {
            font-size: 90px;
        }
        .small-box p>small {
            display: block;
            color: #f9f9f9;
            font-size: 10px;
            margin-top: 3px;
        }
        .info-box-number{
            font-size:30px;
        }
        .stat-box {
            position: relative;
            display: block;
            margin-bottom: 20px;
            box-shadow: 0 1px 6px 0 rgba(0,0,0,0.12), 0 1px 6px 0 rgba(0,0,0,0.12);
            border-radius: 2px;
            border: 0;
            padding: 10px 15px 10px 10px;
        }
    </style>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{isset($bus->penyerapan_ai) ? number_format($bus->penyerapan_ai/1000000, 2, ',', '.') : 0}}</h3>
                <p>BUS Pengadaan Tahun 2013</p>
            </div>
            <div class="icon">
                <i class="fa fa-bus"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{isset($penyerapan->penyerapan_ao) ? number_format($penyerapan->penyerapan_ao/1000000, 2, ',', '.') : 0}}</h3>
                <p>Penyerapan Operasi<small>Dalam Jutaan Rupiah (Rp)</small></p>
            </div>
            <div class="icon">
                <i class="fa fa-truck"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{number_format(array_sum($terkontrakLuncuran)/1000000, 2, ',', '.')}}</h3>
                <p>Terkontrak Luncuran<small>Dalam Jutaan Rupiah (Rp)</small></p>
            </div>
            <div class="icon">
                <i class="fa fa-rocket"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{number_format(array_sum($pembayaranLuncuran)/1000000, 2, ',', '.')}}</h3>
                <p>Pembayaran Luncuran<small>Dalam Jutaan Rupiah (Rp)</small></p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->

</div>

<div class="row">


</div>

{{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
        {{--<div class="small-box">--}}
            {{--<div class="mapouter">--}}
                {{--<div class="gmap_canvas">--}}
                {{--<iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>--}}
                {{--</div>--}}
                {{--<style>.mapouter{text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>SELAMAT DATANG</h3>
                <p>DI aplikasi Manajemen Aset Transjakarta</p>
            </div>
            <div class="icon">
                <i class="fa fa-bank"></i>
            </div>
        </div>
    </div>
</div>


@endsection
<!-- SCRIPT JS  -->
@section('script')
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        $('.daterange').daterangepicker();

        // Area Chart
        var area_chart_demo = $("#area-chart-demo");

        area_chart_demo.parent().show();

        Morris.Area({
            element: 'area-chart-demo',
            data: {!! json_encode('') !!},
            xkey: 'ym',
            xLabelFormat : function(x){
              return moment(x, "YYYY-MM").format("MMMM");
            },
            ykeys: ['ai'],
            xLabelAngle: 10,
            labels: ['INVESTASI'],
            lineColors: ['#FF3366', '#6633FF']
        });

        area_chart_demo.parent().attr('style', '');
    });

    function getRandomInt(min, max)
    {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

</script>

<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        $(".terkontrak-luncuran").sparkline({!! json_encode('') !!}, {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#d81b60',
            fillColor: '',
            lineWidth: 2,
            spotColor: '#a9282a',
            minSpotColor: '#a9282a',
            maxSpotColor: '#a9282a',
            highlightSpotColor: '#a9282a',
            highlightLineColor: '#f4c3c4',
            spotRadius: 2,
            drawNormalOnTop: true
        });

        $(".daily-visitors").sparkline([1,5,5.5,5.4,5.8,6,8,9,13,12,10,11.5,9,8,5,8,9], {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#00c0ef',
            fillColor: '',
            lineWidth: 2,
            spotColor: '#a9282a',
            minSpotColor: '#a9282a',
            maxSpotColor: '#a9282a',
            highlightSpotColor: '#a9282a',
            highlightLineColor: '#f4c3c4',
            spotRadius: 2,
            drawNormalOnTop: true
        });

        $(".daily-visitors2").sparkline([9,7,7.6,5.6,5.7,6,8,9,13,12,10,11.5,9,8,5,8,9], {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#3d9970',
            fillColor: '',
            lineWidth: 2,
            spotColor: '#a9282a',
            minSpotColor: '#a9282a',
            maxSpotColor: '#a9282a',
            highlightSpotColor: '#a9282a',
            highlightLineColor: '#f4c3c4',
            spotRadius: 2,
            drawNormalOnTop: true
        });


        $(".pembayaran-luncuran").sparkline({!! json_encode('') !!}, {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#ff851b',
            fillColor: '',
            lineWidth: 2,
            spotColor: '#a9282a',
            minSpotColor: '#a9282a',
            maxSpotColor: '#a9282a',
            highlightSpotColor: '#a9282a',
            highlightLineColor: '#f4c3c4',
            spotRadius: 2,
            drawNormalOnTop: true
        });
});

$(window).on('load',function () {
    // Horizontal Bar Chart
    var chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };

    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var horizontalBarChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
				label: 'AI',
				backgroundColor: chartColors.red,
				borderColor: chartColors.red,
				borderWidth: 1,
				data: [ 20, 60, 80, 65, 50, 90, 80 ]
			}, {
				label: 'AO',
				backgroundColor: chartColors.blue,
				borderColor: chartColors.blue,
				data: [ 30, 40, 60, 80, 70, 80, 90 ]
			}]
    };
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barChart = new Chart(barChartCanvas, {
        type: 'horizontalBar',
        data: horizontalBarChartData,
        options: {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
                rectangle: {
                    borderWidth: 2,
                }
            },
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: false,
                text: 'Chart.js Horizontal Bar Chart'
            }
        }
    });

    // Doughnut Chart
    var configDoughnutChart = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [ 36, 54, 75, 81, 92, ],
                backgroundColor: [
                    chartColors.red,
                    chartColors.orange,
                    chartColors.yellow,
                    chartColors.green,
                    chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Baik',
                'Cukup',
                'Rusak',
                'Rusak Berat'
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
                display: false
            },
            title: {
                display: false,
                text: 'Chart.js Doughnut Chart'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
    
    var doughnutChartCanvas1 = $('#doughnutChart1').get(0).getContext('2d');
    var doughnutChart1 = new Chart(doughnutChartCanvas1, configDoughnutChart);
    var doughnutChartCanvas2 = $('#doughnutChart2').get(0).getContext('2d');
    var doughnutChart2 = new Chart(doughnutChartCanvas2, configDoughnutChart);
    var doughnutChartCanvas3 = $('#doughnutChart3').get(0).getContext('2d');
    var doughnutChart3 = new Chart(doughnutChartCanvas3, configDoughnutChart);
});
    
</script>

@endsection
