@extends('template')
@section('content')
    <style>
        body {
        background: #555;
        }

        .container {
        max-width: 400px;
        margin-top: 150px;
        background: white;
        padding: 20px;
        border-radius: 20px;
        }
    </style>

    <div class="container">
        <h1>Register Page</h1>
        @if ($message = Session::get('error'))
            <div>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form action="/register" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Username : </label>
                <input type="text" name="username" id="username" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Password : </label> 
                <input type="password" name="password" id="password" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Type : </label> 
                <input type="radio" name="customerType" value="student" checked> Student
                <input type="radio" name="customerType" value="instructor"> Instructor
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-secondary">Register</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Back</button>
            </div>
        </form>
    </div>
@endsection