@extends('layouts.app')

@section('content')
    <br>
    <h1>Tickets</h1>
    
    <!--<div class="row row-cols-3 row-cols-md-4">-->
    
    @if(count($posts) > 0)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ticket List</div>
                        <div class="card-body">
                            <input class="form-control | w-25 p-3" id="myInput" type="text" placeholder="Search..">
                            <hr>
                            <table class="table table-striped table-info" id="UserList">
                                <thead style="background: rgba(20, 104, 110, 0.404); color: white">
                                  <tr>
                                    <th style="cursor: pointer;" scope="col" onClick="sortTable(0, 0)">id &nbsp&nbsp ▲▼</th>
                                    <th style="cursor: pointer;" scope="col" onClick="sortTable(1, 0)">Title &nbsp&nbsp ▲▼</th>
                                    <th style="cursor: pointer;" scope="col" onClick="sortTable(2, 0)">Author &nbsp&nbsp ▲▼</th>
                                    <th style="cursor: pointer;" scope="col" onClick="sortTable(3, 0)">Priority &nbsp&nbsp ▲▼</th>
                                    <th style="cursor: pointer;" scope="col" onClick="sortTable(4, 0)">Status &nbsp&nbsp ▲▼</th>
                                    <th style="cursor: pointer;" scope="col" onClick="sortTable(4, 0)">Created &nbsp&nbsp ▲▼</th>
                                  </tr>
                                </thead>
                                <tbody id="myTable">
        @foreach($posts as $post)
        <tr>
            <th>#{{$post->id}}</th>
            <th><a href="/posts/{{$post->id}}/edit" class = "btn btn-outline-secondary wid" style="width:200px">{{$post->title}}</a></th>
            <th>{{$post->user->name}}</th>
            <th>{{$post->priority}}</th>
            <th>{{$post->status}}</th>
            <th>{{$post->created_at}}</th>
            
            </th>
        </tr>
        <!--<div class="col mb-4">    
        <div class="card">   
            <div class="card-body card text-white card border-info mb-3" style="max-width: 18rem; height: 12rem;"> card-body card text-white bg-info mb-3
                <h5 class="card-title"><a href = "/posts/{{$post->id}}">Ticket #{{$post->id}}:</a></h5>
                <br>  
                <p class="card-text text-info h3">{{$post->title}}</p>
            </div>
            <div class="card-footer">
                <p class= "text-info">{{$post->status}}</p>
                <small class="text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        </div>
    </div>-->
        @endforeach
        {{$posts->links()}}
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
      //$("#UserList").tablesorter();
    });
</script>  
<script>
    function sortTable(columnId, descending) {
        $("#UserList").tablesorter({ sortList: [[columnId,descending]] });
    }
</script>
    @else
        <p>No posts found</p>
    @endif
</div>
@endsection