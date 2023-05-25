@extends('layouts.base')

@section('title', 'Blog')

@section('content')
  <div>
    <h1 class="text-3xl text-center text-slate-800">{{ $post->title }}</h1>

    <div class="flex justify-center gap-4 mt-8">
      <a href="{{ route('blog.edit', ['post' => $post]) }}" class="py-2 text-center bg-white rounded w-36">Éditer</a>
      <form action="{{ route('blog.destroy', ['post' => $post]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="py-2 text-center bg-white rounded w-36">Supprimer</button>
      </form>
    </div>

    <div class="my-8 text-lg text-justify text-slate-500">
      <p>{{ $post->content }}</p>
    </div>

    <div>
      <a href="{{ route('blog.index') }}">&lt; Retour au blog</a>
    </div>
  </div>
@endsection
