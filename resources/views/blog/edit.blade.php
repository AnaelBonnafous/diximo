@extends('layouts.base')

@section('title', $post->title)

@section('content')
  <div>
    <h1 class="text-3xl text-center text-slate-800">{{ $post->title }}</h1>

    <form action="{{ route('blog.update', ['post' => $post]) }}" method="POST" class="flex flex-col gap-4 my-8">
      @csrf
      @method('PATCH')
      @include('blog.form')
    </form>
  </div>
@endsection
