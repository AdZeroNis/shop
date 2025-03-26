@extends("Home.layouts.master")

@section('content')

<!-- Swiper Slider Section -->
<div class="container-fluid mt-3">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <img src="{{ asset('AdminAssets/Slider-image/'.$slider->image) }}" alt="{{ $slider->title }}" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Latest Products Section -->
<section class="latest-products py-5" style="background-color: #FBE4D6 !important">
    <div class="container position-relative">



        <div class="section-header text-center mb-5">
            <h2 class="section-title position-relative d-inline-block">جدیدترین محصولات</h2>
            <p class="section-subtitle text-muted mt-3">بهترین و جدیدترین محصولات را از ما بخواهید</p>
        </div>

        <div class="row">
            @foreach ($latestProducts as $product)
            @if ($product->status == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="product-card card border-0 h-100 overflow-hidden">
                    <div class="product-badge">
                        @if($product->created_at->diffInDays() < 7)
                        <span class="badge bg-danger">جدید</span>
                        @endif
                    </div>
                    <a href="{{ route('product', $product->id) }}" class="product-img-link">
                        <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}"
                             class="card-img-top product-img"
                             alt="{{ $product->name }}">
                    </a>
                    <div class="card-body text-center">
                        <div class="product-meta mb-2">
                            <a href="{{ route('store.products', $product->store_id) }}" class="store-link">
                                <small>{{ $product->store->name ?? 'نامشخص' }}</small>
                            </a>
                        </div>
                        <a href="{{ route('product', $product->id) }}" class="product-title-link">
                            <h5 class="card-title mb-2">{{ Str::limit($product->name, 30) }}</h5>
                        </a>
                        <div class="product-price mb-3">
                            <span class="price">{{ number_format($product->price) }}</span>
                            <span class="currency">تومان</span>
                        </div>
                        <a href="{{ route('product', $product->id) }}" class="btn btn-outline-primary btn-sm">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Stores Section -->

<div class="container mt-5 position-relative">
    <div class="row justify-content-center">
        <!-- عنوان فروشگاه‌ها در وسط -->
        <div class="col-12 text-center mb-4">
            <h3 class="section-title position-relative d-inline-block">فروشگاه‌ها</h3>
        </div>

        @foreach ($stores as $store)
        <div class="col-md-2 col-sm-4 mb-4 text-center">
            <img src="{{ asset('AdminAssets/Store-image/'.$store->image) }}"
                 alt="{{ $store->name }}"
                 class="rounded-circle mx-auto store-img">
            <div class="mt-2">
                <a href="{{ route('store.products', $store->id) }}" class="text-decoration-none text-dark">
                    <h6 class="card-title">{{ $store->name }}</h6>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Swiper JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Styles -->
<style>
    /* Leaf Wave Divider */
    .leaf-divider {
        width: 100%;
        overflow: hidden;
        line-height: 0;
        margin-bottom: 40px;
    }

    .leaf-divider svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 50px;
        transform: rotate(180deg);
    }

    /* Store Images */
    .store-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border: 2px solid #C78853;
        transition: all 0.3s ease;
    }

    .store-img:hover {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(199, 136, 83, 0.3);
    }

    /* Product Cards */
    .product-card {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .product-img {
        height: 180px;
        object-fit: contain;
        padding: 15px;
        transition: transform 0.3s ease;
    }

    .product-img-link:hover .product-img {
        transform: scale(1.05);
    }

    /* Section Titles */
    .section-title {
        font-weight: 700;
        padding-bottom: 10px;
    }

    .section-title:after {
        content: '';
        position: absolute;
        width: 50px;
        height: 3px;
        background: #C78853;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    /* Swiper Navigation */
    .swiper-button-next, .swiper-button-prev {
        color: white;
        background: rgba(199, 136, 83, 0.7);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .swiper-button-next:hover, .swiper-button-prev:hover {
        background: rgba(199, 136, 83, 0.9);
    }
</style>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

@endsection
