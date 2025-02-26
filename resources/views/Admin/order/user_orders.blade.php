<!-- resources/views/Admin/order/user_orders.blade.php -->

@extends('Admin.layouts.master')

@section('content')

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <h4>سفارشات {{ $user->name }}</h4>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive mb-4">
                <table id="style-3" class="table style-3 table-hover">
                    <thead>
                        <tr>
                            <th>شناسه سفارش</th>
                            <th>آدرس</th>
                            <th>مجموع قیمت</th>
                            <th>وضعیت</th>
                            <th>تاریخ سفارش</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                @if($order->status == 0)
                                در حال پردازش
                                @elseif($order->status == 1)
                                ارسال شده
                                @else
                                لغو شده
                                @endif
                            </td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
