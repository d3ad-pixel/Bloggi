@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Post
        </h1>
    </div>
</div>
 
@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/3 mb-4 font-bold text-red-800 bg-red-300 rounded-2xl py-4 px-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="/blog" method="post" enctype="multipart/form-data">
        @csrf
        <input 
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none mb-10">
        <textarea id="myeditorinstance" class='z-0'name="data">Hello, World!</textarea>

        <div class="bg-grey-lighter pt-15">
            <label class="w-60 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="text-base leading-normal">
                    Select a Thumbnail Image
                </span>
                <input 
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

        

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
        </select>

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>

    </form>
</div>

@endsection