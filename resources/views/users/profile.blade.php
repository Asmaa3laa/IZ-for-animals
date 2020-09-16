@extends('layouts.index')
@section('content')

<section class="container">
  
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="vcard bio img-fluid rounded-circle" style="width: 200px;height: 200px"
          src="{{asset('storage/'.$user->image)}}"
          alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">{{$user->user_name}}</h3>

      <p class="text-muted text-center">{{$user->role}}</p>
      <div class="row">
      <div class="{{$user->role == 'clinic' ? 'col-6' : 'offset-2 col-8'}} card card-info">
        <div class="card-body ">
          <b> <i class="fa fa-user mr-1"></i>DR. Name</b>
            <h6>{{$user->name}}</h6>
            <hr>
          <b><i class="fa fa-envelope mr-1"></i>Email</b>
          <h6>{{$user->email}}</h6>
          <hr>
          <b><i class="fa fa-image mr-1"></i> Card</b> 
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
{{-- <a href="{{route('profile.edit',$user->id)}}" class="offset-5 btn btn-info" style="margin-top: 10px;"><b>Update Profile</b></a> --}}

</div>
</section>
@endsection

