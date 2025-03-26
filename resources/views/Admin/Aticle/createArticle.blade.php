@extends("Admin.layouts.master")

@section("content")
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route('Account.Article.store')}}" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">عنوان مقاله</label>
                    <input type="text" name="title" class="form-control" id="inputname4" placeholder="عنوان مقاله">
                </div>
                <div class="form-group col-md-6">
                    <label for="image_id" class="d-block">بارگذاری تصویر مقاله</label>
                    <input name="image" type="file" class="form-control" id="image_id">
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="editor">محتوای مقاله</label>
                <textarea name="content" id="editor" class="form-control"></textarea>
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

            <button type="submit" class="btn btn-primary mt-3">افزودن مقاله</button>
        </form>
    </div>
</div>
@endsection
@section("srcjs")
<!-- اضافه کردن Trix قبل از سایر اسکریپت‌ها -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

<!-- سایر اسکریپت‌ها -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#my-form') !!}

@endsection
