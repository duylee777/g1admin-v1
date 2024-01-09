@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/agency.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
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
            <!-- <div class="agency-filter-select">
                <select name="" id="">
                    <option value="" selected>-- Chọn thành phố --</option>
                    <option value="">Tất cả</option>
                    <option value="" >Hà Nội</option>
                    <option value="" >Hồ Chí Minh</option>
                </select>
            </div> -->
        </div>
        <div class="agency-inner containerx">
            @if($agencies)
            @foreach($agencies as $agency)
            
            <div class="agency-wrap">
                <div class="agency-thumnail">
                    <img src="{{asset('../storage/agencies/'.$agency->id.'/'.$agency->logo)}}" alt="" class="agency__logo">
                </div>
                <div class="agency-info">
                    <h4 class="agency__name">{{ $agency->name }}</h4>
                    <span class="agency__address">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <span>{{ $agency->address }} - <span class="agency__city">{{ $agency->city }}</span></span>
                    </span>
                    <span class="agency__phone">
                        <span><i class="fa-solid fa-phone"></i></span>
                        <span>{{ $agency->phone }}</span>
                    </span>
                </div>
                <div class="agency-link-wrap">
                    <a href="{{ json_decode($agency->map_link) }}" class="agency-link__findonmaps" target="_blank">Xem trên bản đồ</a>
                    <a href="{{ json_decode($agency->product_link) }}" class="agency-link__buyfromhere" target="_blank">Mua từ đây</a>
                </div>
            </div>
            @endforeach
            @endif
            
        </div>
    </section>
@endsection