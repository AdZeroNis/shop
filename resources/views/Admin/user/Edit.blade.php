@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route("Account.User.update",$user->id)}}" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="name">نام کاربر</label>
                    <input type="text" value="{{$user->name}}" name="name" class="form-control" id="inputname4" placeholder="نام کاربر">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">ایمیل  </label>
                    <input type="text" value="{{$user->email}}" name="email" class="form-control" id="inputprice4" placeholder="ایمیل  ">
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="phone"> تلفن </label>
                    <input type="number" value="{{$user->phone}}" name="phone" class="form-control" id="inventory" placeholder="  تلفن">
                </div>
                <div class="form-group col-md-6">
                    <label for="address">آدرس  </label>
                    <input type="text" value="{{$user->address}}" name="address" class="form-control" id="inputprice4" placeholder="آدرس  ">
                </div>
                <div class="form-group col-md-6">
                    <label for="password"> رمز   </label>
                    <input type="number" value="" name="password" class="form-control" id="inventory" placeholder=" رمز عبور ">

                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label for="status" class="d-block">وضعیت</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>فعال</option>
                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>غیرفعال</option>
                        </select>

                    </div>
                </div>
            </div>

          <button type="submit" class="btn btn-primary mt-3"> ویرایش</button>
        </form>
    </div>
</div>

@endsection


@section("srcjs")
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#my-form') !!}

@endsection
