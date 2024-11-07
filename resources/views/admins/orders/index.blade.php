@extends('layouts.admins')
@section('title')
    
@endsection
@section('css')
    <style>
        .secondary-status {
            background: #DCDCDC;
            color: #696969;
            border: 1px solid #696969;
            border-radius: 10px;
            margin: auto;
        }
        .primary-status {
            background: #CFE2FF;
            color: #0D6EFD;
            border: 1px solid #0D6EFD;
            border-radius: 10px;
            margin: auto;
        }
        .success-status {
            background: #D1E7DD;
            color: #198754;
            border: 1px solid #198754;
            border-radius: 10px;
            margin: auto;
        }
        .warning-status {
            background: #fcf3d7;
            color: #FFC107;
            border: 1px solid #FFC107;
            border-radius: 10px;
            margin: auto;
        }
        .danger-status {
            background: #F8D7DA;
            color: #DC3545;
            border: 1px solid #DC3545;
            border-radius: 10px;
            margin: auto;
        }
        .info-status {
            background: #CFF4FC;
            color: #0DCAF0;
            border: 1px solid #0DCAF0;
            border-radius: 10px;
            margin: auto;
        }
        .light-status {
            background: #FCFCFD;
            color: #F8F9FA;
            border: 1px solid #F8F9FA;
            border-radius: 10px;
            margin: auto;
        }
        .dark-status {
            background: #CED4DA;
            color: #212529;
            border: 1px solid #212529;
            border-radius: 10px;
            margin: auto;
        }
    </style>
@endsection
@section('content')
<div class="be-content">
    <div class="row">
        <div class="page-head col">
            <h2 class="page-head-title">Hóa đơn</h2>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item"><a href="#">Quản lý hóa đơn</a></li>
                    <li class="breadcrumb-item active">Hóa đơn</li>
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
                                <button id="btnAdd" type="button" class="btn btn-space btn-outline-success" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Thêm mới <span class="icon mdi mdi-plus-circle"></span>
                                </button>
                                <a class="btn btn-space btn-outline-info" href="">Export excel
                                    <span class="icon mdi mdi-download"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-fw-widget text-center" id="table1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã hóa đơn</th>
                                    <th>Tên người nhận</th>
                                    <th>Số điện thoại</th>
                                    <th>Tổng đơn</th>
                                    <th>Loại đơn</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key=>$order)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$order->order_code}}</td>
                                        <td>{{$order->recipient_name}}</td>
                                        <td>{{$order->phone_number}}</td>
                                        <td>{{number_format($order->coin, 0, '', '.');}}₫</td>
                                        <td>{{$order->order_type}}</td>
                                        <td>
                                            @foreach ($order->status_orders()->where('orders_id', '=', $order->id)->get() as $status)
                                                @if ($status->where('orders_id', '=', $order->id)->max('id') == $status->id)
                                                    @if ($status->name_status == "Chờ xử lý")
                                                        <div class="secondary-status">
                                                            {{$status->name_status}}
                                                        </div>
                                                    @elseif ($status->name_status == "Đang xử lý" || $status->name_status == "Đang đóng gói" || $status->name_status == "Đang giao hàng")
                                                        <div class="warning-status">
                                                            {{$status->name_status}}
                                                        </div>
                                                    @elseif ($status->name_status == "Đã giao hàng" || $status->name_status == "Hoàn thành")
                                                        <div class="success-status">
                                                            {{$status->name_status}}
                                                        </div>
                                                    @elseif ($status->name_status == "Chờ thanh toán" || $status->name_status == "Hoàn hàng")
                                                        <div class="info-status">
                                                            {{$status->name_status}}
                                                        </div>
                                                    @elseif ($status->name_status == "Thanh toán thất bại" || $status->name_status == "Giao hàng thất bại" || $status->name_status == "Đã hủy")
                                                        <div class="danger-status">
                                                            {{$status->name_status}}
                                                        </div>
                                                    @elseif ($status->name_status == "Xác nhận hoàn")
                                                        <div class="primary-status">
                                                            {{$status->name_status}}
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$order->created_at->format('H:i:s'.' - '.'d/m/Y')}}</td>
                                        <td>
                                            <a href="{{ route('wp-admin.order.show',$order->id) }}">
                                                <button class="btn btn-space btn-outline-warning btn-space">
                                                    <span class="icon mdi mdi-eye"></span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
    
@endsection