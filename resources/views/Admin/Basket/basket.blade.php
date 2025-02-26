@extends('Admin.layouts.master')

@section('content')
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <!-- User Name -->
            <div class="row">
                <div class="col-md-6">

                </div>
            </div>
            <div class="table-responsive mb-4">
                <table id="style-3" class="table style-3 table-hover">
                    <thead>
                        <tr>
                            <th>نام کاربر</th>
                            <th>تصویر محصول</th>
                            <th>نام محصول</th>
                            <th>تعداد</th>
                            <th>قیمت واحد</th>
                            <th>جمع کل</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($basketItems as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td><img src="{{ asset('AdminAssets/Product-image/'.$item->product->image) }}" class="img-fluid" width="100"></td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->product->price }} تومان</td>

                                <td>{{ $item->product->price * $item->quantity }} تومان</td>
                                <td class="text-center">
                                    <a href="{{ route('Account.Basket.Delete', $item->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @if($basketItems->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">سبد خرید شما خالی است</td>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
