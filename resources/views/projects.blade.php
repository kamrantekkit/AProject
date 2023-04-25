@extends("layouts.app")

@section("title", "projects")

@section("content")
    <div class="d-flex text-white justify-content-center align-content-center m-4 ">
        <h1 class="text-white p-4 display-1 rounded border border-2 border-dark bg-black">
            <span class="text-primary w-100 ">Projects</span>
        </h1>
    </div>
    <div class="container-fluid row justify-content-center align-items-center">
        <ul class="list-group list-text col-9 col-auto border border-2 bg-white border-dark m-2">
            <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                <div class="col-4 col-auto p-2">
                    <h2><b>Title</b></h2>
                </div>
                <div class="col-6 col-auto border-start border-2 border-dark p-2">
                    <h2><b>Description</b></h2>
                </div>
                <div class="col-2 col-auto border-start border-2 border-dark p-2">
                    <h2><b>Due Date</b></h2>
                </div>
            </li>
            @if($projects != null)
                @foreach($projects as $project)
                    <a class="list-item" href="{{route("project.list.pid", ['pid' => $project->pid])}}">
                    <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 text-dark">
                        <div class="col-4 pt-2 border-2 border-dark border-top">
                            <p class="list-text">{{$project->title}}</p>
                        </div>
                        <div class="col-6 text-wrap col-auto border-start border-top border-2 border-dark p-2">
                            <p>{{Str::limit($project->description, 20, '...')}}</p>
                        </div>
                        <div class="col-2 border-start border-2 border-dark pt-2 border-top">
                            <p>{{$project->end_date}}</p>
                        </div>

                    </li>
                    </a>
                @endforeach
            @else
                <li class="row row-cols-auto justify-content-center align-content-center w-100 m-0 ">
                    <p class="list-text">There is currently no projects</p>
                </li>
            @endif
        </ul>
        <a href="{{ route("home") }}" class="text-white btn btn-primary btn-outline-dark m-3 w-25">home</a>
    </div>
@endsection
