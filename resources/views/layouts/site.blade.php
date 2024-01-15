<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Site Info -->
    @yield('title')

    <!-- CSS -->
    @vite('resources/sass/app.scss')


</head>

<body class="container-fluid">

    <div id="header" class="sticky-top d-flex flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom shadow-sm bg-light">
        <a class="my-0 mr-md-auto" href="/home">
            <img src="{{ asset('storage/blog_images/logo.png') }}" class="logo-image" alt="logo" style="width:50px; height:auto;">
        </a>
        <nav class="my-2 my-md-0 mr-md-3 d-flex ms-auto">
            @auth
                <a class="btn btn-outline-success me-2" href="/post">投稿</a>
                <a class="btn btn-outline-primary me-2" href="/article">マイページ</a>
                <div class="dropdown">
                    <a class="btn btn-outline-dark me-2 dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </ul>
                </div>
            @else
                <a class="btn btn-outline-dark me-2" href="/login">ログイン</a>
            @endauth
        </nav>
    </div>

    <div id="main" class="pt-2 pb-5">
        @yield('content')
    </div>

    <div id="footer" class="fixed-bottom d-flex flex-column flex-md-row align-items-center p-1 px-md-4 border-top bg-light">
        <h4 class="my-0 mr-md-auto">Blog</h4>
    </div>

    @vite('resources/js/app.js')

</body>

</html>
