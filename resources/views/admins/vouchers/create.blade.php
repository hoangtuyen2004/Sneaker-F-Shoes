@extends('layouts.admins')
@section('title')
    Mã giảm giá
@endsection
@section('css')
    <style>
        .titl-vv {
            font-size: 20px;
            font-weight: 400;
        }
        .nav-tabs-classic>li.nav-item a.nav-link.active{
            background: rgb(242, 242, 242);
        }
        .title-data {
            font-size: 14px;
            padding: 8px 12px;
            margin: 0;
            line-height: 1.4;
        }
        .contentD {
           
        }
    </style>
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
                    <li class="breadcrumb-item active">Thêm mới</li>
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
                <div class="col-lg-12 p-0">
                    <div class="card-header" style="border-bottom: 1px solid silver;">
                        <div class="titl-vv">Thêm mới mã giảm giá.</div>
                    </div>
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="input-form mb-3">
                                    <input class="form-control form-control-sm" type="text" name="name" id="name" placeholder="Tên mã giảm giá">
                                </div>
                                <div class="input-form mb-3">
                                    <input style="font-size: 20px !important;height: 40px !important;margin-bottom:8px;" class="form-control" type="text" name="voucher_code" id="voucher_code" placeholder="Voucher code">
                                    <button id="btnRandom" class="btn btn-outline-secondary btn-space" style="width: 120px;" type="button">Ngẫu nhiên</button>
                                </div>
                                <div class="input-form mb-3">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Mô tả mã giảm giá"></textarea>
                                </div>
                            </div>
                            <div class="col-2 p-0">
                                <div class="card">
                                    <div class="card-header m-0 p-0">
                                        <div class="card-title m-0" style="height: 37px !important;display: flex;align-items: center;padding: 8px 12px;border: 1px solid silver;font-size: 16px;font-weight: 500;">
                                            Đăng mã
                                        </div>
                                    </div>
                                    <div class="card-body p-0" style="border-bottom:1px solid silver;border-left:1px solid silver;border-right:1px solid silver; ">
                                        <div style="padding: 6px 10px 8px;">
                                            <div style="font-size: 16px;color: gray;padding-right: 3px;">
                                                <i class="icon mdi mdi-my-location"></i>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10">
                                <div style="background: #FFF;font-weight: 500;display: flex;align-items: center;border: 1px solid silver;border-bottom: 0px;">
                                    <div class="title-data">Dữ liệu phiếu giảm giá</div>
                                </div>
                                <div class="tab-container tab-left" style="border: 1px solid silver;background: #ffffff !important;">
                                    <ul class="nav nav-tabs nav-tabs-classic" id="nav-bb" role="tablist" style="width: 200px;">
                                        <li style="border-bottom:1px solid silver;" class="nav-item"><a class="nav-link active" href="#icon1" data-toggle="tab" role="tab">Tổng quan</a></li>
                                        <li style="border-bottom:1px solid silver;" class="nav-item"><a class="nav-link" href="#icon2" data-toggle="tab" role="tab">Hạn chế sử dụng</a></li>
                                        <li style="border-bottom:1px solid silver;" class="nav-item"><a class="nav-link" href="#icon3" data-toggle="tab" role="tab">Thời hạn sử dụng</a></li>
                                    </ul>
                                    <div class="tab-content m-0" style="height: 100%;border-left: 1px solid silver;border-radius: 0px;min-height: 200px;">
                                        <div class="tab-pane active" id="icon1" role="tabpanel">
                                            <div class="row mb-3" style="display: flex;align-items: baseline;">
                                                <label class="col-2" for="value">Loại giảm giá</label>
                                                <select class="form-control form-control-xs col-5" name="value" id="value" style="height: 30px !important;">
                                                    <option value="Cố định">Giảm theo giá cố định.</option>
                                                    <option value="Phần trăm">Giảm theo phần trăm đơn.</option>
                                                </select>
                                                <div class="col-5 text-secondary"><i title="Giảm giá theo phần trăm hoặc giá trị cố định." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate"></span></div>
                                            </div>
                                            <div class="row mb-3" style="display: flex;align-items: baseline;">
                                                <label class="col-2" for="">Số lượng</label>
                                                <input class="form-control form-control-xs col-5" type="number" value="0" name="quantity" id="quantity">
                                                <div class="col-5 text-secondary"><i title="Số lượng mã giảm giá có thể sử dụng." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate" id="vliQuali"></span></div>
                                            </div>
                                            {{-- Giảm cố định --}}
                                            <div style="display: none;" id="mucGiam">
                                                <div class="row mb-3" style="display: flex;align-items: baseline;">{{------}}
                                                    <label class="col-2" for="mucGiamIP">Mức giảm</label>
                                                    <div class="col-5 p-0" style="position: relative;display: flex;align-items: center;justify-content: flex-end;">
                                                        <input class="form-control form-control-xs" style="padding-right: 24px;" type="number" name="decreased_value" value="0" id="mucGiamIP">
                                                        <span class="price-item" style="position: absolute;margin: 6px 9px;">₫</span>
                                                    </div>
                                                    <div class="col-5 text-secondary"><i title="Mức giảm giá của voucher." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate" id="valimucGiamIP"></span></div>
                                                </div>
                                            </div>
                                            {{-- Giảm phần trăm --}}
                                            <div style="display: none;" id="toiDa">
                                                <div class="row mb-3" style="display: flex;align-items: baseline;" id="">{{------}}
                                                    <label class="col-2" for="toiDaIP_1">Phần trăm giảm</label>
                                                    <div class="col-5 p-0" style="position: relative;display: flex;align-items: center;justify-content: flex-end;">
                                                        <input class="form-control form-control-xs" style="padding-right: 24px;" type="number" name="decreased_value" value="0" id="toiDaIP_1">
                                                        <span class="price-item" style="position: absolute;margin: 6px 9px;">%</span>
                                                    </div>
                                                    <div class="col-5 text-secondary"><i title="Mức giảm giá tối đa của voucher." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate" id="valitoiDaIP_1"></span></div>
                                                </div>
                                                <div class="row mb-3" style="display: flex;align-items: baseline;">{{------}}
                                                    <label class="col-2" for="toiDaIP_2">Mức giảm tối đa</label>
                                                    <div class="col-5 p-0" style="position: relative;display: flex;align-items: center;justify-content: flex-end;">
                                                        <input class="form-control form-control-xs" style="padding-right: 24px;" type="number" name="max_value" value="0" id="toiDaIP_2">
                                                        <span class="price-item" style="position: absolute;margin: 6px 9px;">₫</span>
                                                    </div>
                                                    <div class="col-5 text-secondary"><i title="Mức giảm giá tối đa của voucher." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate" id="valitoiDaIP_2"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="icon2" role="tabpanel">
                                            <div class="row mb-3" style="display: flex;align-items: baseline;">
                                                <label class="col-2" for="condition">Điều kiện tối thiểu</label>
                                                <div class="col-5 p-0" style="position: relative;display: flex;align-items: center;justify-content: flex-end;">
                                                    <input class="form-control form-control-xs" style="padding-right: 24px;" type="number" name="condition" value="0" id="condition">
                                                    <span class="price-item" style="position: absolute;margin: 6px 9px;">₫</span>
                                                </div>
                                                <div class="col-5 text-secondary"><i title="Áp dụng cho các đơn hàng có giá trị thanh toán tối thiểu." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate" id="valicondition"></span></div>
                                            </div>
                                            <div class="row mb-3" style="display: flex;align-items: baseline;">
                                                <label class="col-2" for="">Chú ý:</label>
                                                <div class="col-5 p-0" style="position: relative;display: flex;align-items: center;">
                                                    <div>Chỉ áp dụng cho các đơn có giá trị <span style="color: #21618c;font-weight: 400;">thanh toán</span> lớn hơn hoặc bằng điều kiện.</div>
                                                </div>
                                                <div class="col-5 text-secondary"><span class="text-danger validate" ></span></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="icon3" role="tabpanel">
                                            <div class="row mb-3" style="display: flex;align-items: baseline;">
                                                <label class="col-2" for="">Ngày bắt đầu</label>
                                                <input class="form-control form-control-xs col-5" type="datetime-local" name="date_start" id="date_start">
                                                <div class="col-5 text-secondary"><i title="Ngày bắt đầu hoạt động của mã." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate"></span></div>
                                            </div>
                                            <div class="row mb-3" style="display: flex;align-items: baseline;">
                                                <label class="col-2" for="">Ngày kết thúc</label>
                                                <input class="form-control form-control-xs col-5" type="datetime-local" name="date_end" id="date_end">
                                                <div class="col-5 text-secondary"><i title="Ngày kết thúc hoạt động của mã." class="icon mdi mdi-help-outline mr-3"></i> <span class="text-danger validate"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
    <script src="{{ asset('assets/admins/lib/parsley/parsley.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            $('form').parsley();
        });
    </script>
    <script>
        setTimeout(() => {
            document.querySelector('.validate').innerText = "";
        }, 3000);
        $(document).ready(function () {
            $(document).on('change', '#value', function () {
                loadCp();
            });
            $(document).on('change', '#quantity', function () {
                loadPr();
            });
            $(document).on('change', '#mucGiamIP', function () {
                loadMg();
            });
            $(document).on('change', '#toiDaIP_1', function () {
                loadPt();
            });
            $(document).on('change', '#toiDaIP_2', function () {
                loadPm();
            });
            $(document).on('change', '#condition', function () {
                loadDk();
            });
            $(document).on('click', '#btnRandom', function () {
                $('#voucher_code').val(generateRandomPassword(10));
            });
            $(document).on('change', '#date_start', function () {
                loadSr();
            });
            $(document).on('change', '#date_end', function () {
                loadEd();
            });
        });
    </script>
    <script>
        loadCp();
        function loadCp() {
            const value = document.querySelector('#value');
            const mucGiam = document.querySelector('#mucGiam');
            const toiDa = document.querySelector('#toiDa');
            console.log(value.value);
            if(value.value == "Cố định") {
                document.querySelector('#mucGiamIP').disabled = false;
                document.querySelector('#toiDaIP_1').disabled = true;
                document.querySelector('#toiDaIP_2').disabled = true;
                mucGiam.style.display = "block";
                toiDa.style.display = "none";
            }
            else {
                document.querySelector('#toiDaIP_1').disabled = false;
                document.querySelector('#toiDaIP_2').disabled = false;
                document.querySelector('#mucGiamIP').disabled = true;
                toiDa.style.display = "block";
                mucGiam.style.display = "none";
                
            }  
        }
        function loadMg () {
            const mucGiamIP = document.querySelector('#mucGiamIP');
            if(mucGiamIP.value < 0) {
                document.querySelector('#valimucGiamIP').innerText = "Mức giảm không hợp lệ!";
                mucGiamIP.value = 0;
                setTimeout(() => {
                    document.querySelector('#valimucGiamIP').innerText = "";
                }, 3000);
            }
        }
        function loadPt () {
            const toiDaIP_1 = document.querySelector('#toiDaIP_1');
            if(toiDaIP_1.value < 0) {
                document.querySelector('#valitoiDaIP_1').innerText = "Phần trăm không thể âm!";
                toiDaIP_1.value = 0;
                setTimeout(() => {
                    document.querySelector('#valitoiDaIP_1').innerText = "";
                }, 3000);
            }
            else if(toiDaIP_1.value > 100) {
                document.querySelector('#valitoiDaIP_1').innerText = "Phần trăm đã tối đa!";
                toiDaIP_1.value = 100;
                setTimeout(() => {
                    document.querySelector('#valitoiDaIP_1').innerText = "";
                }, 3000);
            }
        }
        function loadPm () {
            const toiDaIP_2 = document.querySelector('#toiDaIP_2');
            if(toiDaIP_2.value < 0) {
                document.querySelector('#valitoiDaIP_2').innerText = "Mức giảm không hợp lệ!";
                toiDaIP_2.value = 0;
                setTimeout(() => {
                    document.querySelector('#valitoiDaIP_2').innerText = "";
                }, 3000);
            }
        }
        function loadPr() {
            const quantity = document.querySelector('#quantity');
            if(quantity.value < 0) {
                document.querySelector('#vliQuali').innerText = "Số lượng không hợp lệ!";
                quantity.value = 0;
                setTimeout(() => {
                    document.querySelector('#vliQuali').innerText = "";
                }, 3000);
            }
            else {
                document.querySelector('#vliQuali').innerText = "";
            }
        }
        function loadDk() {
            const condition = document.querySelector('#condition');
            if(condition.value < 0) {
                document.querySelector('#valicondition').innerText = "Điều kiện không hợp lệ!";
                condition.value = 0;
                setTimeout(() => {
                    document.querySelector('#valicondition').innerText = "";
                }, 3000);
            }
            else {
                document.querySelector('#valicondition').innerText = "";
            }
        }
        function loadSr() {
            const date_start = document.querySelector('#date_start');
            console.log(date_start.value);
            
        }
        function loadEd() {
            const date_end = document.querySelector('#date_end');
            console.log(date_end.value);
            
        }
    </script>
    <script>
        function getRandomChar(chars) {
            return chars.charAt(Math.floor(Math.random() * chars.length));
        }
        function generateRandomString(length, chars) {
            let result = '';
            for (let i = 0; i < length; i++) {
                result += getRandomChar(chars);
            }
            return result;
        }
        function generateRandomPassword(length) {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            return generateRandomString(length, chars);
        }
    </script>
@endsection