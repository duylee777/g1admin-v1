@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/blog.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Danh sách tin tức')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <span>Tin tức</span>
    </div>
</section>
<section class="s-area blogpage-area">
    <div class="s-header">
        <h2 class="s-header__title">Tin tức</h2>
    </div>
    <div class="s-main blogpage-wrap">
        <div class="m-news containerx">
            <div class="post-news">
                @foreach($news as $newsDetail)
                <div class="post">
                    <a href="{{ route('theme.news_detail', $newsDetail->slug) }}" class="img-post">
                        <img src="{{ asset('storage/articles/'.$newsDetail->category_id.'/'.$newsDetail->image) }}" alt="">
                    </a>
                    <div class="content-post">
                        <div class="meta-category">
                            @foreach($newsDetail->tags as $tag)
                                <a href="">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <a href="{{ route('theme.news_detail', $newsDetail->slug) }}" class="title-post">
                            <h3>{{ $newsDetail->title }}</h3>
                        </a>
                        <div class="excerpt">
                            {!! $newsDetail->description !!}
                        </div>
                        <!-- <p class="author">
                            <a href="">Antelope Staff</a>
                            <span>November 6, 2023</span>
                        </p> -->
                    </div>
                </div>
                @endforeach
                <!-- <ul class="page-munbers">
                    <li class="fist-number">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>...</li>
                    <li>31</li>
                    <li class="last-number"><a href="">Next <span><i class="fa-solid fa-angles-right"></i></span></a></li>
                </ul> -->
            </div>
            <div class="lists-news">
                <h4 class="head-more-news">Tin tức mới nhất</h4>
                @foreach($latestNews as $latestNewsItem)
                    <div class="more-news">
                        <a href="{{ route('theme.news_detail', $latestNewsItem->slug) }}" class="entry-image">
                            <img src="{{ asset('storage/articles/'.$latestNewsItem->category_id.'/'.$latestNewsItem->image) }}" alt="">
                        </a>
                        <a href="{{ route('theme.news_detail', $latestNewsItem->slug) }}" class="entry-title">
                            <h4>{{ $latestNewsItem->title }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection