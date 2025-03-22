@extends("Admin.layouts.master")

@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route('store.store')}}" method="POST" enctype="multipart/form-data" id="store-form">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="store_name">نام مغازه</label>
                    <input type="text" name="name" class="form-control" id="store_name" placeholder="نام مغازه" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone_number">شماره تلفن مغازه</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="شماره تلفن مغازه" required>
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-12">
                    <label for="address">آدرس مغازه</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="آدرس مغازه" required>
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-12">
                    <label for="image">تصویر مغازه</label>
                    <input type="file" name="image" class="form-control" id="image" required>
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="col-md-6">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">افزودن مغازه</button>
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
