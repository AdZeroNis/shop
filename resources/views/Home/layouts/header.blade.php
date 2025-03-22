<div class="container-fluid shadow-sm bg-white">
    <div class="row p-3 align-items-center">
        <div class="col-lg-2 col-md-3 col-sm-3 col-6 pr-2 box-logo">
            <span class="logo"></span>
        </div>
        <div class="col-lg-6 col-md-4 col-sm-3 col-6">
            <!-- فضای خالی برای محتوای دیگر -->
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
                        @if (auth()->user()->role == 'super_admin')
                            <!-- لینک به پنل ادمین -->
                            <button onclick="location.href='{{ route('dashboard') }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                <i class="material-icons profile_link pr-2"></i>پنل ادمین
                            </button>
                        @elseif (auth()->user()->role == 'admin')
                            <!-- لینک به پنل مغازه -->
                            <button onclick="location.href='{{ route('store.stores') }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                <i class="material-icons profile_link pr-2"></i>مغازه
                            </button>
                        @else
                            <!-- لینک همکاری با ما برای کاربران عادی -->
                            <button onclick="location.href='{{ route('store.question') }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                <i class="material-icons profile_link pr-2"></i>همکاری با ما
                            </button>
                        @endif

                        <!-- لینک به پروفایل -->
                        <button onclick="location.href='{{ route('ShowProfile', ['id' => auth()->user()->id]) }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                            <i class="material-icons profile_link pr-2"></i>پروفایل
                        </button>

                        <!-- لینک خروج -->
                        <form id="logout-form" action="{{ route('Logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item border-0 dropdown-item_custom" type="button">
                            <i class="material-icons profile_link pr-2"></i>خروج
                        </button>
                    </div>
                </div>
                @else
                <!-- اگر کاربر لاگین نکرده باشد -->
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

            <!-- سبد خرید -->
            <a href="{{route('basket.Factor')}}" class="btn btn-outline-info" style="@auth
                padding: 10px;
                border-radius: 7px;
                padding-left: 23px;
                padding-right: 23px;
            @endauth"><i class="material-icons shopping_cart"></i> سبد خرید</a>
        </div>
    </div>
</div>
