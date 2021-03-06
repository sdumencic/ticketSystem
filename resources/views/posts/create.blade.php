@extends('layouts.app')

@section('content')
    <br>
    <h1>Create Ticket</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
            {{Form::select('priority', ['high' => 'High', 'medium' => 'Medium', 'low' => 'Low'], 'low', ['class' => 'form-control'])}}
        </div>
        <h2>{{Form::label('status', 'Status')}}</h2>
        <p>{{Form::radio('status', 'open', true)}} &nbsp Open </p>
        <h2>Attachments</h2>
        <p>If you have more files to upload, please put them in a folder, zip it and upload it.</p>
        <div class="form-group">
            {{Form::file('file')}}
        <div>
        <hr>
        {{Form::submit('Submit', ['class' => "btn btn-primary"])}}          
    {!! Form::close() !!}
@endsection