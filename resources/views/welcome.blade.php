@extends('layouts.main')
@push('head')
<title>Todo List</title>
@endpush

@section('main-section')

<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="h2">All Todos
        </div>
        <a href="{{ route("todo.create") }}" class = "btn btn-primary btn-lg"> Add Todo</a>
    </div>
    <table class="table table-stripped table-dark">
        <tr>
            <th>Name</th>
            <th>Work</th>
            <th>Due Date</th>
           
            
        </tr>
        @foreach($todos as $todo)
        <tr valign="middle">
            <td>{{$todo->name}}</td>
            <td>{{$todo->work}}</td>
            <td>{{$todo->dueDate}}</td>
          
            
        </tr>
       

        @endforeach
       

    </table>
    <div>
        <a href=""{{route("todo.login")}}"" class="btn btn-danger btn-lg">Log Out</a>
        </div>

</div>
@endsection