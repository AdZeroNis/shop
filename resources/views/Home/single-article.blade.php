@extends("Home.layouts.master")
@section('content')

<!-- Start Product Section -->
<div class="container my-4">
    <div class="row bg-light shadow-sm rounded-lg overflow-hidden flex-column">
        <!-- Product Image Section -->
        <div class="col-12 bg-white p-3 text-center">
            <div class="box_img border p-2 rounded-lg shadow-sm bg-gradient-light">
                <img src="{{ asset('AdminAssets/Aticles-image/' . $articles->image) }}"
                     class="img-fluid rounded-lg"
                     alt="{{ $articles->title }}"
                     style="max-height: 400px; object-fit: contain; width: 100%;">
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="col-12 p-3">
            <h1 class="product-title font-weight-bold mb-3 text-gradient-primary text-center">
                {{ $articles->title }}
            </h1>
            <h6 class="text-center">
                نویسنده: {{ $articles->user->name }}
            </h6>
            <h6 class="text-center">
                تاریخ انتشار : {{$articles->created_at}}
            </h6>
            <hr class="border-bottom border-primary mb-3">

            <div class="row justify-content-center">
                <!-- Product Features -->
                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm border-0 bg-gradient-light overflow-auto" style="max-height: none;">
                        <div class="card-body">
                            <!-- Full Content without line clamp -->
                            @foreach(explode("\n", $articles->content) as $feature)
                                <p class="text-dark">{{ $feature }}</p>
                            @endforeach
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
