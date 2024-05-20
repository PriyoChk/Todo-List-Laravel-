@extends('layouts.main')
@push('head')
<title>Todo List</title>
@endpush

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@section('main-section')

<div class='container'>
<form method="POST" action="{{ route('todo.login') }}">
    @csrf <!-- CSRF token -->
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

@endsection