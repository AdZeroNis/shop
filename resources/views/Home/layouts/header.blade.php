<div class="container-fluid shadow-sm bg-white">
    <div class="row p-3">
        <div class="col-lg-2 col-md-3 col-sm-3 col-6 pr-2  box-logo">
                <span class="logo">
                </span>
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
        <div class="col-lg-2 col-md-3 col-sm-3 col-6 dropdown_custom text-right">
            <div class="dropdown">
                @auth
                    <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" style="line-height: 52px !important;
                       background-color: rgba(252, 189, 21, 1);
                       padding: 0.75rem 1.75rem;
                       border-radius: 11px;
                       margin-left: -74px;">
                        {{ auth()->user()->name }} <!-- نمایش نام کاربر -->
                    </a>
                @else
                    <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" style="line-height: 52px !important;
                       background-color: rgba(252, 189, 21, 1);
                       padding: 0.75rem 1.75rem;
                       border-radius: 11px;
                       margin-left: -74px;">
                        ورود/ثبت نام
                    </a>
                @endauth

                <div class="dropdown-menu border-0 shadow rounded-0 dropdown-menu_custom text-center"
                     aria-labelledby="dropdownMenuButton">

                    @guest
                    <div class="btn login_box">
                        <a class="dropdown-item dropdown-item-custom py-2 btn btn-info" style="background-color: rgba(252, 189, 21, 1);" href="{{ route('FormLogin') }}">ورود به ایبولک</a>
                    </div>
                    <ul class="list-inline register">
                        <li class="list-inline-item">کاربر جدید هستید؟</li>
                        <li class="list-inline-item"><a href="{{ route('FormRegister') }}">ثبت نام</a></li>
                    </ul>
                    @endguest

                    @auth
                    <div class="dropdown-divider"></div>
                    <div class="text-left">
                        @if (auth()->user()->user_role == 1)
                            <!-- لینک به پنل ادمین -->
                            <button onclick="location.href='{{ route('dashboard') }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                <i class="material-icons profile_link pr-2"></i>پنل ادمین
                            </button>
                            <button onclick="location.href='{{ route('ShowProfile', ['id' => Auth::user()->id]) }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                <i class="material-icons profile_link pr-2"></i>پروفایل
                            </button>
                        @else
                            <!-- لینک به پروفایل کاربر -->
                            <button onclick="location.href='{{ route('ShowProfile', ['id' => Auth::user()->id]) }}'" class="dropdown-item border-0 dropdown-item_custom" type="button">
                                <i class="material-icons profile_link pr-2"></i>پروفایل
                            </button>
                        @endif
                    </div>
                    @endauth

                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-6 col-sm-2 col-6 text-right">
            <a href="#" class="btn btn-outline-info"><i class="material-icons shopping_cart">shopping_cart</i> سبد خرید
                <span>۰</span></a>
        </div>
    </div>
</div>
