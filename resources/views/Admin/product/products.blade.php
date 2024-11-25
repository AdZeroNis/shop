@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>سبک 3</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
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
                                        <td class="text-center"><span class="shadow-none badge badge-primary">تایید شده</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <a href="{{route("Account.Product.Edit",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{route("Account.Product.Delete",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{route("Account.Product.Createimage",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="افزودن تصویر">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M16 13.25A1.75 1.75 0 0 1 14.25 15H1.75A1.75 1.75 0 0 1 0 13.25V2.75C0 1.784.784 1 1.75 1h12.5c.966 0 1.75.784 1.75 1.75ZM1.75 2.5a.25.25 0 0 0-.25.25v10.5c0 .138.112.25.25.25h.94l.03-.03l6.077-6.078a1.75 1.75 0 0 1 2.412-.06L14.5 10.31V2.75a.25.25 0 0 0-.25-.25Zm12.5 11a.25.25 0 0 0 .25-.25v-.917l-4.298-3.889a.25.25 0 0 0-.344.009L4.81 13.5ZM7 6a2 2 0 1 1-3.999.001A2 2 0 0 1 7 6M5.5 6a.5.5 0 1 0-1 0a.5.5 0 0 0 1 0"/></svg>
                                                </a>
                                                <a href="{{route("Admin.Product.images",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" تصاویر">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M16 13.25A1.75 1.75 0 0 1 14.25 15H1.75A1.75 1.75 0 0 1 0 13.25V2.75C0 1.784.784 1 1.75 1h12.5c.966 0 1.75.784 1.75 1.75ZM1.75 2.5a.25.25 0 0 0-.25.25v10.5c0 .138.112.25.25.25h.94l.03-.03l6.077-6.078a1.75 1.75 0 0 1 2.412-.06L14.5 10.31V2.75a.25.25 0 0 0-.25-.25Zm12.5 11a.25.25 0 0 0 .25-.25v-.917l-4.298-3.889a.25.25 0 0 0-.344.009L4.81 13.5ZM7 6a2 2 0 1 1-3.999.001A2 2 0 0 1 7 6M5.5 6a.5.5 0 1 0-1 0a.5.5 0 0 0 1 0"/></svg>
                                                </a>
                                                <a href="{{route("Account.Product.Createcolor",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" افزودن رنگ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" d="M430.11 347.9c-6.6-6.1-16.3-7.6-24.6-9c-11.5-1.9-15.9-4-22.6-10c-14.3-12.7-14.3-31.1 0-43.8l30.3-26.9c46.4-41 46.4-108.2 0-149.2c-34.2-30.1-80.1-45-127.8-45c-55.7 0-113.9 20.3-158.8 60.1c-83.5 73.8-83.5 194.7 0 268.5c41.5 36.7 97.5 55 152.9 55.4h1.7c55.4 0 110-17.9 148.8-52.4c14.4-12.7 11.99-36.6.1-47.7Z"/><circle cx="144" cy="208" r="32" fill="currentColor"/><circle cx="152" cy="311" r="32" fill="currentColor"/><circle cx="224" cy="144" r="32" fill="currentColor"/><circle cx="256" cy="367" r="48" fill="currentColor"/><circle cx="328" cy="144" r="32" fill="currentColor"/></svg>
                                                </a>
                                                <a href="{{route("Admin.Product.colors",$product->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" نمایش رنگ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" d="M430.11 347.9c-6.6-6.1-16.3-7.6-24.6-9c-11.5-1.9-15.9-4-22.6-10c-14.3-12.7-14.3-31.1 0-43.8l30.3-26.9c46.4-41 46.4-108.2 0-149.2c-34.2-30.1-80.1-45-127.8-45c-55.7 0-113.9 20.3-158.8 60.1c-83.5 73.8-83.5 194.7 0 268.5c41.5 36.7 97.5 55 152.9 55.4h1.7c55.4 0 110-17.9 148.8-52.4c14.4-12.7 11.99-36.6.1-47.7Z"/><circle cx="144" cy="208" r="32" fill="currentColor"/><circle cx="152" cy="311" r="32" fill="currentColor"/><circle cx="224" cy="144" r="32" fill="currentColor"/><circle cx="256" cy="367" r="48" fill="currentColor"/><circle cx="328" cy="144" r="32" fill="currentColor"/></svg>
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

