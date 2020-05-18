@extends('layouts.app')

@section('content')
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
    
    <br>
    <img style="width:50%" class = "rounded mx-auto d-block" src = "/storage/file/{{$post->file}}">
    <hr>
    <a href = "/posts/{{$post->id}}/edit" class = "btn btn-primary">Edit</a>
    

    @if(Auth::user()->id == $post->user_id) <!--samo auth tko je napisao moze brisati-->
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST',  'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
@endsection