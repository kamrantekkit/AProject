@extends("layouts.app")

@section("title", "Dashboard")

@section("content")
    <div class="d-flex text-white justify-content-center align-content-center m-4 ">
        <h1 class="text-white p-4 display-1 rounded border border-2 border-dark bg-black">
            <span class="text-primary w-100 ">DashBoard</span>
        </h1>
    </div>


    <div class="container-fluid row d-flex justify-content-center align-content-center">
        <div class="col col-2 col-auto h-100">
            <div class="d-flex flex-column justify-content-center align-items-center w-100">
                <a href="{{ route("home") }}" class="text-white btn btn-primary btn-outline-dark m-3 w-75 p-2">Back</a>
                <a href="{{ route("project.editor.new") }}"
                   class="text-white btn btn-primary btn-outline-dark m-3 w-75 p-2">Add New Project</a>
                <a class="text-white btn btn-primary btn-outline-dark m-3 w-75 p-2" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LogOut</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="col col-8 col-auto h-100">
            <div class="container-fluid d-flex flex-column h-100 w-100 justify-content-center align-items-center p-0">
                <h2 class="display-2 text-center text-secondary text-wrap w-75">
                    Projects
                </h2>
                <div
                    class="h-50 w-50 mt-2 bg-white border border-4 border-dark rounded-2 justify-content-center align-items-center ">
                    <ul class="list-group list-text p-0 justify-content-center align-content-center">
                        <li class="row justify-content-center align-content-center w-100 m-0">
                            <div class="col-4 pt-2">
                                <h2><b>Title</b></h2>
                            </div>
                            <div class="col-4 border-start border-2 border-dark pt-2">
                                <h2><b>Due Date</b></h2>
                            </div>
                            <div class="col-4 border-start border-2 border-dark pt-2">
                                <h2><b>Edit</b></h2>
                            </div>
                        </li>
                        @foreach($userProjects as $project)
                            <li class="row justify-content-center align-content-center border-top border-dark border-2 w-100 list-text m-0">
                                <div class="col-4 pt-2">
                                    <p class="list-text">{{$project["title"]}}</p>
                                </div>
                                <div class="col-4 border-start border-2 border-dark pt-2 ">
                                    <p>{{$project["end_date"]}}</p>
                                </div>
                                <div class="col-4 border-start border-2 border-dark pt-2">
                                    <a href="{{route("project.editor.existing", ['pid' => $project->pid])}}" class="text-white btn btn-primary btn-outline-dark w-50">Edit</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
