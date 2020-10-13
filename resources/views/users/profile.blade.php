@extends('layouts.index')
@section('content')

<section class="container">
  @if(session('update'))
    <div class="alert alert-success disapled" role="alert">
      <p>{{Session::get('update')}} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </div>     
  @endif
  @if(session('failed'))
    <div class="alert alert-danger disapled" role="alert">
      <p>{{Session::get('failed')}} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </div>     
  @endif

  @if($errors->any())
  <div class="alert alert-danger">
    <h3>please correct your errors</h3> 
  </div>
@endif 
<div class="w3-bar w3-black mt-5">
  <button class="w3-bar-item w3-button" onclick="profile('user_information')">Your Information</button>
  <button class="w3-bar-item w3-button" onclick="profile('update_profile')">Edit Your Profile</button>
  <button class="w3-bar-item w3-button" onclick="profile('create_blog')">Create A Blog</button>
</div>

<div class="w3-container profile" id="user_information">
  
    <div class="card-body box-profile">
      <div class="text-center">
        @if(Auth::user()->image)
        <img class="vcard bio img-fluid rounded-circle" style="width: 200px;height: 200px"
          src="{{asset('storage/'.$user->image)}}"
          alt="profile picture">
          @else
          <img  class="vcard bio img-fluid rounded-circle" style="width: 200px;height: 200px"
           src="/images/doctor avatar.jpg" alt="profile picture"> 
          @endif
      </div>

      <h3 class="profile-username text-center">{{$user->user_name}}</h3>

      <p class="text-muted text-center">{{$user->role}}</p>
      <div class="dropdown" style="text-align: right">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-gear "></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('profile.edit',$user->id)}}">Update Profile</a>
        <a class="dropdown-item" href="{{route('password.request')}}">Reset Password</a>
          {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
        </div>
      </div>
      <div class="row">
      <div class="{{$user->role == 'clinic' ? 'col-6' : 'offset-2 col-8'}} card card-info">
        <div class="card-body ">
          <b> <i class="fa fa-user mr-1"></i>DR. Name</b>
            <h6>{{$user->name}}</h6>
            <hr>
          <b><i class="fa fa-envelope mr-1"></i>Email</b>
          <h6>{{$user->email}}</h6>
          <hr>
          @if(Auth::user()->card)
          <b><i class="fa fa-credit-card mr-1"></i> Card</b> 
          <div class="ftco-animate">
            <div class="work mb-4 img align-items-end" style="background-image: url({{asset('storage/'.$user->card)}});">
              <a href="{{asset('storage/'.$user->card)}}" class="icon image-popup d-flex justify-content-center align-items-center">
                <span class="fa fa-expand"></span>
              </a>
              <div class="desc w-100 px-4">
                <div class="text w-100 mb-3">
                  <span>Doctor</span>
                  <h2>ID Card</h2>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>  
      </div>

  @if ($user->role == 'clinic')
    
  <div class="col-6 card card-info">
    <div class="card-body">
      <b><i class="fa fa-address-card mr-1"></i> Address</b>
      <h6>
          {{$user->country->name}}- {{$user->state->name}}- {{$user->address}}
      </h6>
      <hr>
      <b><i class="fa fa-map-marker mr-1"></i> Location</b>
      <h6>
        <a class="btn btn-link" href="{{$user->location}}">show map</a>
      </h6>
      <hr>
      <b><i class="fa fa-phone mr-1"></i> Phone</b>
      <h6>{{$user->phone}}</h6>
        @endif
    </div>
  </div>
</div>

<div class="w3-container profile" id="update_profile" style="display:none;">
<div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Update Your Data</h3>
        </div>
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf 
        <div class="card-body">
            <div class="form-group row">
                <label for="name"  class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                <input type="text" name='name' class="form-control @error('name') is-invalid @enderror"  placeholder="Full Name" value="{{$user->name}}">
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
                <input type="email" name='email' class="form-control" placeholder="Email" value="{{$user->email}}">
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
                <input type="text" name='user_name' class="form-control" placeholder="UserName" value="{{$user->user_name}}">
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
                <input type="text" name='user_name' class="form-control" placeholder="Clinic Name" value="{{$user->user_name}}">
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
                <input type="text" name='phone' class="form-control" placeholder="Your Phone" value="{{$user->phone}}">
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
                    <select name="state_id" id="state" class="form-control">
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
                <input type="text" name='address' class="form-control" placeholder="Clinic Address" value="{{$user->address}}">
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
                    <label class="custom-file-label" for="image">Change Profile Image</label>
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
                    <label class="custom-file-label" for="card">Change Your ID image</label>
                    @error('card')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
            </div> 
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="text-align: center">
          <button type="submit" class="btn btn-block btn-info">Update</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
<div>
<div class="container mt-5 profile" id="create_blog" style="display:none;" >
<form  class="checkout-form " enctype="multipart/form-data" method="POST" action="{{route('blog.store')}}">
    <div class="form-group">
        {{ csrf_field() }}
        <label for="title">Blog Title</label>
        <input type="text" id ='title' name="title" class="form-control" placeholder="Title" aria-label="title" autofocus aria-describedby="basic-addon1">      </div>
        @if ($errors->first('title'))
           <h6 style="color: red;">{{$errors->first('title')}}</h6>
        @endif
        <div class="form-group">
        <label for="content">Blog</label> 
        <textarea class="form-control" name="content" id="content" rows="30" placeholder="Content..."autofocus ></textarea>
        @if ($errors->first('content'))
          <h6 style="color: red;">{{$errors->first('content')}}</h6>
        @endif
      </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedImage" name="image" required>
        <label class="custom-file-label" id="image"for="validatedCustomFile" autofocus>Choose blog image...</label>
    </div>
    @if ($errors->first('image'))
        <h6 style="color: red;"> invalid image, only jpg,png and jpeg are allowed </h6>
    @endif
    <!-- tags -->
    <div class="form-row align-items-center">
      <label for="cars">Choose blog's tags</label>
      <select id="tags" name="tags[]" class="form-control mb-2 js-example-basic-single {{ $errors->first('tag') ? 'is-invalid':''}}" autofocus multiple>
        <option value="" disabled selected>Tags</option>
        @foreach ($tags as $tag) 
          <option value="{{ $tag ->id}}" {{ old('tag') && $tag->id == old('tag') ? 'selected':'' }} >{{ $tag ->name}}</option>
        @endforeach
      </select>
    </div>
    @if($errors->first('tags'))
    <h6 style="color: red;">{{$errors->first('tags') }}</h6>
    @endif
    <button class="site-btn btn-success submit-order-btn">ADD</button>

</form>
</div>
</section>
<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/countryStates.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            console.log(e.target.files);
            $("#image").text(fileName);
        });
    });
</script>
<script>
function profile(action) {
  let i;
  let x = document.getElementsByClassName("profile");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(action).style.display = "block";
}
</script>
<script>
    $(document).ready(function(){
          $('input[type="file"]').change(function(e){
              var fileName = e.target.files[0].name;
              $(e.target).next().text(fileName);
          });
      });
  </script>
@endsection

