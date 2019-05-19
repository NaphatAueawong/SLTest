<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" >Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/main/course/{{Auth::user()->id}}">Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/main/editProfile/{{Auth::user()->id}}">Edit Profile</a>
            </li>
            <li class="nav-item">
            
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class="navbar-brand text-primary">{{Auth::user()->username}}</a>
            <a class="nav-link" href="/logout">Logout</a>
        </form>
    </div>
</nav>
