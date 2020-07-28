@extends('layouts.app')

@section('content')
<div class = "jumbotron text-center" style="background: linear-gradient(90deg, rgba(64,71,61,0.26684177088804273) 0%, rgba(9,96,121,0.3144608185070903) 52%, rgba(0,212,255,0.25843840954350494) 100%);">
    @if (Auth::user())
        @if(Auth::user()->hasAnyRole('user'))
        <h1>{{$title}}</h1>
        <p>This is a ticket system</p>
        <p>For creating a ticket press "create ticket"</p>
        @endif
        @if (Auth::user()->hasAnyRole('admin') OR Auth::user()->hasAnyRole('employee'))
                <h1 style="background-color: rgba(255, 255, 255, 0.315)">Welcome! You can see ticket stats below</h1>

        <div class="card-deck" style="margin-top: 30px;">
        <div class="card index" style="width: 18rem;">
            <img class="card-img-top blur" src="{{asset("storage/file/statistics2.png")}}" alt="Number of created tickets">
            <div class="card-body blur">
            <h5 hidden class="card-title">Card title</h5>
            <p class="card-text h3">{{$lastTicket->id}}</p>
            <a href="/posts" class="btn btn-primary">Go to ticket list</a>
            </div>
        </div>
        <div class="card index" style="width: 18rem;">
            <img class="card-img-top blur" src="{{asset("storage/file/closedtickets.png")}}" alt="Number of closed tickets">
            <div class="card-body">
            <h5 hidden class="card-title">Card title</h5>
            <p class="card-text h3">{{$closedTickets}}</p>
            </div>
        </div>
        <div class="card index" style="width: 18rem;">
            <img class="card-img-top blur" style="margin-top: 4px;" src="{{asset("storage/file/opentickets.png")}}" alt="Number of open tickets">
            <div class="card-body">
            <h5 hidden class="card-title">Card title</h5>
            <p class="card-text h3">{{$openTickets}}</p>
            </div>
        </div>
        <div class="card index" style="width: 18rem;">
            <img class="card-img-top blur" src="{{asset("storage/file/progresstickets.png")}}" alt="Number of created tickets">
            <div class="card-body">
            <h5 hidden class="card-title">Card title</h5>
            <p class="card-text h3">{{$progressTickets}}</p>
            </div>
        </div>
        <div class="card index" style="width: 18rem;">
            <img class="card-img-top blur" src="{{asset("storage/file/reviewtickets.png")}}" alt="Number of created tickets">
            <div class="card-body">
            <h5 hidden class="card-title">Card title</h5>
            <p class="card-text h3">{{$reviewTickets}}</p>
            </div>
        </div>
        </div>
        @endif
    @else
        <h1>{{$title}}</h1>
        <p>This is a ticket system</p>
        <p>For creating a ticket press "create ticket"</p>
        <p><a class = "btn btn-primary" href="/login" role="button">Login</a> <a class="btn btn-success" href = "/register" role = "button">Register</a><p>
    @endif
@endsection