@extends('layouts.admin')
@section('content')
<section class="container">
<div class="card card-primary card-outline">
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
  <div class="card-body box-profile">

    @if(Auth::id() == $user->id)
    <div class="dropdown" style="text-align: right">
      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog"></i>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="{{route('user.edit',$user->id)}}">Update Profile</a>
      <a class="dropdown-item" href="{{route('password.request')}}">Reset Password</a>
        {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
      </div>
    </div>
    @endif
    <div class="text-center">
      @if($user->image)
      <img class="vcard bio img-fluid rounded-circle" style="width: 200px;height: 200px"
        src="{{asset('storage/'.$user->image)}}"
        alt="User profile picture">
        @else
        <img  class="vcard bio img-fluid rounded-circle" style="width: 200px;height: 200px"
         src="/images/doctor avatar.jpg" alt="profile picture"> 
        @endif
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
        @if($user->card)
        <b><i class="fa fa-credit-card mr-1"></i> Card</b> 
        <div class="ftco-animate">
          <div class="work mb-4 img align-items-end" style="background-image: url({{asset('storage/'.$user->card)}});">
            <a style="cursor: zoom-in" href="{{asset('storage/'.$user->card)}}" class="icon image-popup d-flex justify-content-center align-items-center">
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
     <hr>
      {{-- @endif --}}
      @if (Auth::id() != $user->id)
      <div class="row">
        <a href="{{url('/users/verify',$user->id)}}" class="offset-4 btn btn-primary"><b>Verify</b></a>
        <div class="offset-2">
            {!! Form::open(['route' => ['user.destroy', $user->id] ,'method' => 'delete' ]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
      </div>
      @endif
      
    </div>
</section>
@endsection
