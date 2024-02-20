<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Site Info -->
    @yield('title')

    <!-- CSS -->
<!-- CSSファイル -->
<link rel="stylesheet" href="{{ asset('build/assets/app-36dede55.css') }}">
<link rel="stylesheet" href="{{ asset('build/assets/app-7e4a3f64.css') }}">
<link rel="stylesheet" href="{{ asset('build/assets/app-e800bd3c.css') }}">

<!-- JavaScriptファイル -->
<script type="module" src="{{ asset('build/assets/app-cc762d8f.js') }}"></script>

</head>

<body class="container-fluid">

    <div id="header" class="sticky-top bg-light">
        <!-- ナビゲーションバーの開始 -->
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('storage/blog_images/logo.png') }}" class="logo-image" alt="logo" style="width:50px; height:auto;">
            </a>
            <!-- ハンバーガーメニュートグルの追加 (中サイズ以下で表示) -->
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ナビゲーションバーのコンテンツ -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- 中サイズ以上でボタンとして表示 -->
                        <li class="nav-item d-none d-md-inline-block">
                            <a class="btn btn-outline-success me-2" href="/post">投稿</a>
                        </li>
                        <li class="nav-item d-none d-md-inline-block">
                            <a class="btn btn-outline-primary me-2" href="/article">マイページ</a>
                        </li>
                        <!-- 中サイズ以下でハンバーガーメニュー内に表示 -->
                        <li class="nav-item d-md-none">
                            <a class="nav-link" href="/post">投稿</a>
                        </li>
                        <li class="nav-item d-md-none">
                            <a class="nav-link" href="/article">マイページ</a>
                        </li>
                        <!-- ドロップダウンメニュー (全サイズで表示) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item d-none d-md-inline-block">
                            <a class="btn btn-outline-dark me-2" href="/login">ログイン</a>
                        </li>
                        <!-- 中サイズ以下でハンバーガーメニュー内に表示 -->
                        <li class="nav-item d-md-none">
                            <a class="nav-link" href="/login">ログイン</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <!-- ナビゲーションバーの終了 -->
    </div>

    <div id="main" class="pt-2 pb-5">
        @yield('content')
    </div>

    <div id="footer" class="fixed-bottom d-flex flex-column flex-md-row align-items-center p-1 px-md-4 border-top bg-light">
        <h4 class="my-0 mr-md-auto">LifeTrace</h4>
    </div>

    @vite('resources/js/app.js')

</body>

</html>
