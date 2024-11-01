@extends('layouts.client')
@section('title')
    Thanh toán
@endsection
@section('css')
    <style>
        .radio-item input{
            width: unset !important;
            height: unset !important;
            margin: 0px;
            padding: 0px;
        }
        .radio-item {
            margin-bottom: 4px;
        }
        .checkout-form select,textarea{
            border-radius:0px !important; 
            border: 2px solid #ebebeb !important;
            padding-left: 15px !important;
        }
        .link:hover {
            color: darkblue;
            text-decoration: underline;
        }
    </style>
@endsection
@section('content')
    <section class="checkout-section spad">
        <div class="container">
            <form action="{{ route('order.store') }}" class="checkout-form" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        @if (!Auth::user())
                            <div class="checkout-content">
                                <a href="{{ route('login') }}" class="content-btn">Đăng nhập ngay</a>
                            </div>
                        @endif
                        <h4>Thông tin người nhận</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name">Họ & tên<span>*</span></label><span id="name_check" class="text-danger"></span>
                                <input type="text" name="recipient_name" id="name" placeholder="Tên người nhận" value="@if(Auth::user()) {{$location->user_name}} @endif">
                            </div>
                            <div class="col-lg-12">
                                <label for="phone_number">Số điện thoại<span>*</span></label><span id="phone_number_check" class="text-danger"></span>
                                <input type="tel" name="phone_number" id="phone_number" placeholder="Số điện thoại người nhận" value="@if(Auth::user()) {{$location->phone_number}} @endif">
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="ci">Tỉnh <span class="text-danger">*</span></label><span id="city_check" class="text-danger"></span>
                                        <select style="border-radius:0px;" class="form-control m-0" name="city" id="ci">
                                            <option value="{{ $location->city_province }}" disable>{{ $location->city_province }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label class="form-label" for="dis">Huyện <span class="text-danger">*</span></label><span id="district_check" class="text-danger"></span>
                                        <select style="border-radius:0px;" class="form-control m-0" name="district" id="dis">
                                            <option value="{{ $location->district }}" disable>{{ $location->district }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label class="form-label" for="wa">Xã <span class="text-danger">*</span></label><span id="ward_check" class="text-danger"></span>
                                        <select style="border-radius:0px;" class="form-control m-0" name="commune" id="wa">
                                            <option value="{{ $location->commune }}" disable>{{ $location->commune }}</option>
                                        </select>
                                    </div>
                                </div>
                                <p style="margin-bottom: 25px !important;"><a class="link" href="#">Chọn</a> địa chỉ khác.</p>
                            </div>
                            <div class="col-lg-12">
                                <label for="location_description">Địa chỉ chi tiết<span>*</span></label><span id="location_description_check" class="text-danger"></span>
                                <textarea class="form-control" name="location_description" id="location_description" cols="30" rows="5">@if(Auth::user()) {{$location->location_detail}} @endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" name="voucher" placeholder="Nhập mã giảm giá">
                        </div>
                        <div class="place-order">
                            <h4>Hóa đơn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Tổng</span></li>
                                    @if (Auth::user())
                                        @foreach (Auth::user()->cart as $cart)
                                            
                                        @endforeach
                                            <li class="fw-normal">
                                                {{$cart->attributes->product->name}} | Size: {{$cart->attributes->sizes->name}} | Màu: {{$cart->attributes->colors->name}} | x {{$cart->quanlity}} 
                                                <span>{{number_format($cart->quanlity*$cart->attributes->price,0,'','.')}}₫</span>
                                            </li>
                                    @else
                                        @foreach ($carts as $cart)
                                            @foreach ($attributes as $attribute)
                                                @if ($cart['attribute_id'] === $attribute->id)
                                                    <li class="fw-normal">
                                                        {{$attribute->product->name}} | Size: {{$attribute->sizes->name}} | Màu: {{$attribute->colors->name}} | x {{$cart['quantity']}} 
                                                        <span>{{number_format($cart['quantity']*$attribute->price,0,'','.')}}₫</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                    <li class="fw-normal">Tổng giá <span>{{ number_format($subTotal,0,'','.') }}₫</span></li>
                                    <li class="fw-normal">Mã giảm giá <span>{{ number_format($voucher,0,'','.') }}₫</span></li>
                                    <li class="total-price">Tổng đơn <span>{{ number_format($total,0,'','.') }}₫</span></li>
                                </ul>
                                <div class="radio-pc mb-3">
                                    <span id="order_check" class="text-danger"></span>
                                    <div class="radio-item">
                                        <input type="radio" checked name="payment_method" value="COD" id="check_COD">
                                        <label for="check_COD">
                                            Thanh toán khi nhận hàng
                                        </label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="payment_method" value="PAY" id="check_PAY">
                                        <label for="check_PAY">
                                            Thanh toán online
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" id="btn_submit" class="site-btn place-btn">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('js')
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
            let row = '<option disable value="">Chọn</option>';
            array.forEach(element => {

                row += `<option data-id="${element.code}" value="${element.name}">
                            ${element.name}
                        </option>`
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
{{-- Validate --}}
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btn_submit', function () {
                const name = $('#name').val();
                const phone_number = $('#phone_number').val();
                const city = $('#city').val();
                const district = $('#district').val();
                const ward = $('#ward').val();
                const location_description = $('#location_description').val();
                let check = true;
                if(name == "") {
                    document.querySelector('#name_check').innerText = "Chưa điền !";
                }
                else if (name.length > 255) {
                    document.querySelector('#name_check').innerText = "Quá dài !";
                }
                else {
                    document.querySelector('#name_check').innerText = "";
                    check = false
                }
                if(phone_number == "") {
                    document.querySelector('#phone_number_check').innerText = "Chưa điền !";
                }
                else if(phone_number.length > 11) {
                    document.querySelector('#phone_number_check').innerText = "Quá dài !";
                }
                else if(isNaN(phone_number)) {
                    document.querySelector('#phone_number_check').innerText = "Không hợp lệ !";
                }
                else {
                    document.querySelector('#phone_number_check').innerText = "";
                    check = false;
                }
                if(city == "") {
                    document.querySelector('#city_check').innerText = "Chưa chọn !";
                }
                else {
                    document.querySelector('#city_check').innerText = "";
                    check = false;
                }
                if(district == "") {
                    document.querySelector('#district_check').innerText = "Chưa chọn !";
                }
                else {
                    document.querySelector('#district_check').innerText = "";
                    check = false;
                }
                if(ward == "") {
                    document.querySelector('#ward_check').innerText = "Chưa chọn !";
                }
                else {
                    document.querySelector('#ward_check').innerText = "";
                    check = false;
                }
                if(location_description == "") {
                    document.querySelector('#location_description_check').innerText = "Chưa điền !";
                }
                else{
                    document.querySelector('#location_description_check').innerText = "";
                }
                if(!document.querySelector('#check_COD').checked && !document.querySelector('#check_PAY').checked) {
                    document.querySelector('#order_check').innerText = "Chưa chọn !";
                }
                else {
                    document.querySelector('#order_check').innerText = "";
                    check = false;
                }
                if(!check) {
                    return true;
                }
                return false;
            });
        });
    </script>
@endsection