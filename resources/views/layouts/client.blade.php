<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/admins/img/logo-fav.png') }}">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}" type="text/css">
    <style>
        .pi-attribute {
            list-style-type: none;
            margin-top: 20px;
        }
        .pi-pic img {
            max-height: 300px;
            object-fit: cover
        }
        .text-attribute {
            color: #252525;
            font-weight: 700;
            font-size: 16px;
        }
        .labelColor {
            min-height: 30px;
            width: 50px;
            padding: 7px 0px;
            display: flex;
            text-align: center;
            justify-content: center;
            color: #ffffff;
        }
        .color {
            /* display: flex; */
            /* align-items: baseline; */
        }
        .color-item {
            display: flex;
            gap: 10px
        }
        .color-item .item label.active {
            background-color: blue !important;
        }
        .pi-attribute input {
            display: none;
        }
        .pi-content {
            padding: 10px 20px;
        }
        .pi-text {
            padding: 0px !important;
        }
        .size label {
            min-height: 30px;
            font-size: 16px;
            color: #252525;
            font-weight: 700;
            padding: 2px 0px;
            width: 50px;
            border: 1px solid gainsboro;
            text-align: center;
            text-transform: uppercase;
            cursor: pointer;
        }
        .size-item {
            display: flex;
            gap: 10px;
        }
        .size label.active {
            background: #252525;
            color: #ffffff;
        }
        .price {
            font-size: 14px;
            text-decoration: none !important;
            color: #e7ab3c !important;
        }
        .product-item:hover {
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
    {{-- CSS --}}
    @yield('css')
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <header class="header-section">
        {{-- HEADER --}}
        @include('clients.blocks.header')
        {{-- NAV --}}
        @include('clients.blocks.navbar')
    </header>
    <!-- Header End -->

    {{-- CONTENT --}}
    @yield('content')

    <!-- Footer -->
    <footer class="footer-section">
        {{-- Footer --}}
        @include('clients.blocks.footer')
    </footer>
    <!-- Footer End -->

    <!-- Js Plugins -->
    <script src="{{ asset('assets/clients/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/clients/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/main.js') }}"></script>

    <script src="https://kit.fontawesome.com/2e8884d211.js" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
