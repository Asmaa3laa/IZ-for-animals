@extends('layouts.app')
{{-- @extends('layouts.nav-footer') --}}
@section('appcontent')    

<body style="background-color:rgb(241, 247, 252)">
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

                  {{-- name ----------------------}}
                  <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"  placeholder="Enter Your Full Name"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
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
                        <input type="file" class="custom-file-input form-control-user @error('image') is-invalid @enderror" placeholder="Profile Image.."  name="image" required autofocus>
                        <label class="custom-file-label" for="image">Upload Profile Image</label>
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
                  <hr> 
                  {{-- Clinic Information -------------------------------------------------- --}}
                  <a class="btn btn-info btn-block text-white " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Clinic Information
                  </a>
                
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
            
                          {{-- Clinic name----------------------}}
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('user_name') is-invalid @enderror" id="exampleInputName" aria-describedby="emailHelp" placeholder="Clinic Name"  name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                        @error('user_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                        {{-- Clinic phone ----------------------}}
                      <div class="form-group">
                        <input id="phone" type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" placeholder="Clinic Phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                        {{-- Clinic country ----------------------}}
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
                        {{-- Clinic state ----------------------}}
                    
                        <div class="form-group col-6">
                          <small for="state_id" class="col-md-5">{{ __('State') }}</small>
                          <select name="state_id" id="state" class="form-control" required>
                          </select>
                          @error('state_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                        {{-- Clinic address ----------------------}}

                      <div class="form-group">
                        <input id="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" placeholder="Clinic Address Details" name="address" value="{{ old('address') }}" required autocomplete="address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                     {{-- Current Location Model ------------------ --}}
                     <div class="modal fade" id="current" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-notify modal-info" role="document">
                       <!--Content-->
                       <div class="modal-content text-center">
                         <!--Header-->
                         <div class="modal-header d-flex justify-content-center">
                           <h3 class="heading">Clinic Location</h3>
                         </div>
                   
                         <!--Body-->
                         <div class="modal-body">
                          <h4>This is your current location, it will be saved as clinic location..</h4>
                          <div class="row">
                           <i class="col-2 fa fa-map-marker prefix fa-3x animated rotateIn mb-4"></i>
                           <a href="#" style='color: rgb(66, 66, 247)'>current location</a>
                          <input class="col-9" type="text"  name="location" value="current location" disabled hidden>
                         </div>
                         </div>
                         <!--Footer-->
                         <div class="modal-footer flex-center">
                           <a href="https://mdbootstrap.com/pricing/jquery/pro/" class="btn btn-info">Ok</a>
                           <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
                         </div>
                       </div>
                       <!--/.Content-->
                     </div>
                   </div>

                   {{-- Custom Location Model ------------------ --}}
                   <div class="modal fade" id="custom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
                   <div class="modal-dialog modal-notify modal-info" role="document">
                     <!--Content-->
                     <div class="modal-content text-center">
                       <!--Header-->
                       <div class="modal-header d-flex justify-content-center">
                         <h3 class="heading">Clinic Location</h3>
                       </div>
                 
                       <!--Body-->
                       <div class="modal-body">
                          <h4>Enter the city or the region of your clinic location..</h4>
                          <div class="row">
                          <i class="col-2 fa fa-map-marker prefix fa-3x animated rotateIn mb-4"></i>
                          <div class="form-group col-9">
                            <input id="location" type="text" class="form-control form-control-user @error('location') is-invalid @enderror" placeholder="City or Region .." name="location" value="{{ old('location') }}" required autocomplete="location">
                            {{-- {!! Form::select('country_id', null, ['class'=>'form-control', 'required']) !!} --}}
                            @error('location')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          </div>                    
                       </div>
                 
                       <!--Footer-->
                       <div class="modal-footer flex-center">
                         <a href="https://mdbootstrap.com/pricing/jquery/pro/" class="btn btn-info">Ok</a>
                         <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
                       </div>
                     </div>
                     <!--/.Content-->
                   </div>
                 </div>
                   {{-- <div class="row"> --}}
                   <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optradio" data-toggle="modal" data-target="#current">
                        Current Location 
                    </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" data-toggle="modal" data-target="#custom">
                          Custom Location
                      </label>
                    </div>
                   {{-- </div> --}}
                    
                    {!! Form::submit('Register',['class'=>'btn btn-info btn-user btn-block'])  !!}
                    {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                <hr>
                <div class="text-center">You have an account?
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










