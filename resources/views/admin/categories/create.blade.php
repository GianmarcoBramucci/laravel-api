@extends('layouts.app')
@section('content')
    <section class="container">
      <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf     
          <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
              </div>
              <button type="submit" class="btn btn-primary">invia</button>    
            </form>
    </section>
@endsection
