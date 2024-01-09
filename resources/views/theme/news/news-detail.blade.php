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
        <a href="{{ route('theme.news') }}">Tin tức</a>
        <span>&gt;</span>
        <span>{{ $newsDetail->title }}</span>
    </div>
</section>
<section class="s-area blogpage-area">
    <div class="s-header containerx">
        <div class="inner-link">
            @foreach($newsDetail->tags as $tag)
                <a href="">{{ $tag->name }}</a>
            @endforeach
        </div>
        <h1 class="s-header__title">{{ $newsDetail->title }}</h1>
    </div>
    <div class="s-main blogpage-wrap">
        <div class="m-news containerx">
            <div class="post-news">
                {!! $newsDetail->detail !!}
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