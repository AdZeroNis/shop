@extends('Admin.layouts.master')

@section('content')
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <h4 class="text-center">سفارشات کاربران</h4>
            <div class="table-responsive mb-4">
                <table id="style-3" class="table style-3 table-hover">
                    <thead>
                        <tr>
                            <th>نام کاربر</th>
                            <th>آدرس</th>
                            <th>تصویر محصول</th>
                            <th>نام محصول</th>
                          

                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td><img src="{{ asset('AdminAssets/Product-image/'.$item->product->image) }}" class="img-fluid" width="100"></td>
                                    <td>{{ $item->product->name }}</td>


                                    <td>
                                        @if ($order->status == 0)
                                            در حال پردازش
                                        @elseif ($order->status == 1)
                                            ارسال شده
                                        @else
                                            عدم ارسال
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.updateOrderStatus', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select">
                                                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>در حال پردازش</option>
                                                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>ارسال شده</option>
                                                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>عدم ارسال</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-2">بروزرسانی</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">سفارشی وجود ندارد</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
