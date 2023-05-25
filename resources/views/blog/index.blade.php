@extends('layouts.base')

@section('title', 'Blog')

@section('content')
  <div>
    <h1 class="text-3xl text-center text-slate-800">Mon blog</h1>

    <div class="flex flex-col gap-8 my-8">
      @forelse ($posts as $post)
          <a href="{{ route('blog.show', ['slug' => $post->slug, 'id' => $post->id]) }}">
            <article class="bg-white p-4 rounded-md">
              <h2 class="text-xl text-slate-800">{{ $post->title }}</h2>
              <p class="text-sm text-slate-500">{{ $post->content }}</p>
            </article>
          </a>
      @empty
        <p>pas d'articles...</p>
      @endforelse
    </div>

    <div>
        {{ $posts->links() }}
    </div>
  </div>
@endsection
