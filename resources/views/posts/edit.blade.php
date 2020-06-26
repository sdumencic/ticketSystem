@extends('layouts.app')

@section('content')
    <br>
    <h1>Edit Ticket</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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

        @if (Auth::user()->hasAnyRole('admin') OR Auth::user()->hasAnyRole('employee'))
            <div class = "form-group">
            <h2>{{Form::label('status', 'Status')}}</h2>
            {{Form::select('status', ['open' => 'Open', 'in_progress' => 'In progress', 'in_review' => 'In review', 'closed' => 'Closed'], 'low', ['class' => 'form-control'])}}
            </div>
        @else
            <h2>Status</h2>
            <p>{{Form::radio('status', $post->status, true)}} &nbsp Open </p>
        @endif

        <br>

        <h2>Attachments</h2>
        <p>If you have more files to upload, please put them in a folder, zip it and upload it.</p>
        <div class="form-group">
            {{Form::file('file')}}
        <div>
        <hr>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => "btn btn-primary"])}}  
    {!! Form::close() !!}
@endsection