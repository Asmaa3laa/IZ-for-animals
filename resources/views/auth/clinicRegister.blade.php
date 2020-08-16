{{-- @extends('layouts.app') --}}
@extends('layouts.nav-footer')
@section('content')    

<body style="background-color:rgb(59, 151, 207)">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="{{asset('images/bg_login.jpg')}}" style="width: 500px; height: 700px;"/>

              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                  </div>
                  {!! Form::open(['route' => 'register','files' => 'true','enctype'=>'multipart/form-data', 'method'=>'post']) !!}
                        @csrf
                      {{ Form::hidden('role','clinic') }}

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Your Name"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('user_name') is-invalid @enderror" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter User Name"  name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..."  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" required autocomplete="current-password">
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                      </div>

                    <div class="form-group">
                        <small for="image" class="col-md-5">{{ __('Upload your Profile Image') }}</small>

                        {!!Form::file('image', ['class'=>'required'])!!}
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="card" class="col-md-5 col-form-label text-md-left">{{ __('Card') }}</label> --}}
                        <small for="card" class="col-md-5">{{ __('upload your ID or Occupation card') }}</small>

                        {!!Form::file('card', ['class'=>'required'])!!}
                                @error('card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <hr>
                    <h5>Clinic Information <h5>
                        <div class="row">
                    <div class="form-group col-6">
                        <small for="country_id" class="col-md-5">{{ __('Country') }}</small>

                        {{-- <input id="country" type="text" class="form-control form-control-user @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country"> --}}
                        {!! Form::select('country_id',$countries, null, ['class'=>'form-control','id'=>'country', 'required']) !!}

                        @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <small for="state_id" class="col-md-5">{{ __('State') }}</small>

                        <select name="state_id" id="state" class="form-control">
                        </select>
                        @error('state_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    </div>
                    <div class="form-group">
                        <input id="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" placeholder="Enter Address Details" name="address" value="{{ old('address') }}" required autocomplete="address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="location" type="text" class="form-control form-control-user @error('location') is-invalid @enderror" placeholder="Enter Google Map Location" name="location" value="{{ old('location') }}" required autocomplete="location">
                        {{-- {!! Form::select('country_id', null, ['class'=>'form-control', 'required']) !!} --}}

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" placeholder="Enter Your Phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {!! Form::submit('Register',['class'=>'btn btn-info btn-user btn-block'])  !!}
                    {!! Form::close() !!}
                  <hr>
                  
                  <div class="text-center">Have an account?
                    <a class="btn btn-link" href="{{ route('login') }}"> Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>
<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/countryStates.js')}}"></script>

@endsection










