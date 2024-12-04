@extends("Home.layouts.master")


@section('content')
<a href="#">
    <div class="container-fluid mt-2 ">
        <div class="top_banner box_shadow ">
            <div></div>
        </div>
    </div>
</a>
<!--start slider-->
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel1">
                <ol class="carousel-indicators">
                    {{-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> --}}

                    @foreach ($sliderImages as $sliderImage)
                    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                    @endforeach
                </ol>
                <div class="carousel-inner rounded box_shadow">

                    @foreach ($sliderImages as $sliderImage)
                    <div class="carousel-item {{$loop->first ? 'active' : '' }}">
                        <a href="#"><img src="{{asset("AdminAssets/Slider-image/".$sliderImage->image)}}" class="d-block w-100" alt=""></a>
                    </div>
                    @endforeach

                </div>
                <a class="carousel-control-prev prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!--start service-->
{{-- <div class="container-fluid mt-3 pt-2">
    <div class="row bg-white box_shadow">
        <div class="col-md-3 col-6 serv text-center">
            <img src="img/serv3.svg">
            <p>ضمانت اصل بودن کالا</p>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <img src="img/serv4.svg">
            <p>هفت روز صمانت بازگشت</p>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <img src="img/serv2.svg">
            <p>پرداخت درب منزل</p>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <img src="img/serv5.svg">
            <p>پشتیبانی همه روزه</p>
        </div>
    </div>
</div> --}}
<!--start ads-->
<div class="container-fluid ads mt-3 pt-2">
    <div class="row">
        <div class="col-md-3 col-6 text-center">
            <a href="#">
                <img src="img/ads1.png" class="w-100 d-block shadow-sm" alt="">
            </a>
        </div>
        <div class="col-md-3 col-6 text-center">
            <a href="#">
                <img src="img/ads2.png" class="w-100 d-block shadow-sm" alt="">
            </a>
        </div>
        <div class="col-md-3 col-6 text-center">
            <a href="#">
                <img src="img/ads3.png" class="w-100 d-block shadow-sm" alt="">
            </a>
        </div>
        <div class="col-md-3 col-6 text-center">
            <a href="#">
                <img src="img/ads4.png" class="w-100 d-block shadow-sm" alt="">
            </a>
        </div>
    </div>
</div>
<!--start sldier p-->
{{-- <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-9">
            <section class="slider box_shadow">
                <div class="card panel-title-custom">
                    <div class="card-header card-header-custom" style="margin-bottom: 60px;">
                        <p>کالای دیجیتال</p>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme">
                            @foreach ( $digiProducts  as $digiProduct)


                            <div class="item">
                                <a href="{{route("product",$digiProduct->id)}}">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="{{asset("AdminAssets/Product-image/".$digiProduct->image)}}">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>{{$digiProduct->name}}</h4>
                                            <p> {{$digiProduct->price}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3 mt-3 mt-md-0 ">
            <div id="carousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card card-custom shadow-sm ">
                            <div class="card-header card-header-custom text-center">پیشنهاد های لحظه ای برای شما</div>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="card panel-custom2 rounded-0 shadow-sm ">
                                    <div class="card-body text-center panel-body-custom">
                                        <img src="img/3535831.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="card-footer panel-footer-custom">
                                        <h4 class="p-2">لپ تاپ 15 اینچی ایسوس مدل VivoBook X541NA - D</h4>
                                        <p>123000 هزار تومان</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="card card-custom">
                            <div class="card-header card-header-custom text-center">پیشنهاد های لحظه ای برای شما</div>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="card panel-custom2">
                                    <div class="card-body text-center panel-body-custom">
                                        <img src="img/3535831.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="card-footer panel-footer-custom">
                                        <h4 class="p-2">لپ تاپ 15 اینچی ایسوس مدل VivoBook X541NA - D</h4>
                                        <p>123000 هزار تومان</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="card card-custom">
                            <div class="card-header card-header-custom text-center">پیشنهاد های لحظه ای برای شما</div>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="card panel-custom2">
                                    <div class="card-body text-center panel-body-custom">
                                        <img src="img/3535831.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="card-footer panel-footer-custom">
                                        <h4 class="p-2">لپ تاپ 15 اینچی ایسوس مدل VivoBook X541NA - D</h4>
                                        <p>123000 هزار تومان</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="card card-custom">
                            <div class="card-header card-header-custom text-center">پیشنهاد های لحظه ای برای شما</div>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="card panel-custom2">
                                    <div class="card-body text-center panel-body-custom">
                                        <img src="img/3535831.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="card-footer panel-footer-custom">
                                        <h4 class="p-2">لپ تاپ 15 اینچی ایسوس مدل VivoBook X541NA - D</h4>
                                        <p>123000 هزار تومان</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="card card-custom">
                            <div class="card-header card-header-custom text-center">پیشنهاد های لحظه ای برای شما</div>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="card panel-custom2">
                                    <div class="card-body text-center panel-body-custom">
                                        <img src="img/3535831.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="card-footer panel-footer-custom">
                                        <h4 class="p-2">لپ تاپ 15 اینچی ایسوس مدل VivoBook X541NA - D</h4>
                                        <p>123000 هزار تومان</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--start sldier-->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            @foreach ($digiCategories as $category)
            <section class="slider box_shadow">
                <div class="card panel-title-custom">
                    <div class="card-header card-header-custom">
                        <p>{{ $category->name }}</p> <!-- نمایش نام دسته‌بندی -->
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme">
                            @foreach ($category->products as $product)
                            <div class="item">
                                <a href="{{ route('product', $product->id) }}">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>{{ $product->name }}</h4>
                                            <p>{{ $product->price }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
    </div>
</div>

<!--start ads-->
{{-- <div class="container-fluid ads mt-4">
    <div class="row">
        <div class="col-md-3 col-6 serv text-center">
            <a href="#"><img src="img/ads8.jpg" class="w-100 d-block rounded" alt=""></a>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <a href="#"><img src="img/ads5.jpg" class="w-100 d-block rounded" alt=""></a>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <a href="#"><img src="img/ads6.jpg" class="w-100 d-block rounded" alt=""></a>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <a href="#"><img src="img/ads7.jpg" class="w-100 d-block rounded" alt=""></a>
        </div>
    </div>
</div> --}}
<!--start sldier-->
{{-- <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <section class="slider box_shadow">
                <div class="card panel-title-custom">
                    <div class="card-header card-header-custom">
                        @foreach ($digiCategories as $category)
                            <p>{{ $category->name }}</p> <!-- نمایش نام دسته‌بندی -->
                        @endforeach
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme">

                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/3307088.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/2766832.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/1687421.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/3307088.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/2766832.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/1687421.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/3307088.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/2766832.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/1687421.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div> --}}
<!--start ads-->
<div class="container-fluid ads mt-3">
    <div class="row">
        <div class="col-6 serv text-center">
            <a href="#"><img src="img/2066.jpg" class="w-100 d-block rounded" alt=""></a>
        </div>
        <div class="col-6 serv text-center">
            <a href="#"><img src="img/2070.jpg" class="w-100 d-block rounded" alt=""></a>
        </div>
    </div>
</div>
<!--start sldier-->
{{-- <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <section class="slider box_shadow">
                <div class="card panel-title-custom">
                    <div class="card-header card-header-custom">
                        <p>خانه و آشپزخانه</p>
                        <a href="#" class="float-left">مشاهده همه</a>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme">

                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/3307088.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/2766832.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/1687421.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/3307088.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/2766832.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/1687421.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/3307088.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/2766832.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/1687421.jpg">
                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4>10 بسته دستمال کاغذی 200 برگ ایزی پیک</h4>
                                            <p>12300 هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div> --}}
<!--start sldier-->
{{-- <div class="container-fluid mt-3">
    <div class="row mb-4">
        <div class="col-12">
            <section class="slider box_shadow">
                <div class="card panel-title-custom">
                    <div class="card-header card-header-custom">
                        <p>برند های ویژه
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme">

                            <div class="item1">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/pa.png">
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="item1">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/ad.png">
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="item1">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/par.png">
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="item1">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/xv.png">
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="item1">
                                <a href="#">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="img/lg.png">
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div> --}}

<!--start jump-to-top-->
<div class="container-fluid text-center box_jump_top">
    <a href="#" id="back2Top" class="d-block jump_top pt-2 pb-2">
        <i class="material-icons">
            expand_less
        </i>
        <span>برگشت به بالا</span>
    </a>
</div>
@endsection
