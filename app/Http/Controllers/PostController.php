<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function view(Request $request)
    {
        $id = $request->get('id');
        $post = Post::query()->find($id);
        return view('post',
            compact('post'));
    }

    public function search(Request $request)
    {
        $val = $request->get('val');
        $posts = Post::query()->where('name', 'like', '%'.$val.'%')->get();
        if($posts->count() === 0)
            $posts = Post::query()->where('description', 'like', '%'.$val.'%')->get();
        if($posts->count() === 0)
            $posts = Post::query()->where('content', 'like', '%'.$val.'%')->get();

        return view('post-search', compact('posts', 'val'));
    }
}
