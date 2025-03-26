@extends("Admin.layouts.master")

@section("content")
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route("Account.Article.update",$article->id)}}" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">عنوان مقاله</label>
                    <input type="text" name="title" class="form-control" id="inputname4" placeholder="عنوان مقاله" value="{{$article->title}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="image_id" class="d-block">بارگذاری تصویر    </label>

                    <input name="image" type="file" class="form-control" id="image_id" placeholder="">
                    <span><img class="mt-2" src="{{asset("AdminAssets/Aticles-image/".$article->image)}}" width="65px" class="profile-img" alt="avatar"></span>

            </div>
            </div>

            <div class="form-group mb-4">
                <label for="editor">محتوای مقاله</label>
                <textarea name="content" id="editor" class="form-control">{{$article->content}}</textarea>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="status" class="d-block">وضعیت</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ $article->status == 1 ? 'selected' : '' }}>فعال</option>
                        <option value="0" {{ $article->status == 0 ? 'selected' : '' }}>غیرفعال</option>

                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">ویرایش مقاله</button>
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
