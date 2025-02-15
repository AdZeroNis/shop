@extends('Admin.layouts.master')

@section('content')
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <!-- Search and Filter Form -->
                        <form method="GET" action="{{ route('Account.Product.Index') }}" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="جستجو بر اساس نام  محصول" value="{{ request('search') }}">
                                </div>

                                <div class="col-md-4">
                                    <select name="status" class="form-control">
                                        <option value="">تمام وضعیت ها</option>
                                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>فعال</option>
                                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>غیرفعال</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="Id_category" class="selectpicker form-control p-2">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">جستجو</button>
                                </div>
                            </div>
                        </form>>


                        <div class="table-responsive mb-4">
                            <table id="style-3" class="table style-3  table-hover">
                                <thead>
                                    <tr>
                                        <th>نام  محصول</th>
                                        <th> قیمت محصول</th>
                                        <th class="text-center">تعداد موجودی</th>
                                        <th class="text-center">دسته بندی محصولات</th>
                                        <th class="text-center">توضیحات</th>
                                        <th class="text-center">تصویر</th>
                                        <th class="text-center">وضیعت</th>
                                        <th class="text-center">عمل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{Str::limit($product->name, 25, "...")}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->inventory}}</td>

                                        <!-- نمایش دسته‌بندی مرتبط با محصول -->
                                        <td>{{$product->category->name}}</td>

                                        <td>{{Str::limit($product->description, 50, "...")}}</td>
                                        <td class="text-center">
                                            <span><img src="{{asset("AdminAssets/Product-image/".$product->image)}}" width="65px" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td class="text-center">
                                            <span class="shadow-none badge badge-{{ $product->status == '1' ? 'success' : 'danger' }}">
                                                {{ $product->status == '1' ? 'فعال' : 'غیرفعال' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <a href="{{route("Account.Product.Edit",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                                </a>
                                                <a href="{{route("Account.Product.Delete",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                      </svg>
                                                </a>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>



                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
