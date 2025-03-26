@extends("Admin.layouts.master")

@section('content')
<div class="container my-5">
    <!-- Store Details Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">اطلاعات مغازه</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- اطلاعات مغازه -->
                <div class="col-md-6">
                    <p><strong>نام مغازه:</strong> {{ $store->name }}</p>
                    <p><strong> ادمین مغازه:</strong> {{ $store->admin->name }}</p>
                    <p><strong>شماره تماس ادمین مغازه:</strong> {{ $store->admin->phone }}</p>
                    <p><strong> آدرس مغازه:</strong> {{ $store->address }}</p>
                    <p><strong> تاریخ ثبت:</strong> {{ $store->created_at }}</p>
                </div>

                <!-- عکس مغازه -->
                <div class="col-md-6 d-flex align-items-center justify-content-start mb-3 mb-md-0">
                    <img src="{{ asset('AdminAssets/Store-image/' . $store->image) }}"
                         class="img-fluid rounded w-100"
                         alt="{{ $store->name }}" style="max-width: 200px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Store Products and Categories -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">محصولات و دسته‌بندی‌ها</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- نمایش تعداد دسته‌بندی‌ها -->
                <div class="col-md-6">
                    <h5>دسته‌بندی‌ها</h5>
                    <p><strong>تعداد دسته‌بندی‌ها:</strong> {{ $store->categories->count() }}</p>
                    <ul>
                        @foreach ($store->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- نمایش تعداد محصولات همراه با دسته‌بندی‌ها -->
                <div class="col-md-6">
                    <h5>محصولات</h5>
                    <p><strong>تعداد محصولات:</strong> {{ $store->products->count() }}</p>
                    <ul>
                        @foreach ($store->products as $product)
                            <li>
                                {{ $product->name }} - قیمت: {{ $product->price }} تومان
                                <br>
                                <strong>دسته‌بندی:</strong>
                                {{ $product->category->name ?? 'دسته‌بندی مشخص نشده' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
