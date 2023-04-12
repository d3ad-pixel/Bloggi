{{-- Edit A BLOG  --}}
@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update Post
        </h1>
    </div>
</div>

@if ($errors->any()){{-- If any unfilled field  --}}
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="/blog/{{ $post->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input 
            type="text"
            name="title"
            value="{{ $post->title }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none mb-10">
        <textarea id="myeditorinstance" name="data">{{ $post->description }}</textarea>


        <div class="flex justify-between align-center mt-15">
            <div class=" align-center">
            <label for="category">Choose a Category:</label>
            {!! Form::select('category', ['personal-development' => 'Personal Development', 'lifestyle' => 'Lifestyle', 'technology' => 'Technology', 'business' => 'Business', 'finance' => 'Finance', 'health-and-fitness' => 'Health and Fitness', 'education' => 'Education', 'politics' => 'Politics', 'news-and-current-events' => 'News and Current Events', 'entertainment' => 'Entertainment', 'sports' => 'Sports', 'travel' => 'Travel', 'diy-and-home-improvement' => 'DIY and Home Improvement', 'parenting' => 'Parenting', 'fashion' => 'Fashion', 'beauty' => 'Beauty', 'food-and-cooking' => 'Food and Cooking', 'marketing' => 'Marketing', 'writing-and-blogging' => 'Writing and Blogging', 'social-media-and-networking' => 'Social Media and Networking', 'other' => 'Other'], $post->category) !!}
            </div>
            <button 
                type="submit"
                class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Post
            </button>
        </div>
    </form>
</div>

@endsection