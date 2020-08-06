@extends('layouts.admin')
@section('content')
<section class="container">
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
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

      {{-- <hr>

      <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

      <p class="text-muted">
        <span class="tag tag-danger">UI Design</span>
        <span class="tag tag-success">Coding</span>
        <span class="tag tag-info">Javascript</span>
        <span class="tag tag-warning">PHP</span>
        <span class="tag tag-primary">Node.js</span>
      </p>

      <hr>

      <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
      <hr>
      @endif
      
      <div class="row">
        <a href="{{url('/users/verify',$user->id)}}" class="offset-4 btn btn-primary"><b>Verify</b></a>
        <div class="offset-2">
            {!! Form::open(['route' => ['user.destroy', $user->id] ,'method' => 'delete' ]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
        {{-- <a href="#" class=" btn btn-danger"><b>Delete</b></a> --}}
    </div>
    </div>
</section>
@endsection
