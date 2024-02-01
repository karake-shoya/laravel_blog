@extends('layouts.site')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container mt-4"> <!-- コンテンツを中央に配置するコンテナ -->
        <h1 class="pb-3">自分の記事一覧</h1>

        <div class="row justify-content-center"> <!-- 中央寄せのためのrow -->
            <div class="col-md-8"> <!-- 記事を表示するカラムの幅を指定 -->
                @foreach($articles->sortByDesc('created_at') as $article)
                <article class="article mb-5">
                    <div class="row">
                        <div class="col-12">
                            <a class="h3" href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                            <div class="d-flex justify-content-end mt-1">
                                <form action="{{ route('articles.edit', $article->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary text-secondary me-2">編集する</button>
                                </form>
                                <form action="{{ route('articles.destroy', $article) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-secondary text-danger">削除する</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="pt-2 border-bottom">午後{{ $article->created_at->format('h:i') }}・{{ $article->created_at->format('Y年m月d日') }}</p>
                </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
