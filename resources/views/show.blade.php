@extends('layouts.site')

@section('title')
<title>{{config('app.name')}}</title>
@endsection

@section('content')

<div class="contents">

<article class="article-detail mx-auto custom-width">

    {{-- Display the image if it exists --}}
    @if ($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="mb-4 d-block mx-auto object-fit-cover">
    @endif

    <h1 class="h1">{{ $article->title}}</h1>
    <h5 class="pt-2">投稿者：{{ $article->user->name }}</p>
    <div class="h5 pt-2 pb-3 border-bottom">{{ $article->created_at}}</div>

    <span>
        <img src="{{ asset('storage/blog_images/nicebutton.png') }}" class="like-image">

        <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
        @if(isset($like) && $like)
            <!-- 「いいね」取消用ボタンを表示 -->
            <a href="{{ route('toggle-like', $article) }}" class="btn btn-success btn-sm">
                いいね
                <!-- 「いいね」の数を表示 -->
                <span class="badge">
                    {{ $article->likes->count() }}
                </span>
            </a>
        @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
            <a href="{{ route('toggle-like', $article) }}" class="btn btn-secondary btn-sm">
                いいね
                <!-- 「いいね」の数を表示 -->
                <span class="badge">
                    {{ $article->likes->count() }}
                </span>
            </a>
        @endif
    </span>

    <div class="h3 pt-4">{!! nl2br(e($article->body))!!}</div>

    {{-- Display the delete button only if the user is the owner of the article --}}
    @if($article && Auth::check() && Auth::user()->id == $article->user_id)
    <form action="{{ route('articles.destroy', $article) }}" method="post" class="pb-5">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-secondary text-danger">削除する</button>
    </form>
    @endif
</article>

</div>

@endsection
