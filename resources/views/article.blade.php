@extends('layouts.app')

@section('title')
<title>{{config('app.name')}}</title>
@endsection

@section('content')

<div class="contents">
<h1>記事一覧</h1>

@foreach($articles as $article)
    <article class="article">

            <h3>{{$article->title}}</h3>
            <p>{{$article->body}}</p>
        </a>
    </article>
@endforeach

</div>

@endsection
