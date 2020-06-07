<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('judul')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }} " rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/CreateTransaksi" class="simple-text">
                    Sistem Informasi Akutansi Penjualan
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/CreateBarang">
                        <i class="pe-7s-graph"></i>
                        <p>Create Barang</p>
                    </a>
                </li>
                <li class="active">
                    <a href="/TampilBarang">
                        <i class="pe-7s-graph"></i>
                        <p>Tampilkan Barang</p>
                    </a>
                </li>
                <li class="active">
                        <a href="/CreatePengeluaran">
                            <i class="pe-7s-graph"></i>
                            <p>Create Pengeluaran</p>
                        </a>
                </li>
                <li class="active">
                        <a href="/TampilPengeluaran">
                            <i class="pe-7s-graph"></i>
                            <p>Tampil Pengeluaran</p>
                        </a>
                </li>
                <li class="active">
                        <a href="/CreateTransaksi">
                            <i class="pe-7s-graph"></i>
                            <p>Create Transaksi</p>
                        </a>
                </li>
                <li class="active">
                        <a href="/UmurPiutang">
                            <i class="pe-7s-graph"></i>
                            <p>Umur Piutang</p>
                        </a>
                </li>

                <!-- <li class="active">
                        <a href="/BayarUtang">
                            <i class="pe-7s-graph"></i>
                            <p>Bayar Piutang</p>
                        </a>
                </li> -->
                <li class="active">
                        <a href="/journal">
                            <i class="pe-7s-graph"></i>
                            <p>Journal</p>
                        </a>
                </li>
                <li class="active">
                        <a href="/bukuBesar">
                            <i class="pe-7s-graph"></i>
                            <p>Buku Besar</p>
                        </a>
                </li>
                <li class="active">
                        <a href="/labaRugi">
                            <i class="pe-7s-graph"></i>
                            <p>Laporan Laba Rugi</p>
                        </a>
                </li>
                
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>




    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="{{asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{asset('js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{asset('js/demo.js')}}"></script>


</html>
