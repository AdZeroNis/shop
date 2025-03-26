@extends("Admin.layouts.master")

@section('content')
<div class="container my-5">


    <!-- Store Products and Categories -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">محصولات</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- نمایش محصولات -->
                @foreach ($store->products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <img src="{{ asset('AdminAssets/Product-image/' . $product->image) }}"
                                 class="card-img-top"
                                 alt="{{ $product->name }}"
                                 style="max-height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">
                                    <strong>قیمت:</strong> {{ $product->price }} تومان<br>
                                    <strong>موجودی:</strong> {{ $product->inventory }}<br>
                                    <strong>دسته‌بندی:</strong> {{ $product->category->name ?? 'دسته‌بندی مشخص نشده' }}<br>
                                    <strong>توضیحات:</strong> {{ $product->description ?? 'بدون توضیحات' }}<br>
                                    <strong>تاریخ ثبت:</strong> {{$product->created_at}}
                                </p>
                            </div>
                            <div class="card-footer text-muted">
                                <small>مغازه: {{ $store->name }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
