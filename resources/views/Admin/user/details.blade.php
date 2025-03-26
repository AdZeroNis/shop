@extends("Admin.layouts.master")

@section('content')
<div class="container my-5">
    <!-- User Details Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">اطلاعات کاربری</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>نام کاربری:</strong> {{ $user->name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>ایمیل:</strong> {{ $user->email }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>شماره تماس:</strong> {{ $user->phone }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong> آدرس:</strong> {{ $user->address }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong> تاریخ پیوست:</strong> {{ $user->created_at }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Store Details Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">اطلاعات مغازه</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>نام مغازه:</strong> {{ $store->name }}</p>
                </div>

                <div class="col-md-6">
                    <div class="text-center">
                        <img src="{{ asset('AdminAssets/Store-image/' . $store->image) }}"
                             class="img-fluid rounded"
                             alt="{{ $store->name }}" style="max-width: 100px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <p><strong> تاریخ ثبت:</strong> {{ $store->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
