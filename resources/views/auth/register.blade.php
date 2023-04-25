@extends("layouts.app")

@section("title", "register")

@section("content")
    <div class="d-flex flex-column align-items-center justify-content-center h-100">
        <h1 class="display-1 text-primary">Sign Up</h1>
        <div class="border border-4 border-dark rounded-5 bg-white w-25 h-50 ">
            <form class="container-fluid d-flex flex-column h-100 w-100 justify-content-center align-items-center"
                  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row w-75 m-2">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old("name")}}" required
                           autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror
                </div>

                <div class="row w-75 m-2">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old("email")}}" required>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="row w-75 m-2">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="row w-75 m-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>

                <div class="row w-50 m-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
