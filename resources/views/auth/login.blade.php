
@extends('layouts.auth')
@section('content')
<div style="background-color:rgb(241, 247, 252)">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="images/bg_login.jpg" style="width: 500px; height: 700px;"/>

              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  @if(session('error'))
                    <div class="alert alert-danger">
                      {{Session::get('error')}}
                    </div>     
                  @endif
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf
                   
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Email Address..."  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                      
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                
                    <input type="submit" name="login" class="btn btn-info btn-user btn-block" value="Login">
                  
                  <hr>
                  <div class="text-center">

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                  </div>
                  <div class="text-center">
                    <a class="btn btn-link" href="{{ url('login-role') }}">Create an Account..</a>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
      
</div>
@endsection
{{-- @include('layouts.jsScripts') --}}
