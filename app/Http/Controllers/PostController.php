<?php

namespace App\Http\Controllers;

require 'vendor/autoload.php'; 
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Request $req)
    {
        $id = $req->get('id');
        $post = Post::find($id);
        $post->delete();
    }
}
