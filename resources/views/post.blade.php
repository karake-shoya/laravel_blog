@extends('layouts.site')

@section('title')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container"> <!-- コンテナを追加 -->
        <div class="row justify-content-center"> <!-- 中央寄せのための行を追加 -->
            <div class="col-md-8"> <!-- 列の幅を調整 -->
                <nav class="button d-flex align-items-center">
                    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data" class="w-100"> <!-- フォーム全体を中央寄せ -->
                        @csrf
                        <input type="file" name='image'>
                        <button type="submit" class="btn btn-outline-secondary me-5">公開する</button>
                </nav>

                <input type="text" name="title" class="form-control form-control-lg custom-width fw-bold mt-3 fs-2 mx-auto" placeholder="記事タイトル" aria-label="タイトル入力">
                <textarea name="body" id="textarea" class="form-control custom-width mt-3 fs-3 mx-auto" rows="10" placeholder="ご自由にお書きください" aria-label="本文入力"></textarea>
                </form>
                <div class="d-flex align-items-center me-2">
                    <div class="h4 length me-2 mt-3 sticky-top">0</div>
                    <div class="h4 length mt-3 sticky-top">文字</div>
                </div>
            </div>
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
