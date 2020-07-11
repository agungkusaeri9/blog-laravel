@extends('auth.default')
@section('title', 'Register')
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 mx-auto col-lg-6">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Full Name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password_confirmation" placeholder="Repeat Password" name="password_confirmation">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection