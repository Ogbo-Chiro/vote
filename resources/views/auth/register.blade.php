@extends('layouts.app')

@section('content')
<div class="container">
    <div class="image">
        <img class="img-responsive" src="{{ asset('ala.png') }}">
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" oninput="myFunction()">
                                <small id="error" style="color:#8E4A49"></small>
                                <small id="accepted" style="color:#4CAA78"></small>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button type="submit" id="button" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                  <script>
                                function myFunction() {
                                    var email  = document.getElementById("email").value;
                                    var btn = document.getElementById("button");

                                    if(email.includes("@alastudents.org") == false){
                                            document.getElementById("error").innerHTML = "Use your ALA email address";
                                            document.getElementById("accepted").innerHTML = "";
                                        btn.disabled = true;

                                        }
                                    else if(email.includes("@alastudents.org") == true){
                                        document.getElementById("error").innerHTML = "";
                                        document.getElementById("accepted").innerHTML = "Accepted";
                                        btn.disabled = false;

                                    }

                                }
                            </script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
