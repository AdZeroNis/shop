@extends("Home.layouts.master")

@section('content')
<a href="#">
    <div class="container-fluid mt-2">
        <div class="top_banner box_shadow">
            <div></div>
        </div>
    </div>
</a>

<!-- Start slider for categories and products -->
<div class="container-fluid mt-3">
    <div class="row">
        @foreach ($products as $product) <!-- Looping through products -->
        @if ($product->status == 1) <!-- Only show active products -->
        <div class="col-md-3 col-sm-6 mb-3"> <!-- Display products in a 4-column grid for large screens and 2-column for small screens -->
            <section class="slider box_shadow">
                <div class="card-body">
                    <div class="item">
                        <a href="{{ route('product', $product->id) }}">
                            <div class="card panel-custom">
                                <div class="card-body panel-body-custom">
                                    <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}" alt="{{ $product->name }}" style="width:303px !important;">
                                </div>
                                <div class="card-footer panel-footer-custom">
                                    <h4>{{ $product->name }}</h4>
                                    <p>{{ $product->price }} تومان</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
        @endif
        @endforeach <!-- End of the product loop -->
    </div>
</div>
@endsection
