@extends('layouts.site')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="contents">
        <h1>みんなの記事</h1>

        @foreach($articles->sortByDesc('created_at') as $article)
        <article class="article">
            <div class="row">
                <div class="col-6">
                    <a class="h2" href="{{ route('home.show', $article) }}">{{ $article->title }}</a>
                </div>
            </div>
            <p class="pt-2 border-bottom">{{ $article->created_at }}</p>
        </article>
    @endforeach

    </div>
@endsection
