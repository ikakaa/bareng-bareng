<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BarengBareng</title>

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
        <nav class="navbar navbar-expand-md navbar-light bg-navbar shadow-sm">
            <div class="container">

                <div class="nav-kosong-kiri">
                    <a href="/"> <img src="../src/barengbareng.png" style="height: 40px; width: 100px"
                            class="cursor-pointer"></a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <form class="form-inline" type="get" action="{{ url('/search') }}">
                            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search"
                                style="width:500px;">
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto  custom-font">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="/home">{{ __('Home') }}</a>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" href="/interestcheck">{{ __('Interest Check') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/groupbuy">{{ __('Group-Buy') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="profileDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle style-profile" style="font-size: 25px;"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/login"><i class="fa fa-sign-in"
                                            aria-hidden="true"></i> Login</a>
                                    <a class="dropdown-item" href="/register"><i class="fa fa-user-plus"
                                            aria-hidden="true"></i> Register</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item text-uppercase  items-center flex ">
                                <a class="nav-link" href="/home">{{ __('Home') }}</a>
                            </li>


                            <li class="nav-item text-uppercase  items-center flex">
                                <a class="nav-link" href="/interestcheck">{{ __('Interest Check') }}</a>
                            </li>

                            <li class="nav-item text-uppercase  items-center flex">
                                <a class="nav-link" href="/groupbuy">{{ __('Group-Buy') }}</a>

                            <li class="mx-2 nav-item text-uppercase  items-center flex ">
                                <a href="/cart" style="font-size: 19px"  class="cursor-pointer"> <img src="../img/carticon.png" class="cursor-pointer" width="20px"
                                        height="20px" alt=""></a>
                            </li>
                            <li class="nav-item   dropdown ">
                                <a id="navbarDropdown" class="nav-link  text-uppercase" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                    style="font-size: 19px">
                                    <img src="../img/personicon.png" width="20px" height="20px" alt="">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/profilebuyer"> <i class="fa fa-user-circle"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4">
            @yield('content')
        </main>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
</body>

</html>
