{{--for reading the blog --}}

@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
    </div>
</div>
<div class="flex w-11/12 m-auto">
    <div class="w-4/5 mx-auto pt-20">
        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>
        <div class="mt-10">
            {!! $post->description !!}
        </div>
    </div>

    <div class="w-1/5 ml-7">
        <h2>Related Posts</h2>
            @foreach ($relatedPosts as $relatedPost)
                <div>
                    <h3 class="my-7">{{ $relatedPost->title }}</h3>
                    <a href="/blog/{{ $relatedPost->slug }}" class=""><p class="mb-5 bg-blue-500 rounded-full w-auto inline-block text-white font-bold py-1 px-3">Read</p></a>
                    <hr>
                </div>
            @endforeach
    </div>
</div>
@endsection 