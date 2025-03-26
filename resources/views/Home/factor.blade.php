@extends("Home.layouts.master")
@section('content')

<div class="container-fluid box_cart">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center mb-4" style="color: #383330; font-family: 'Roboto', sans-serif;">سبد خرید شما</h1>
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th style="font-size: 16px; font-weight: bold;  background-color: #FFF5E4;">تصویر محصول</th>
                        <th style="font-size: 16px; font-weight: bold; background-color: #FFF5E4;">نام محصول</th>
                        <th style="font-size: 16px; font-weight: bold;background-color: #FFF5E4;">تعداد</th>
                        <th style="font-size: 16px; font-weight: bold; background-color: #FFF5E4;">قیمت</th>
                        <th style="font-size: 16px; font-weight: bold; background-color: #FFF5E4;">جمع</th>
                        <th style="font-size: 16px; font-weight: bold; background-color: #FFF5E4;">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($basketItems as $item)
                        <tr>
                            <td style="vertical-align: middle; background-color: white;">
                                <img src="{{ asset('AdminAssets/Product-image/'.$item->product->image) }}" class="img-fluid" width="100" style="max-width: 22% !important;">
                            </td>
                            <td style="vertical-align: middle; font-size: 14px; color: #455947; background-color: white;">{{ $item->product->name }}</td>
                            <td style="vertical-align: middle; background-color: white;">
                                <form action="{{ route('basket.updateQuantity', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="submit" name="action" value="decrease" class="btn btn-outline-danger">-</button>
                                        </div>
                                        <input type="text" name="quantity" class="form-control text-center" value="{{ $item->quantity }}" readonly>
                                        <div class="input-group-append">
                                            <button type="submit" name="action" value="increase" class="btn btn-outline-success">+</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td style="vertical-align: middle; font-size: 14px; color: #455947; background-color: white;">{{ number_format($item->product->price) }} تومان</td>
                            <td style="vertical-align: middle; font-size: 14px; color: #455947; background-color: white;">{{ number_format($item->product->price * $item->quantity) }} تومان</td>
                            <td style="vertical-align: middle; text-align: center; background-color: white;">
                                <a href="{{ route('basket.Delete', $item->id) }}" class="text-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">سبد خرید شما خالی است</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <h4 style="color: #2C3E50;">مجموع: <span style="color: #455947;">{{ number_format($totalPrice) }} تومان</span></h4>
                <form action="{{ route('order.factor') }}" method="POST" class="w-50">
                    @csrf
                    <div class="form-group">
                        <label for="address" class="font-weight-bold">آدرس ارسال</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}" placeholder="آدرس ارسال خود را وارد کنید">
                    </div>
                    <button type="submit" class="btn btn-warning btn-block text-white mt-3" style="background-color: #FBE4D6; color: #455947 !important;">ثبت سفارش</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
