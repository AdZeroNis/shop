@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{ route('Account.Product.storecolor', ['id' => $id]) }}" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">نام رنگ</label>
                    <input type="text" name="name" class="form-control" id="inputname4" placeholder="نام رنگ">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4"> تعریف رنگ </label>
                    <input type="color"  name="colors" class="form-control" id="inputprice4">
                </div>
            </div>
            <button type="submit" name="sub" class="btn btn-primary">ثبت رنگ </button>
            {{-- <input type="submit" name="sub" class="btn btn-primary" value="ثبت دسته بندی"> --}}
        </form>
    </div>
</div>

@endsection


@section("srcJs")

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#my-form'); !!}
@endsection
