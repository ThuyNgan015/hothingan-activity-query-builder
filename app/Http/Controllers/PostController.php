<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getAllPosts()
    {
        $posts = DB::table('posts')->get();
        return view('posts.index', compact('posts'));
    }

    public function getOnePost()
    {
        $post = DB::table('posts')->where('id', 10)->first();
        return view('posts.show', compact('post'));
    }

    public function crudPostUsingMySQL()
    {
        $id = 51;
        $post = DB::select('SELECT * FROM posts WHERE id = ?', [$id]);

        $title = 'New Title';
        $description = 'New Description';
        DB::update('UPDATE posts SET title = ?, description = ? WHERE id = ?', [$title, $description, $id]);

        DB::delete('DELETE FROM posts WHERE id = ?', [$id]);

        return "CRUD operations completed using MySQL prepare statement.";
    }

    public function crudPostUsingPDO()
    {
        $id = 51;
        $post = DB::connection()->select("SELECT * FROM posts WHERE id = ?", [$id]);

        $title = 'New Title';
        $description = 'New Description';
        DB::connection()->update("UPDATE posts SET title = ?, description = ? WHERE id = ?", [$title, $description, $id]);

        DB::connection()->delete("DELETE FROM posts WHERE id = ?", [$id]);

        return "CRUD operations completed using PDO prepare statement.";
    }
}
