@extends('layouts.app')
@section('content')
    <section class="container">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
      <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf     
          <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Img</label>
                <input type="file" class="form-control" id="exampleFormControlInput1" name="img">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Seleziona una categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3">
                <p>Select Tag:</p>
                @foreach ($technologies as $technology)
                <div>
                    <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label for="" class="form-check-label">{{ $technology->name }}</label>
                </div>
                @endforeach
                @error('technologies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
              <button type="submit" class="btn btn-primary">invia</button>    
            </form>
    </section>
@endsection
