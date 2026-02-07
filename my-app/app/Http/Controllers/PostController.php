<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = [
            (object)['title' => '最初の投稿です',
            'body' => 'これは最初の投稿の本文です'],
            (object)['title' => '二番目の投稿です',
            'body' => 'これは二番目の投稿の本文です'],
            (object)['title' => '三番目の投稿です',
            'body' => 'これは三番目の投稿の本文です'],
        ];
        return view('posts.index', ['posts' => $posts]);
        //'posts' はviewsの中のpostsに入る
    }
    public function index2()
    {
        $posts = [
            (object)['title' => '最初の投稿です',
            'body' => 'これは最初の投稿の本文です'],
            (object)['title' => '二番目の投稿です',
            'body' => 'これは二番目の投稿の本文です'],
            (object)['title' => '三番目の投稿です',
            'body' => 'これは三番目の投稿の本文です'],
        ];
        return view('posts.index2', ['posts' => $posts]);
        //'posts' はviewsの中のpostsに入る
    }

    public function indexNormalSql()
    {
        $post = new Post();
        $posts = $post -> GetPostWithNormalSql();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function createPostWithNormalSql()
    {
        $dummyData = (object)[
            'user_id' => 1,
            'title' => '素のsqlで新しい投稿',
            'body' => '素のsqlで新しい投稿の内容です。'
        ];
        $post = new Post();
        $post->createPostWithNormalSql($dummyData);
    }

    public function createBulkPostWithNormalSql()
    {

        $post = new Post();
        $post->createBulkPostWithNormalSql();
    }

    public function updatePostWithNormalSql()
    {
        $dummyData = (object)[
            'id' => 12,
            'title' => '更新された投稿',
            'body' => '更新された投稿の内容です。'
         ];
         $post = new Post();
         $post->updatePostWithNormalSql($dummyData);
    }

    public function deletePostWithNormalSql()
    {
        $dummyData = (object)[
            'id' => 12,
         ];
         $post = new Post();
         $post->deletePostWithNormalSql($dummyData);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'caption' => 'nullable|string|max:255',
        ]);
        $path = $request->file('image')->store('images');

        Post::createPost($request->all());

        return response()->json(['message'
        => '画像が投稿されました']);
;    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
