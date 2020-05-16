@extends('layouts.app')

@section('content')
    <a href = "/posts" class = "btn">Go back</a> <!-- btnclass nema pozadinu -->
    <h1>{{$post->title}}</h1>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    <div>
        {{$post->body}}
    </div>
@endsection