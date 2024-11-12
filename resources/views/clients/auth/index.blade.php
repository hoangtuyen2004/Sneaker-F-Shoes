@extends('layouts.client')
@section('title')
    Tài khoản | F-Shop
@endsection
@section('css')
    {{-- CSS --}}
        <style>
            .auth-item {
                padding: 15px 0px;
                display: flex;
                border-bottom: 1px solid #ebebeb 
            }
            .pic {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .tx-auth {
                padding: 0px 0px 0px 15px
            }
            .pc-auth {
                align-items: center;
                display: flex;
                justify-content: center;
                text-align: center;
                width: 48px;
                height: 48px;
                border: 1px solid silver;
                color: silver;
                border-radius: 50%;
                background: #f1f1f2;  
            }
            .link {
                color: #9B9B9B;
            }
            .link:hover {
                color: #9B9B9B;
            }
            .link:focus {
                color: #9B9B9B;
            }
            .action-item {
                margin-top: 30px;
            }
            .item {
                list-style: none;
            }
            .item li a{
                display: flex;
                margin-bottom: 15px;
            }
            .icon {
                width: 20px;
                height: 20px;
                margin-right: 10px;
                text-align: center;
            }
            .text {
                width: 100%;
                margin-right: 10px;
                font-size: 14px;
            }
            .type {
                color: rgba(0,0,0,.87);
            }
            .type:hover {
                color: #ee4d2d;
            }
            .type:focus {
                color: #ee4d2d;
            }
            .type span {
                background: #EE4D2D;
                color: #FFFFFF;
                font-size: 10px;
                padding: 2px 4px;
                border-radius: 10px 10px 10px 0px;
            }
            .nav {
                display: block;
            }
            .tab-main {
                padding: 0 1.875rem .625rem;
                background: #F5F5F5;    
            }
            .tab-title {
                padding: 1.125rem 0;
                border-bottom: .0625rem solid #e6e6e6;
            }
            .text-tt {
                color: #333;
                font-size: 1.125rem;
                font-weight: 500;
                line-height: 1.5rem;
                margin: 0;
                text-transform: capitalize;
            }
            .text-detail {
                color: #555;
                font-size: .875rem;
                line-height: 1.0625rem;
                margin-top: .1875rem;
            }
            .form-profile {
                padding-top: 1.875rem;
                display: flex;
            }
            .form-left {
                width: 70%;
                padding-right: 3.125rem;
            }
            .td-left {
                color: rgba(85, 85, 85, .8);
                min-width: 30%;
                overflow: hidden;
                padding-bottom: 30px;
                text-align: right;
                white-space: nowrap;
                width: 30%;
            }
            .td-right {
                box-sizing: border-box;
                padding-bottom: 30px;
                padding-left: 20px;
                width: 100%;
            }
            .input input {
                align-items: center;
                border: 1px solid rgba(0, 0, 0, .14);
                border-radius: 2px;
                box-shadow: inset 0 2px 0 rgba(0, 0, 0, .02);
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                display: flex;
                height: 40px;
                overflow: hidden;
                width: 100%;
            }
            .tr {
                display: flex;
                align-items: baseline;
                width: 100%;
            }
            .radio input {
                width: 18px;
                height: 18px;

            }
            input[type="radio"] {
                opacity: 0;
                position: absolute;
                width: 0;
                height: 0;
            }
            label {
                display: inline-block;
                padding: 10px;
                cursor: pointer;
            }
            label::before {
                content: "";
                display: inline-block;
                width: 20px;
                height: 20px;
                border: 2px solid #ccc;
                border-radius: 50%;
                margin-right: 10px;
                vertical-align: middle;
            }
            input[type="radio"]:checked + label::before {
                border: 2px solid #ee4d2d;
                background: blanchedalmond;
            }
        </style>
        <style>
            .select {
                display: flex;
                gap: 11px;
            }
            .form-right {
                border-left: .0625rem solid #efefef;
                overflow: hidden;
                width: 17.5rem;
                justify-content: center;
                display: flex;
            }
            .image-profile {
                flex-direction: column;
                align-items: center;
                display: flex;
            }
            .img-preview {
                height: 6.25rem;
                margin: 1.25rem 0;
                position: relative;
                width: 6.25rem;
                justify-content: center;
                align-items: center;
                display: flex;
            }
            .img-preview {
                height: 6.25rem;
                margin: 1.25rem 0;
                position: relative;
                width: 6.25rem;
            }
            .img_file {
                display: none;
            }
            .img {
                background: #efefef;
                height: 6.25rem;
                overflow: hidden;
                position: relative;
                width: 6.25rem;
                font-size: 24px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: gray;
                border-radius: 50%;
                border: 1px solid gray;
            }
            .chose_IMG {
                background: #fff;
                border: 1px solid rgba(0, 0, 0, .09);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .03);
                color: #555;
                outline: 0;
                overflow: visible;
                position: relative;
                height: 40px;
                max-width: 220px;
                min-width: 70px;
                padding: 0 20px;
            }
            .IMGL {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .order-link {
                color: black;
            }
            .order-link:hover {
                color: #ee4d2d;
            }
            .nav-pills .nav-link.active {
                color: #ee4d2d;
                background-color: #F5F5F5;
                border-radius: 0px;
                border-bottom: 2px solid #ee4d2d;
            }
            .li-link {
                border-radius: 0px;
                text-align: center;
            }
            .nav-pills .nav-link {
                border-bottom: 2px solid #E8E8E8;
                border-radius: 0px;
            }
            .input-search {
                align-items: center;
                background: #ffffff;
                border-radius: 2px;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
                color: #212121;
                display: flex;
                margin: 12px 0;
                padding: 12px 0;
            }
        </style>
        <style>
            #input-search {
                background-color: inherit;
                border: 0;
                flex: 1;
                font-size: 14px;
                line-height: 16px;
                outline: none;
            }
            .input-search i {
                margin: 0 15px;
                stroke: #bbb;
            }
            .order-item {
                border-radius: .125rem;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
                margin: 12px 0;
            }
            .order {
                background: #fff;
                padding: 12px 24px;
                border-bottom: 1px solid #e7e7e7; 
            }
            .order:first {
                padding-top: 24px;
            }
            .order-title {
                font-size: 14px;
                font-weight: 600;
                max-width: 200px;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .item-header {
                border-bottom: 1px solid silver;
                padding: 0 0 12px;
                display: flex;
                justify-content: space-between;
            }
            .item-main .item-product {
                display: flex;
                word-wrap: break-word;
                align-items: center;
                color: rgba(0, 0, 0, .87);
                flex-wrap: nowrap;
                padding: 12px 0 0;
            }
            .product-it {
                align-items: flex-start;
                flex: 1;
                flex-wrap: nowrap;
                padding: 0 12px 0 0;
                display: flex;
                word-wrap: break-word;
            }
            .product-it img {
                background: #e1e1e1;
                border: 1px solid #e1e1e1;
                flex-shrink: 0;
                height: 80px;
                width: 80px;
            }
            .price {
                text-align: center;
            }
            .product-text {
                align-items: flex-start;
                display: flex;
                flex: 1;
                flex-direction: column;
                min-width: 0;
                padding: 0 0 0 12px;
                word-wrap: break-word;
            }
            .price-unline {
                color: #a5a5a5;
                margin: 0 4px 0 0;
                opacity: .26;
                overflow: hidden;
                text-decoration-line: line-through;
                text-overflow: ellipsis;
                font-size: 14px;
                line-height: 16px;
                vertical-align: middle;
            }
            .order-price {
                background: #ffffff;
                padding: 24px 24px 12px;
            }
            .price-text {
                align-items: center;
                display: flex;
                justify-content: flex-end;
            }
            .total {
                color: #ee4d2d;
                font-size: 24px;
                line-height: 30px;
            }
            .status {
                color: #26aa99;
                line-height: 24px;
                text-align: right;
                text-transform: uppercase;
                white-space: nowrap;
            }
            .attribute {
                font-size: 12px;
                color: #757575;
            }
            .order-footer {
                background: #ffffff;
                display: flex;
                flex-wrap: nowrap;
                justify-content: space-between;
                padding: 12px 24px 24px;
            }
            .note {
                align-items: flex-start;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                gap: 4px;
                justify-content: center;
                max-width: 400px;
                min-width: 300px;
                word-wrap: break-word;
                color: rgba(0, 0, 0, .54);
                font-size: 12px;
                line-height: 16px;
                text-align: left;
            }
            .btn-by {
                height: 40px;
                min-width: 150px;
                outline: none;
                outline: 0;
                overflow: hidden;
                padding: 8px 20px;
                text-overflow: ellipsis;
                text-transform: capitalize;
                background-color: #ee4d2d;
                font-size: 14px;
                color: #fff;
                border: none;
            }
            .btn-deltail {
                height: 40px;
                min-width: 150px;
                outline: none;
                outline: 0;
                overflow: hidden;
                padding: 8px 20px;
                text-overflow: ellipsis;
                text-transform: capitalize;
                background-color: #fff;
                font-size: 14px;
                font-weight: 400;
                border: 0.1px solid silver;
            }
            .btn-cancel {
                height: 40px;
                min-width: 150px;
                outline: none;
                outline: 0;
                overflow: hidden;
                padding: 8px 20px;
                text-overflow: ellipsis;
                text-transform: capitalize;
                background-color: #DC3545;
                font-size: 14px;
                color: #fff;
                border: none;
            }
        </style>
        <style>
            .product-text a {
                color: black;
            }
            .product-text a:hover {
                color: black;
            }
            .product-text a:focus {
                color: black;
            }
        </style>
        <style>
            .AlOrL {
                background: #F5F5F5;
                padding: 0 1.875rem .625rem;
                background: #F5F5F5;
            }
            .header-order {
                align-items: center;
                display: flex;
                font-size: 14px;
                justify-content: space-between;
                line-height: 16px;
                padding: 20px 24px;
                border-bottom: 1px solid silver;
            }
            .header-order a {
                background: none;
                border: 0;
                color: rgba(0, 0, 0, .54);
                display: flex;
                margin-right: 16px;
                padding: 0;
                display: flex;
                align-items: center;
                gap: 4px;
            }
            .left-content {
                display: flex;
                text-align: right;
                gap: 10px;
            }
            .left-content .lAL{
                border: 1px solid black;
            }
            .left-content .order-status {
                color: #ee4d2d;
                text-transform: uppercase;
            }
            .OrDer_I {
                padding: 40px 24px;
            }
            .OrDer_I .leNd {
                box-sizing: border-box;
                display: flex;
                flex-wrap: nowrap;
                position: relative;
                gap: 20px;
            }
            .status_OdK {
                cursor: default;
                text-align: center;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                width: 140px;
                z-index: 1;
            }
            .status_OdK .icon {
                align-items: center;
                background-color: #fff;
                border: 4px solid #26aa99;
                border-radius: 50%;
                box-sizing: border-box;
                color: #26aa99;
                display: flex;
                flex-direction: column;
                font-size: 1.875rem;
                height: 60px;
                justify-content: center;
                margin: auto;
                position: relative;
                transition: background-color .3s cubic-bezier(.4,0,.2,1) .7s, border-color .3s cubic-bezier(.4,0,.2,1) .7s, color .3s cubic-bezier(.4,0,.2,1) .7s;
                width: 60px;
            }
            .OrDer_I .status_OdK {
                position: relative;
            }
            .OrDer_I .status_OdK:not(:first-child):before {
                content: "";
                position: absolute;
                top: 25%;
                left: -60px;
                width: 100px;
                height: 3px;
                background-color: #26aa99;
            }
            .name-status {
                color: rgba(0, 0, 0, .8);
                font-size: .875rem;
                line-height: 1.25rem;
                margin: 1.25rem 0 .25rem;
                text-transform: capitalize;
            }
            .date-status {
                color: rgba(0, 0, 0, .26);
                font-size: .75rem;
                height: .875rem;
            }
            .itemBTN {
                align-items: center;
                background-color: #ffffff;
                border-top: 1px dotted rgba(0, 0, 0, .09);
                box-sizing: border-box;
                display: flex;
                flex-wrap: nowrap;
                justify-content: end;
                padding: 12px 24px;

            }
            .btnOnTp .btn-BuyAgain {
                border-radius: 2px;
                min-height: 40px;
                min-width: 150px;
                padding: 8px 20px;
                text-overflow: ellipsis;
                text-transform: capitalize;
                outline: none;
                overflow: hidden;
                width: 220px;
                background-color: #ee4d2d;
                color: #fff;
                border: none;
            }
            .btnOnTp .btn-Cancel {
                border-radius: 2px;
                min-height: 40px;
                min-width: 150px;
                padding: 8px 20px;
                text-overflow: ellipsis;
                text-transform: capitalize;
                outline: none;
                overflow: hidden;
                width: 220px;
                background-color: #DC3545;
                color: #fff;
                border: none;
            }
            .LoaCtON {
                padding: 20px 24px 24px;
            }
            .header-location {
                align-items: flex-end;
                display: flex;
                justify-content: space-between;
                padding: 0 0 12px;
            }
            .TiXeL {
                color: rgba(0, 0, 0, .8);
                font-size: 20px;
                line-height: 24px;
                text-transform: capitalize;
            }
            .TiXeR {
                font-size: 12px;
                text-align: right;
                word-wrap: break-word;
                color: rgba(0, 0, 0, .54);
            }
            .TWLNg9 {
                padding: 3px 0;
            }
            .RO2wsz {
                background-image: repeating-linear-gradient(45deg, #6fa6d6, #6fa6d6 33px, transparent 0, transparent 41px, #f18d9b 0, #f18d9b 74px, transparent 0, transparent 82px);
                background-position-x: -1.875rem;
                background-size: 7.25rem .1875rem;
                height: .1875rem;
                width: 100%;
            }
            .LccIT {
                display: flex;
            }
            .LocTL {
                flex: 1;
                line-height: 22px;
                max-width: 100%;
                padding: 10px 24px 0 0;
            }
            .LocTR {
                border-left: 1px solid rgba(0, 0, 0, .09);
                padding: 4px 0 0 12px;
                width: 480px;
            }
            .nameLCT {
                color: rgba(0, 0, 0, .8);
                margin: 0 0 7px;
                max-width: 100%;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .TextLCT {
                color: rgba(0, 0, 0, .54);
                font-size: 12px;
                white-space: pre-line;
            }
            .ProDList {
                background-color: #fafafa;
                padding: 12px 20px;
            }
            .ProDuItem {
                display: flex;
                word-wrap: break-word;
                align-items: center;
                color: rgba(0, 0, 0, .87);
                flex-wrap: nowrap;
                padding: 12px 0 0;
            }
            .PrCt {
                align-items: flex-start;
                flex: 1;
                flex-wrap: nowrap;
                padding: 0 12px 0 0;
                display: flex;
                word-wrap: break-word;
                color: rgba(0, 0, 0, .87);
            }
            .pic-Img {
                background: #e1e1e1;
                border: 1px solid #e1e1e1;
                flex-shrink: 0;
                height: 80px;
                width: 80px;
                object-fit: contain;
            }
            .TexPro {
                align-items: flex-start;
                display: flex;
                flex: 1;
                flex-direction: column;
                min-width: 0;
                padding: 0 0 0 12px;
                word-wrap: break-word;
            }
            .namePro {
                display: -webkit-box;
                color: black;
                overflow: hidden;
                text-overflow: ellipsis;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;
                font-size: 16px;
                line-height: 22px;
                margin: 0 0 5px;
                max-height: 48px;
            }
            .namePro a {
                color: black;
            }
            .namePro a:hover {
                color: black;
            }
            .namePro a:focus {
                color: black;
            }
            .quaPro {
                margin: 0 0 5px;
            }
            .PrPr {
                text-align: right;
            }
            .Pr1 {
                color: #757575;
                margin: 0 4px 0 0;
                overflow: hidden;
                text-decoration-line: line-through;
                text-overflow: ellipsis;
                font-size: 12px;
                line-height: 16px;
            }
            .Pr2 {
                color: #ee4d2d;
                font-size: 14px;
                line-height: 16px;
                vertical-align: middle;
            }
            .sTaet {
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 0 0 0 12px;
                text-align: center;
            }
            .tt {
                color: rgba(0, 0, 0, .54);
                font-size: 12px;
                line-height: 14px;
                margin: 0 0 4px;
                text-transform: capitalize;
            }
            .point {
                align-items: center;
                box-sizing: border-box;
                display: flex;
                justify-content: center;
                color: #FFBA1E;
            }
            .ToTOde {
                background-color: #fafafa;
                border-top: 1px solid rgba(0, 0, 0, .09);
            }
            .TloY {
                align-items: center;
                border-bottom: 1px dotted rgba(0, 0, 0, .09);
                display: flex;
                justify-content: flex-end;
                padding: 0 24px;
                text-align: right;
            }
            .TLeft {
                color: rgba(0, 0, 0, .54);
                font-size: 12px;
                padding: 13px 10px;
            }
            .TRight {
                border-left: 1px dotted rgba(0, 0, 0, .09);
                justify-content: flex-end;
                padding: 13px 0 13px 10px;
                width: 240px;
                word-wrap: break-word;
                color: rgba(0, 0, 0, .8);
                font-size: 12px;
            }
        </style>
        <style>
            .LTitem {
                align-items: center;
                background-color: #fff;
                border-bottom: 1px solid rgba(0, 0, 0, .09);
                border-radius: .125rem;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
                clear: both;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                overflow: hidden;
                padding: 12px;
                -webkit-text-decoration: none;
                text-decoration: none;
            }
            .coint-icon {
                background-size: cover;
                border: 1px solid #f5f5f5;
                flex-basis: 5rem;
                float: left;
                height: 5rem;
                min-width: 5rem;
                font-size: 50px;
                text-align: center;
                color: #F4C555;
            }
            .text-coint {
                flex-grow: 1;
                padding: 0 .625rem;
                width: 6.25rem;
            }
            .teNamt {
                color: rgba(0, 0, 0, .8);
                font-size: 16px;
                line-height: 20px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                word-break: break-all;
            }
            .teXnAmm {
                align-items: center;
                display: flex;
                margin-bottom: 4px;
            }
            .texDate {
                color: rgba(0, 0, 0, .54);
                font-size: 14px;
                line-height: 16px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                word-break: break-all;
            }
            .intCoin {
                color: rgba(0, 0, 0, .87);
                float: right;
                font-size: 1.25rem;
                font-weight: 500;
                min-width: 5rem;
                padding: .625rem;
                text-align: right;
                color: #f6a700;
            }
            .consuming {
                height: 600px;
                text-align: center;
                width: 100%;
            }
            .connsss {
                align-items: center;
                border-radius: .125rem;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
                display: flex;
                flex-direction: column;
                height: 100%;
                justify-content: center;
                overflow: hidden;
                width: 100%;
            }
            .imgg {
                background-image: url('{{ asset('assets/clients/img/no-data.png') }}');
                background-position: 50%;
                background-repeat: no-repeat;
                background-size: contain;
                height: 100px;
                width: 100px;
            }
            .connsss h2 {
                color: rgba(0, 0, 0, .8);
                font-size: 18px;
                font-weight: 400;
                line-height: 1.4;
                margin: 20px 0 0;
            }
        </style>
        <style>
            .avataL {
                height: 100%;
                width: 100%;
                object-fit: cover;
                border-radius: 50%;
            }
        </style>
@endsection
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Tài khoản</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-auth" style="padding: 1.25rem 0 3.125rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="cart">
                        <div class="auth-item">
                            <div class="pic">
                                <div class="pc-auth">
                                    @if (Auth::user()->image)
                                        <img class="avataL" src="{{ Storage::url(Auth::user()->image) }}" alt="">
                                    @else
                                        <i class="fa-regular fa-user"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="tx-auth">
                                <h7 class="name-user"><strong>{{ Auth::user()->name }}</strong></h7>
                                <div>
                                    <a class="link" href="#">
                                        <i class="fa-solid fa-pencil"></i> Cập nhật mật khẩu
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="action-item">
                            <ul class="nav nav-pills mb-3 item" id="pills-tab" role="tablist">
                                <li class="">
                                    <a class="active type" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                        <div class="icon" style="color: #2761BB;"><i class="fa-solid fa-user"></i></div> <div class="text">Tài khoản</div>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="type" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                        <div class="icon" style="color: #7199CB;"><i class="fa-solid fa-file-invoice-dollar"></i></div> <div class="text">Đơn mua</div>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="type" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                        <div class="icon" style="color: #F4C555;"><i class="fa-regular fa-money-bill-1"></i></div> <div class="text">Thanh toán</div>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="type" id="pills-vouchers-tab" data-toggle="pill" href="#pills-vouchers" role="tab" aria-controls="pills-vouchers" aria-selected="false">
                                        <div class="icon" style="color: #F25E3E;"><i class="fa-solid fa-ticket"></i></div> <div class="text">Phiếu giảm giá</div>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="type" id="pills-bells-tab" data-toggle="pill" href="#pills-bells" role="tab" aria-controls="pills-bells" aria-selected="false">
                                        <div class="icon" style="color: #F2856E;"><i class="fa-regular fa-bell"></i></div> <div class="text">Thông báo <span>New</span></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 p-0">
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="tab-main">
                                <div class="tab-title">
                                    <h1 class="text-tt">Hồ sơ của tôi</h1>
                                    <div class="text-detail">Quản lý thông tin hồ sơ - Bảo mật - tài khoản</div>
                                </div>
                                <div class="form-profile">
                                    <div class="form-left">
                                        <form id="data_Update" action="{{ route('wp-client.my-account.update',Auth::user()->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <table class="table-form w-100">
                                                <tr class="tr">
                                                    <td class="td-left">Email đăng nhận</td>
                                                    <td class="td-right">
                                                        <div class="form-group">
                                                            <div class="input">
                                                                <input class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td class="td-left">Tên người dùng</td>
                                                    <td class="td-right">
                                                        <div class="form-group">
                                                            <div class="input">
                                                                <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td class="td-left">Số điện thoại</td>
                                                    <td class="td-right">
                                                        <div class="form-group">
                                                            <div class="input">
                                                                <input class="form-control" type="tel" name="phone_number" id="phone_number" value="{{ Auth::user()->phone_number }}">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td class="td-left">Giới tính</td>
                                                    <td class="td-right">
                                                        <div class="form-group">
                                                            <div class="radio">
                                                                <input type="radio" name="gender" id="Nam" @if(Auth::user()->gender == "Nam") checked @endif value="Nam">
                                                                <label for="Nam">Nam</label>
                                                                <input type="radio" name="gender" id="Nữ" @if(Auth::user()->gender == "Nữ") checked @endif value="Nữ">
                                                                <label for="Nữ">Nữ</label>
                                                                <input type="radio" name="gender" id="Khác" @if(Auth::user()->gender == "Khác") checked @endif value="Khác">
                                                                <label for="Khác">Khác</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td class="td-left">Ngày sinh</td>
                                                    <td class="td-right">
                                                        <div class="form-group m-0">
                                                            <input type="date" class="form-control" style="border-radius: 2px;" name="birthday" id="birthday" value="{{ Auth::user()->birthday }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td class="td-left" style="width: 26px;">
                                                        <input onchange="previewImage()" class="img_file" id="fileInput" type="file" name="img_file" accept=".jpg,.jpeg,.png">
                                                    </td>
                                                    <td class="td-right">
                                                        <div class="select-button" style="padding-bottom: 30px;">
                                                            <button type="submit" class="primary-btn checkout-btn w-50" style="border: none;">Lưu</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="form-right">
                                        <div class="image-profile">
                                            <div class="img-preview">
                                                <div class="img">
                                                    <i class="fa-regular fa-user"></i>
                                                    <img class="IMGL" style="display: none;" id="imagePreview" src="" alt="Ảnh xem trước">
                                                </div>
                                            </div>
                                            <button onclick="triggerClick()" type="button" class="chose_IMG">Chọn Ảnh</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="tab-main">
                                <div class="tab-header" style="padding: 15px 0px">
                                    <ul style="display: grid;grid-template-columns: 1fr 1fr 1fr 1fr 1fr" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="li-link">
                                            <a class="nav-link order-link active" id="tab-1" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Tất cả</a>
                                        </li>
                                        <li class="li-link">
                                            <a class="nav-link order-link" id="tab-2" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Hoàn thành</a>
                                        </li>
                                        <li class="li-link">
                                            <a class="nav-link order-link" id="tab-3" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Đã hủy</a>
                                        </li>
                                        <li class="li-link">
                                            <a class="nav-link order-link" id="tab-5" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false">Đang giao</a>
                                        </li>
                                        <li class="li-link">
                                            <a class="nav-link order-link" id="tab-6" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false">Hoàn hàng</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="search" name="search" id="input-search" placeholder="Tìm kiếm hóa đơn">
                                </div>
                                <div class="tab-content" id="pills-tabM">
                                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="tab-1">
                                        @if (Auth::user()->orders()->count()==0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->orders()->orderBy('id', 'desc')->get() as $order)
                                                <div class="order-item">
                                                    <div>
                                                        <div class="order">
                                                            <div class="item-header">
                                                                <div class="order-title">{{$order->order_code}}</div>
                                                                <div class="status">{{$order->status_orders->max()->name_status}}</div>
                                                            </div>
                                                            <div class="item-main">
                                                                @foreach ($order->product_lists as $product)
                                                                    <form action="">
                                                                        <div class="item-product">
                                                                            <div class="product-it">
                                                                                <img src="{{ Storage::url($product->attribute->url_image[0]->url) }}" alt="" srcset="">
                                                                                <div class="product-text">
                                                                                    <div><a href="{{ route('shop-product.show',$product->attribute->product->id) }}">{{$product->product_name}}</a></div>
                                                                                    <div class="attribute">Phân loại: màu-{{$product->color_name}} | size-{{$product->size_name}}</div>
                                                                                    <div>x {{$product->quanlity}}</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="price">
                                                                                @if ($product->attribute->price !== $product->price)
                                                                                    <div>{{ number_format($product->price,0,'','.') }}₫</div>
                                                                                @else
                                                                                    <div>
                                                                                        <span class="price-unline">{{ number_format($product->attribute->price,0,'','.') }}₫</span> {{ number_format($product->price,0,'','.') }}₫
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="order-price">
                                                            <div class="price-text">
                                                                <div>Thành tiền: <span class="total">{{ number_format($order->coin,0,'','.') }}₫</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="order-footer">
                                                            <div class="note">{{$order->status_orders->max()->note}}</div>
                                                            <div class="btn-order" style="display: flex;gap: 4px;">

                                                                @if ($order->status_orders->max()->name_status == "Hoàn thành" || $order->status_orders->max()->name_status == "Đã hủy")
                                                                    <button class="btn-by">Mua lại</button>
                                                                @elseif ($order->status_orders->max()->name_status == "Chờ xử lý")
                                                                <form class="form-cancel" action="{{ route('order.update',$order->id) }}" method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button data-id="{{$order->id}}" class="btn-cancel">Hủy đơn</button>
                                                                </form>
                                                                @endif
                                                                <form class="form-detail" action="{{ route('order.show',$order->id) }}" method="GET">
                                                                    <button class="btn-deltail">Chi tiết đơn</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="tab-2">
                                        @if (Auth::user()->orders()->count()==0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->orders()->orderBy('id', 'desc')->get() as $order)
                                                @if ($order->status_orders->max()->name_status == "Hoàn thành")
                                                    <div class="order-item">
                                                        <div>
                                                            <div class="order">
                                                                <div class="item-header">
                                                                    <div class="order-title">{{$order->order_code}}</div>
                                                                    <div class="status">{{$order->status_orders->max()->name_status}}</div>
                                                                </div>
                                                                <div class="item-main">
                                                                    @foreach ($order->product_lists as $product)
                                                                        <form action="">
                                                                            <div class="item-product">
                                                                                <div class="product-it">
                                                                                    <img src="{{ Storage::url($product->attribute->url_image[0]->url) }}" alt="" srcset="">
                                                                                    <div class="product-text">
                                                                                        <div><a href="{{ route('shop-product.show',$product->attribute->product->id) }}">{{$product->product_name}}</a></div>
                                                                                        <div class="attribute">Phân loại: màu-{{$product->color_name}} | size-{{$product->size_name}}</div>
                                                                                        <div>x {{$product->quanlity}}</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    @if ($product->attribute->price !== $product->price)
                                                                                        <div>{{ number_format($product->price,0,'','.') }}₫</div>
                                                                                    @else
                                                                                        <div>
                                                                                            <span class="price-unline">{{ number_format($product->attribute->price,0,'','.') }}₫</span> {{ number_format($product->price,0,'','.') }}₫
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="order-price">
                                                                <div class="price-text">
                                                                    <div>Thành tiền: <span class="total">{{ number_format($order->coin,0,'','.') }}₫</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="order-footer">
                                                                <div class="note">{{$order->status_orders->max()->note}}</div>
                                                                <div class="btn-order" style="display: flex;gap: 4px;">

                                                                    @if ($order->status_orders->max()->name_status == "Hoàn thành" || $order->status_orders->max()->name_status == "Đã hủy")
                                                                        <button class="btn-by">Mua lại</button>
                                                                    @elseif ($order->status_orders->max()->name_status == "Chờ xử lý")
                                                                    <form class="form-cancel" action="{{ route('order.update',$order->id) }}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button data-id="{{$order->id}}" class="btn-cancel">Hủy đơn</button>
                                                                    </form>
                                                                    @endif
                                                                    <form class="form-detail" action="{{ route('order.show',$order->id) }}" method="GET">
                                                                        <button class="btn-deltail">Chi tiết đơn</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="tab-3">
                                        @if (Auth::user()->orders()->count()==0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->orders()->orderBy('id', 'desc')->get() as $order)
                                                @if ($order->status_orders->max()->name_status == "Đã hủy")
                                                    <div class="order-item">
                                                        <div>
                                                            <div class="order">
                                                                <div class="item-header">
                                                                    <div class="order-title">{{$order->order_code}}</div>
                                                                    <div class="status">{{$order->status_orders->max()->name_status}}</div>
                                                                </div>
                                                                <div class="item-main">
                                                                    @foreach ($order->product_lists as $product)
                                                                        <form action="">
                                                                            <div class="item-product">
                                                                                <div class="product-it">
                                                                                    <img src="{{ Storage::url($product->attribute->url_image[0]->url) }}" alt="" srcset="">
                                                                                    <div class="product-text">
                                                                                        <div><a href="{{ route('shop-product.show',$product->attribute->product->id) }}">{{$product->product_name}}</a></div>
                                                                                        <div class="attribute">Phân loại: màu-{{$product->color_name}} | size-{{$product->size_name}}</div>
                                                                                        <div>x {{$product->quanlity}}</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    @if ($product->attribute->price !== $product->price)
                                                                                        <div>{{ number_format($product->price,0,'','.') }}₫</div>
                                                                                    @else
                                                                                        <div>
                                                                                            <span class="price-unline">{{ number_format($product->attribute->price,0,'','.') }}₫</span> {{ number_format($product->price,0,'','.') }}₫
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="order-price">
                                                                <div class="price-text">
                                                                    <div>Thành tiền: <span class="total">{{ number_format($order->coin,0,'','.') }}₫</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="order-footer">
                                                                <div class="note">{{$order->status_orders->max()->note}}</div>
                                                                <div class="btn-order" style="display: flex;gap: 4px;">

                                                                    @if ($order->status_orders->max()->name_status == "Hoàn thành" || $order->status_orders->max()->name_status == "Đã hủy")
                                                                        <button class="btn-by">Mua lại</button>
                                                                    @elseif ($order->status_orders->max()->name_status == "Chờ xử lý")
                                                                    <form class="form-cancel" action="{{ route('order.update',$order->id) }}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button data-id="{{$order->id}}" class="btn-cancel">Hủy đơn</button>
                                                                    </form>
                                                                    @endif
                                                                    <form class="form-detail" action="{{ route('order.show',$order->id) }}" method="GET">
                                                                        <button class="btn-deltail">Chi tiết đơn</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="tab-5">
                                        @if (Auth::user()->orders()->count()==0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->orders()->orderBy('id', 'desc')->get() as $order)
                                                @if ($order->status_orders->max()->name_status == "Đang giao")
                                                    <div class="order-item">
                                                        <div>
                                                            <div class="order">
                                                                <div class="item-header">
                                                                    <div class="order-title">{{$order->order_code}}</div>
                                                                    <div class="status">{{$order->status_orders->max()->name_status}}</div>
                                                                </div>
                                                                <div class="item-main">
                                                                    @foreach ($order->product_lists as $product)
                                                                        <form action="">
                                                                            <div class="item-product">
                                                                                <div class="product-it">
                                                                                    <img src="{{ Storage::url($product->attribute->url_image[0]->url) }}" alt="" srcset="">
                                                                                    <div class="product-text">
                                                                                        <div><a href="{{ route('shop-product.show',$product->attribute->product->id) }}">{{$product->product_name}}</a></div>
                                                                                        <div class="attribute">Phân loại: màu-{{$product->color_name}} | size-{{$product->size_name}}</div>
                                                                                        <div>x {{$product->quanlity}}</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    @if ($product->attribute->price !== $product->price)
                                                                                        <div>{{ number_format($product->price,0,'','.') }}₫</div>
                                                                                    @else
                                                                                        <div>
                                                                                            <span class="price-unline">{{ number_format($product->attribute->price,0,'','.') }}₫</span> {{ number_format($product->price,0,'','.') }}₫
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="order-price">
                                                                <div class="price-text">
                                                                    <div>Thành tiền: <span class="total">{{ number_format($order->coin,0,'','.') }}₫</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="order-footer">
                                                                <div class="note">{{$order->status_orders->max()->note}}</div>
                                                                <div class="btn-order" style="display: flex;gap: 4px;">

                                                                    @if ($order->status_orders->max()->name_status == "Hoàn thành" || $order->status_orders->max()->name_status == "Đã hủy")
                                                                        <button class="btn-by">Mua lại</button>
                                                                    @elseif ($order->status_orders->max()->name_status == "Chờ xử lý")
                                                                    <form class="form-cancel" action="{{ route('order.update',$order->id) }}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button data-id="{{$order->id}}" class="btn-cancel">Hủy đơn</button>
                                                                    </form>
                                                                    @endif
                                                                    <form class="form-detail" action="{{ route('order.show',$order->id) }}" method="GET">
                                                                        <button class="btn-deltail">Chi tiết đơn</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="tab-6">
                                        @if (Auth::user()->orders()->count()==0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->orders()->orderBy('id', 'desc')->get() as $order)
                                                @if ($order->status_orders->max()->name_status == "Hoàn hàng")
                                                    <div class="order-item">
                                                        <div>
                                                            <div class="order">
                                                                <div class="item-header">
                                                                    <div class="order-title">{{$order->order_code}}</div>
                                                                    <div class="status">{{$order->status_orders->max()->name_status}}</div>
                                                                </div>
                                                                <div class="item-main">
                                                                    @foreach ($order->product_lists as $product)
                                                                        <form action="">
                                                                            <div class="item-product">
                                                                                <div class="product-it">
                                                                                    <img src="{{ Storage::url($product->attribute->url_image[0]->url) }}" alt="" srcset="">
                                                                                    <div class="product-text">
                                                                                        <div><a href="{{ route('shop-product.show',$product->attribute->product->id) }}">{{$product->product_name}}</a></div>
                                                                                        <div class="attribute">Phân loại: màu-{{$product->color_name}} | size-{{$product->size_name}}</div>
                                                                                        <div>x {{$product->quanlity}}</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    @if ($product->attribute->price !== $product->price)
                                                                                        <div>{{ number_format($product->price,0,'','.') }}₫</div>
                                                                                    @else
                                                                                        <div>
                                                                                            <span class="price-unline">{{ number_format($product->attribute->price,0,'','.') }}₫</span> {{ number_format($product->price,0,'','.') }}₫
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="order-price">
                                                                <div class="price-text">
                                                                    <div>Thành tiền: <span class="total">{{ number_format($order->coin,0,'','.') }}₫</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="order-footer">
                                                                <div class="note">{{$order->status_orders->max()->note}}</div>
                                                                <div class="btn-order" style="display: flex;gap: 4px;">

                                                                    @if ($order->status_orders->max()->name_status == "Hoàn thành" || $order->status_orders->max()->name_status == "Đã hủy")
                                                                        <button class="btn-by">Mua lại</button>
                                                                    @elseif ($order->status_orders->max()->name_status == "Chờ xử lý")
                                                                    <form class="form-cancel" action="{{ route('order.update',$order->id) }}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button data-id="{{$order->id}}" class="btn-cancel">Hủy đơn</button>
                                                                    </form>
                                                                    @endif
                                                                    <form class="form-detail" action="{{ route('order.show',$order->id) }}" method="GET">
                                                                        <button class="btn-deltail">Chi tiết đơn</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="tab-main">
                                <div style="padding-top: 15px">
                                    <h1 class="text-tt">Thanh toán</h1>
                                    <div class="text-detail">
                                        <ul style="display: grid;grid-template-columns: 1fr 1fr 1fr" class="nav nav-pills mb-3" id="pills-taD" role="tablist">
                                            <li class="li-link">
                                                <a class="nav-link order-link active" id="tab-ls-1" data-toggle="pill" href="#pills-ls-1" role="tab" aria-controls="pills-ls-1" aria-selected="true">Tất cả</a>
                                            </li>
                                            <li class="li-link">
                                                <a class="nav-link order-link" id="tab-ls-2" data-toggle="pill" href="#pills-ls-2" role="tab" aria-controls="pills-ls-2" aria-selected="false">Thanh toán</a>
                                            </li>
                                            <li class="li-link">
                                                <a class="nav-link order-link" id="tab-3" data-toggle="pill" href="#pills-ls-3" role="tab" aria-controls="pills-ls-3" aria-selected="false">Hoàn tiền</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="pills-tabL">
                                    <div class="tab-pane fade show active" id="pills-ls-1" role="tabpanel" aria-labelledby="tab-ls-1">
                                        @if (Auth::user()->payment->count() == 0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->payment as $payment)
                                                <div class="LTitem">
                                                    <div class="coint-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>
                                                    <div class="text-coint">
                                                        <div class="teNamt">{{$payment->trading}}</div>
                                                        <div class="teXnAmm">Hình thức: {{$payment->payment_method}} - Ghi chú: {{$payment->note}}</div>
                                                        <div class="texDate">{{ $payment->created_at->format('H:i:s'.' - '.'d/m/Y') }}</div>
                                                    </div>
                                                    <div class="intCoin">
                                                        {{ number_format($payment->amount,0,'','.') }}₫
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-ls-2" role="tabpanel" aria-labelledby="tab-ls-2">
                                        @if (Auth::user()->payment->where('trading', '=', 'Thanh toán')->count() == 0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->payment as $payment)
                                                @if ($payment->trading == "Thanh toán")
                                                    <div class="LTitem">
                                                        <div class="coint-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>
                                                        <div class="text-coint">
                                                            <div class="teNamt">{{$payment->trading}}</div>
                                                            <div class="teXnAmm">Hình thức: {{$payment->payment_method}} - Ghi chú: {{$payment->note}}</div>
                                                            <div class="texDate">{{ $payment->created_at->format('H:i:s'.' - '.'d/m/Y') }}</div>
                                                        </div>
                                                        <div class="intCoin">
                                                            {{ number_format($payment->amount,0,'','.') }}₫
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-ls-3" role="tabpanel" aria-labelledby="tab-3">
                                        @if (Auth::user()->payment->where('trading', '=', 'Hoàn tiền')->count() == 0)
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach (Auth::user()->payment as $payment)
                                                @if ($payment->trading == "Hoàn tiền")
                                                    <div class="LTitem">
                                                        <div class="coint-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>
                                                        <div class="text-coint">
                                                            <div class="teNamt">{{$payment->trading}}</div>
                                                            <div class="teXnAmm">Hình thức: {{$payment->payment_method}} - Ghi chú: {{$payment->note}}</div>
                                                            <div class="texDate">{{ $payment->created_at->format('H:i:s'.' - '.'d/m/Y') }}</div>
                                                        </div>
                                                        <div class="intCoin">
                                                            {{ number_format($payment->amount,0,'','.') }}₫
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-vouchers" role="tabpanel" aria-labelledby="pills-vouchers-tab">
                                <div class="tab-main">
                                    <div style="padding-top: 15px">
                                        <h1 class="text-tt">Mã giảm giá của bạn</h1>
                                        <div class="text-detail">
                                            <ul style="display: grid;grid-template-columns: 1fr 1fr 1fr" class="nav nav-pills mb-3" id="pills-taV" role="tablist">
                                                <li class="li-link">
                                                    <a class="nav-link order-link active" id="tab-mm-1" data-toggle="pill" href="#pills-mm-1" role="tab" aria-controls="pills-mm-1" aria-selected="true">Tất cả</a>
                                                </li>
                                                <li class="li-link">
                                                    <a class="nav-link order-link" id="tab-mm-2" data-toggle="pill" href="#pills-mm-2" role="tab" aria-controls="pills-mm-2" aria-selected="false">Chưa sử dụng</a>
                                                </li>
                                                <li class="li-link">
                                                    <a class="nav-link order-link" id="tab-mm-3" data-toggle="pill" href="#pills-mm-3" role="tab" aria-controls="pills-mm-3" aria-selected="false">Đã sử dụng</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="pills-tabL">
                                        <div class="tab-pane fade show active" id="pills-mm-1" role="tabpanel" aria-labelledby="tab-mm-1">
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-mm-2" role="tabpanel" aria-labelledby="tab-mm-2">
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-mm-3" role="tabpanel" aria-labelledby="tab-mm-3">
                                            <div class="form-profile">
                                                <div class="consuming">
                                                    <div class="connsss">
                                                        <div class="imgg">
                                                        </div>
                                                        <h2>Không có dữ liệu</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="pills-bells" role="tabpanel" aria-labelledby="pills-bells-tab">
                            <div class="tab-main">
                                <div class="tab-title">
                                    <h1 class="text-tt">Thông báo</h1>
                                </div>
                                <div class="form-profile">
                                    <div class="consuming">
                                        <div class="connsss">
                                            <div class="imgg">

                                            </div>
                                            <h2>Không có dữ liệu</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- JavaScript --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function previewImage() {
            var file = document.getElementById('fileInput').files[0];
            var reader = new FileReader();
            reader.onload = function(e)
            {
                document.querySelector('.img i').style.display = 'none';
                document.getElementById('imagePreview').style.display = 'block';
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
        function triggerClick() {
            document.querySelector('#fileInput').click();
        }
    </script>
    <script>
        $(document).ready(function () {
            let pills_profile = $('#pills-profile');
            $(document).on('submit', '#data_Update', function (e) {
                e.preventDefault();
                let formUrl = $(this).attr('action');
                let dataForm = new FormData($('#data_Update')[0]);
                alert
                $.ajax({
                    type: "POST",
                    url: formUrl,
                    data: dataForm,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        if (res.status == 400)
                        {

                        } else 
                        {
                            swal("Thông báo! Sửa thành công!", {
                                    icon: "success",
                            });
                            location.reload();
                        }
                    }
                });
            });
            // Hủy đơn
            $(document).on('submit', '.form-cancel', function (e) {
                e.preventDefault();
                const url = $(this).attr('action');
                let dataForm = new FormData($(this)[0]);
                swal({
                    title: "Bạn có chắc không?",
                    text: "Bạn sẽ hủy đơn hàng này, bạn chắc chắn với điều này chứ!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: dataForm,
                        contentType: false,
                        processData: false,
                        success: function (res) {
                            if(res.status == 200) {
                                $('#pills-tabM').load(location.href + ' #pills-tabM');
                                swal("Thông báo! Hủy đơn hàng thành công!", {
                                    icon: "success",
                                });
                            }
                        }
                    });
                }
                else {
                    swal("Thông báo! Hủy đơn thất bại!", {
                        icon: "warning",
                    });
                }
                });
            });
            //Detail 
            $(document).on('submit', '.form-detail', function (e) {
                e.preventDefault();
                let url = $(this).attr('action');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (res) {
                        $('#pills-profile').html(res);
                    }
                });
            });
            $(document).on('click', '#Btn_back', function () {
                location.reload();
            });
        });
    </script>
   
@endsection