@extends('layouts.app')

@section('content')
    <h1>Create Ticket</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <hr>
        <div class = "form-group">
            <h2>{{Form::label('title', 'Title')}}</h2>
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class = "form-group">
            <h2>{{Form::label('body', 'Ticket Text')}}</h2>
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Ticket Text'])}}
            <p>Keep the description as short and concise as possible.</p>
        </div>
        <div class = "form-group">
            <h2>{{Form::label('priority', 'Priority')}}</h2>
            {{Form::select('priority', ['L' => 'Large', 'S' => 'Small'], 'S')}}
        </div>
        {{Form::submit('Submit', ['class' => " btn btn-primary btn-lg"])}}  
    {!! Form::close() !!}
@endsection