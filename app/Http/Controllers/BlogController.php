<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostSearchRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(3);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        return view('blog.show', compact('post'));
    }

    public function search(PostSearchRequest $request): View
    {
        $form = $request->validated();

        $posts = Post::where('slug', 'like', '%'.$form['slug'].'%')->paginate(3);

        return view('blog.index', compact('posts'));
    }

    public function create(): View
    {
        $post = new Post();
        return view('blog.create', compact('post'));
    }

    public function store(PostFormRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated());

        return to_route('blog.show', ['post' => $post])->with('success', "L'article a bien été sauvegardé");
    }

    public function edit(Post $post): View
    {
        return view('blog.edit', compact('post'));
    }

    public function update(Post $post, PostFormRequest $request): RedirectResponse
    {
        $post->update($request->validated());

        return to_route('blog.show', ['post' => $post])->with('success', "L'article a bien été modifié");
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return to_route('blog.index')->with('success', "L'article a bien été supprimé");
    }
}
