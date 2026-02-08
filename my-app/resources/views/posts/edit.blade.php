@extends('layouts.app')

@section('title','投稿編集')

@section('content')
<div class="grid grid-cols-1 gap-4 my-2">
    <div class="text-left">
        <a href="{{ route('post.show',['post'=>$post]) }}"
        class="bg-gray-500 hover:bg-gray-700 text-gray
        font-bold py-2 px-4 rounded-full
        cursor-pointer">
        戻る</a>
    </div>
    <h1 class="text-center font-bold">投稿編集</h1>
    </div>
    <form action="{{ route('post.update') }}" method="POST" class="bg-white shadow-md rounded px-6
        pb-8 mb-4">
        @csrf
        <input type="hidden" name="id" value="{{$post->id}}">
        <div class="md-4">
        <label for="title" class="block
        text-gray-700 text-sm font-bold
        md-2">タイトル</label>
        <input type="text" name="title" id="title"
        value="{{ $post->title }}"
            class="shadow appearance-none
            border rounded w-full py-2
            px-3 text-gray-700
            leading-tight focus:outline-none
            focus:shadow-outline">
        </div>
        <div class="md-6">
        <label for="body" class="block text-gray-700 text-sm font-bold md-2">内容</label>
        <textarea name="body" id="body"
        class="shadow appearance-none
        border rounded w-full py-2
        px-3 text-gray-700 mb-3
        leading-tight
        focus:outline-none
        focus:shadow-outline">{{ $post->body }}</textarea>
        </div>
        <button type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white
        font-bold py-2 px-4 rounded
        focus:outline-none
        focus:shadow-outline">更新</button>
    </form>
</div>
@endsection

