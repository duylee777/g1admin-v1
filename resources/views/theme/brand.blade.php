@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/product-list.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/product-list.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
    <style>
        .category-list-wrap{
            display: flex;
            align-items: flex-start;
        }
        .list-brands {
            padding: 1rem;
        }
        .e-show {
            display: block;
        }
        .e-hidden {
            display: none;
        }
    </style>
@endpush
@section('title','Danh sách sản phẩm theo thương hiệu')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <span>{{ $brand->name }}</span>
    </div>
</section>
<section class="s-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">{{ $brand->name }}</h2>
    </div>
</section>
<section class="category-list">
    <div class="containerx category-list-wrap">
        <div class="category-by-product-wrap">
            @if($cates != null)
            <ul class="category-by-product">
                <li class="category-by-product-item">
                    <span id="all" class="category-by-product-link category-by-product-link--active" onclick="selectCategory(this);">Tất cả sản phẩm</span>
                </li>
                @foreach($cates as $cate)
                    @if($cate->parent_id == 11)
                        <li class="category-by-product-item">
                            <span id="{{ $cate->id }}" class="category-by-product-link" onclick="selectCategory(this);">{{ $cate->name }}</span>
                        </li>
                    @endif
                @endforeach
            </ul>
            @endif
        </div>
        <div class="list list-brands">
            @if(count($listProductByBrand) > 0)
            @foreach($listProductByBrand as $product)
            <div class="list-item e-show" id="cate_{{$product->category->id}}">
                <div class="list-item-thumnail">
                    <?php $listImg = json_decode($product->images);  ?>
                    <img src="{{ asset('storage/products/'.$product->code.'/'.$listImg[0]) }}" alt="{{ $product->name }}">
                </div>
                <h5 class="list-item__name">{{ $product->name }}</h5>
                <a href="{{ route('theme.product_detail',['slug_category' => $product->category->slug, 'slug_product' => $product->slug]) }}" class="list-item__link"></a>
            </div>
            @endforeach
            @else
                <span>(Chưa có sản phẩm thuộc thương hiệu)</span>
            @endif
        </div>
    </div>
</section>
<script>
    function selectCategory(obj) {
        // console.log(obj)
        let item = document.querySelectorAll('.category-by-product-link');
        let products = document.querySelectorAll('.list-item');
        
        for(let i = 0; i < item.length; i++) {
            if(obj.id == item[i].id) {
                item[i].classList.add('category-by-product-link--active');
            }
            else {
                if(item[i].classList.contains('category-by-product-link--active')) {
                    item[i].classList.remove('category-by-product-link--active');
                }
            }
        }

        if(obj.id == 'all') {
            for(let i = 0; i < item.length; i++) {
                if(products[i].classList.contains('e-hidden')) {
                    products[i].classList.remove('e-hidden');
                    products[i].classList.add('e-show');
                }
            }
        }
        for(let i = 0; i < item.length; i++) {
            if(products[i].id.slice(5, products[i].id.length) == obj.id) {
                products[i].classList.remove('e-hidden');
                products[i].classList.add('e-show');
            }
            else {
                products[i].classList.remove('e-show');
                products[i].classList.add('e-hidden');
            }
        }
    }
</script>
@endsection



