@extends('layouts.client')
@section('title')
    Thanh toán
@endsection
@section('css')
   <style>
        .icon-item {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: auto;
            box-shadow: 0px 0px 100px 50px white;
        }

   </style>
@endsection
@section('content')
    <section class="checkout-section spad">
        <div class="container">
            <div class="alert">
                <div class="icon">
                    <div class="text-center icon-item" style="width: 100px;height: 100px;margin: auto;">
                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            viewBox="0 0 50 50" xml:space="preserve">
                        <circle style="fill:#25AE88;" cx="25" cy="25" r="25"/>
                        <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points="
                            38,15 22,33 12,25 "/>
                        </svg>
                    </div>
                    <div class="tex-item text-center mt-3">
                        <p class="">Cảm ơn !</p>
                        <h3><strong>BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG</strong></h3>
                        <p>Đơn hàng sẽ được giao đến tay bạn trong thời gian sớm nhất!</p>
                        <p><strong>Mã đơn: </strong>{{$order->order_code}}</p>
                        @foreach ($order->status_orders as $status)
                            <p><strong>Trạng thái:</strong><span>{{$status->name_status}}</span> - Thời gian: {{$status->created_at}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <a href="/">
                        <button class="btn primary-btn checkout-btn w-25">Trang chủ</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
   
@endsection
@section('js')

@endsection