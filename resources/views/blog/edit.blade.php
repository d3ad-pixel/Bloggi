@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update Post
        </h1>
    </div>
</div>

@if ($errors->any())
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
            <select id="category" name="category">
                <option value="personal-development">Personal Development</option>
                <option value="lifestyle">Lifestyle</option>
                <option value="technology">Technology</option>
                <option value="business">Business</option>
                <option value="finance">Finance</option>
                <option value="health-and-fitness">Health and Fitness</option>
                <option value="education">Education</option>
                <option value="politics">Politics</option>
                <option value="news-and-current-events">News and Current Events</option>
                <option value="entertainment">Entertainment</option>
                <option value="sports">Sports</option>
                <option value="travel">Travel</option>
                <option value="diy-and-home-improvement">DIY and Home Improvement</option>
                <option value="parenting">Parenting</option>
                <option value="fashion">Fashion</option>
                <option value="beauty">Beauty</option>
                <option value="food-and-cooking">Food and Cooking</option>
                <option value="marketing">Marketing</option>
                <option value="writing-and-blogging">Writing and Blogging</option>
                <option value="social-media-and-networking">Social Media and Networking</option>
                <option value="other">Other</option>
            </select>
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