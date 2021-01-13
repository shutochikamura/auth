<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .card-body {
            padding: 10px;
            border-bottom: solid 3px whitesmoke;
        }

        .remove {
            background-color: red;
            color: white;
        }

        a {
            font-size: 20px;
            color: gray;
            text-decoration: none;
        }

        a:hover {
            opacity: 0.7;
            transition: 0.5s;
        }




        h1 {
            font-size: 25pt;
            color: darkslategrey;
        }

        p {
            font-size: 15pt;
        }

        .btn {
            border-radius: 5pt;
            font-size: 20px;
            margin: 10px 0 0 20px;
            display: inline-block;
            text-align: center;
        }

        .btn:hover {
            opacity: 0.7;
            transition: 0.5s;
        }


        .frame {
            float: center;
            height: 400px;
            padding: 10px;

        }

        .board-frame {
            height: 250px;
            margin: 30px;
        }

        .user-title {
            font-size: 40px;
        }

        .comment {
            font-size: 30px;
        }

        .author {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="/board">みんなの投稿</a></li>
                        <li><a href="/board/create">投稿の作成</a></li>
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
