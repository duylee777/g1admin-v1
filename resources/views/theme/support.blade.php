@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/agency.css">
    <link rel="stylesheet" href="/assets/theme/css/product.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
    <style>
        .e-show {
            display: block;
        }
        .e-hidden {
            display: none;
        }
    </style>
@endpush
@section('title','Hỗ trợ')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <span>Hỗ trợ</span>
    </div>
</section>

<section class="s-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">Hỗ trợ</h2>
    </div>
    <div class="containerx wrap">
        <div class="agency-filter">
            <div class="agency-filter-select">
                <select name="" id="" onchange="viewContent(this);">
                    <option value="all" selected>Tất cả sản phẩm</option>
                    @if($products)
                        @foreach($products as $product)
                            <option value="download_{{ $product->id }}" >{{ $product->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        @if($products)
        @foreach($products as $product)
        <div class="show-all" id="download" data="download_{{$product->id}}">
            <h3 class="download__title">{{ $product->name }}</h3>
            <div class="download-wrap">
                <div class="document">
                    <h6>Tài liệu</h6>
                    <?php  $extendproduct = \App\Models\ExtendProduct::where('product_id',$product->id)->first(); ?>
                    @if($extendproduct && json_decode($extendproduct->document))
                    @foreach( json_decode($extendproduct->document) as $document)
                        <div class="download-item" style="clear:both">
                            <a target="_blank" href="{{ asset('storage/documents/'.$product->code.'/'.$document) }}"> 
                                <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                <span class="download-title">{{ $document }}</span>
                                <span class="download-ext">(PDF - File) </span>
                            </a>
                            <!-- <div class="download-meta">3. June 2019</div> -->
                        </div>
                    @endforeach
                    @else
                        <span>(Không có tài liệu)</span>
                    @endif
                </div>
                <div class="driver">
                    <h6>Driver</h6>
                    <?php  $extendproduct = \App\Models\ExtendProduct::where('product_id',$product->id)->first(); ?>
                    @if($extendproduct && json_decode($extendproduct->driver))
                    @foreach( json_decode($extendproduct->driver) as $driver)
                        <div class="download-item" style="clear:both">
                            <a target="_blank" href="{{ asset('storage/driver/'.$product->code.'/'.$driver) }}"> 
                                <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                <span class="download-title">{{ $driver }}</span>
                                <span class="download-ext">(PDF - File) </span>
                            </a>
                            <!-- <div class="download-meta">3. June 2019</div> -->
                        </div>
                    @endforeach
                    @else
                        <span>(Không có driver)</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <script>
        function viewContent(obj) {
            var value = obj.value;
            console.log(value)
            var listContent = document.querySelectorAll('.show-all');
            if(value == 'all') {
                for(let i = 0; i<listContent.length; i++) {
                    if(listContent[i].classList.contains('e-hidden')) {
                        listContent[i].classList.remove('e-hidden');
                        listContent[i].classList.add('e-show');
                    }
                }
            }
            else {
                for(let i = 0; i<listContent.length; i++) {
                    if(value != listContent[i].data) {
                        listContent[i].classList.remove('e-show');
                        listContent[i].classList.add('e-hidden');
                    }
                }
            }
        }
    </script>
</section>


@endsection