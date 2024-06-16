@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-content-center">
            <h1>i miei progetti</h1>
            <a href="{{route('admin.technologies.create')}}" class="btn btn-primary">crea nuovo</a>
        </div>
        <ul>
            @foreach ($technologies as $technology)
            <li>
                <h2>{{$technology->name}}</h2>
                <h3>{{$technology->slug}}</h3>
                <a href="{{ route('admin.categories.show',$technology->slug) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.categories.edit',$technology->slug) }}"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.categories.destroy', $technology->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $technology->name }}">
                      <i class="fa-solid fa-trash" style="color: #0A58CA;"></i>
                    </button>

                  </form>
            </li>
            @endforeach
        </ul>
        
    </section>
@include('admin.partials.modal-delete')
@endsection
