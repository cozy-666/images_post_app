<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function createPost($data)
    {
        $post = new Post;
        $post->image_path = $data->title;
        $post->content = $data->content;
        $post ->save();
        return $post;
    }

    public function GetPostWithNormalSql()
    {
        $posts = DB::select('SELECT * FROM posts');
        dd($posts);
        return $posts;
    }

    public function createPostWithNormalSql($data)
    {
        $post = DB::insert('INSERT INTO
        posts (user_id, title, body) VALUES
        (?, ?, ?)',
        [1,$data->title, $data->body]);
        return $post;
    }

    public function updatePostWithNormalSql($data)
    {
        $post = DB::update('UPDATE posts SET title = ?, body = ?, update_at = ? WHERE id = ?',
        [$data->title, $data->body, now(), $data->id]);
        return $post;
    }

    public function deletePostWithNormalSql($data)
    {
        $post = DB::delete('DELETE FROM posts WHERE id = ?',[$data->id]);
        return $post;
    }

    public function createBulkPostWithNormalSql(){
        DB::transaction(function(){
            $user_id = 1;
            $title = "一番目のトランザクションテスト";
            $body = "これは一番目のトランザクションのテストです";

            DB::insert('INSERT INTO posts(user_id, title, body) VALUE (?, ?, ?)', [$user_id, $title,$body]);

            //ユーザーIDを入れない
            $title = "2番目のトランザクションテスト";
            $body = "これは2番目のトランザクションのテストです";

            DB::insert('INSERT INTO posts(title, body) VALUE (?, ?)', [$title,$body]);
        });
    }

    public function GetPostWithQueryBuilder()
    {
        $posts = DB::table('posts')->get();
        dd($posts);
        return $posts;
    }

    public function createPostWithQueryBuilder($data)
    {
        $post = DB::table('posts')->insert([
            'user_id' => $data->user_id,
            'title' => $data->title,
            'body' => $data->body,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return $post;
    }

    public function updatePostWithQueryBuilder($data)
    {
        $post = DB::table('posts')->where('id',$data->id)->update([
        'title' => $data->title,
        'body' => $data->body,
        'updated_at' => now()
        ]);
        return $post;
    }

    public function deletePostWithQueryBuilder($data)
    {
        $post = DB::table('posts')->where('id',$data->id)->delete();
        return $post;
    }

    public function getPostWithQueryBuilderByFilter(){
        // $posts = DB::table('posts')
        // ->where('body', 'like', '%内容%')
        // ->whereIn('id', [1, 2, 3])
        // ->get();

        // ページネーション ?page=なんか
        $posts = DB::table('posts')->paginate(5);
        return $posts;
    }

     public function getCountPosts()
     {
        $count = DB::table('posts')->count();
        return $count;
     }

     public function getPostAndUserWithQueryBuilder()
     {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id','=','users.id')
            ->select('posts.*', 'users.name')
            ->get();
            return $posts;
     }

     public function getPostWithQueryBuilderBySubQuery()
     {
        $posts = DB::table('posts')
            ->whereIn('id', function ($query){
                $query->select(DB::raw('MAX(id)'))
                ->from('posts')
                    ->groupBy('user_id');
            })
                ->get();
            return $posts;
     }

     public function getPostWithEloquent()
     {
        $posts = Post::all();
        return $posts;
     }

    public function getPostWithEloquentById($id)
    {
        $post = Post::find($id);
        dd($post->tags);
        return $post;
    }

    public function createPostWithEloquent($data)
    {
        $post = new Post;
        $post->user_id = $data->user_id;
        $post->title = $data->title;
        $post->body = $data->body;
        $post->save();
        return $post;
    }

    public function updatePostWithEloquent($data)
    {
        $post = Post::find($data->id);
        $post->title = $data->title;
        $post->body = $data->body;
        $post->save();
        return $post;
    }

    public function deletePostWithEloquent($id)
    {
        $post = Post::find($id);
        $post->delete();
        return $post;
    }
}
