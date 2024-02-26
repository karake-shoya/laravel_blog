@extends('layouts.site')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
<script>
    function checkLogin(event) {
        @if(!auth()->check())
            event.preventDefault();
            alert('ログインが必要です。');
        @endif
    }
</script>
<div class="container mx-auto">
    <h1 class="pb-3">みんなの記事</h1>
    <div class="row">
        @foreach($articles->sortByDesc('created_at') as $article)
            <div class="col-md-4 col-sm-6 mb-4 d-flex">
                <article class="article w-100">
                    <div class="card h-100 d-flex flex-column" style="width:100%">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width:100%; height:250px; object-fit:cover; border-radius: var(--bs-card-border-radius);">
                        @else
                            <img src="{{ asset('storage/blog_images/logo.png') }}" alt="{{ $article->title }}" style="width:100%; height:250px; object-fit:contain; border-radius: var(--bs-card-border-radius);">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <a class="h4 mb-3 ellipsis" href="{{ route('home.show', $article) }}" style="width:100%;">{{ $article->title }}</a>
                            <div class="mt-auto">
                                <p class="border-top">投稿者：{{ $article->user->name }}</p>
                                <p>{{ $article->created_at->diffForHumans() }}</p>
                                <span>
                                    @if(isset($like) && $like)
                                        <a href="{{ route('toggle-like', $article) }}" class="btn btn-success btn-sm" onclick="checkLogin(event)">
                                    @else
                                        <a href="{{ route('toggle-like', $article) }}" class="btn btn-secondary btn-sm" onclick="checkLogin(event)">
                                    @endif
                                            ♡ <span class="badge">{{ $article->likes->count() }}</span>
                                        </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</div>
@endsection
