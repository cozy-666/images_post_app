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
}
