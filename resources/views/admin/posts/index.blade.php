@extends('layouts.admin')

@section('title')
  | Elenco Post
@endsection

@section('content')
<div class="container">

  @if (session('deleted'))
    <div class="alert alert-danger" role="alert">
      {{ session('deleted') }}
    </div>
  @endif

  <div class="row">
      <h1>ELENCO POST</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">TITOLO</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col" colspan="3">AZIONI</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($posts as $post)
          {{-- @dump($post->category->name) --}}
            <tr>
              <th scope="row">{{ $post->id }}</th>
              <td>{{ $post->title }}</td>
              {{-- stampo la categoria prendendo TUTTO l'oggetto ($post->category) --}}
              {{-- e dall'oggetto gli chiedo di visualizzare solo il nome (name) --}}
              {{-- posso anche scegliere di visualizzare l'id, lo slug, ecc. --}}
              {{-- questo grazie alla relazione (one to many) tra Post e Category --}}
              <td>{{ $post->category->name }}</td>
              <td class="d-flex justify-content-between">
                <a class="btn btn-success" href="{{ route('admin.posts.show', $post)}}">SHOW</a>
                <a class="btn btn-info" href="{{ route('admin.posts.edit', $post)}}">EDIT</a>
                <form onsubmit="return confirm('Sicuro di voler eliminare questo post?')" action="{{ route('admin.posts.destroy', $post)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">DELETE</button>
                </form>
              </td>
            </tr>
          @endforeach
          
        </tbody>
      </table>

    <div>
      {{ $posts->links() }}
    </div>

  </div>
</div>
@endsection
