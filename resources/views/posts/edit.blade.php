@extends('layouts.app')

@section('content')
    <h1>Edit Ticket</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
    <hr>
        <div class = "form-group">
            <h2>{{Form::label('title', 'Title')}}</h2>
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class = "form-group">
            <h2>{{Form::label('body', 'Ticket Text')}}</h2>
            {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Ticket Text'])}}
            <p>Keep the description as short and concise as possible.</p>
        </div>
        <div class = "form-group">
            <h2>{{Form::label('priority', 'Priority')}}</h2>
            {{Form::select('priority', ['high' => 'High', 'medium' => 'Medium', 'low' => 'Low'], 'low', ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => "btn btn-primary"])}}  
    {!! Form::close() !!}
@endsection