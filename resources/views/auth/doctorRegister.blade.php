
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
                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                  </div>
                  {!! Form::open(['route' => 'register','files' => 'true','enctype'=>'multipart/form-data', 'method'=>'post']) !!}
                        @csrf
                      {{ Form::hidden('role','doctor') }}
                    {{-- name ----------------------}}
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"  placeholder="Enter Your Full Name"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                    </div>
                    {{-- user name ----------------------}}
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('user_name') is-invalid @enderror" placeholder="Enter UserName"  name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                          @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                    </div>
                    {{-- Email----------------------}}

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Enter Email Address..."  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    {{-- Password ----------------------}}

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      {{-- Confirm Password----------------------}}

                      <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                          @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    {{-- Profile image ----------------------}}

                    
                  <div class="row">
                    <div class="form-group col-11">
                      <div class="custom-file">
                        <input  type="file" class="custom-file-input form-control-user @error('image') is-invalid @enderror" placeholder="Profile Image.."  name="image" required autofocus>
                        <label id='image' class="custom-file-label" for="image">Upload Profile Image</label>
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-1">
                      <span class="text-justify"> <i  class="fa fa-info-circle cardinfo" data-toggle="popover" title="Profile Image" data-content="Upload an image for your profile or for the clinic"></i></span>
                    </div> 
                  </div>
                  {{-- Card image ----------------------}}
                  <div class="row">
                    <div class="form-group col-11">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input form-control-user @error('card') is-invalid @enderror" placeholder="Your ID or Occupation card.." name="card" required autofocus>
                        <label class="custom-file-label" for="card">Upload Your ID image</label>
                        @error('card')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-1">
                      <span class="text-justify"> <i class="fa fa-info-circle cardinfo" data-toggle="popover" title="Card Image" data-content="Upload an image for your National ID card or Doctors Syndicate card"></i></span>
                    </div>
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
      
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>

<script>
 $(function () {
    $('.cardinfo').popover({
      container: 'body'
    })
  })

  $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $(e.target).next().text(fileName);
        });
    });

</script>
@endsection
