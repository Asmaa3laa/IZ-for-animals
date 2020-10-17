
@if($errors->any())
  <div class="alert alert-danger">
    <h3>please correct your errors</h3> 
  </div>
@endif 
<div class="container profile">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Update Your Data</h3>
          <span>
          <a class="btn btn-link" style="float: right" href="{{route('password.request')}}"><i class="fa fa-gear"></i>Reset Password</a>
          </span>
        </div>
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf 
        <div class="card-body">
            <div class="form-group row">
                <label for="name"  class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                <input type="text" name='name' class="form-control @error('name') is-invalid @enderror"  placeholder="Full Name" value="{{$user->name}}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3"  class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" name='email' class="form-control" placeholder="Email" value="{{$user->email}}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror    
                </div>  
              </div>
            @if ($user->role == 'doctor')
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                <input type="text" name='user_name' class="form-control" placeholder="UserName" value="{{$user->user_name}}" required>
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>   
            @endif
            
            @if ($user->role == 'clinic')
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">Clinic Name</label>
                <div class="col-sm-10">
                <input type="text" name='user_name' class="form-control" placeholder="Clinic Name" value="{{$user->user_name}}" 0>
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>   
            <div class="form-group row">
                <label for="user_name"  class="col-sm-2 col-form-label">Clinic Phone</label>
                <div class="col-sm-10">
                <input type="text" name='phone' class="form-control" placeholder="Your Phone" value="{{$user->phone}}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            </div>
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-10">
                {!! Form::select('country_id',$countries, $user->country_id , ['class'=>'form-control','id'=>'country', 'required']) !!}
                @error('country_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                    <select name="state_id" id="state" class="form-control" required>
                        @foreach ($states as $item)
                            @if ($item->id == $user->state_id)
                                <option selected value="{{$item->id}}">{{$item->name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                @error('state_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" name='address' class="form-control" placeholder="Clinic Address" value="{{$user->address}}" required>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            @endif
             <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control-user @error('image') is-invalid @enderror" placeholder="Profile Image.."  name="image" value="{{($user->image)}}" autofocus>
                    <label class="custom-file-label" for="image">Update Profile Image?</label>
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            </div> 
            <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control-user @error('card') is-invalid @enderror" placeholder="Your ID or Occupation card.." name="card" value="{{($user->card)}}" autofocus>
                    <label class="custom-file-label" for="card">Update Your card?</label>
                    @error('card')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
            </div> 
            @if ($user->role == 'clinic')
            <div class="form-check">
            <input class="col-9" type="text" id="location" name="location" hidden value="{{$user->location}}">
                <input class="col-9" type="text" id="location_lat" name="location_lat" hidden value="{{$user->location_lat}}">
                <input class="col-9" type="text" id="location_lon" name="location_lon" hidden value="{{$user->location_lon}}">
                {{-- @if( $errors->has('location')->first())
                @error('location') --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->has('location') ? 'error get location' : '' }}</strong>
                    </span>
                  {{-- @enderror --}}
                <label class="form-check-label">
                  <input type="radio" onclick="getLocation()" name="locationButton">
                    Update Clinic Location?
                    {{-- <strong class="invalid-feedback" role="alert" id="errLocation"> 
                    </strong> --}}                       
                  </label> 
                
              </div>
              <div id="mapid" style="margin: 8px;"></div>
              @endif
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="text-align: center">
          <button type="submit" class="btn btn-block btn-info">Update</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/countryStates.js')}}"></script>
<script>
    $(document).ready(function(){
          $('input[type="file"]').change(function(e){
              var fileName = e.target.files[0].name;
              $(e.target).next().text(fileName);
          });
      });
</script>
<script>
    $('#location_lat').val();
    $('#location_lon').val();
    function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition, errorHandler);

      } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
    //   $('#location_lat').val(position.coords.latitude);
    //   $('#location_lon').val(position.coords.longitude);
    //   $('#location').val("http://maps.google.com/maps?z=12&t=m&q=loc:"+position.coords.latitude+"+"+position.coords.longitude);
      console.log($('#location_lat').val());
      $('#mapid').css('height','400px');
      $('#mapid').css('border','solid 1px gray');
      var map = L.map('mapid').setView({lon: $('#location_lat').val(), lat: $('#location_lon').val()}, 14);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
      }).addTo(map);

      // show the scale bar on the lower left corner
      L.control.scale().addTo(map);
      var marker =  L.marker([$('#location_lat').val(), $('#location_lon').val()]).addTo(map).bindPopup("<b>Current Clinic Location</b>").openPopup();
      
      function onMapClick(e) {
        marker.setLatLng(e.latlng).update().bindPopup("<b>New Clinic Location</b>").openPopup();
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
