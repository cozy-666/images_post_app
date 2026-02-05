@extends('layouts.app')

@section('title','投稿一覧')

@section('content')
<h1>index2のタイトルです</h1>
@foreach ($posts as $post)
<div>
    <h2>タイトル名：{{ $post->title }}</h2>
    <p>本文：{{ $post->body }}</p>
</div>
@endforeach
@endsection

