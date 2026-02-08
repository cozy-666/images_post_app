@extends('layouts.app')

@section('title', '投稿詳細')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('posts.index') }}" class="link-back">
            ← 投稿一覧に戻る
        </a>
    </div>

    <article class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden mb-6">
        <img alt="{{ $post->title }}" src="https://picsum.photos/seed/{{ $post->id }}/800/400" class="w-full h-56 object-cover">
        <div class="p-6 sm:p-8">
            <h1 class="text-2xl font-bold text-slate-800 mb-4">{{ $post->title }}</h1>
            <p class="text-slate-600 leading-relaxed whitespace-pre-wrap">{{ $post->body }}</p>
        </div>
    </article>

    <div class="flex flex-wrap gap-3">
        <a href="{{ route('post.edit', ['post' => $post]) }}" class="btn-primary">
            編集する
        </a>
        <form action="{{ route('post.delete', ['post' => $post]) }}" method="post" class="inline">
            @csrf
            <button type="submit" onclick="return confirm('この投稿を削除しますか？')" class="btn-danger">
                削除する
            </button>
        </form>
    </div>
</div>
@endsection
