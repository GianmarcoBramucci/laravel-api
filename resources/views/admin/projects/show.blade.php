@extends('layouts.app')
@section('content')
    <section class="container">
        <h2>{{$project->title}}</h2>
        <h3>{{$project->slug}}</h3>
        @if($project->category)
        <h4>category:{{ $project->category->name }}</h4>
        @endif
        <p>{{$project->content}}</p>
        <div>
            @if($project->technologies)
            @foreach ($project->technologies as $technology)
            <span class="badge text-bg-danger">{{$technology->name}}</span>
          @endforeach
          @endif
          </div>
    </section>
@endsection
