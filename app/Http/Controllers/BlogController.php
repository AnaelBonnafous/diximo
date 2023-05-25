<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(1);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        return view('blog.show', compact('post'));
    }

    public function search(PostStoreRequest $request)
    {
        $form = $request->validated();

        $posts = Post::where('slug', 'like', '%'.$form['slug'].'%')->paginate(1);

        return view('blog.index', compact('posts'));
    }
}
