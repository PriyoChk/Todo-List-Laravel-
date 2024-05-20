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
            <th>Action</th>
            <th>Condition</th>
            
        </tr>
        @foreach($todos as $todo)
        <tr valign="middle">
            <td>{{$todo->name}}</td>
            <td>{{$todo->work}}</td>
            <td>{{$todo->dueDate}}</td>
          
            <td >
            
            @if(!$todo->isComplete())
                <a href="{{route("todo.edit",$todo->id)}}" class="btn btn-success btn-sm">Update</a>
            @endif
            
            @if($todo->isComplete())   
            <a href="{{route("todo.delete",$todo->id)}}" class="btn btn-danger btn-sm" >Delete</a>
            @endif
            </td>
           
            <td>
                @if($todo->isComplete() )

                <span class="badge bg-success">Completed</span>

                @endif
            <form action="/welcome/{{$todo->id}}" method="GET">
                
                @csrf 
                @if(!$todo-> isComplete())
                <button class="btn btn-secondary btn-sm" input="submit">Complete</button>
                @endif
                </form>
            </td>

        </tr>
       
        @endforeach
       

    </table>
    <div>
        <a href=""{{route("todo.login")}}"" class="btn btn-danger btn-lg">Log Out</a>
        </div>

</div>
@endsection