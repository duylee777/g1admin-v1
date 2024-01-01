@extends('theme.layouts.index')
@push('styles')
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/support.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}">
@endpush
@section('title','Hỗ trợ')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <span>Hỗ trợ</span>
    </div>
</section>

<section class="s-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">Hỗ trợ</h2>
    </div>
    <div class="containerx wrap">
        <div class="category">
            <ul class="menu">
                <li class="item">
                    <a href="#one" onclick="view('#one')">Hỗ trợ theo thiết bị <i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="#two" onclick="view('#two')">Tải xuống<i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="">Hướng dẫn sử dụng <i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="">Video hướng dẫn<i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="">Tối ưu hóa<i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="">Xử lý sự cố<i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="">Kiến thức cơ bản<i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="">Bảo hành và sửa chữa<i class="fa-solid fa-angle-right"></i></a>
                </li>
                <li class="item">
                    <a href="">Nhật ký thay đổi<i class="fa-solid fa-angle-right"></i></a>
                </li>
            </ul>
        </div>
        <div class="tabs">
            <div id="one" class="tabs--block">
                <div class="one_item">
                    <div class="">
                        <img src="assets/imgs/product/loa-nexo-ids108-i.jpg" alt="">
                    </div>
                    <span>Loa Subwoofer</span>
                </div>
                <div class="one_item">
                    <div class="">
                        <img src="assets/imgs/product/loa-nexo-ids108-i.jpg" alt="">
                    </div>
                    <span>Loa Subwoofer</span>
                </div>
                <div class="one_item">
                    <div class="">
                        <img src="assets/imgs/product/loa-nexo-ids108-i.jpg" alt="">
                    </div>
                    <span>Loa Subwoofer</span>
                </div>
                <div class="one_item">
                    <div class="">
                        <img src="assets/imgs/product/loa-nexo-ids108-i.jpg" alt="">
                    </div>
                    <span>Loa Subwoofer</span>
                </div>
                <div class="one_item">
                    <div class="">
                        <img src="assets/imgs/product/loa-nexo-ids108-i.jpg" alt="">
                    </div>
                    <span>Loa Subwoofer</span>
                </div>
                <div class="one_item">
                    <div class="">
                        <img src="assets/imgs/product/loa-nexo-ids108-i.jpg" alt="">
                    </div>
                    <span>Loa Subwoofer</span>
                </div>
            </div>
            <div id="two" class="tabs--none">
                <div class="two_item">
                    <h5>Bộ xử lý </h5>
                    <div class="list">
                        <a href="">Subwoofer Core 1 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 2 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 3 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 4 - Phần tải xuống</a>
                    </div>
                    <a class="view_all" href="">Xem tất cả 7 bài viết</a>
                </div>
                <div class="two_item">
                    <h5>Bộ xử lý </h5>
                    <div class="list">
                        <a href="">Subwoofer Core 1 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 2 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 3 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 4 - Phần tải xuống</a>
                    </div>
                    <a class="view_all" href="">Xem tất cả 7 bài viết</a>
                </div>
                <div class="two_item">
                    <h5>Bộ xử lý </h5>
                    <div class="list">
                        <a href="">Subwoofer Core 1 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 2 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 3 - Phần tải xuống</a>
                        <a href="">Subwoofer Core 4 - Phần tải xuống</a>
                    </div>
                    <a class="view_all" href="">Xem tất cả 7 bài viết</a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection