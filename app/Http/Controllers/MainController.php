<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $username = '';
        $val = '';
        if(Auth::check()) $username = Auth::user()->name;
        $posts = $this->preparePosts($request->get('cat'));
        $categories = Category::all();
        return view('home', compact(
            'username',
            'posts',
            'categories',
            'val'
        ));
    }

    public function preparePosts($cat)
    {
        if($cat === 'all' || $cat === null)
        $posts = Post::all();
        else
            $posts = Post::query()->where('category_id', '=', $cat)->get();
        $result = [];
        foreach ($posts as $post) {
            $post->username = User::query()->find($post->user_id)->name;
            array_push($result, $post);
        }
        return $result;
    }
}
