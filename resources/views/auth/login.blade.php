@extends('auth.default')
@section('title', 'Login')
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 mx-auto col-lg-6">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Page Login!</h1>
                </div>
                <form class="user" method="post" action="{{ route('login') }}">
                    @csrf
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
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection