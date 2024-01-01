@extends('theme.layouts.index')
@push('styles')
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/support.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}">
@endpush
@section('title','Danh sách đại lý')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <span>Đại lý</span>
    </div>
</section>
<section class="s-area agency-area">
        <div class="s-header containerx">
            <h2 class="s-header__title">Đại lý của chúng tôi</h2>
        </div>
        <div class="agency-filter containerx">
            <div class="agency-filter-select">
                <select name="" id="">
                    <option value="" selected>-- Chọn thành phố --</option>
                    <option value="">Tất cả</option>
                    <option value="" >Hà Nội</option>
                    <option value="" >Hồ Chí Minh</option>
                </select>
            </div>
        </div>
        <div class="agency-inner containerx">
            <div class="agency-wrap">
                <div class="agency-thumnail">
                    <img src="{{ asset('assets/theme/imgs/brands/phoenix.png') }}" alt="" class="agency__logo">
                </div>
                <div class="agency-info">
                    <h4 class="agency__name">Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</h4>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Khu đô thị Dương Nội, <span class="agency__city">TP Hà Nội</span></span>
                    </span>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Số 10 Thống nhất, Phường Tân Thành, Quận Tân Phú, <span class="agency__city">TP Hồ Chí Minh</span></span>
                    </span>
                    <span class="agency__phone">
                        <span><i class="fa-solid fa-phone"></i></span>
                        <span>024 6671 1717</span>
                    </span>
                </div>
                <div class="agency-link-wrap">
                    <a href="" class="agency-link__findonmaps">Xem trên bản đồ</a>
                    <a href="" class="agency-link__buyfromhere">Mua từ đây</a>
                </div>
            </div>
            <div class="agency-wrap">
                <div class="agency-thumnail">
                    <img src="{{ asset('assets/theme/imgs/brands/phoenix.png') }}" alt="" class="agency__logo">
                </div>
                <div class="agency-info">
                    <h4 class="agency__name">Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</h4>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Khu đô thị Dương Nội, <span class="agency__city">TP Hà Nội</span></span>
                    </span>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Số 10 Thống nhất, Phường Tân Thành, Quận Tân Phú, <span class="agency__city">TP Hồ Chí Minh</span></span>
                    </span>
                    <span class="agency__phone">
                        <span><i class="fa-solid fa-phone"></i></span>
                        <span>024 6671 1717</span>
                    </span>
                </div>
                <div class="agency-link-wrap">
                    <a href="" class="agency-link__findonmaps">Xem trên bản đồ</a>
                    <a href="" class="agency-link__buyfromhere">Mua từ đây</a>
                </div>
            </div>
            <div class="agency-wrap">
                <div class="agency-thumnail">
                    <img src="{{ asset('assets/theme/imgs/brands/phoenix.png') }}" alt="" class="agency__logo">
                </div>
                <div class="agency-info">
                    <h4 class="agency__name">Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</h4>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Khu đô thị Dương Nội, <span class="agency__city">TP Hà Nội</span></span>
                    </span>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Số 10 Thống nhất, Phường Tân Thành, Quận Tân Phú, <span class="agency__city">TP Hồ Chí Minh</span></span>
                    </span>
                    <span class="agency__phone">
                        <span><i class="fa-solid fa-phone"></i></span>
                        <span>024 6671 1717</span>
                    </span>
                </div>
                <div class="agency-link-wrap">
                    <a href="" class="agency-link__findonmaps">Xem trên bản đồ</a>
                    <a href="" class="agency-link__buyfromhere">Mua từ đây</a>
                </div>
            </div>
            <div class="agency-wrap">
                <div class="agency-thumnail">
                    <img src="{{ asset('assets/theme/imgs/brands/phoenix.png') }}" alt="" class="agency__logo">
                </div>
                <div class="agency-info">
                    <h4 class="agency__name">Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</h4>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Khu đô thị Dương Nội, <span class="agency__city">TP Hà Nội</span></span>
                    </span>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>Số 10 Thống nhất, Phường Tân Thành, Quận Tân Phú, <span class="agency__city">TP Hồ Chí Minh</span></span>
                    </span>
                    <span class="agency__phone">
                        <span><i class="fa-solid fa-phone"></i></span>
                        <span>024 6671 1717</span>
                    </span>
                </div>
                <div class="agency-link-wrap">
                    <a href="" class="agency-link__findonmaps">Xem trên bản đồ</a>
                    <a href="" class="agency-link__buyfromhere">Mua từ đây</a>
                </div>
            </div>
        </div>
    </section>
@endsection