@extends('layouts.admin')
@section('content')
<section class="container">
@if(Auth::id() == $user->id)
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Update Your Data</h3>
        </div>
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
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
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="text-align: center">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
</div>  
@endif
</section>
<script src="{{asset('js/jquery.min.js')}}"></script>

<script>
    $(document).ready(function(){
          $('input[type="file"]').change(function(e){
              var fileName = e.target.files[0].name;
              $(e.target).next().text(fileName);
          });
      });
  </script>
@endsection