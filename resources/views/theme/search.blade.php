@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/product-list.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/product-list.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Danh sách sản phẩm')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <span>Kết quả tìm kiếm</span>
    </div>
</section>
<section class="s-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">Kết quả tìm kiếm cho từ khóa "{{ $key }}"</h2>
    </div>
</section>
<section class="category-list">
    <div class="list containerx">
        @if(count($listProduct) > 0)
        @foreach($listProduct as $product)
        <div class="list-item">
            <div class="list-item-thumnail">
                <?php $listImg = json_decode($product->images);  ?>
                <img src="{{ asset('storage/products/'.$product->code.'/'.$listImg[0]) }}" alt="{{ $product->name }}">
            </div>
            <h5 class="list-item__name">{{ $product->name }}</h5>
            <a href="{{ route('theme.product_detail',['slug_category' => $product->category->slug, 'slug_product' => $product->slug]) }}" class="list-item__link"></a>
        </div>
        @endforeach
        @else
            <span>(Không có kết quả)</span>
        @endif
    </div>
</section>
@endsection



