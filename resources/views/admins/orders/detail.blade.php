@extends('layouts.admins')
@section('title')
    ADMIN | {{$order->order_code}}
@endsection
@section('css')
    <style>
        .no-data {
            padding: 50px;
        }
        .no-data span {
            color:#08427C;
            font-size: 100px;
        }
        .no-data p {
            font-size: 20px;
            color: gray;
        }
        #img_AV {
            margin: 0px 20px;
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 50%;
        }
        #img_AVM {
            width: 30px;
            height: 30px;
            object-fit: contain;
            border-radius: 50%;
        }
        .success {
            max-width: 150px;
            margin: auto;
            border: 1px solid #198754;
            background: #D1E7DD;
            color: #198754;
            border-radius: 10px;
        }
        .info {
            max-width: 150px;
            margin: auto;
            border: 1px solid #0D6EFD;
            background: #CFE2FF;
            color: #0D6EFD;
            border-radius: 10px;
        }
        .primary {
            max-width: 150px;
            margin: auto;
            border: 1px solid #0DCAF0;
            background: #CFF4FC;
            color: #0DCAF0;
            border-radius: 10px;
        }
        .warning {
            max-width: 150px;
            margin: auto;
            border: 1px solid #FFC107;
            background: #FFF3CD;
            color: #FFC107;
            border-radius: 10px;
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
                        <li class="breadcrumb-item active">Hóa đơn - {{$order->order_code}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4 p-3">
                @if (session('success'))
                    <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close"
                                aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{ session('success') }}</div>
                    </div>
                @elseif (session('warning'))
                    <div id="warningAlert" class="alert alert-warning alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close"
                                aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{ session('warning') }}</div>
                    </div>
                @endif
                @error('name')
                    <div id="warningAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close"
                                aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{ $message }}</div>
                    </div>
                @enderror
            </div>
        </div>
        <div class="main-content container-fluid" id="main-content">
            <div class="user-profile">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="py-3">
                            <button id="backButton" class="btn btn-sm    btn-secondary">
                                Quay lại
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="user-info-list card">
                            <div class="card-header card-header-divider d-flex justify-content-between">Thông tin người nhận 
                                    @if ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Chờ xử lý")
                                        <button class="btn btn-space btn-warning m-0" data-toggle="modal" data-target="#md-footer-update" type="button">Sửa</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang xử lý")
                                        <button class="btn btn-space btn-warning m-0" data-toggle="modal" data-target="#md-footer-update" type="button">Sửa</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang đóng gói")
                                        <button class="btn btn-space btn-warning m-0" data-toggle="modal" data-target="#md-footer-update" type="button">Sửa</button>
                                    @endif
                            </div>
                            <div class="card-body">
                                <table class="no-border no-strip skills">
                                    <tbody class="no-border-x no-border-y">
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-account-circle"></span></td>
                                            <td class="item">Tài khoản<span class="icon s7-portfolio"></span></td>
                                            <td>
                                                @if ($order->users_id)
                                                    <a class="link" href="{{ route('wp-admin.user.show',$order->users_id) }}">{{$order->users->name}}</a>
                                                @else
                                                    Chưa đăng nhập
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-account"></span></td>
                                            <td class="item">Tên người nhận<span class="icon s7-portfolio"></span></td>
                                            <td>{{$order->recipient_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                                            <td class="item">Số điện thoại<span class="icon s7-phone"></span></td>
                                            <td>{{$order->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-pin"></span></td>
                                            <td class="item">Địa chỉ giao<span class="icon s7-global"></span></td>
                                            <td>{{$order->city}} - {{$order->district}} - {{$order->commune}} - {{$order->location_description}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="card">
                        <div class="card-header d-flex justify-content-between item-center">
                            <div>
                                Trạng thái
                            </div>
                            <div class="btn_status">
                                <button class="btn btn-space btn-outline-success btn-sm m-0 @if($order->status_orders->count() == 1)nomal @endif" data-toggle="modal" data-target="#md-back-status" type="button"><span class="icon mdi mdi-arrow-left"></span> Quay lại trạng thái trước</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="user-timeline user-timeline-compact">
                                @foreach ($order->status_orders as $status)
                                    <li class="@if($status->where('orders_id', '=', $order->id)->max('id') == $status->id) latest @endif">
                                        <div class="user-timeline-date">
                                            @if ($status->users_id)
                                                @if ($status->users->image)
                                                    <a title="{{ $status->users->name }}" href="{{ route('wp-admin.member.show',$status->users->id) }}"><img id="img_AV" src="{{ Storage::url($status->users->image) }}" alt=""></a>
                                                @else
                                                    <a title="{{ $status->users->name }}" href="{{ route('wp-admin.member.show',$status->users->id) }}"><img id="img_AV" src="{{ asset('assets/admins/img/avatar.png') }}" alt=""></a>
                                                @endif
                                            @endif
                                            {{ $status->created_at->format('H:i:s'.' - '.'d/m/Y') }}
                                        </div>
                                        @if ($status->name_status == "Giao hàng thất bại" || $status->name_status == "Thanh toán thất bại")
                                            <div class="user-timeline-title text-danger">{{ $status->name_status }}</div>
                                        @elseif ($status->name_status == "Hoàn hàng" || $status->name_status == "Xác nhận hoàn")
                                            <div class="user-timeline-title text-warning">{{ $status->name_status }}</div>
                                        @else
                                            <div class="user-timeline-title">{{ $status->name_status }}</div>
                                        @endif
                                        <div class="user-timeline-description">{{ $status->note }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-table">
                            <div class="card-body p-3 d-flex justify-content-between">
                                <div>
                                    @if ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Chờ xử lý")
                                        <button class="btn m-0 btn-space btn-outline-success" data-toggle="modal" data-target="#md-footer-XNDH" type="button">Xác nhận đơn hàng</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang xử lý")
                                        <button class="btn m-0 btn-space btn-outline-success" data-toggle="modal" data-target="#md-footer-DGHD" type="button">Đóng gói đơn hàng</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang đóng gói")
                                        <button class="btn m-0 btn-space btn-outline-success" data-toggle="modal" data-target="#md-footer-DGH" type="button">Đang giao hàng</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang giao hàng")
                                        <button class="btn m-0 btn-space btn-outline-success" data-toggle="modal" data-target="#md-footer-GHTT" type="button">Giao hàng thành công</button>
                                        <button class="btn m-0 btn-space btn-outline-danger" data-toggle="modal" data-target="#md-footer-GHTB" type="button">Giao hàng thất bại</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Giao hàng thành công")
                                        <button class="btn m-0 btn-space btn-outline-success" data-toggle="modal" data-target="#md-footer-HT" type="button">Hoàn thành</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Hoàn thành")
                                        <button class="btn m-0 btn-space btn-warning" data-toggle="modal" data-target="#md-footer-HH" type="button">Hoàn hàng</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Hoàn hàng")
                                        <button class="btn m-0 btn-space btn-outline-success" data-toggle="modal" data-target="#md-footer-HT" type="button">Hoàn thành</button>
                                    @endif

                                    @if ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Chờ xử lý")
                                        <button class="btn m-0 btn-space btn-danger" data-toggle="modal" data-target="#md-footer-danger" type="button">Hủy đơn</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang xử lý")
                                        <button class="btn m-0 btn-space btn-danger" data-toggle="modal" data-target="#md-footer-danger" type="button">Hủy đơn</button>
                                    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang đóng gói")
                                        <button class="btn m-0 btn-space btn-danger" data-toggle="modal" data-target="#md-footer-danger" type="button">Hủy đơn</button>
                                    @endif
                                </div>
                                <div>
                                    <button class="btn m-0 btn-space btn-warning" data-toggle="modal" data-target="#md-fullWidth" type="button">Lịch sử</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-table">
                        <div class="card-header d-flex justify-content-between">Lịch sử thanh toán 
                            @if ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Hoàn thành")
                                <button class="btn btn-space btn-warning m-0" data-toggle="modal" data-target="#md-payment" type="button">Xác nhận thanh toán</button>
                            @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Giao hàng thành công")
                                <button class="btn btn-space btn-warning m-0" data-toggle="modal" data-target="#md-payment" type="button">Xác nhận thanh toán</button>
                            @endif
                        </div>
                          <div class="card-body">
                            @if (count($order->payment) !== 0)
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Số tiền</th>
                                        <th>Loại giao dịch</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Ghi chú</th>
                                        <th>Nhân viên xác nhận</th>
                                        <th>Ngày</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->payment as $key => $payment)
                                            <tr>
                                                <td>{{ $key +1 }}</td>
                                                <td>{{ number_format($payment->amount,0,'','.') }}₫</td>
                                                <td>
                                                    <div class="@if($payment->trading == 'Thanh toán') success @else info @endif">
                                                        {{ $payment->trading }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="@if($payment->payment_method == 'Tiền mặt') primary @else warning @endif">
                                                        {{ $payment->payment_method }}
                                                    </div>
                                                </td>
                                                <td>{{$payment->note}}</td>
                                                <td>
                                                    @if ($payment->user->image)
                                                        <div class="d-flex" style="justify-content: center;">
                                                            <img id="img_AV" src="{{ Storage::url($payment->users->image) }}" alt="{{$payment->user->name}}">
                                                            <h5>{{ $payment->user->name }}</h5>
                                                        </div>
                                                    @else
                                                        <div class="d-flex" style="justify-content: center;">
                                                            <img id="img_AV" src="{{ asset('assets/admins/img/avatar.png') }}" alt="{{$payment->user->name}}">
                                                            <h5>{{ $payment->user->name }}</h5>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $payment->created_at->format('H:i:s'.' - '.'d/m/Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    <div class="no-data">
                                        <span class="mdi mdi-folder-outline icon"></span>
                                        <p>No data</p>
                                    </div>
                                </div>
                            @endif
                            
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-table">
                            <div class="card-header d-flex justify-content-between">Danh sách sản phẩm 
                                @if ($order->order_type != "Đơn online")
                                    <button class="btn btn-warning">Thêm sản phẩm</button>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="product-item">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($order->product_lists as $product)
                                                <tr class="product-item">
                                                    <td style="width: 150px;height: 150px;" class="pic-item">
                                                        <img width="150px" height="150px" style="object-fit: cover;" src="{{ Storage::url($product->attribute->url_image[0]->url) }}" alt="">
                                                    </td>
                                                    <td class="w-50">
                                                        <div>
                                                            <h3><strong>{{$product->product_name}}</strong></h3>
                                                            <p><span>Màu: {{ $product->size_name }}</span> | <span>Size: {{ $product->color_name }}</span></p>
                                                        </div>
                                                    </td>
                                                    <td class="w-25">
                                                        <div class="input-group w-50 m-auto">
                                                            <button class="btn w-25 btn-secondary"><span class="icon mdi mdi-minus"></span></button>
                                                            <div class="form-control form-control-xs text-center" style="background: rgb(233, 233, 233);border: none;margin: 0px 2px;">{{$product->quanlity}}</div>
                                                            <button class="btn w-25 btn-secondary"><span class="icon mdi mdi-plus"></span></button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($order->order_type != "Đơn online")
                                                            <div style="text-align: end;">
                                                                <button class="btn btn-sm">Xóa</button>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="user-info-list card">
                            <div class="card-body d-flex justify-content-between">
                                <div class="left-content w-25" style="line-height: 24px;font-size: 16px">
                                    <div class="d-flex justify-content-between">
                                        <span>Phiếu giảm giá </span>
                                        <span>
                                            <strong>
                                                @if ($order->vouchers_id)
                                                    {{$order->voucher->name}}
                                                @else
                                                    Không áp dụng
                                                @endif
                                            </strong>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Giảm giá từ cửa hàng</span>
                                        <span><strong>{{ number_format($order->discount_value,0,'','.') }}đ</strong></span>
                                    </div>
                                </div>
                                <div class="right-content w-25" style="line-height: 24px;font-size: 16px">
                                    <div class="d-flex justify-content-between">
                                        <span>Tổng tiền hàng:</span>
                                        <span><strong>{{ number_format($order->total,0,'','.') }}đ</strong></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Giảm giá:</span>
                                        <span><strong>{{ number_format($order->coupons_value,0,'','.') }}đ</strong></span>
                                    </div>
                                    <div class="d-flex justify-content-between" style="align-items: center;">
                                        <span>Phí vận chuyển:</span>
                                        <input class="form-control form-control-xs w-50" type="number" value="{{$order->ship}}">
                                    </div>
                                    <div class="d-flex justify-content-between" style="font-size: 18px;border-top:1px solid gray;margin: 4px 0px;">
                                        <span style="font-weight: 500;">Tổng tiền</span>
                                        <span style="color: #FF4633;"><strong>{{ number_format($order->coin,0,'','.') }}đ</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Chờ xử lý")
        <div class="modal fade custom-width" id="md-footer-XNDH" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formDXN" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-success">Xác nhận đơn hàng</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ chuyển trang thái đơn hàng thành "Đang xử lý".</p>
                            <input type="hidden" name="name_status" value="Đang xử lý">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-success btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang xử lý")
        <div class="modal fade custom-width" id="md-footer-DGHD" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formDXN" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-success">Đang đóng gói</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ chuyển trang thái đơn hàng thành "Đang đóng gói".</p>
                            <input type="hidden" name="name_status" value="Đang đóng gói">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-success btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang đóng gói")
        <div class="modal fade custom-width" id="md-footer-DGH" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formDXN" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-success">Đang giao hàng</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ chuyển trang thái đơn hàng thành "Đang giao hàng".</p>
                            <input type="hidden" name="name_status" value="Đang giao hàng">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-success btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Đang giao hàng")
        <div class="modal fade custom-width" id="md-footer-GHTT" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formDXN" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-success">Giao hàng thành công</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ xác nhận rằng đơn hàng này đã "Giao hàng thành công".</p>
                            <input type="hidden" name="name_status" value="Giao hàng thành công">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-success btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade custom-width" id="md-footer-GHTB" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formTB" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-danger">Giao hàng thất bại</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ xác nhận rằng đơn hàng này đã "Giao hàng thất bại".</p>
                            <input type="hidden" name="name_status" value="Giao hàng thất bại">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-danger btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Giao hàng thành công")
        <div class="modal fade custom-width" id="md-footer-HT" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formDXN" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-success">Hoàn thành</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ xác nhận rằng đơn hàng này đã "Hoàn thành".</p>
                            <input type="hidden" name="name_status" value="Hoàn thành">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-success btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Hoàn thành")
        <div class="modal fade custom-width" id="md-footer-HH" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formDXN" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-success">Hoàn hàng</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ xác nhận rằng đơn hàng này đã "Hoàn hàng".</p>
                            <input type="hidden" name="name_status" value="Hoàn hàng">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-success btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    @elseif ($order->status_orders->where('id', '=', $order->status_orders->max('id'))->first()->name_status == "Hoàn hàng")
        <div class="modal fade custom-width" id="md-footer-HT" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form id="formDXN" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center">
                            <h3>Thông báo!</h3>
                            <div class="text-success">Hoàn thành</div>
                            <div class="errors d-none errorNameStatus text-danger"></div>
                            <p>Bạn sẽ xác nhận rằng đơn hàng này đã "Hoàn thành".</p>
                            <input type="hidden" name="name_status" value="Hoàn thành">
                            <input type="hidden" name="btn_DXN" value="true">
                            <div class="form-group">
                                <label class="form-label" for="note">Ghi chú</label>
                                <div class="errors d-none errorNote text-danger"></div>
                                <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                            </div>
                            <div class="mt-8">
                                <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                <button class="btn btn-success btn-space modal-close" id="btn_DXN" type="submit">Xác nhận</button>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    {{-- Xác nhận thanh toán --}}
    <div class="modal fade" id="md-payment" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <form id="formPayment" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Thanh toán</h4>
                        <input type="hidden" name="payment" value="true">
                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3" style="font-size: 16px"><strong>Tổng tiền cần thanh toán:</strong> <span style="color: #FF4633;"><strong>{{ number_format($order->coin,0,'','.') }}đ</strong></span></div>
                        <div class="form-group">
                            <label class="form-label" for="amount">Số tiền khách đưa</label> <span class="errors text-danger errorAmount d-none"></span>
                            <input class="form-control form-control-sm" type="text" name="amount" id="amount" placeholder="+000đ">
                        </div>
                        <div class="form-group row p-0">
                            <label class="col-12 col-form-label text-sm-left py-0">Loại giao dịch</label>
                            <div class="col form-check mt-1">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="trading" value="Thanh toán" checked=""><span class="custom-control-label">Thanh toán</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="trading" value="Hoàn tiền"><span class="custom-control-label">Hoàn tiền</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row p-0">
                            <label class="col-12 col-form-label text-sm-left py-0">Phương thức thanh toán</label>
                            <div class="col form-check mt-1">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="payment_method" value="Tiền mặt" checked=""><span class="custom-control-label">Tiền mặt</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="payment_method" value="Chuyển khoản"><span class="custom-control-label">Chuyển khoản</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="GhiChu">Ghi chú</label>
                            <textarea class="form-control form-control-sm" name="note" id="GhiChu" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <button class="btn btn-success" type="submit">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Quay lại trạng thái --}}
    @foreach ($order->status_orders as $key => $status)
        @if ($key == $order->status_orders->count('id')-2)
            <div class="modal fade custom-width" id="md-back-status" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <form id="formBack" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="modal-content">
                            <div class="modal-header">
                            <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                            </div>
                            <div class="modal-body">
                            <div class="text-center">
                                <h3>Thông báo!</h3>
                                <div>Quay lại trạng thái <span class="text-danger">{{ $status->name_status }}</span>.</div>
                                <div class="errors d-none errorNameStatus text-danger"></div>
                                <p>Bạn có chắc muốn quay lại trạng thái: "{{ $status->name_status }}"!</p>
                                <input type="hidden" name="name_status" value="{{ $status->name_status }}">
                                <input type="hidden" name="btn_DXN" value="true">
                                <div class="form-group">
                                    <label class="form-label" for="note">Ghi chú</label>
                                    <div class="errors d-none errorNote text-danger"></div>
                                    <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                                </div>
                                <div class="mt-8">
                                    <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                                    <button class="btn btn-danger btn-space modal-close" id="btn_DXN" type="submit">Xác nhận quay lại</button>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @endforeach

    {{-- Hủy đơn --}}
    <div class="modal fade custom-width" id="md-footer-danger" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <form id="formHUY" action="{{ route('wp-admin.order.update',$order->id) }}" method="post">
                @csrf
                @method("PUT")
                <div class="modal-content">
                    <div class="modal-header">
                    <button class="close modal-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                    </div>
                    <div class="modal-body">
                    <div class="text-center">
                        <h3>Thông báo!</h3>
                        <div class="text-danger">Đã hủy</div>
                        <div class="errors d-none errorNameStatus text-danger"></div>
                        <p>Bạn sẽ xác nhận rằng đơn hàng này đã "Đã hủy".</p>
                        <input type="hidden" name="name_status" value="Đã hủy">
                        <input type="hidden" name="btn_DXN" value="true">
                        <div class="form-group">
                            <label class="form-label" for="note">Ghi chú</label>
                            <div class="errors d-none errorNote text-danger"></div>
                            <textarea name="note" id="note" class="form-control form-control-sm w-75 m-auto" rows="5"></textarea>
                        </div>
                        <div class="mt-8">
                            <button class="btn btn-secondary btn-space modal-close" type="button" data-dismiss="modal">Hủy</button>
                            <button class="btn btn-danger btn-space modal-close" id="btn_DXN" type="submit">Xác nhận hủy</button>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </form>
        </div>
    </div>

    {{-- Lịch sử --}}
    <div class="modal fade" id="md-fullWidth" tabindex="-1" role="dialog">
        <div class="modal-dialog full-width">
          <div class="modal-content">
            <div class="modal-header">
                <h4>Chi tiết thay đổi</h4>
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="text-content">
                    <div class="col-12 col-lg-12 p-0">
                        <div class="card card-table">
                        <div class="card-body table-responsive">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th>Trạng thái</th>
                                    <th style="width:20%;">Ngày thay đổi</th>
                                    <th style="width:40%;">Ghi chú</th>
                                    <th style="width:20%;">Người thay đổi</th>
                                </tr>
                            </thead>
                            <tbody class="no-border-x">
                                @foreach ($order->status_orders as $status)
                                    <tr>
                                        <td>{{$status->name_status}}</td>
                                        <td>{{ $status->created_at->format('H:i:s'.' - '.'d/m/Y') }}</td>
                                        <td>{{$status->note}}</td>
                                        <td>
                                            <div>
                                                <div>
                                                    @if ($status->users_id)
                                                        @if ($status->users->image)
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <a title="{{ $status->users->name }}" href="{{ route('wp-admin.member.show',$status->users->id) }}"><img id="img_AVM" src="{{ Storage::url($status->users->image) }}" alt=""></a>
                                                                </div>
                                                                <div class="col">
                                                                    <span><strong>{{ $status->users->name }}</strong></span>
                                                                    <p class="m-0"><span>Chức vụ:</span> {{ $status->users->role }}</p>
                                                                </div>
                                                            </div>

                                                        @else
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <a title="{{ $status->users->name }}" href="{{ route('wp-admin.member.show',$status->users->id) }}"><img id="img_AVM" src="{{ asset('assets/admins/img/avatar.png') }}" alt=""></a>
                                                                </div>
                                                                <div class="col">
                                                                    <span><strong>{{ $status->users->name }}</strong></span>
                                                                    <p class="m-0"><span>Chức vụ:</span> {{ $status->users->role }}</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
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
            <div class="modal-footer">
                <button class="btn btn-space btn-secondary" type="button" data-dismiss="modal">Quay lại</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Cập nhật đơn --}}
    <div class="modal fade" id="md-footer-update" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('wp-admin.order.update',$order->id) }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Thông tin người nhận(mới)</h4>
                        <input type="hidden" name="updateOrder" value="true">
                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient_name">Tên người nhận</label>
                            <input class="form-control form-control-sm" type="text" name="recipient_name" id="recipient_name" placeholder="Họ & tên">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại</label>
                            <input class="form-control form-control-sm" type="tel" name="phone_number" id="phone_number" placeholder="+(00)000-000-000">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label" for="city">Tỉnh</label>
                                <select class="form-control form-control-sm" name="city" id="city">
                                    <option value="" selected>Chọn tỉnh thành</option>           
                                </select>
                            </div>
                            <div class="form-group col">
                                <label class="form-label" for="district">Huyện</label>
                                <select class="form-control form-control-sm" name="district" id="district">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label class="form-label" for="ward">Xã</label>
                                <select class="form-control form-control-sm" name="commune" id="ward">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location_description">Địa chỉ chi tiết</label>
                            <textarea class="form-control form-control-sm" name="location_description" id="location_description" rows="5"></textarea>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    {{--  --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{asset('assets/admins/lib/jquery.niftymodals/js/jquery.niftymodals.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
        $.fn.niftyModal('setDefaults',{
            overlaySelector: '.modal-overlay',
            contentSelector: '.modal-content',
            closeSelector: '.modal-close',
            classAddAfterOpen: 'modal-show'
        });
        
        $(document).ready(function(){
            //-initialize the javascript
            App.init();
        });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script>
            const host = "https://provinces.open-api.vn/api/";
            var callAPI = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data, "city");
                    });
            }
            callAPI('https://provinces.open-api.vn/api/?depth=1');
            var callApiDistrict = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.districts, "district");
                    });
            }
            var callApiWard = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.wards, "ward");
                    });
            }
            
            var renderData = (array, select) => {
                let row = ' <option disable value="">Chọn</option>';
                array.forEach(element => {
                    row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
                });
                document.querySelector("#" + select).innerHTML = row
            }
            
            $("#city").change(() => {
                callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
                printResult();
            });
            $("#district").change(() => {
                callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
                printResult();
            });
            $("#ward").change(() => {
                printResult();
            })
            
            var printResult = () => {
                if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                    $("#ward").find(':selected').data('id') != "") {
                    let result = $("#city option:selected").text() +
                        " | " + $("#district option:selected").text() + " | " +
                        $("#ward option:selected").text();
                    $("#result").text(result)
                }
            
            }
        </script>
    {{--  --}}
    <script>
        const backButton = document.getElementById('backButton');
        backButton.addEventListener('click', () => {
            history.back();
        });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.nomal', function () {
                swal("Thông báo!", "Chưa có thay đổi nào tại đây!", "warning");
                return false;
            });

            $(document).on("submit",'#formDXN', function (e) {
                e.preventDefault();
                let formUrl = $(this).attr('action');
                let dataForm = new FormData($('#formDXN')[0]);
                $.ajax({
                    type: "POST",
                    url: formUrl,
                    data: dataForm,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('.errorNote').text(res.errors.note)
                            $('.errorNameStatus').text(res.errors.name_status)
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('.d-none');
                            location.reload();
                        }
                    }
                });
            });
            $(document).on("submit",'#formTB', function (e) {
                e.preventDefault();
                let formUrl = $(this).attr('action');
                let dataForm = new FormData($('#formTB')[0]);
                $.ajax({
                    type: "POST",
                    url: formUrl,
                    data: dataForm,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('.errorNote').text(res.errors.note)
                            $('.errorNameStatus').text(res.errors.name_status)
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('.d-none');
                            location.reload();
                        }
                    }
                });
            });
            $(document).on("submit",'#formHUY', function (e) {
                e.preventDefault();
                let formUrl = $(this).attr('action');
                let dataForm = new FormData($('#formHUY')[0]);
                $.ajax({
                    type: "POST",
                    url: formUrl,
                    data: dataForm,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('.errorNote').text(res.errors.note)
                            $('.errorNameStatus').text(res.errors.name_status)
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('.d-none');
                            location.reload();
                        }
                    }
                });
            });
            $(document).on("submit",'#formBack', function (e) {
                e.preventDefault();
                let formUrl = $(this).attr('action');
                let dataForm = new FormData($('#formBack')[0]);
                $.ajax({
                    type: "POST",
                    url: formUrl,
                    data: dataForm,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('.errorNote').text(res.errors.note)
                            $('.errorNameStatus').text(res.errors.name_status)
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('.d-none');
                            location.reload();
                        }
                    }
                });
            });

            // Ajax payment
            $(document).on('submit','#formPayment', function (e) {
                e.preventDefault();
                let formUrl = $(this).attr('action');
                let dataForm = new FormData($('#formPayment')[0]);
                $.ajax({
                    type: "POST",
                    url: formUrl,
                    data: dataForm,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('.errorAmount').text(res.errors.amount)
                        } else {
                            $('.errors').html('');
                            $('.errors').addClass('.d-none');
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection
