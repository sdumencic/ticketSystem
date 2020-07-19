@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List</div>
                    <div class="card-body">
                        <input class="form-control | w-25 p-3" id="myInput" type="text" placeholder="Search..">
                        <hr>
                        <table class="table table-striped" id="UserList">
                            <thead style="background: grey; color: white">
                              <tr>
                                <th style="cursor: pointer;" scope="col" onClick="sortTable(0, 0)">Name &nbsp&nbsp ▲▼</th>
                                <th style="cursor: pointer;" scope="col" onClick="sortTable(1, 0)">Email &nbsp&nbsp ▲▼</th>
                                <th style="cursor: pointer;" scope="col" onClick="sortTable(2, 0)">Role &nbsp&nbsp ▲▼</th>
                                <th colspan="2" style="cursor: pointer; text-align:center;" scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach($users as $user)
                                <tr>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->email}}</th>
                                    <th>{{implode($user->roles()->get()->pluck('name')->toArray())}}</th>
                                    <th> <a href="{{route('admin.users.edit', $user->id)}}" class = "float-right">
                                                <button type="button" class = "btn btn-outline-secondary">Edit</button>                                         
                                    </th>
                                    <th><form action = "{{route('admin.users.destroy', $user->id)}}" method = "POST" class = "float-right">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type = "submit" class = "btn btn-outline-danger">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                                @endforeach                              
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
            </div>
        </div>
    </div>
</div>
@endsection
