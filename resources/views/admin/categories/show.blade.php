@extends('layouts.app')
@section('content')
    <section class="container">
        <h2>{{$category->name}}</h2>
        <h3>{{$category->slug}}</h3>

    </section>
@endsection
