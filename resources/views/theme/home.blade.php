@extends('theme.layouts.index')
@section('title','Trang chủ')
@section('bg-video')
<section class="homebanner">
    <div class="homebanner__mask">
        <video autoplay muted loop>
            <source src="{{ asset('assets/theme/videos/banner-audio-homepage.mp4') }}" type="video/mp4">
        </video>
    </div>
</section>
@endsection
@section('content')
<section class="featured-product-area">
    <div class="s-header">
        <h2 class="s-header__title">Sản phẩm nổi bật</h2>
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            @foreach($products as $key => $product)
                @if($key == 0)
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                @else
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key+1}}"></button>
                @endif
            @endforeach
        </div>
        <div class="carousel-inner featured-product-inner">
            @foreach($products as $key => $product)
            @php 
                $img = json_decode($product->images);
            @endphp
            @if($key == 0)
                <div class="carousel-item active">
                    <div class="featured-product">
                        <div class="featured-product-thumnail">
                            <div class="featured-product__img">
                                <img src="{{ asset('storage/products/'.$product->code.'/'.$img[0]) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="featured-product-wrap">
                            <h3 class="featured-product__title">{{ $product->name }}</h3>
                            <h4 class="featured-product__subtitle">{{ $product->category->name }}</h4>
                            <p class="featured-product__description">{!! $product->category->description !!}</p>
                            <div class="featured-product__link">
                                <a href="{{ route('theme.product_detail',['slug_category' => $product->category->slug, 'slug_product' => $product->slug]) }}">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="carousel-item">
                    <div class="featured-product">
                        <div class="featured-product-thumnail">
                            <div class="featured-product__img">
                                <img src="{{ asset('storage/products/'.$product->code.'/'.$img[0]) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="featured-product-wrap">
                            <h3 class="featured-product__title">{{ $product->name }}</h3>
                            <h4 class="featured-product__subtitle">{{ $product->category->name }}</h4>
                            <p class="featured-product__description">{!! $product->category->description !!}</p>
                            <div class="featured-product__link">
                                <a href="{{ route('theme.product_detail',['slug_category' => $product->category->slug, 'slug_product' => $product->slug]) }}">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            
        </div>
        @if(count($products) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
</section>
<section class="blog-area">
    <div class="s-header">
        <h2 class="s-header__title">Dự án</h2>
    </div>
    <div class="s-main list-news containerx">
        @foreach($projects as $project)
        @php
            $link = asset('storage/articles/'.$project->category_id.'/'.$project->image);
        @endphp
        <div class="news-item">
            <div class="news-item-wrap" style="background-image: url('{{ $link }}');">
                <div class="coating">
                    <div class="content-news">
                        <p class="content-news__title">{{ $project->title }}</p>
                        <div class="content-news__link">
                            <a href="{{ route('theme.project_detail', $project->slug) }}">Xem dự án <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="" style="text-align: center; margin-top: 1rem;">
        <a href="{{ route('theme.project') }}" class="inner-about">Xem tất cả ...</a>
    </div>
</section>
<section class="blog-area">
    <div class="s-header">
        <h2 class="s-header__title">Bài viết mới</h2>
    </div>
    <div class="s-main list-news containerx">
        @foreach($news as $newsItem)
        @php
            $link = asset('storage/articles/'.$newsItem->category_id.'/'.$newsItem->image);
        @endphp
        <div class="news-item">
            <div class="news-item-wrap" style="background-image: url('{{ $link }}');">
                <div class="coating">
                    <div class="content-news">
                        <p class="content-news__title">{{ $newsItem->title }}</p>
                        <span class="content-news__description">{!! $newsItem->description !!}</span>
                        <div class="content-news__link">
                            <a href="{{ route('theme.news_detail', $newsItem->slug) }}">Xem bài viết <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="" style="text-align: center; margin-top: 1rem;">
        <a href="{{ route('theme.news') }}" class="inner-about">Xem tất cả ...</a>
    </div>
</section>
@endsection