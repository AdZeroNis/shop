@extends("Home.layouts.master")

@section('content')


<!-- Display the latest products -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="mb-4 text-center">آخرین مقالات اضافه شده</h3>
        </div>
        @foreach ($latestArticles as $article)
        @if ($article->status == 1)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 product-card box_shadow" style="max-width: 250px;">
                <a href="{{ route('Showarticles', $article->id) }}" class="text-decoration-none">
                    <img src="{{ asset('AdminAssets/Aticles-image/'.$article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="object-fit: cover; height: 150px;">
                </a>
                <div class="card-body text-center">
                    <a href="{{ route('Showarticles', $article->id) }}" class="text-dark text-decoration-none">
                        <h5 class="card-title" style="font-size: 16px;">{{ $article->title }}</h5>
                    </a>
                    <p class="card-text mt-2" style="font-size: 14px;"> نویسنده : {{ $article->user->name }} </p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>



@endsection
