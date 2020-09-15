@extends('layouts.index')
@section('content')

<section class="container">
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="vcard bio img-fluid img-circle"
             src="{{asset('storage/'.$user->image)}}"
             alt="User profile picture">
      </div>

    <h3 class="profile-username text-center">{{$user->user_name}}</h3>

    <p class="text-muted text-center">{{$user->role}}</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
        <b>Name</b> <a class="float-right">{{$user->name}}</a>
        </li>
        <li class="list-group-item">
          <b>Email</b> <a class="float-right">{{$user->email}}</a>
        </li>
        <li class="list-group-item">
          <b>ID Card</b> 
          <img class="col-sm-6 float-right" style="height: 300px"
            src="{{asset('storage/'.$user->card)}}"
            alt="User profile picture">
        </li>
      </ul>
        
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@if ($user->role == 'clinic')
    

  <!-- About Me Box -->
  <div class="card card-info">
    <div class="card-header ">
      <h4 class="text-center">Clinic Information</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <strong><i class="fas fa-address-card mr-1"></i> Address</strong>

      <p class="text-muted">
          {{$user->country->name}}- {{$user->state->name}}- {{$user->address}}
      </p>

      <hr>

      <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

    <p class="text-muted">{{$user->location}}</p>
    <hr>

      <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>

    <p class="text-muted">{{$user->phone}}</p>
      @endif
      
        <a href="{{route('profile.edit',$user->id)}}" class="offset-4 btn btn-primary"><b>Update Profile</b></a>
    </div>
</section>
@endsection

