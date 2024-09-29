@extends('layouts.admins')
@section('title')
    Admin
@endsection
@section('css')
    {{-- CSS --}}
@endsection
@section('content')
    {{-- CONTENT --}}
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="widget widget-tile">
                        <div class="chart sparkline" id="spark1"></div>
                        <div class="data-info">
                            <div class="desc">New Users</div>
                            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span
                                    class="number" data-toggle="counter" data-end="113">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="widget widget-tile">
                        <div class="chart sparkline" id="spark2"></div>
                        <div class="data-info">
                            <div class="desc">Monthly Sales</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span
                                    class="number" data-toggle="counter" data-end="80" data-suffix="%">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="widget widget-tile">
                        <div class="chart sparkline" id="spark3"></div>
                        <div class="data-info">
                            <div class="desc">Impressions</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span
                                    class="number" data-toggle="counter" data-end="532">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="widget widget-tile">
                        <div class="chart sparkline" id="spark4"></div>
                        <div class="data-info">
                            <div class="desc">Downloads</div>
                            <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span
                                    class="number" data-toggle="counter" data-end="113">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="widget widget-fullwidth be-loading">
                        <div class="widget-head">
                            <div class="tools">
                                <div class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="icon mdi mdi-more-vert d-inline-block d-md-none"></span></a>
                                    <div class="dropdown-menu" role="menu"><a class="dropdown-item"
                                            href="#">Week</a><a class="dropdown-item" href="#">Month</a><a
                                            class="dropdown-item" href="#">Year</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="#">Today</a>
                                    </div>
                                </div><span class="icon mdi mdi-chevron-down"></span><span
                                    class="icon toggle-loading mdi mdi-refresh-sync"></span><span
                                    class="icon mdi mdi-close"></span>
                            </div>
                            <div class="button-toolbar d-none d-md-block">
                                <div class="btn-group">
                                    <button class="btn btn-secondary" type="button">Week</button>
                                    <button class="btn btn-secondary active" type="button">Month</button>
                                    <button class="btn btn-secondary" type="button">Year</button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-secondary" type="button">Today</button>
                                </div>
                            </div><span class="title">Recent Movement</span>
                        </div>
                        <div class="widget-chart-container">
                            <div class="widget-chart-info">
                                <ul class="chart-legend-horizontal">
                                    <li><span data-color="main-chart-color1"></span> Purchases</li>
                                    <li><span data-color="main-chart-color2"></span> Plans</li>
                                    <li><span data-color="main-chart-color3"></span> Services</li>
                                </ul>
                            </div>
                            <div class="widget-counter-group widget-counter-group-right">
                                <div class="counter counter-big">
                                    <div class="value">25%</div>
                                    <div class="desc">Purchase</div>
                                </div>
                                <div class="counter counter-big">
                                    <div class="value">5%</div>
                                    <div class="desc">Plans</div>
                                </div>
                                <div class="counter counter-big">
                                    <div class="value">5%</div>
                                    <div class="desc">Services</div>
                                </div>
                            </div>
                            <div id="main-chart" style="height: 260px;"></div>
                        </div>
                        <div class="be-spinner">
                            <svg width="40px" height="40px" viewbox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                                <circle class="circle" fill="none" stroke-width="4" stroke-linecap="round"
                                    cx="33" cy="33" r="30"></circle>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- JAVASCRIPT --}}
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.dashboard();
        });
    </script>
@endsection
