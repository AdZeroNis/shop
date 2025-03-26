@extends("Home.layouts.master")
@section('content')

<!-- Start Product Section -->
<div class="container my-4">
    <div class="row bg-light shadow-sm rounded-lg overflow-hidden">
        <!-- Product Image Section -->
        <div class="col-lg-4 bg-white p-3">
            <div class="box_img border p-2 rounded-lg shadow-sm bg-gradient-light text-center">
                <img src="{{ asset('AdminAssets/Product-image/' . $products->image) }}"
                     class="img-fluid rounded-lg"
                     alt="{{ $products->name }}"
                     style="max-height: 300px; object-fit: contain;">
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="col-lg-8 p-3">
            <h1 class="product-title font-weight-bold mb-3 text-gradient-primary">
                {{ $products->name }}
            </h1>
            <hr class="border-bottom border-primary mb-3">

            <div class="row">
                <!-- Product Features -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm border-0 bg-gradient-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-success font-weight-bold mb-3">
                                <i class="fas fa-star mr-2"></i>ویژگی‌های محصول
                            </h5>
                            <ul class="list-group list-group-flush">
                                @foreach(explode("\n", $products->description) as $feature)
                                    <li class="list-group-item d-flex align-items-center bg-transparent py-2">
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <span class="text-dark">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Product Price and Actions -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm border-0 bg-gradient-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary font-weight-bold mb-3">
                                <i class="fas fa-tags mr-2"></i>قیمت و اقدامات
                            </h5>
                            @if($products->inventory > 1)
                                <p class="price h4 text-gradient-primary font-weight-bold mb-3">
                                    {{ number_format($products->price) }} تومان
                                </p>
                                @if (Auth::check())
                                    @if (Auth::user()->status == 1)
                                        <form action="{{ route('basket.add') }}" method="POST" id="my-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                                            <button type="submit" class="btn btn-success btn-block shadow-sm btn-gradient">
                                                <i class="fas fa-cart-plus mr-2"></i> افزودن به سبد خرید
                                            </button>
                                        </form>
                                    @else
                                        <div class="alert alert-danger mt-2 shadow-sm p-2">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            کاربر غیرفعال است و نمی‌تواند محصول به سبد خرید اضافه کند.
                                        </div>
                                    @endif
                                @else
                                    <div class="alert alert-warning mt-2 shadow-sm p-2">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        برای افزودن به سبد خرید لطفا وارد شوید.
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-danger mt-2 shadow-sm p-2">
                                    <i class="fas fa-times-circle mr-2"></i>
                                    محصول ناموجود است.
                                </div>
                            @endif
                        </div>
                    </div>
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
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#my-form'); !!}
@endsection

<style>
    /* گرادیانت برای پس‌زمینه */
    .bg-gradient-light {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* گرادیانت برای دکمه‌ها */
    .btn-gradient {
        background: linear-gradient(135deg, #28a745, #218838);
        border: none;
        color: white;
        transition: transform 0.2s ease-in-out;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
    }

    /* سایه‌های زیباتر */
    .shadow-sm {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* حاشیه‌های گرد */
    .rounded-lg {
        border-radius: 10px;
    }

    /* انیمیشن hover برای کارت‌ها */
    .card {
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-3px);
    }
</style>
