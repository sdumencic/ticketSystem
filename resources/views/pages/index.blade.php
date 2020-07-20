@extends('layouts.app')

@section('content')
<div class = "jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>This is a ticket system</p>
    @if (Auth::user())
        <p>For creating a ticket press "create ticket"</p>
    @else
    <p><a class = "btn btn-primary" href="/login" role="button">Login</a> <a class="btn btn-success" href = "/register" role = "button">Register</a><p>
    @endif
@endsection
