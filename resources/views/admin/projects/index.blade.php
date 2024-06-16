@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-content-center">
            <h1>i miei progetti</h1>
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary">crea nuovo</a>
        </div>
        <ul>
            @foreach ($projects as $project)
            <li>
                <h2>{{$project->title}}</h2>
                <h3>{{$project->slug}}</h3>
                @if($project->category)
                    <h4>category:{{ $project->category->name }}</h4>
                @endif
                <p>{{$project->content}}</p>
                <img src="{{asset('storage/'. $project->img)}}" alt="">
                <a href="{{ route('admin.projects.show',$project->slug) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.projects.edit',$project->slug) }}"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $project->title }}">
                      <i class="fa-solid fa-trash" style="color: #0A58CA;"></i>
                    </button>
                  </form>
            </li>
            @endforeach
        </ul>
        
    </section>
@include('admin.partials.modal-delete')
@endsection
