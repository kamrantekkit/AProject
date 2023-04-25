@extends("layouts.app")

@section("title", "projects")

@section("content")
    <div class="d-flex text-white justify-content-center align-content-center m-4 ">
        <h1 class="text-white p-4 display-1 rounded border border-2 border-dark bg-black">
            <span class="text-primary w-100 ">Projects</span>
        </h1>
    </div>


    <div class="container-fluid  flex-column row justify-content-center align-items-center">
        <ul class="list-group list-text col-6 col-auto border border-2 bg-white border-dark m-2">
            <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                <div class="col-3 col-auto p-3 border-2 border-dark border-top">
                    <h2><b>Title:</b></h2>
                </div>
                <div class="col-9 p-2 border-2 border-dark border-top" >
                    <p class="list-text">{{$project->title}}</p>
                </div>
            </li>
            <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                <div class="col-3 col-auto p-3 border-2 border-dark border-top">
                    <h2><b>Description:</b></h2>
                </div>
                <div class="col-9 p-2 border-2 border-dark border-top text-wrap" >
                    <p class="list-text">{{$project->description}}</p>
                </div>
            </li>
            <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                <div class="col-3 col-auto p-3 border-2 border-dark border-top">
                    <h2><b>Start date:</b></h2>
                </div>
                <div class="col-9 p-2 border-2 border-dark border-top" >
                    <p class="list-text">{{$project->start_date}}</p>
                </div>
            </li>
            <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                <div class="col-3 col-auto p-3 border-2 border-dark border-top">
                    <h2><b>End Date:</b></h2>
                </div>
                <div class="col-9 p-2 border-2 border-dark border-top" >
                    <p class="list-text">{{$project->end_date}}</p>
                </div>
            </li>
            <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                <div class="col-3 col-auto p-3 border-2 border-dark border-top">
                    <h2><b>Phase:</b></h2>
                </div>
                <div class="col-9 p-2 border-2 border-dark border-top" >
                    <p class="list-text">{{$project->phase}}</p>
                </div>
            </li>
            <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                <div class="col-3 col-auto p-3 border-2 border-dark border-top">
                    <h2><b>Create by:</b></h2>
                </div>
                <div class="col-9 p-2 border-2 border-dark border-top" >
                    <p class="list-text">{{$user->name}}</p>
                </div>
            </li>
        </ul>
        <a href="{{ route("project.list") }}" class="text-white btn btn-primary btn-outline-dark m-3 w-25">back</a>
    <div>

@endsection
