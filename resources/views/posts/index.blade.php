@extends('layouts.app')

@section('content')
    <br>
    <h1>Tickets</h1>
    
    <div class="row row-cols-3 row-cols-md-4">
    
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="col mb-4">    
        <div class="card">
            <!--<div class = "well">
                <h3><a href = "/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}, <hr>email: {{$post->user->email}}</small>
            </div>-->
            <div class="card-body card text-white card border-info mb-3" style="max-width: 18rem; height: 12rem;"> <!--card-body card text-white bg-info mb-3-->
                <h5 class="card-title"><a href = "/posts/{{$post->id}}">Ticket #{{$post->id}}:</a></h5>
                <br>  
                <p class="card-text text-info h3">{{$post->title}}</p>
            </div>
            <div class="card-footer">
                <p class= "text-info">{{$post->status}}</p>
                <small class="text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</small>
              </div>
        </div>
    </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
</div>
@endsection