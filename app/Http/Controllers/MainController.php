<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $val = '';
        $posts = $this->preparePosts($request->get('cat'));
        $categories = Category::all();
        return view('home', compact(
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
        return $posts;
    }
}
