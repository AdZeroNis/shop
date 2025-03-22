@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route("store.update",$store->id)}}" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">نام مغازه</label>
                    <input type="text" value="{{$store->name}}" name="name" class="form-control" id="inputname4" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4"> آدرس </label>
                    <input type="text" value="{{$store->address}}" name="address" class="form-control" id="inputprice4" >
                </div>
            </div>


            <div class="form-row mb-4">
                <label for="image_id" class="d-block">بارگذاری تصویر    </label>

                <input name="image" type="file" class="form-control" id="image_id" placeholder="">
                <span><img class="mt-2" src="{{asset("AdminAssets/Store-image/".$store->image)}}" width="65px" class="profile-img" alt="avatar"></span>

        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="status" class="d-block">وضعیت</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" {{ $store->status == 1 ? 'selected' : '' }}>فعال</option>
                    <option value="0" {{ $store->status == 0 ? 'selected' : '' }}>غیرفعال</option>
                    <option value="2" {{ $store->status == 2 ? 'selected' : '' }}>همه</option>
                </select>
            </div>
        </div>

          <button type="submit" class="btn btn-primary mt-3">ویرایش محصول</button>
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
