@extends('layouts.app')

@section('title', '投稿編集')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('post.show', ['post' => $post]) }}" class="link-back">
            ← 投稿詳細に戻る
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 sm:p-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-6">投稿編集</h1>

        <form action="{{ route('post.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <div class="mb-5">
                <label for="title" class="block text-slate-700 text-sm font-semibold mb-2">タイトル</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
                    placeholder="投稿のタイトルを入力">
            </div>
            <div class="mb-6">
                <label for="body" class="block text-slate-700 text-sm font-semibold mb-2">内容</label>
                <textarea name="body" id="body" rows="6" required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow resize-y"
                    placeholder="投稿の内容を入力">{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn-primary">
                更新する
            </button>
        </form>
    </div>
</div>
@endsection
