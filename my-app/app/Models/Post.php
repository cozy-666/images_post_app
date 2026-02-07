<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

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
        //(?, ?)sqlインジェクション対策
        //不正アクセス対策
        $post = DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)',
        [1,$data->title, $data->body]);
        return $post;
    }
}
