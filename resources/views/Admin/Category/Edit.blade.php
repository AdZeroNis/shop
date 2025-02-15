@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{ route('Account.Category.update', $category->id) }}" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <label for="name_id" class="d-block">نام دسته بندی</label>
                    <input id="name_id" value="{{ old('name', $category->name) }}" name="name" type="text" class="form-control" placeholder="نام دسته بندی">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="status" class="d-block">وضعیت</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>فعال</option>
                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>غیرفعال</option>
                        <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>همه</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="sub" class="btn btn-primary">ویرایش دسته بندی</button>
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
