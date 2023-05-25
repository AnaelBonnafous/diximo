@extends('layouts.base')

@section('title', 'Nouvel article')

@section('content')
  <div>
    <h1 class="text-3xl text-center text-slate-800">Nouvel article</h1>

    <form action="{{ route('blog.store') }}" method="POST" class="flex flex-col gap-4 my-8">
      @csrf
      @method('POST')
      @include('blog.form')
    </form>
  </div>
@endsection
