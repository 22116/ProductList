<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @section('title')
            BearList
        @endsection
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    @yield('styles')
</head>
<body>
<div class="container-fluid">
    <header class="row p-3 border border-bottom-1">
        <div class="col">
            <nav class="nav float-left links">
                <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                <a class="nav-link" href="{{ route('producer.index') }}">Producers</a>
                <a class="nav-link" href="{{ route('type.index') }}">Categories</a>
            </nav>
        </div>

        @if (Route::has('login'))
            <div class="col-auto pr-5 links">
                @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout ({{ Auth::user()->name }})
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
    </header>
    <main>
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
