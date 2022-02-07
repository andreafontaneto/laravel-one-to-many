@extends('layouts.admin')

@section('content')
<div class="container">

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>  
        @endforeach
      </ul>
    </div>
  @endif
    
  <h1>Crea un nuovo post</h1>

  <form class="mt-5" action="{{ route('admin.posts.store') }}" method="POST">
    @csrf
    @method('POST')

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Inserisci il titolo del post" name="title" id="title">
      @error('title')
        <p>{{ $message }}</p>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="content" class="form-label">Contenuto</label>
      <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Inserisci il contenuto del post" name="content" id="content">{{ old('content') }}</textarea>
      @error('content')
        <p>{{ $message }}</p>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="category_id" class="form-label">Categoria</label>
      <select class="form-control" name="category_id" id="category_id">
        <option selected>Selezionare una categoria</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif>
              {{ $category->name }}
            </option>
          @endforeach
      </select>
    </div>
    
    <button type="submit" class="btn btn-success">Invia</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>

    
</div>
@endsection