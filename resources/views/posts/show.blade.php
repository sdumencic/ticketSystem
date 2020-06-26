@extends('layouts.app')

@php ($imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz',
'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm',
'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'])

@section('content')
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <br>    
    <h1>{{$post->title}}</h1>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    <h2>Ticket Text</h2>
    <div class="form-control">
        {{$post->body}}
    </div><br>

    <h2>Priority</h2>
    @if($post->priority === 'low')
        <p class="form-control" style="background: LightGreen">{{$post->priority}}</p>  
    @elseif($post->priority === 'medium')
        <p class="form-control" style="background: #ffedcc">{{$post->priority}}</p>
    @else
        <p class="form-control" style="background: IndianRed; color: white">{{$post->priority}}</p>
    @endif

    <h2>User Email</h2>
    <div class="form-control">
        {{$post->user->email}}
    </div><br>

    <h2>Status</h2>
    <div class="form-control">
        {{$post->status}}
    </div>
    
    <br>
    <h2>Attachments</h2>
    <!--<div>{{$post->file}}</div>-->
    @if($post->file != 'noimage.jpg') 
    <a href = "/storage/file/{{$post->file}}/">{{$post->file}}</a>
    <!--<img style="width:50%" class = "rounded mx-auto d-block" src = "/storage/file/{{$post->file}}">-->
        
        <!--@if(pathinfo(storage_path().'/storage/file/'.$post->file, PATHINFO_EXTENSION) == 'jpg')
            <img style="width:50%" class = "rounded mx-auto d-block" src = "/storage/file/{{$post->file}}">
        @endif-->

        @if(in_array(pathinfo(storage_path().'/storage/file/'.$post->file, PATHINFO_EXTENSION), $imageExtensions))
            <img style="max-width:30%; max-height:30%;" class = "rounded mx-auto d-block" src = "/storage/file/{{$post->file}}">
        @endif

    @else
    <div class="form-control">
        No Attachments
    </div><br>
    @endif
    <hr>
    <!--<a href = "/posts/{{$post->id}}/edit" class = "btn btn-primary">Edit</a>-->
    

    @if(Auth::user()->id == $post->user_id) <!--samo auth tko je napisao moze brisati-->
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST',  'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    <hr>    
    @endif
    
    {!!Form::close()!!}

    
@endsection