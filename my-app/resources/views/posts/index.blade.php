@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">投稿一覧</h1>
        <p class="mt-1 text-slate-500 text-sm">みんなの投稿をチェックしよう</p>
    </div>
    <a href="/post/create" class="btn-primary">
        新規投稿
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($posts as $post)
    <a href="{{ route('post.show', ['post' => $post]) }}" class="group block">
        <article class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg hover:border-blue-200 transition-all duration-200 h-full flex flex-col">
            <img alt="{{ $post->title }}" src="https://picsum.photos/seed/{{ $post->id }}/600/300" class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="p-5 flex-1 flex flex-col">
                <h2 class="text-lg font-semibold text-slate-800 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                    {{ $post->title }}
                </h2>
                <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 flex-1">
                    {{ $post->body }}
                </p>
            </div>
        </article>
    </a>
    @empty
    <div class="col-span-full bg-white rounded-xl border border-slate-100 p-16 text-center">
        <p class="text-slate-500 mb-6">まだ投稿がありません</p>
        <a href="/post/create" class="btn-primary">
            最初の投稿を作成
        </a>
    </div>
    @endforelse
</div>
@endsection
