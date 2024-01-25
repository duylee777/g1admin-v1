<section class="featured-product-area">
    <div class="s-header">
        <h2 class="s-header__title">Sản phẩm nổi bật</h2>
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
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

.featured-product-area {
    background-color: var(--bg__grey--light);
    padding-top: 5rem;
}
.featured-product-inner {
    padding: 5rem 10rem;
}
.featured-product {
    display: flex;
    align-items: center;
    gap: 3rem;
}
.featured-product-wrap {
    width: 50%;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}
.featured-product__img {
    height: 20rem;
    width: 20rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.featured-product-thumnail {
    width: 50%;
    overflow: hidden;
    background-color: var(--bg__white);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4rem;
}

.featured-product__title {
    margin-bottom: 0;
    text-transform: uppercase;
}
.featured-product__subtitle {
    margin-bottom: 0;
    font-weight: var(--text__regular);
}
.featured-product__description {
    margin-bottom: 0;
    font-weight: var(--text__light);
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
}
.featured-product__link a{
    display: inline-block;
    color: var(--text-color__white);
    padding: 0.5rem 2.5rem;
    font-size: 0.875rem;
    background-color: var(--color__base);
}
.featured-product__link a:hover,
.featured-product__link a:focus {
    background-color: var(--color__base--hover);
}