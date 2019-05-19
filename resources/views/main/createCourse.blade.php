@extends('template')
@section('content')
    <style>
        body {
        background: #555;
        }
        .container {
        max-width: 400px;
        margin-top: 20px;
        background: white;
        padding: 20px;
        border-radius: 20px;
        }
    </style>

    @include('nav')
    <div class="container">
        <h1>Course Form</h1>
        <hr>
        <form action="/main/createCourse/{{$instructorID}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Course Name</label>
                <input type="text" id='name' name='name' class="form-control" required/>
            </div>
            <div class="form-group">  
                <label>Description</label>
                <input type="text" id='description' name='description' class="form-control" required/>
            </div>
            <div class="form-group">  
                <label>Category</label>
                <input type="text" id='category' name='category' class="form-control" required/>
            </div>
            <div class="form-group">  
                <label>Subject</label>
                <input type="text" id='subject' name='subject' class="form-control" required/>
            </div>
            <div class="form-group">  
                <label>Start Time</label>
                <input type="date" id='startTime' name='startTime' class="form-control" required/>
            </div>
            <div class="form-group">  
                <label>End Time</label>
                <input type="date" id='endTime' name='endTime' class="form-control" required/>
            </div>
            <div class="form-group">  
                <label>Number of Student</label>
                <input type="number" min='0' id='numberOfStudent' name='numberOfStudent' class="form-control" required/>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-secondary">Create</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/main/course/{{$instructorID}}'">Back</button>
            </div>
        </form>
    </div>

@endsection