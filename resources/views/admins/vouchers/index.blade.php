@extends('layouts.admins')
@section('title')
    Mã giảm giá
@endsection
@section('css')
   
@endsection
@section('content')
<div class="be-content">
    <div class="row">
        <div class="page-head col">
            <h2 class="page-head-title">Giảm giá</h2>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item"><a href="#">Giảm giá</a></li>
                    <li class="breadcrumb-item active">Mã giảm giá</li>
                </ol>
            </nav>
        </div>
        <div class="col-4 p-3">
            @if (session('success'))
                <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
                    <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                    <div class="icon"><span class="mdi mdi-check"></span></div>
                    <div class="message"><strong>Thông báo!</strong> {{session('success')}}</div>
                </div>
            @elseif (session('warning'))
                <div id="warningAlert" class="alert alert-warning alert-dismissible" role="alert">
                    <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                    <div class="icon"><span class="mdi mdi-check"></span></div>
                    <div class="message"><strong>Thông báo!</strong> {{session('warning')}}</div>
                </div>
            @endif
            @error('name')
                <div id="warningAlert" class="alert alert-danger alert-dismissible" role="alert">
                    <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                    <div class="icon"><span class="mdi mdi-check"></span></div>
                    <div class="message"><strong>Thông báo!</strong> {{ $message }}</div>
                </div>
            @enderror
        </div>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Danh sách</div>
                            <div>
                                <a href="{{ route('wp-admin.voucher.create') }}">
                                    <button id="btnAdd" type="button" class="btn btn-space btn-outline-success" data-bs-toggle="modal" data-bs-target="#myModal">
                                        Thêm mới <span class="icon mdi mdi-plus-circle"></span>
                                    </button>
                                </a>
                                <a class="btn btn-space btn-outline-info" href="">Export excel <span class="icon mdi mdi-download"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-fw-widget text-center" id="table1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên mã</th>
                                    <th>Code</th>
                                    <th>Loại giảm</th>
                                    <th>Loại mã</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vouchers as $key => $voucher)
                                    <tr>
                                        <td>{{$key++}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">
                                            <img style="max-width: 800px;" src="{{ asset('assets/admins/svg/no-data.svg') }}" alt="no-data">
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.dataTables();
        });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btnAdd', function () {
                
            });
        });
    </script>
@endsection