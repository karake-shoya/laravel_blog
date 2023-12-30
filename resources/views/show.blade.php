@extends('layouts.site')

@section('title')
<title>{{config('app.name')}}</title>
@endsection

@section('content')

<div class="contents">

<article class="article-detail mx-auto" style="max-width: 800px">

    {{-- Display the image if it exists --}}
    @if ($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="mb-4 d-block mx-auto object-fit-cover">
    @endif

    <h1 class="h1">{{ $article->title}}</h1>
    <div class="h5 pt-2 pb-3 border-bottom">{{ $article->created_at}}</div>

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
