{{--  Home page  --}}

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

    <div class="sm:grid grid-cols-2 w-4/5 mx-auto gap-y-9 gap-x-5 auto-cols-max">
        @foreach ($posts as $post){{-- List all the blogs  --}}
            <div class="w-full flex lg:max-w-full lg:flex mx-auto"> 
                <div class="h-48 lg:h-auto lg:w-56 flex-none  rounded-t lg:rounded-t-none lg:rounded-l text-center" style="background-image: url('{{ asset('images/' . $post->image_path) }}'); background-size: cover; background-repeat: no-repeat;background-position: center; resize: both;">
                </div>
                <div class="w-full border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col leading-normal">
                    <p class="text-gray-900 font-bold text-xl mb-2 truncate">
                        {{ $post->title }}
                    </p>
                    <div class="w-auto inline-block ">
                    <p class="bg-blue-600 w-auto inline-block mb-3 text-white font-bold py-1 px-3 rounded-full">
                        #{{ $post->category }}
                    </p>
                </div>
                    <div class="mb-3">
                        <p class="text-gray-500 mb-3 text-s mr-6">
                            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                        </p>
                    </div>

                    <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg py-2 font-extrabold rounded-3xl mb-3 text-center">
                        Read
                    </a>

                    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id) {{--check if user is the one who created this blog and add edit and delete button --}}
                        <span class=" text-center mb-4">
                            <a 
                                href="/blog/{{ $post->slug }}/edit"
                                class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                                Edit
                            </a>
                        </span>

                        <span class=" text-center mb-0">
                            <form 
                                action="/blog/{{ $post->slug }}"
                                method="POST">
                                @csrf
                                @method('delete')

                                <button
                                    class="text-red-600"
                                    type="submit">
                                    Delete
                                </button>

                            </form>
                        </span>
                    @else
                        <br>
                        <br>
                        <br>
                        
                    @endif  
                    
                </div>
            </div>    
        @endforeach
                
    </div>
@endsection