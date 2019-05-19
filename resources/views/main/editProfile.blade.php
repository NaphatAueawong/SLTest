@extends('template')
@section('content')
    <style>
        body {
        background: #555;
        }
        .container {
        max-width: 400px;
        margin-top: 30px;
        background: white;
        padding: 20px;
        border-radius: 20px;
        }
    </style>

    @include('nav')
    <div class="container">
    <h1>Edit Profile</h1>
    <hr>
        <form action="/main/editProfile/{{$customerID}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{$customerProfile->firstname}}" required/>
            </div>
            <div class="form-group">
                <label>Lastname</label> 
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{$customerProfile->lastname}}" required/>
            </div>
            <div class="form-group">
                <label>Nickname</label> 
                <input type="text" name="nickname" id="nickname" class="form-control" value="{{$customerProfile->nickname}}" required/>
            </div>
            <div class="form-group">
                <label>Birthday</label> 
                <input type="Date" name="birthday" id="birthday" class="form-control" value="{{$customerProfile->birthday}}" required/>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div>
                @if($customerProfile->gender == "female")
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female" checked> Female
                @else
                    <input type="radio" name="gender" value="male" checked>Male
                    <input type="radio" name="gender" value="female">Female
                @endif
                </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-secondary">Edit Profile</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/main/homePage/{{$customerID}}'">Back</button>
            </div>
        </form>
    </div>
@endsection