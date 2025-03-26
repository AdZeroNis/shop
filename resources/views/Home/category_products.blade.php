@extends("Home.layouts.master")

@section('content')

<!-- تبلیغ بالای صفحه -->
<a href="#" class="text-decoration-none">
    <div class="container-fluid mt-2">
        <div class="top-banner box_shadow rounded-3 overflow-hidden">
            <img src="{{ asset('path/to/your/banner-image.jpg') }}" alt="تبلیغ" class="img-fluid w-100" style="height: 150px; object-fit: cover;">
        </div>
    </div>
</a>

<!-- بخش محصولات -->
<section class="products-section py-5" style="background-color: #FBE4D6 !important">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title position-relative d-inline-block">همه محصولات</h2>
            <p class="section-subtitle text-muted mt-3">بهترین محصولات با بهترین قیمت‌ها</p>
        </div>

        <div class="row justify-content-center">
            @foreach ($products as $product)
            @if ($product->status == 1)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="product-card card border-0 h-100 overflow-hidden position-relative">
                    <!-- نشانگر محصول جدید -->
                    @if($product->created_at->diffInDays() < 7)
                    <div class="product-badge position-absolute top-0 start-0 m-2">
                        <span class="badge bg-danger py-2">جدید</span>
                    </div>
                    @endif

                    <!-- تصویر محصول -->
                    <a href="{{ route('product', $product->id) }}" class="product-img-link">
                        <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}"
                             class="card-img-top product-img"
                             alt="{{ $product->name }}"
                             style="height: 180px; object-fit: contain;">
                    </a>

                    <!-- محتوای کارت -->
                    <div class="card-body text-center pt-3">
                        <!-- نام فروشگاه -->
                        <div class="product-meta mb-2">
                            <a href="{{ route('store.products', $product->store_id) }}" class="store-link text-decoration-none">
                                <small class="text-muted">{{ $product->store->name ?? 'نامشخص' }}</small>
                            </a>
                        </div>

                        <!-- نام محصول -->
                        <a href="{{ route('product', $product->id) }}" class="product-title-link text-decoration-none">
                            <h5 class="card-title mb-2 text-dark">{{ Str::limit($product->name, 30) }}</h5>
                        </a>

                        <!-- قیمت محصول -->
                        <div class="product-price mb-3">
                            <span class="price fw-bold text-primary">{{ number_format($product->price) }}</span>
                            <span class="currency text-muted">تومان</span>
                        </div>

                        <!-- دکمه مشاهده جزئیات -->
                        <a href="{{ route('product', $product->id) }}" class="btn btn-outline-primary btn-sm w-75">
                            مشاهده جزئیات
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    /* استایل بخش تبلیغ */
    .top-banner {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .top-banner:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    /* استایل عنوان بخش */
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

    .section-subtitle {
        font-size: 1rem;
        color: #6c757d;
    }

    /* استایل کارت محصول */
    .product-card {
        transition: all 0.3s ease;
        border-radius: 10px !important;
        background-color: white;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .product-img {
        transition: transform 0.3s ease;
        padding: 15px;
    }

    .product-img-link:hover .product-img {
        transform: scale(1.05);
    }

    .product-title-link:hover h5 {
        color: #C78853 !important;
    }

    /* استایل دکمه */
    .btn-outline-primary {
        border-color: #C78853;
        color: #C78853;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #C78853;
        color: white;
    }

    /* استایل نشانگر محصول جدید */
    .product-badge .badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
    }

    /* تنظیمات ریسپانسیو */
    @media (max-width: 768px) {
        .product-img {
            height: 150px !important;
        }

        .card-title {
            font-size: 0.9rem !important;
        }

        .product-price .price {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
