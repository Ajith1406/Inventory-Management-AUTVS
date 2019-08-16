<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Repositary Management</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    @yield('script')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            li {
                 float: left;
            }

            .layout a {
                display: block;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .layout a:hover:not(.active) {
              background-color: #1111;
            }

            .active {
                background-color: #4CAF50;
            }
        </style>
    @yield('style')

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <li class="layout"><a href="#"><h5>Repositary Management</h5></a></li>
                    <li class="layout"><a href="{{route('public.allitems')}}">All Items</a></li>
                    <li class="layout"><a href="{{route('public.categories')}}">Categories</a></li>
                    <li class="layout"><a href="{{route('public.places')}}">Places</a></li>
                    <li class="layout"><a href="{{route('public.conditions')}}">Conditions</a></li>
                    <li class="layout"><a href="#news">Checklist</a></li>
                    <li class="layout"><a href="#contact">About</a></li>
                    </ul>
                        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    
                    <li class="layout" style="float:right">
                            @if (Route::has('login'))
                                        @auth
                                            <a href="{{ route('admin.home') }}">Home</a>
                                        @else
                                            <a href="{{ route('login') }}">Admin</a>

                                            
                                        @endauth
                                @endif
                    </li>
                    </ul>
                </div>
        </nav>

        <main class="py-4">
            <div class="container">
                    <div class="row">
                        @yield('content')
                    </div>
            </div>
            
        </main>
    </div>
</body>
</html>
