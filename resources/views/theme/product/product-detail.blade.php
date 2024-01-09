@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/product.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Chi tiết sản phẩm')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{ route('theme.home') }}">Trang chủ</a>
        <span>&gt;</span>
        <a href="{{ route('theme.category', $category->slug) }}">{{  $category->name }}</a>
        <span>&gt;</span>
        <span>{{ $product->name }}</span>
    </div>
</section>
<section class="s-area product-area">
    <h1 class="product__name containerx">{{ $product->name }}</h1>
    <div class="containerx">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
            @foreach($listImg as $key => $img)
            @if($key == 0)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>
            @else
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="" aria-current="true" aria-label="Slide {{$key+1}}"></button>
            @endif
            @endforeach
            </div>
            <div class="carousel-inner">
            @foreach($listImg as $key => $img)
            @if($key == 0)
                <div class="carousel-item active">
                    <div class="img-wrap">
                        <img src="{{ asset('storage/products/'.$product->code.'/'.$img) }}" class="d-block " alt="{{ $product->name }}">
                    </div>
                </div>
            @else
                <div class="carousel-item">
                    <div class="img-wrap">
                        <img src="{{ asset('storage/products/'.$product->code.'/'.$img) }}" class="d-block " alt="{{ $product->name }}">
                    </div>
                </div>
            @endif
            @endforeach
            </div>
            @if(count($listImg) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" hidden></span>
                    <span class="" aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" hidden></span>
                    <span class="" aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>
    </div>
    <nav class="containerx tab-nav">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                <i class="fa-solid fa-file"></i>
                Mô tả
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                <i class="fa-solid fa-microchip"></i>    
                Thông số kỹ thuật
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                <i class="fa-solid fa-download"></i>
                Tải xuống
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div id="description" class="containerx">
                <div class="description-content">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div id="specifications" class="containerx">
                <table class="specifications-data">
                    @foreach($product->specTypes as $spec)
                    @if($spec->category_id == $product->category_id)
                    <tr>
                        <td>{{ $spec->name }}</td>
                        <td>{{ $spec->pivot->value }}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <div id="download" class="containerx">
                <div class="download-wrap">
                    <div class="document">
                        <h6>Tài liệu</h6>
                        @if($documentProduct)
                        @foreach($documentProduct as $document)
                            <div class="download-item" style="clear:both">
                                <a target="_blank" href="{{ asset('storage/documents/'.$product->code.'/'.$document) }}"> 
                                    <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                    <span class="download-title">{{ $document }}</span>
                                    <span class="download-ext">(PDF - File) </span>
                                </a>
                                <!-- <div class="download-meta">3. June 2019</div> -->
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="controller-software">
                        <h6>Phầm mềm điều khiển</h6>
                        @if($softwareProduct)
                        @foreach($softwareProduct as $software)
                        <div class="download-item" style="clear:both">
                            <a target="_blank" href="{{ asset('storage/softwares/'.$product->code.'/'.$software) }}"> 
                                <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                <span class="download-title">{{ $software }}</span>
                                <span class="download-ext">(ZIP - File) </span>
                            </a>
                            <!-- <div class="download-meta">3. June 2019 - Revision 3.9.1</div> -->
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="">
                        <h6>Driver</h6>
                        @if($driverProduct)
                        @foreach($driverProduct as $driver)
                        <div class="download-item" style="clear:both">
                            <a target="_blank" href="{{ asset('storage/drivers/'.$product->code.'/'.$driver) }}"> 
                                <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                <span class="download-title">{{ $driver }}</span>
                                <span class="download-ext">(ZIP - File) </span>
                            </a>
                            <!-- <div class="download-meta">3. June 2019 - Revision 3.9.1</div> -->
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection