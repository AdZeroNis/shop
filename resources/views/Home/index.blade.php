@extends("Home.layouts.master")

@section('content')
<a href="#">
    <div class="container-fluid mt-2 ">
        <div class="top_banner box_shadow ">
            <div></div>
        </div>
    </div>
</a>

<!-- Start slider for categories and products -->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            @foreach ($digiCategories as $category)
            <section class="slider box_shadow">
                <div class="card panel-title-custom">
                    <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                        <p>{{ $category->name }}</p> <!-- Display the category name -->
                        <!-- "View All" Button -->
                        <a href="{{ route('category.products', $category->id) }}" class="btn btn-primary" style="color: white !important;"> مشاهده همه محصولات</a>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme">
                            @foreach ($category->products as $product)
                                @if ($product->status == 1) <!-- Only show active products -->
                                <div class="item">
                                    <a href="{{ route('product', $product->id) }}">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>{{ $product->name }}</h4>
                                                <p>{{ $product->price }} تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
    </div>
</div>
@endsection
