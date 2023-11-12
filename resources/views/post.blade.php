@extends('layouts.app')

@section('title')
<title>{{config('app.name')}}</title>
@endsection

@section('content')
<div class="contents">
    <nav class="button">
        <a class="btn btn-outline-secondary me-2" href="#">画像</a>
        <a class="btn btn-outline-secondary me-2" href="#">下書き保存</a>
        <a class="btn btn-outline-secondary me-2" href="#">公開する</a>
    </nav>
    <input class="form-control form-control-lg custom-width fw-bold mt-3 fs-2" type="text" placeholder="記事タイトル" aria-label="タイトル入力">
    <textarea class="form-control custom-width mt-3 fs-3" rows="10" placeholder="ご自由にお書きください" aria-label="本文入力"></textarea>
</div>

@endsection
