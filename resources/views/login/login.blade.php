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
        <h1>Login page</h1>
        @if ($message = Session::get('error'))
            <div>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div>
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="/login" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Password</label> 
                <input type="password" name="password" id="password" class="form-control"/>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-secondary">Login</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/register'">Register</button>
            </div>
        </form>    
    </div>
 
@endsection