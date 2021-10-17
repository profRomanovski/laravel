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
        $user = User::query()->find($post->user_id);
        $username = $user->name;
        return view('post',
            compact('post', 'user', 'username'));
    }

    public function edit(Request $request)
    {
        $username = Auth::user()->name;
        $post = Post::query()->find($request->get('id'));
        return view('post-edit', compact('post', 'username'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
        $post = Post::query()->find($request->post('id'));
        $post->update($request->all());
        return redirect()->route('view-post', ['id'=>$post->id]);
    }

    public function create()
    {
        $username = Auth::user()->name;
        $categories = Category::all();
        return view('post-create', compact('username', 'categories'));
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'content' => 'required',
            'category_id'=> 'required',
        ]);
        $name = $request->post('name');
        $description = $request->post('description');
        $content = $request->post('content');
        $category_id = $request->post('category_id');
        $userId = Auth::user()->id;
        $post = Post::query()->create([
           'name' => $name,
           'description' => $description,
           'content' => $content,
           'category_id' => $category_id,
           'user_id' => $userId
        ]);
        return redirect()->route('view-post',['id'=>$post->id]);
    }

    public function search(Request $request)
    {
        $val = $request->get('val');
        $posts = Post::query()->where('name', 'like', '%'.$val.'%')->get();
        if(Auth::check())
            $username = Auth::user()->name;
        else
            $username = '';
        return view('post-search', compact('posts', 'username', 'val'));
    }
}
