@extends('layouts.site')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="contents">
        <h1>記事一覧</h1>

        @foreach($articles->sortByDesc('created_at') as $article)
            <article class="article">
                <div class="row">
                    <div class="col-6">
                        <a class="h2" href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                    </div>
                    <div class="col-6 text-end">
                        <form action="{{ route('articles.destroy', $article) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-secondary text-danger">削除する</button>
                        </form>
                    </div>
                </div>
                <p class="pt-2 border-bottom">{{ $article->created_at }}</p>
            </article>
        @endforeach
    </div>
@endsection
