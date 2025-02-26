@extends('Home.layouts.master')
@section('content')
<div class="container box_cart">
    <h1 class="text-center">سفارش‌های شما</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>شماره سفارش</th>
                <th>تاریخ</th>
                <th>مجموع قیمت</th>
                <th>وضعیت</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->total_price }} تومان</td>
                    <td>
                        @if ($order->status == 0)
                        <span class="text-primary">در حال پردازش</span>
                    @elseif ($order->status == 1)
                        <span class="text-success">ارسال شده</span>
                    @else
                        <span class="text-danger">عدم ارسال</span>
                    @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">سفارشی ثبت نشده است</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
