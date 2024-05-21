@extends('layouts.main')
@push('head')
<title>Todo List</title>
@endpush
@section('main-section')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
        <div class="h2 text-info">Register </div>
        <hr>
        <form action="">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" value="">
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-info" type="submit">Register</button>

            </div>
            </form>
        </div>
    </div>
</div>



@endsection