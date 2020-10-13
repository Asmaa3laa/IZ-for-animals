
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
              <div class="col-lg-5 d-none d-lg-block">
                <img src="{{asset('images/clinicRegister.jpg')}}" style="width: 440px; height: 700px;"/>
              {{-- <div id="mapid" style="width: 500px; height: 400px"></div> --}}
              </div>
              <div class="col-lg-7">
                <div class="p-5">
                        
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-4">WELCOME</h1>
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
                  <a class="btn btn-info btn-block text-white " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                    Clinic Information
                  </a>
                
                <div class="collapse {{$errors->all() ? 'show' : ''}}" id="collapseExample">
                    <div class="card card-body">
            
                          {{-- Clinic name----------------------}}
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('user_name') is-invalid @enderror" placeholder="Clinic Name"  name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
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
                          {!! Form::select('country_id',$countries, null , ['class'=>'form-control','id'=>'country', 'required', 'placeholder' => 'Select..']) !!}
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
                     {{--  Location Model ------------------ --}}
                     {{-- <div class="modal fade" id="current" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-notify modal-info" role="document"> --}}
                       <!--Content-->
                       {{-- <div class="modal-content text-center"> --}}
                         <!--Header-->
                         {{-- <div class="modal-header d-flex justify-content-center">
                           <h3 class="heading">Clinic Location</h3>
                         </div>
                    --}}
                         <!--Body-->
                         {{-- <div class="modal-body">
                          <h4>This location will be saved as clinic location..</h4>
                          <div class="row">
                            <i class="col-2 fa fa-map-marker prefix fa-3x animated rotateIn mb-4"></i> --}}
                            {{-- <a href="#" style='color: rgb(66, 66, 247)'>current location</a> --}}
                            {{-- <p id="demo"></p> --}}
                            {{-- <input class="col-9" type="text" id="lon" name="lon" hidden> --}}
                            
                          {{-- </div> --}}
                          {{-- <div id="mapid" style="height: 300px"></div> --}}
                          {{-- <div id="map_canvas"></div> --}}
                         {{-- </div> --}}
                         <!--Footer-->
                         {{-- <div class="modal-footer flex-center">
                           <a type="button" class="btn btn-info waves-effect" onclick="$('#current').modal('hide')">OK</a>
                         </div>
                       </div> --}}
                       <!--/.Content-->
                     {{-- </div>
                   </div> --}}

                   <div class="form-check">
                      <input class="col-9" type="text" id="location" name="location" hidden>
                      <input class="col-9" type="text" id="location_lat" name="location_lat" hidden>
                      <input class="col-9" type="text" id="location_lon" name="location_lon" hidden>
                      {{-- @if( $errors->has('location')->first())
                      @error('location') --}}
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->has('location') ? 'error get location' : '' }}</strong>
                          </span>
                        {{-- @enderror --}}
                      <label class="form-check-label">
                        <input type="radio" onclick="getLocation()" name="locationButton" required>
                          get Clinic Location
                          {{-- <strong class="invalid-feedback" role="alert" id="errLocation"> 
                          </strong> --}}                       
                        </label> 
                      
                    </div>
                    <div id="mapid" style="margin: 8px;"></div>
                    
                    {!! Form::submit('Register',['class'=>'btn btn-info btn-user btn-block'])  !!}
                    {!! Form::close() !!}
                    </div>
                  </div>
                </div>
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
</div>

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

  <script>
    function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition, errorHandler);

      } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      $('#location_lat').val(position.coords.latitude);
      $('#location_lon').val(position.coords.longitude);
      $('#location').val("http://maps.google.com/maps?z=12&t=m&q=loc:"+position.coords.latitude+"+"+position.coords.longitude);
      console.log($('#location_lat').val());
      $('#mapid').css('height','400px');
      $('#mapid').css('border','solid 1px gray');
      var map = L.map('mapid').setView({lon: position.coords.longitude, lat: position.coords.latitude}, 14);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
      }).addTo(map);

      // show the scale bar on the lower left corner
      L.control.scale().addTo(map);
      var marker =  L.marker([position.coords.latitude, position.coords.longitude]).addTo(map).bindPopup("<b>current Location</b>").openPopup();
      
      function onMapClick(e) {
        marker.setLatLng(e.latlng).update().bindPopup("<b>Clinic Location</b>").openPopup();
        console.log(e.latlng.lat);
        console.log(e.latlng.lng);
        $('#location_lat').val(e.latlng.lat);
        $('#location_lon').val(e.latlng.lng);
        $('#location').val("http://maps.google.com/maps?z=12&t=m&q=loc:"+e.latlng.lat+"+"+e.latlng.lng);
        console.log($('#location').val());
      }
      map.on('click', onMapClick);

    }     
// var errLocation = document.getElementById("errLocation");
    function errorHandler(error) {

      switch (error.code) {
          case error.PERMISSION_DENIED:
              x.innerText = "User Denied Geolocation Permission, please allow location on your browser";
              break;
          case error.POSITION_UNAVAILABLE:
              x.innerText = "POSITION_UNAVAILABLE";
              break;
          case error.TIMEOUT:
              x.innerText = "TIMEOUT";
              break;
          case error.UNKOWN_ERROR:
              x.innerText = "UNKOWN_ERROR";
              break;
          default:
      }

}
  </script>
@endsection










