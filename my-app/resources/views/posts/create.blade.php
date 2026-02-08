@extends('layouts.app')

@section('title','新規投稿')

@section('content')
<div class="grid grid-cols-1 gap-4 my-4">
    <h1 class="text-center">新規投稿</h1>
    <form action="#" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="md-4">
        <label for="title" class="block text-gray-700 text-sm font-bold md-2">タイトル</label>
        <input type="text" name="title" id="title">
        </div>
        <div class="md-6">
        <label for="content" class="block text-gray-700 text-sm font-bold md-2">内容</label>
        <textarea name="content" id="content"></textarea>
        </div>
        <button type="submit">投稿</button>
    </form>
</div>
@endsection

