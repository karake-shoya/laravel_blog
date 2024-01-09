@extends('layouts.site')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="contents">
        <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <input type="file" name='image' class="mt-3">

            <button type="submit" class="btn btn-outline-secondary me-5">編集して公開する</button>

            <input type="text" name="title" value="{{ $article->title }}" class="form-control form-control-lg custom-width fw-bold mt-3 fs-2"
            placeholder="記事タイトル" aria-label="タイトル入力">

            <textarea name="body" id="textarea" class="form-control custom-width mt-3 fs-3" rows="10"
            placeholder="ご自由にお書きください" aria-label="本文入力">{{ $article->body }}</textarea>
        </form>

        <div class="d-flex align-items-center me-2">
            <div class="h4 length me-2 mt-3 sticky-top">0</div>
            <div class="h4 length mt-3 sticky-top">文字</div>
        </div>
    </div>

    <script>
        const textArea = document.querySelector('#textarea');
        const length = document.querySelector('.length');
        textArea.addEventListener('input', () => {
            length.textContent = textArea.value.length;
        }, false);
    </script>
@endsection
