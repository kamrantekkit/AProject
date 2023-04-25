@extends("layouts.app")

@section("title", "Editor")

@section("content")
    <div class="d-flex flex-column align-items-center justify-content-center h-100">
        <h1 class="display-1 text-primary">Editor</h1>
        <div class="border border-4 border-dark rounded-5 bg-white w-50 h-75 ">
            <form class="container-fluid d-flex flex-column h-100 w-100 justify-content-center align-items-center"
                  method="POST" action="{{isset($project) ? route('project.editor.update', ['pid' => $project->pid]) : route('project.editor.new') }}">
                @csrf

                <div class="row w-100 m-2">
                    <div class="col">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ isset($project) ? $project->title : old('title') }}" required>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="phase">Phase</label>
                        <select id="phase" class="form-control" name="phase">
                            @if(isset($project))
                                <option @if($project->phase == "design") selected @endif>design</option>
                                <option @if($project->phase == "development") selected @endif>development</option>
                                <option @if($project->phase == "testing") selected @endif>testing</option>
                                <option @if($project->phase == "deployment") selected @endif>deployment</option>
                                <option @if($project->phase == "complete") selected @endif>complete</option>
                            @else
                                <option selected >design</option>
                                <option>development</option>
                                <option>testing</option>
                                <option>deployment</option>
                                <option>complete</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="row w-100 m-2">
                    <div class="col">
                        <label for="start_date">StartDate</label>
                        <input id="start_date" type="date"
                               class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ isset($project) ? $project->start_date : old('start_date') }}" required>

                        @error('start_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="end_date">EndDate</label>
                        <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror"
                               name="end_date" value="{{ isset($project) ? $project->end_date : old('end_date') }}" required>

                        @error('end_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row w-100 m-3">
                    <label for="description">Description</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                              name="description" required rows="4">{{ isset($project) ? $project->description : old('description') }}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="row w-50 m-2">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                <div class="row w-50 m-2">
                    <a href="{{ route("dashboard") }}" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
