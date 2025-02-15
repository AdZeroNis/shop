@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route("Account.Product.storeProduct")}}" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">نام محصول</label>
                    <input type="text" name="name" class="form-control" id="inputname4" placeholder="نام محصول">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4">قیمت محصول </label>
                    <input type="text"  name="price" class="form-control" id="inputprice4" placeholder="قیمت محصول ">
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inventory"> تعداد موجودی</label>
                    <input type="number" name="inventory" class="form-control" id="inventory" placeholder=" تعداد موجودی">
                </div>
                <div class="form-group col-md-6">
                    <label for="category">دسته بندی  محصولات </label>
                    <select name="Id_category" class="selectpicker form-control p-2">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>


                </div>
            </div>


            <div class="form-row mb-4">
                    <label for="inputState">توضیحات محصول</label>

                <textarea name="description" type="text" class="form-control" id="inputCity"></textarea>


            </div>

            <div class="form-row mb-4">
                <label for="image_id" class="d-block">بارگذاری تصویر    </label>

                <input name="image" type="file" class="form-control" id="image_id" placeholder="">

        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="status" class="d-block">وضعیت</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1">فعال</option>
                    <option value="0">غیرفعال</option>
                </select>
            </div>
        </div>
          <button type="submit" class="btn btn-primary mt-3">افزودن محصول</button>
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
