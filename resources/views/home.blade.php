@extends('layouts.site')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="contents">
        <h1 class="pb-3">みんなの記事</h1>

        <div class="row">
            @foreach($articles->sortByDesc('created_at') as $article)
                <div class="col-md-2 mb-4 d-flex">
                    <article class="article w-100">
                        <div class="card h-100 d-flex flex-column" style="width:100%; height:150px;">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width:100%; height:150px; object-fit:cover;">
                            @else
                                <img src="{{ asset('storage/blog_images/logo.png') }}" alt="{{ $article->title }}" style="width:100%; height:150px; object-fit:contain;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <a class="h4 mb-3 ellipsis" href="{{ route('home.show', $article) }}" style="width:100%; height: 7rem;">{{ $article->title }}</a>
                                <div class="mt-auto">
                                    <p class="border-top">投稿者：{{ $article->user->name }}</p>
                                    <p>{{ $article->created_at }}</p>
                                    <span>
                                        <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
                                        @if(isset($like) && $like)
                                            <!-- 「いいね」取消用ボタンを表示 -->
                                            <a href="{{ route('toggle-like', $article) }}" class="btn btn-success btn-sm">
                                                ♡
                                                <!-- 「いいね」の数を表示 -->
                                                <span class="badge">
                                                    {{ $article->likes->count() }}
                                                </span>
                                            </a>
                                        @else
                                            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                                            <a href="{{ route('toggle-like', $article) }}" class="btn btn-secondary btn-sm">
                                                ♡
                                                <!-- 「いいね」の数を表示 -->
                                                <span class="badge">
                                                    {{ $article->likes->count() }}
                                                </span>
                                            </a>
                                        @endif
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
