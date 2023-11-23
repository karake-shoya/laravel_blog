@extends('layouts.app')

@section('title')
<title>{{config('app.name')}}</title>
@endsection

@section('content')

<div class="contents">
<h1>記事一覧</h1>

@foreach($articles->sortByDesc('created_at') as $article)
    <article class="article">

            <h3>{{$article->title}}</h3>
            <p>{{$article->created_at}}</p>
        </a>
    </article>
@endforeach

</div>

@endsection
