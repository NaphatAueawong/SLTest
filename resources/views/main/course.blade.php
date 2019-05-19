@extends('template')
@section('content')
    <style>
        body {
        background: #555;
        }
        .container {
        max-width: 800px;
        margin-top: 20px;
        background: white;
        padding: 20px;
        border-radius: 20px;
        }
    </style>

    @include('nav')
    <div class="container">
        <h1>Course Page</h1>
        @if(Auth::user()->type == "instructor")
            <button type="button" class="btn btn-secondary" onclick="window.location.href='/main/createCourse/{{Auth::user()->id}}'">Create Course</button>
            <button type="button" class="btn btn-secondary" onclick="showSearchForm()">Search Your Existed Course</button>
        @else
            <button type="button" class="btn btn-secondary" onclick="showSearchForm()">Search Course</button>
        @endif  
        <div id="searchForm" style="display:none">
            <form action="/main/search/{{$customerID}}/{{Auth::user()->type}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div>
                        <label>Course Name</label>
                        <input type="text" id='name' name='name' class="form-control" required/>
                    </div>
                    <div>
                        <label>Start Time</label>
                        <input type="date" id='startTime' name='startTime' class="form-control" required/>
                    </div>
                    <div>
                        <label>End Time</label>
                        <input type="date" id='endTime' name='endTime' class="form-control" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" class="form-control btn btn-secondary">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Subject</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->category }} </td>
                    <td>{{ $course->subject }} </td>            
                    <td>{{ $course->startTime }} </td>            
                    <td>{{ $course->endTime }}</td>        
                </tr>            
                @endforeach
            </tbody>
        </table>
        <hr>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='/main/homePage/{{$customerID}}'">Back</button>
    </div>

    <script>
        function showSearchForm() {
            var searchForm = document.getElementById("searchForm");
            if (searchForm.style.display == "none") {
                searchForm.style.display = "block";
            } else {
                searchForm.style.display = "none";
            }
        }
    </script>   
@endsection