@extends("layouts.app")

@section("title", "Home")

@section("content")
    <div class="d-flex text-white justify-content-center align-content-center m-4 ">
        <h1 class="text-white p-4 display-1 rounded border border-2 border-dark bg-black">
            <span class="text-primary w-100 ">AProject</span>
        </h1>
    </div>

    <div class="container-fluid">
        <div class="row row-cols-auto justify-content-around align-content-center">
                <div class="flex-column d-flex justify-content-center align-items-center w-75">
                    @if (auth()->check())
                        <h4 class="display-4 text-center text-wrap w-100 mb-5">
                            Welcome, {{ auth()->user()->name }}!
                        </h4>
                        <a href="{{ route("project.list") }}" class="text-white btn btn-primary btn-outline-dark m-3 w-25">View Projects</a>
                        <a href="{{route("dashboard")}}" class="text-white btn btn-primary btn-outline-dark m-3 w-25">Dashboard</a>
                        <a class="text-white btn btn-primary btn-outline-dark m-3 w-25" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <h4 class="display-4 text-center text-secondary text-wrap w-100">
                            Welcome
                        </h4>
                        <a href="{{ route("project.list") }}" class="text-white btn btn-primary btn-outline-dark m-3 w-25">View Projects</a>
                        <h5 class="display-5 text-center text-secondary text-wrap w-100">
                            Login/SignUp
                        </h5>
                        <a href="{{route("login")}}" class="text-white btn btn-primary btn-outline-dark m-3 w-25">Login</a>
                        <a href="{{route("register")}}" class="text-white btn btn-primary btn-outline-dark m-3 w-25">Register</a>
                @endif
            </div>
        </div>
    </div>
@endsection
