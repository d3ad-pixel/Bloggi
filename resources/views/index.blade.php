@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Create a unique and beautiful blog easily.
                </h1>
                <a 
                    href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Struggling to be a better web developer?
            </h2>
            
            <p class="py-8 text-gray-500 text-s">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente magnam vero nostrum! Perferendis eos molestias porro vero. Vel alias.
            </p>

            <a 
                href="/blog"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find Out More
            </a>
        </div>
    </div> --}}

    {{-- <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l"> 
            I'm an expert in...
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            Ux Design
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Project Management
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Digital Strategy
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Backend Development
        </span>
    </div> --}}

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500 text-xl">
            Check out the recently posted articles on this Blog!
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        {{-- <div class="flex bg-yellow-700 text-gray-100 pt-10"> --}}
            {{-- <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block"> --}}
                @foreach ($posts as $post)
                    <div class="w-4/5 mx-auto py-15 px-7 border-b dark:bg-white border dark:border-gray-200 rounded-lg shadow bg-orange-400 border-white-700 mb-4">
                        {{-- <div>
                            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
                        </div> --}}
                        <div>
                            <h2 class="text-gray-700 font-bold text-5xl pb-4 truncate">
                                {{ $post->title }}
                            </h2>

                            <span class="text-gray-500">
                                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                            </span>

                            {{-- <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                                {{  $post->description  }}
                            </p> --}}
                            {{-- {!!  $post->description  !!} --}}
                            <br>
                            <br>
                            <br>
                            <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                                Read
                            </a>

                            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id) {{--check if user is the one who created this blog and add edit and delete button --}}
                                <span class="float-right">
                                    <a 
                                        href="/blog/{{ $post->slug }}/edit"
                                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                                        Edit
                                    </a>
                                </span>

                                <span class="float-right">
                                    <form 
                                        action="/blog/{{ $post->slug }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')

                                        <button
                                            class="text-red-600 pr-3"
                                            type="submit">
                                            Delete
                                        </button>

                                    </form>
                                </span>
                            @endif
                        </div>
                    </div>    
                @endforeach
                {{-- <span class="uppercase text-xs">
                    PHP
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas necessitatibus dolorum error culpa laboriosam. Enim voluptas earum repudiandae consequuntur ad? Expedita labore aspernatur facilis quasi ex? Nemo hic placeat et?
                </h3>

                <a 
                    href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a> --}}
            {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div> --}}
            {{-- <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt=""> --}}
        {{-- </div> --}}
    </div>
@endsection