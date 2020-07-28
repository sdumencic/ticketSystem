@extends('layouts.app')

@php ($imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz',
'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm',
'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'])

@section('content')
    <br>
    <h1>Edit Ticket</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <hr>
        @if(Auth::user()->id == $post->user_id)
        <div class = "form-group">
            <h2>{{Form::label('title', 'Title')}}</h2>
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class = "form-group">
            <h2>{{Form::label('body', 'Ticket Text')}}</h2>
            {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Ticket Text'])}}
            <p>Keep the description as short and concise as possible.</p>
        </div>

        <div class hidden= "form-group">
            <h2>{{Form::label('priority', 'Priority')}}</h2>
            {{Form::select('priority', ['high' => 'High', 'medium' => 'Medium', 'low' => 'Low'], 'low', ['class' => 'form-control'])}}
        </div>

        @else
        <!-------------------------------->
        <div hidden class = "form-group">
            <h2>{{Form::label('title', 'Title')}}</h2>
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class hidden= "form-group">
            <h2>{{Form::label('body', 'Ticket Text')}}</h2>
            {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Ticket Text'])}}
            <p>Keep the description as short and concise as possible.</p>
        </div>
        <!------------------------------------------>
        <div class="card">
            <div class="card-header" style="background: linear-gradient(90deg, rgba(64,71,61,0.26684177088804273) 0%, rgba(9,96,121,0.3144608185070903) 52%, rgba(0,212,255,0.25843840954350494) 100%);">
              #{{$post->id}} Ticket
            </div>
            <div class="card-body">
              <h5 class="card-title ticket">{{$post->title}}</h5>
              <hr>
              <p class="card-text ticket">{{$post->body}}</p>
            </div>
          </div>
        <br>

        <div class = "form-group ticket">
            <h4 class="ticket">{{Form::label('priority', 'Priority')}}</h4>
            {{Form::select('priority', ['high' => 'High', 'medium' => 'Medium', 'low' => 'Low'], 'low', ['class' => 'form-control'])}}
        </div>
        @endif

        @if (Auth::user()->hasAnyRole('admin') OR Auth::user()->hasAnyRole('employee'))
            <div class = "form-group ticket">
            <h4>{{Form::label('status', 'Status')}}</h4>
            {{Form::select('status', ['open' => 'Open', 'in_progress' => 'In progress', 'in_review' => 'In review', 'closed' => 'Closed'], 'low', ['class' => 'form-control'])}}
            </div>
            <div class = "form-group ticket">
                <h4>{{Form::label('priority', 'Priority')}}</h4>
                {{Form::select('priority', ['high' => 'High', 'medium' => 'Medium', 'low' => 'Low'], 'low', ['class' => 'form-control'])}}
            </div>
        @else
            <h2>Status</h2>
            <p>{{Form::radio('status', $post->status, true)}} &nbsp Open </p>
        @endif

        <br>

        <h2>Attachments</h2>
            @if($post->file != 'noimage.jpg')
                <a href = "/storage/file/{{$post->file}}/">{{$post->file}}</a>
                @if(in_array(pathinfo(storage_path().'/storage/file/'.$post->file, PATHINFO_EXTENSION), $imageExtensions))
                        <img style="max-width:30%; max-height:30%;" class = "rounded mx-auto d-block" src = "/storage/file/{{$post->file}}">
                @endif
            @endif
        <hr>
            <p>If you have more files to upload, please put them in a folder, zip it and upload it.</p>
            <div class="form-group">
            {{Form::file('file')}}
            <div>
        <hr>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => "btn btn-primary"])}}
    {!! Form::close() !!}

    <hr>

    <div><h1>Comments</h1></div>
    <div>
        @comments(['model' => $post])
    </div>
@endsection
