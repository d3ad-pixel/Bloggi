<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="/images/blog.ico">

    <x-head.tinymce-config/>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="sticky top-0 bg-blue-700 py-6 z-10">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Bloggi') }}
                    </a>
                </div>
                <div>
                    <div class="mx-auto">
                        <div class="">
                            <form action="{{ route('blog.index') }}" method="GET" role="search">
                
                                <div class="flex justify-between">
                                        <button class="mr-5" type="submit" title="Search projects">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class=" w-6 h-6" style="fill: whitesmoke" id="search">
                                                <switch>
                                                    <g>
                                                        <path d="M90.829 85.172 68.128 62.471A35.846 35.846 0 0 0 76 40C76 20.118 59.883 4 40 4 20.118 4 4 20.118 4 40s16.118 36 36 36c8.5 0 16.312-2.946 22.471-7.873l22.701 22.701A3.988 3.988 0 0 0 88 92a4 4 0 0 0 2.829-6.828zM40 68c-15.464 0-28-12.536-28-28s12.536-28 28-28c15.465 0 28 12.536 28 28S55.465 68 40 68z"></path>
                                                    </g>
                                                </switch>
                                            </svg>
                                        </button>
                                    <input type="text" class="rounded-full p-2 w-full" name="term" placeholder="Search posts" id="term">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <nav class=" space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline text-white font-bold py-2 px-4 rounded-full hover:bg-orange-400" href="/">Home</a>
                    <a class="no-underline text-white font-bold py-2 px-4 rounded-full hover:bg-orange-400" href="/blog">Blog</a>
                    @guest
                        <a class="no-underline text-white font-bold py-2 px-4 rounded-full hover:bg-orange-400" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline text-white font-bold py-2 px-4 rounded-full hover:bg-orange-400" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span class='text-white py-2 px-4'>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline text-white font-bold py-2 px-4 rounded-full hover:bg-orange-400"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
