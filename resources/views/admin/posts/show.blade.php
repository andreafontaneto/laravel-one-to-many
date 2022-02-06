@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->content }}</p>
    </div>

    <div class="row mb-5">
      <a class="btn btn-info mr-3" href="{{ route('admin.posts.edit', $post)}}">EDIT</a>
      <form action="{{ route('admin.posts.destroy', $post)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">DELETE</button>
      </form>
    </div>

    <div>
      <a href="{{ route('admin.posts.index') }}"> << BACK TO LIST </a>
    </div>
</div>
@endsection
