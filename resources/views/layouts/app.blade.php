<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img style="width:40px" src="data:image/png;base64,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">
</a>
@if(Auth::user())
  <a class="nav-item nav-link" href="/">Home</a>
  <div class="btn-group">

    <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
      Dvds
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/dvd">All Dvds</a>
      <a class="dropdown-item" href="/dvd/create">Add Dvd</a>
    </div>
  </div>

  <div class="btn-group">
    
    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
      Customers
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/customers">All Customers</a>
      <a class="dropdown-item" href="/customers/create">Add Customer</a>
    </div>
  </div>

<div class="btn-group">

    <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
      History
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/history">All Histories</a>
      <a class="dropdown-item" href="/history/create">Add Record</a>
    </div>
  </div>
 @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                    
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
                <div class="container">
                <a type="button" class="btn btn-success" style="margin:10px" href="{{ url()->previous() }}"> 
                   < Back
                </a>  
            <router-view></router-view>
            </div>
        </main>
    </div>
</body>
</html>
