@extends("Home.layouts.master")

@section('content')

<!-- Swiper Slider Section -->
<div class="container-fluid mt-3" >
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <img src="{{ asset('AdminAssets/Slider-image/'.$slider->image) }}" alt="{{ $slider->title }}" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
            </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Display the latest products -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="mb-4 text-center">آخرین محصولات اضافه شده</h3>
        </div>
        @foreach ($latestProducts as $product)
        @if ($product->status == 1)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 product-card box_shadow" style="max-width: 250px;">
                <a href="{{ route('product', $product->id) }}" class="text-decoration-none">
                    <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 150px;">
                </a>
                <div class="card-body text-center">
                    <a href="{{ route('product', $product->id) }}" class="text-dark text-decoration-none">
                        <h5 class="card-title" style="font-size: 16px;">{{ $product->name }}</h5>
                    </a>
                    <p class="card-text mt-2" style="font-size: 14px;">{{ $product->price }} تومان</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<!-- Display stores in a grid layout -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="mb-4 text-center">فروشگاه‌ها</h3>
        </div>
        @foreach ($stores as $store)
        <div class="col-md-2 col-sm-4 mb-4 text-center">
            <!-- Store Image -->
            <img src="{{ asset('AdminAssets/Store-image/'.$store->image) }}" alt="{{ $store->name }}" class="rounded-circle mx-auto" style="width: 80px; height: 80px; object-fit: cover;">
            <!-- Store Name -->
            <div class="mt-2">
                <a href="{{ route('store.products', $store->id) }}" class="text-decoration-none text-dark">
                    <h6 class="card-title" style="font-size: 14px;">{{ $store->name }}</h6>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Swiper JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 3000, // Change slide every 3 seconds
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
