@extends('theme.layouts.index')
@push('styles')
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}">
@endpush
@section('title','Chi tiết dự án')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <a href="{{ route('theme.project') }}">Dự án</a>
        <span>&gt;</span>
        <span>{{ $project->title }}</span>
    </div>
</section>
<section class="s-area blogpage-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">{{ $project->title }}</h2>
    </div>
    <div class="s-main blogpage-wrap containerx">
        <div class="" style="display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 2.5rem;">
            <img style="width: 60%;" src="{{ asset('storage/articles/'.$project->category_id.'/'.$project->image) }}" alt="">
        </div>
        <div class="">
            <div>{!! $project->description !!}</div>
            <!-- </br> -->
            <div>
                {!! $project->detail !!}
            </div>
            
        </div>
    </div>
</section>
@endsection