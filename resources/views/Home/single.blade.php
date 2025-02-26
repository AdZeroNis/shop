@extends("Home.layouts.master")
@section('content')

<!--start product -->
<div class="container-fluid box_product">
    <div class="row bg-success">
        <div class="col-lg-4 bg-white">
            <div class="row">
                <div class="col-lg-2 col-2 gallery_options">
                    <ul class="list-inline">

                    </ul>
                </div>
                <div class="col-lg-9 col-10">
                    <div class="box_img border-bottom text-center pt-0 pt-md-4">
                        <img src="{{asset("AdminAssets/Product-image/".$products->image)}}" class="img-fluid">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8 product-info">
            <div class="row text-center text-md-left ">
                <div class="col-md-9 pt-3">
                    <h1 class="product-title">
                        {{$products->name}}
                        <span></span>
                    </h1>
                </div>
            </div>
            <div class="border_bottom"></div>
            <div class="row">
                <!-- Display product features first -->
                <div class="col-md-4 product_params bg-transparent mt-2 text-center text-md-left">
                    <div class="box2 mt-4">
                        <span>ویژگی‌های محصول</span>
                        <ul>
                            @foreach(explode("\n", $products->description) as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Display product price next -->
                <div class="col-md-8">
                    <div class="box_price mt-2 text-center text-md-left">
                        @if($products->inventory > 1)
                            <p class="price" style="color:#215e9f !important">{{$products->price}} تومان</p>
                            @if (Auth::check())
                                @if (Auth::user()->status == 1)
                                    <form action="{{ route('basket.add') }}" method="POST" id="my-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                                        <button type="submit" class="btn btn_custom2 shadow-sm">
                                            <i class="material-icons"></i> افزودن به سبد خرید
                                        </button>
                                    </form>
                                @else
                                    <p class="text-danger" style="font-size:17px">کاربر غیرفعال است و نمی‌تواند محصول به سبد خرید اضافه کند.</p>
                                @endif
                            @else
                                <p class="text-danger" style="font-size:17px">برای افزودن به سبد خرید لطفا وارد شوید.</p>
                            @endif
                        @else
                            <p class="text-danger" style="font-size:17px">محصول ناموجود است.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mt-4 pb-4 text-center text-md-left">
                <div class="col-md-6 box_offer text-right text-center text-md-right"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("srcJs")
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#my-form'); !!}
@endsection
