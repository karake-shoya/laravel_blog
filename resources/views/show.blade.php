@extends('layouts.app')

@section('title')
<title>{{config('app.name')}}</title>
@endsection

@section('content')

<div class="contents">

<article class="article-detail">
    <h1 class="h1">{{ $article->title}}</h1>
    <div class="h5 pt-2 pb-3 border-bottom">{{ $article->created_at}}</div>
    <div class="h3 pt-4">{!! nl2br(e($article->body))!!}</div>
    <form action="{{ route('articles.destroy', $article) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-secondary text-danger">削除する</button>
    </form>
</article>

</div>

@endsection
