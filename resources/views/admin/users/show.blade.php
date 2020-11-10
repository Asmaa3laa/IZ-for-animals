@extends('layouts.admin')
<head>
  <link rel="stylesheet" href="{{ asset('css/img_popup.css') }}">

</head>
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
  @if(session('password'))
    <div class="alert alert-success disapled" role="alert">
      <p>{{Session::get('password')}} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
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
      <a class="dropdown-item" href="{{url('change-password')}}">Change Password</a>
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
        <img id="myImg" src="{{asset('storage/'.$user->card)}}" style="width:100%;max-width:300px"/>

        <div id="myModal" class="modal">

          <!-- The Close Button -->
          <span class="close">&times;</span>
        
          <!-- Modal Content (The Image) -->
          <img class="modal-content" id="img01">
        
          <!-- Modal Caption (Image Text) -->
          <div id="caption"></div>
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
<script src="{{asset('js/img_popup.js')}}"></script>

@endsection
