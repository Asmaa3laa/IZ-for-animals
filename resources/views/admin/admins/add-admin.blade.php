@extends('layouts.admin')
{{-- <style>
    img {
        display: block;
        max-width:230px;
        max-height:95px;
        width: auto;
        height: auto;
        
      }
      </style>  --}}
@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="row">
        <div class="col-12 mt-3" style="color:navy">
            <h3>Add Admins</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <form action="{{route('admin.store')}}" method="POST">
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="user_name" placeholder="username" class="form-control">
                </div>
                <div><span class="text-muted">{{$errors->first('user_name') }}</span></div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" placeholder="emil" class="form-control">
                </div>
                <div><span class="text-muted">{{$errors->first('email') }}</span></div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" name="password" placeholder="password" class="form-control">
                </div>
                <div><span class="text-muted">{{$errors->first('password') }}</span></div>
                <div class="form-group">
                    <label for="name">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="password" class="form-control">
                </div>
                <div><span class="text-muted">{{$errors->first('password') }}</span></div>
                <label for="role">Set a role:</label>
                <select name="role" id="role">
                    <option value="blogs_admin">Blogs' admin</option>
                    <option value="clinics_admin">Clinics' admin</option>
                    <option value="doctors_admin">Doctors'admin</option>
                </select>
                <div><span class="text-muted">{{$errors->first('role') }}</span></div>
                @csrf
                <button type="submit" class="btn btn-primary">Add An Admin</button>
            </form>
        </div>
    </div>
</div>
@endsection
