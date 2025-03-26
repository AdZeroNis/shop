@extends('Home.layouts.master')


@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <!-- فیلترهای جستجو -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">فیلترهای جستجو</h5>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route('search') }}">
                        <input type="hidden" name="search_key" value="{{ $searchKey }}">

                        <div class="form-group">
                            <label>نوع جستجو:</label>
                            <select name="search_type" class="form-control">
                                <option value="all" {{ $searchType === 'all' ? 'selected' : '' }}>همه موارد</option>
                                <option value="products" {{ $searchType === 'products' ? 'selected' : '' }}>محصولات</option>
                                <option value="categories" {{ $searchType === 'categories' ? 'selected' : '' }}>دسته‌بندی‌ها</option>
                                <option value="articles" {{ $searchType === 'articles' ? 'selected' : '' }}>مقالات</option>
                                <option value="stores" {{ $searchType === 'stores' ? 'selected' : '' }}>فروشگاه‌ها</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">اعمال فیلترها</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <h4 class="mb-4">نتایج جستجو برای: "{{ $searchKey }}"</h4>

            @if(isset($results['products']) && $results['products']->count())
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">محصولات</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($results['products'] as $product)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <img src="{{ asset('AdminAssets/Product-image/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text text-muted">{{ Str::limit($product->description, 50) }}</p>
                                            <a href="{{ route('product', $product->id) }}" class="btn btn-sm btn-primary">مشاهده محصول</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($results['categories']) && $results['categories']->count())
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">دسته‌بندی‌ها</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($results['categories'] as $category)
                                <a href="{{ route('category.products', $category->id) }}" class="list-group-item list-group-item-action">
                                    {{ $category->name }} ({{ $category->products_count }} محصول)
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($results['articles']) && $results['articles']->count())
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">مقالات</h5>
                    </div>
                    <div class="card-body">
                        @foreach($results['articles'] as $article)
                            <div class="mb-3 pb-3 border-bottom">
                                <h5><a href="{{ route('Showarticles', $article->id) }}">{{ $article->title }}</a></h5>
                                <p class="text-muted">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                                <small class="text-muted">تاریخ انتشار: {{ $article->created_at }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(isset($results['stores']) && $results['stores']->count())
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">فروشگاه‌ها</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($results['stores'] as $store)
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('AdminAssets/Store-image/'.$store->image) }}" class="rounded-circle mr-3" width="50" height="100" alt="{{ $store->name }}">
                                                <div>
                                                    <h5 class="card-title mb-1">{{ $store->name }}</h5>
                                                    <p class="card-text text-muted mb-1">{{ $store->products_count }} محصول</p>
                                                    <a href="{{ route('store.products', $store->id) }}" class="btn btn-sm btn-outline-primary">مشاهده فروشگاه</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if((!isset($results['products']) || $results['products']->isEmpty()) &&
            (!isset($results['categories']) || $results['categories']->isEmpty()) &&
            (!isset($results['articles']) || $results['articles']->isEmpty()) &&
            (!isset($results['stores']) || $results['stores']->isEmpty()))
            <div class="alert alert-warning">
                هیچ نتیجه‌ای برای جستجوی "{{ $searchKey }}" یافت نشد.
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
