@extends('theme.layouts.index')
@push('styles')
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}">
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
    <div class="product-wrap">
        <div class="product-thumnail">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    @foreach($listImg as $key => $img)
                        @if($key == 0)
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($listImg as $img)
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ asset('storage/products/'.$product->code.'/'.$img) }}" class="d-block w-100" alt="{{ $product->name }}">
                    </div>
                    @endforeach
                </div>
                @if(count($listImg) > 1)
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
        </div>
        <div class="product-info">
            <h1 class="product__name">{{ $product->name }}</h1>
            <div class="product-tabs">
                <a href="#description"><i class="fa-solid fa-file"></i>Mô tả</a>
                <a href="#specifications"><i class="fa-solid fa-microchip"></i>Thông số kỹ thuật</a>
                <a href="#download"><i class="fa-solid fa-download"></i>Tải xuống</a>
            </div>
        </div>
    </div>
    <div id="description" class="containerx">
        <h3 class="description__title">Mô tả</h3>
        <div class="description-content">
            {!! $product->description !!}
        </div>
    </div>
    <div id="specifications" class="containerx">
        <div class="specification">
            <h3 class="specifications__title">Thông số kỹ thuật</h3>
            
            <table class="specifications-data">
                @foreach($product->specTypes as $spec)
                <tr>
                    <td>{{ $spec->name }}</td>
                    <td>{{ $spec->pivot->value }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- <div class="features">
            <h3 class="specifications__title">Đặc trưng</h3>
            <table class="specifications-data">
                <tr>
                    <td>Component</td>
                    <td>1 x 8” 8 Ohms long excursion Neodymium driver</td>
                </tr>
                <tr>
                    <td>Connectors</td>
                    <td>1 x Cable gland with 2 cores cables</td>
                </tr>
                <tr>
                    <td>Rigging points</td>
                    <td>2x M10 Threaded inserts + 2 x M6 threaded inserts</td>
                </tr>
                <tr>
                    <td>Construction</td>
                    <td>Baltic Birch Plywood</td>
                </tr>
                <tr>
                    <td>Finish</td>
                    <td>Black or White structural paint</td>
                </tr>
                <tr>
                    <td>Front Finish</td>
                    <td>UV Resistant acoustic fabric fitted Magnelis® front grill</td>
                </tr>
                <tr>
                    <td>Operating temperature range</td>
                    <td>0°C - 40 °C (32° F - 104° F)</td>
                </tr>
                <tr>
                    <td>Storage temperature range</td>
                    <td>-20 °C - 60 °C (-4 ° F - 140° F)</td>
                </tr>
                <tr>
                    <td>Height x Width x Depth</td>
                    <td>305mm x 307mm x 305mm (12.0” x 12.1” x 12.0”)</td>
                </tr>
                <tr>
                    <td>Weight: Net</td>
                    <td>8 kg / 17.6 lbs</td>
                </tr>
                <tr>
                    <td>System Operation</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Recommended powering solution</td>
                    <td>DTDcontroller + DTDAMP4x0.7 : up to 2 x IDS108 per channel</td>
                </tr>
                <tr>
                    <td>Optional powering solution</td>
                    <td>DTDcontroller + DTDAMP4x1.3 : up to 2 x IDS108 per channel</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NXAMP4x1mk2 Powered TDcontroller: up to 3 x IDS108 per channel</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NXAMP4x4mk2 Powered TDcontroller: up to 4 x IDS108 per channel</td>
                </tr>
            </table>
        </div> -->
    </div>
    <div id="download" class="containerx">
        <h3 class="download__title">Tải xuống</h3>
        <div class="download-wrap">
            <div class="document">
                <h6>Tài liệu</h6>
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
            </div>
            <div class="controller-software">
                <h6>Phầm mềm điều khiển</h6>
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
            </div>
        </div>
    </div>
</section>
@endsection