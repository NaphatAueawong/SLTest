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

    @include('nav')
    <div class="container">
        <h1>Profile</h1>
        <hr>
        @if(isset($customerProfile))
            <p>Firstname : {{$customerProfile->firstname}}</p>
            <p>Lastname : {{$customerProfile->lastname}}</p>
            <p>Nickname : {{$customerProfile->nickname}}</p>
            <p>Birthday : {{$customerProfile->birthday}}</p>
            <p>Gender : {{$customerProfile->gender}}</p>
        @else
            <p>You login first time, Please Edit Your Profile.</p>
        @endif
    </div>
@endsection