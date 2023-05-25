@extends('layouts.base')

@section('title', 'Blog')

@section('content')
  <div>
    <h1 class="text-3xl text-center text-slate-800">{{ $post->title }}</h1>

    <div class="text-lg text-justify text-slate-500 my-8">
      <p>{{ $post->content }}</p>
    </div>

    <div>
        <a href="{{ route('blog.index') }}">&lt; Retour au blog</a>
    </div>
  </div>
@endsection
