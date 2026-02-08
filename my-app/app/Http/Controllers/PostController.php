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
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //入力のバリデーション
        $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
        ]);

        $post = new Post();
        $result = $post->createPost($request->all());
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }


    // public function indexRedirect()
    // {
    //     return redirect()->route('posts.index_route');
    // }


    // public function index2()
    // {
    //     $posts = [
    //         (object)['title' => '最初の投稿です',
    //         'body' => 'これは最初の投稿の本文です'],
    //         (object)['title' => '二番目の投稿です',
    //         'body' => 'これは二番目の投稿の本文です'],
    //         (object)['title' => '三番目の投稿です',
    //         'body' => 'これは三番目の投稿の本文です'],
    //     ];
    //     return view('posts.index2', ['posts' => $posts]);
    //     //'posts' はviewsの中のpostsに入る
    // }

    // public function indexNormalSql()
    // {
    //     $post = new Post();
    //     $posts = $post -> GetPostWithNormalSql();
    //     return $posts;
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // public function createPostWithNormalSql()
    // {
    //     $dummyData = (object)[
    //         'user_id' => 1,
    //         'title' => '素のsqlで新しい投稿',
    //         'body' => '素のsqlで新しい投稿の内容です。'
    //     ];
    //     $post = new Post();
    //     $post->createPostWithNormalSql($dummyData);
    // }

    // public function createBulkPostWithNormalSql()
    // {

    //     $post = new Post();
    //     $post->createBulkPostWithNormalSql();
    // }

    // public function updatePostWithNormalSql()
    // {
    //     $dummyData = (object)[
    //         'id' => 12,
    //         'title' => '更新された投稿',
    //         'body' => '更新された投稿の内容です。'
    //      ];
    //      $post = new Post();
    //      $post->updatePostWithNormalSql($dummyData);
    // }

    // public function deletePostWithNormalSql()
    // {
    //     $dummyData = (object)[
    //         'id' => 12,
    //      ];
    //      $post = new Post();
    //      $post->deletePostWithNormalSql($dummyData);
    // }

    // public function getPostWithQueryBuilder()
    // {
    //     $post = new Post();
    //     $posts=$post->getPostWithQueryBuilder();
    //     return $posts;
    // }

    // public function createPostWithQueryBuilder()
    // {
    //     $dummyData = (object)[
    //         'user_id' => 1,
    //         'title' => 'クエリービルダーで新しい投稿',
    //         'body' => 'クエリービルダーで新しい投稿の内容です。'
    //     ];
    //     $post = new Post();
    //     $post->createPostWithQueryBuilder($dummyData);
    // }

    // public function updatePostWithQueryBuilder()
    // {
    //     $dummyData = (object)[
    //         'id' => 12,
    //         'title' => '更新された投稿',
    //         'body' => '更新された投稿の内容です。'
    //      ];
    //      $post = new Post();
    //      $post->updatePostWithQueryBuilder($dummyData);
    // }

    // public function deletePostWithQueryBuilder()
    // {
    //     $dummyData = (object)[
    //         'id' => 12,
    //      ];
    //      $post = new Post();
    //      $post->deletePostWithQueryBuilder($dummyData);
    // }

    // public function getPostWithQueryBuilderByFilter()
    // {
    //     $post = new Post();
    //     $posts = $post->getPostWithQueryBuilderByFilter();
    //     return $posts;
    // }

    // public function getCountPost()
    // {
    //     $post = new Post();
    //     $count = $post->getCountPosts();
    //     return $count;
    // }

    // public function getPostAndUserWithQueryBuilder()
    // {
    //     $post = new Post();
    //     $posts = $post->getPostAndUserWithQueryBuilder();
    //     return $posts;
    // }

    // public function getPostWithQueryBuilderBySubQuery()
    // {
    //     $post = new Post();
    //     $posts = $post->getPostWithQueryBuilderBySubQuery();
    //     return $posts;
    // }

    // public function getPostWithEloquent()
    // {
    //     $post = new Post();
    //     $posts = $post->getPostWithEloquent();

    //     foreach ($posts as $post) {
    //         $post->tags;
    //     }
    //     return $posts;
    // }

    // public function getPostWithEloquentById(Post $post)
    // {
    //     $post = new Post();
    //     $posts = $post->getPostWithEloquentById($post);
    //     return $post;
    // }

    // public function createPostWithEloquent()
    // {
    //     $dummyData = (object)[
    //         'user_id' => 1,
    //         'title' => 'Eloquentで新しい投稿',
    //         'body' => 'Eloquentで新しい投稿の内容です。'
    //     ];
    //     $post = new Post();
    //     $post->createPostWithQueryBuilder($dummyData);
    //     $posts = $post->showEloquent();
    //     return $posts;
    // }

    // public function updatePostWithEloquent()
    // {
    //     $dummyData = (object)[
    //         'id' => 12,
    //         'title' => 'Eloquentで更新された投稿',
    //         'body' => 'Eloquentで更新された投稿の内容です。'
    //      ];
    //      $post = new Post();
    //      $post->updatePostWithEloquent($dummyData);
    // }

    // public function deletePostWithEloquent()
    // {
    //     $dummyData = (object)[
    //         'id' => 12,
    //      ];
    //      $post = new Post();
    //      $post->deletePostWithEloquent($dummyData);
    // }

    // public function getPostWithEloquentTrashed()
    // {
    //     $post = new Post();
    //     $posts = $post->getTrashPostWithEloquent();
    //     return $posts;
    // }


    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image',
    //         'caption' => 'nullable|string|max:255',
    //     ]);
    //     $path = $request->file('image')->store('images');

    //     Post::createPost($request->all());

    //     return response()->json(['message'
    //     => '画像が投稿されました']);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Post $post)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Post $post)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Post $post)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Post $post)
    // {
    //     //
    // }
}
