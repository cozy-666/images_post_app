@extends('layouts.app')

@section('title','投稿詳細')

@section('content')
<div class="grid grid-cols-1 gap-4 my-4">
    <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto shadow-md">
        <img alt="blog photo" src="https://picsum.photos/200" class="max-h-40 w-full object-cover">
        <div class="bg-white dark:bg-gray-800 w-full p-4">
            <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                {{ $post->title }}
            </p>
            <p class="text-gray-600 dark:text-gray-300 font-light text-md">
                {{ $post->body }}
            </p>
        </div>
    </div>
    <div class="text-center">
    <a class="bg-blue-500 hover:bg-blue-700 text-white
    font-bold py-2 px-4 rounded
    focus:outline-none
    focus:shadow-outline"
    href="{{ route('post.edit',['post'=>$post]) }}">編集する</a>
    </div>
</div>
@endsection

