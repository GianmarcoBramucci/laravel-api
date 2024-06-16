@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-content-center">
            <h1>i miei progetti</h1>
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">crea nuovo</a>
        </div>
        <ul>
            @foreach ($categories as $category)
            <li>
                <h2>{{$category->name}}</h2>
                <h3>{{$category->slug}}</h3>
                <a href="{{ route('admin.categories.show',$category->slug) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.categories.edit',$category->slug) }}"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.categories.destroy', $category->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $category->name }}">
                      <i class="fa-solid fa-trash" style="color: #0A58CA;"></i>
                    </button>

                  </form>
            </li>
            @endforeach
        </ul>
        
    </section>
@include('admin.partials.modal-delete')
@endsection
