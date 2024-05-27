@extends('layouts.main')
@push('head')
<title>Todo List</title>
@endpush



@section('main-section')
<div class='container'>
    <div class="h2 text-info">Login</div>
    <form method="POST" action="{{ route('todo.login') }}">
        @csrf <!-- CSRF token -->

        @if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <button class="btn btn-block btn-info" type="submit">Login</button>
        </div>
        
        <br>
        <a href="{{ route('todo.register') }}">New User? Register Here!</a>
    </form>
</div>
@endsection
