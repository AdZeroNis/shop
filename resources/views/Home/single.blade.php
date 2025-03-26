@extends("Home.layouts.master")
@section('content')
<!-- Start Product Section -->
<div class="product-detail-container">
    <div class="product-detail-card">
        <!-- Product Image Section -->
        <div class="product-image-container">
            <div class="product-image-wrapper">
                <img src="{{ asset('AdminAssets/Product-image/' . $products->image) }}"
                     class="product-image"
                     alt="{{ $products->name }}">
                @if($products->inventory <= 1)
                    <div class="out-of-stock-badge">
                        <span>ناموجود</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="product-info-container">
            <div class="product-header">
                <h1 class="product-title">{{ $products->name }}</h1>

                <div class="product-meta">
                    <span class="store-badge">
                        <i class="fas fa-store"></i> {{ $products->store->name ?? 'نامشخص' }}
                    </span>
                    <span class="category-badge">
                        <i class="fas fa-tags"></i> {{ $products->category->name ?? 'نامشخص' }}
                    </span>
                </div>

                <div class="product-price-container">
                    <span class="product-price">{{ number_format($products->price) }} تومان</span>
                    @if($products->discount > 0)
                        <span class="product-discount">{{ $products->discount }}% تخفیف</span>
                        <span class="product-original-price">{{ number_format($products->price + ($products->price * $products->discount / 100)) }} تومان</span>
                    @endif
                </div>
            </div>

            <div class="product-details-grid">
                <!-- Product Features -->
                <div class="product-features">
                    <div class="section-header">
                        <i class="fas fa-star"></i>
                        <h3>ویژگی‌های محصول</h3>
                    </div>
                    <ul class="feature-list">
                        @foreach(explode("\n", $products->description) as $feature)
                            <li class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Product Actions -->
                <div class="product-actions">
                    <div class="section-header">
                        <i class="fas fa-shopping-cart"></i>
                        <h3>خرید محصول</h3>
                    </div>

                    @if($products->inventory > 1)
                        @if (Auth::check())
                            @if (Auth::user()->status == 1)
                                <form action="{{ route('basket.add') }}" method="POST" id="my-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                    <button type="submit" class="add-to-cart-btn">
                                        <i class="fas fa-cart-plus"></i> افزودن به سبد خرید
                                    </button>
                                </form>
                            @else
                                <div class="alert-message error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    کاربر غیرفعال است و نمی‌تواند محصول به سبد خرید اضافه کند.
                                </div>
                            @endif
                        @else
                            <div class="alert-message warning">
                                <i class="fas fa-exclamation-triangle"></i>
                                برای افزودن به سبد خرید لطفا وارد شوید.
                            </div>
                        @endif
                    @else
                        <div class="alert-message error">
                            <i class="fas fa-times-circle"></i>
                            محصول ناموجود است.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Section -->
@endsection

@section("srcJs")
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#my-form'); !!}
@endsection

<style>
/* Base Styles */
:root {
    --primary-color: #4361ee;
    --secondary-color: #3f37c9;
    --success-color: #4cc9f0;
    --danger-color: #f72585;
    --warning-color: #f8961e;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    --text-color: #495057;
    --border-radius: 12px;
    --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease;
}

body {
    font-family: 'Vazir', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    color: var(--text-color);
}

/* Product Detail Container */
.product-detail-container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
}

.product-detail-card {
    display: flex;
    flex-direction: column;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    overflow: hidden;
    transition: var(--transition);
}

@media (min-width: 992px) {
    .product-detail-card {
        flex-direction: row;
    }
}

/* Product Image Section */
.product-image-container {
    padding: 2rem;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

@media (min-width: 992px) {
    .product-image-container {
        flex: 0 0 40%;
    }
}

.product-image-wrapper {
    position: relative;
    padding: 1rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.product-image {
    max-height: 400px;
    width: 100%;
    object-fit: contain;
    transition: var(--transition);
    transform: scale(1);
}

.product-image:hover {
    transform: scale(1.05);
}

.out-of-stock-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: var(--danger-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: bold;
    box-shadow: 0 4px 10px rgba(247, 37, 133, 0.3);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

/* Product Info Section */
.product-info-container {
    padding: 2rem;
    flex: 1;
}

@media (min-width: 992px) {
    .product-info-container {
        padding: 3rem;
    }
}

.product-header {
    margin-bottom: 2rem;
    border-bottom: 1px solid #eee;
    padding-bottom: 1.5rem;
}

.product-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 1rem;
    line-height: 1.3;
}

.product-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}

.store-badge, .category-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary-color);
}

.category-badge {
    background: rgba(76, 201, 240, 0.1);
    color: var(--success-color);
}

.product-price-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 1.5rem;
}

.product-price {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-color);
}

.product-original-price {
    font-size: 1.2rem;
    text-decoration: line-through;
    color: #adb5bd;
}

.product-discount {
    background: var(--danger-color);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: bold;
}

/* Product Details Grid */
.product-details-grid {
    display: grid;
    gap: 2rem;
}

@media (min-width: 768px) {
    .product-details-grid {
        grid-template-columns: 1fr 1fr;
    }
}

/* Features Section */
.product-features {
    background: rgba(248, 249, 250, 0.5);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    border: 1px solid #eee;
}

.section-header {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    margin-bottom: 1.5rem;
}

.section-header i {
    color: var(--primary-color);
    font-size: 1.2rem;
}

.section-header h3 {
    font-size: 1.3rem;
    font-weight: 600;
    margin: 0;
    color: var(--dark-color);
}

.feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 0.8rem;
    padding: 0.8rem 0;
    border-bottom: 1px dashed #eee;
}

.feature-item:last-child {
    border-bottom: none;
}

.feature-item i {
    color: var(--success-color);
    margin-top: 0.2rem;
    flex-shrink: 0;
}

/* Product Actions */
.product-actions {
    background: rgba(248, 249, 250, 0.5);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    border: 1px solid #eee;
    display: flex;
    flex-direction: column;
}

.add-to-cart-btn {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border: none;
    padding: 1rem;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    margin-top: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.8rem;
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
}

.add-to-cart-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
}

.add-to-cart-btn:active {
    transform: translateY(0);
}

/* Alert Messages */
.alert-message {
    padding: 1rem;
    border-radius: var(--border-radius);
    margin: 1rem 0;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    font-size: 0.95rem;
}

.alert-message i {
    font-size: 1.2rem;
}

.alert-message.error {
    background: rgba(247, 37, 133, 0.1);
    color: var(--danger-color);
    border-left: 4px solid var(--danger-color);
}

.alert-message.warning {
    background: rgba(248, 150, 30, 0.1);
    color: var(--warning-color);
    border-left: 4px solid var(--warning-color);
}

/* Product Stats */
.product-stats {
    margin-top: auto;
    padding-top: 1.5rem;
    display: grid;
    gap: 1rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    font-size: 0.95rem;
    color: var(--text-color);
}

.stat-item i {
    color: var(--primary-color);
    width: 1.5rem;
    text-align: center;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-title {
        font-size: 1.8rem;
    }

    .product-price {
        font-size: 1.6rem;
    }

    .product-details-grid {
        grid-template-columns: 1fr;
    }
}
</style>
