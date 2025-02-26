<div class="container-fluid shadow-sm bg-white">
    <div class="row p-3 align-items-center">
        <div class="col-lg-2 col-md-3 col-sm-3 col-6 pr-2 box-logo">
            <span class="logo"></span>
        </div>
        <div class="col-lg-6 col-md-4 col-sm-3 col-6">
            {{-- <form action="{{ route('search') }}" method="GET">
                <div class="input-group input-group-sm">
                    <input type="text" name="query" class="form-control rounded-right input_search"
                           placeholder="نام کالا , برند و یا دسته مورد نظر خود را جستجو کنید..">
                    <div class="input-group-prepend">
                        <div class="input-group-text custom-input-group-text rounded-left">
                            <button type="submit" style="background: none; border: none;"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                </div>
            </form> --}}
        </div>
        <div class="col-lg-4 col-md-5 col-sm-6 col-12 d-flex justify-content-end align-items-center">
            <div class="dropdown mr-3">
                @auth
                <a class="dropdown-toggle text-primary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false" style="line-height: 52px !important;
                   background-color: #007bff;
                   padding: 0.75rem 1.75rem;
                   border-radius: 11px;
                   color: white !important;">
                   {{ auth()->user()->name }}
                </a>

                <div class="dropdown-menu border-0 shadow rounded-0 dropdown-menu_custom text-center"
                     aria-labelledby="dropdownMenuButton">
                    <!-- لیست سفارشات کاربر -->
                    <div class="dropdown-divider"></div>
                    <div class="text-left">
                        <ul class="list-group">
                            @if (auth()->user()->orders)
                                    <button onclick="location.href='{{ route('orders.index') }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                        <i class="material-icons profile_link pr-2"></i> سفارشات
                                    </button>

                            @else
                                <li class="list-group-item">No orders found</li>
                            @endif
                        </ul>
                    </div>


                    <!-- لینک به پنل پروفایل یا ادمین -->
                    <div class="dropdown-divider"></div>
                    <div class="text-left">
                        @if (auth()->user()->user_role == 1)
                            <!-- لینک به پنل ادمین -->
                            <button onclick="location.href='{{ route('dashboard') }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                <i class="material-icons profile_link pr-2"></i>پنل ادمین
                            </button>
                        @endif
                        <button onclick="location.href='{{ route('ShowProfile', ['id' => auth()->user()->id]) }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                            <i class="material-icons profile_link pr-2"></i>پروفایل
                        </button>
                        <form id="logout-form" action="{{ route('Logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item border-0 dropdown-item_custom" type="button">
                            <i class="material-icons profile_link pr-2"></i>خروج
                        </button>

                    </div>
                </div>
                @else
                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false" style="line-height: 52px !important;
                   background-color: #007bff;
                   padding: 0.75rem 1.75rem;
                   border-radius: 11px;
                   color: white !important;">
                   ورود/ثبت نام
                </a>
                <div class="dropdown-menu border-0 shadow rounded-0 dropdown-menu_custom text-center"
                     aria-labelledby="dropdownMenuButton">
                    <div class="btn login_box">
                        <a class="dropdown-item dropdown-item-custom py-2 btn btn-info" href="{{ route('FormLogin') }}">ورود به حساب</a>
                    </div>
                    <ul class="list-inline register">
                        <li class="list-inline-item">کاربر جدید هستید؟</li>
                        <li class="list-inline-item"><a href="{{ route('FormRegister') }}">ثبت نام</a></li>
                    </ul>
                </div>
                @endauth
            </div>
            <a href="{{route('basket.Factor')}}" class="btn btn-outline-info" style="@auth
                padding: 10px;
    border-radius: 7px;

    padding-left: 23px;
    padding-right: 23px;
            @endauth"><i class="material-icons shopping_cart"></i> سبد خرید</a>
        </div>
    </div>
</div>
