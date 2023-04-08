@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message')) {{--   a message will be printed after create new blog or delete a blog,or edit a blog --}}
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 font-bold text-green-800 bg-green-300 rounded-2xl py-4 px-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check()) {{--  if the user is authenticated he can create a new blog --}}
    <div class="pt-15 w-4/5 m-auto mb-15">
        <a 
            href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>
    </div>
@endif

<div class="sm:grid grid-cols-2 w-4/5 m-auto gap-y-9 gap-x-5 auto-cols-max"> {{--  list all the blogs --}} 
    @foreach ($posts as $post)
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
                    <span class="text-gray-500 mb-3 text-s mr-6 w-full truncate">
                        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </span>
                </div>

                <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg py-2 font-extrabold rounded-3xl mb-3 text-center">
                    Read
                </a>

                @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id) {{--checks if the user is the one who created this blog ,we add edit and delete button --}}
                    <span class=" text-center mb-4">
                        <a 
                            href="/blog/{{ $post->slug }}/edit"
                            class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                            Edit
                        </a>
                    </span>

                    <span class=" text-center mb-0">{{--  delete a blog  --}}
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
<div class=" w-4/5 mx-auto mt-10">
    {{ $posts->links() }}
</div>

@endsection