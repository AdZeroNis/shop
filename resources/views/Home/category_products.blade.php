@extends("Home.layouts.master")

@section('content')

<a href="#">
    <div class="container-fluid mt-2">
        <div class="top_banner box_shadow">
            <div></div>
        </div>
    </div>
</a>

<!-- Display products -->
<div class="container mt-5"> <!-- Changed container-fluid to container for centering -->
    <div class="row justify-content-center"> <!-- Added justify-content-center to center the cards -->
        @foreach ($products as $product)
        @if ($product->status == 1) <!-- Only show active products -->
        <div class="col-md-3 col-sm-6 mb-4"> <!-- Display products in a 4-column grid for large screens and 2-column for small screens -->
            <div class="card h-100 product-card box_shadow" style="max-width: 250px;"> <!-- Added max-width to make cards smaller -->
                <a href="{{ route('product', $product->id) }}" class="text-decoration-none">
                    <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 150px;"> <!-- Reduced image height -->
                </a>
                <div class="card-body text-center">
                    <a href="{{ route('product', $product->id) }}" class="text-dark text-decoration-none">
                        <h5 class="card-title" style="font-size: 16px;">{{ $product->name }}</h5> <!-- Reduced font size -->
                    </a>
                    <p class="card-text mt-2" style="font-size: 14px;">{{ $product->price }} تومان</p> <!-- Reduced font size -->
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection
